<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\DetailUser;
use App\Models\InvitationCode;

class AdminController extends Controller {

    public function adminDestroy(Request $request): RedirectResponse {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Anda telah sukses logout!',
            'alert-type' => 'info',
        );
        return redirect('/logout')->with($notification);
    }

    public function adminLogoutPage(){
        return view('admin.admin_logout');
    }

    public function adminProfile() {
        // $id = Auth::user()->id;
        // $adminData = User::with('detailUser')->find($id);
        return view('admin.admin_profile_view');
    }

    public function adminProfileStore(Request $request) {

        $id = Auth::user()->id;
        $adminData = User::find($id);
        $adminData->username = $request->username;
        $adminData->email = $request->email;
        $adminData->phone = $request->phone;
        $adminData->is_active = $request->status;

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $namaFile = $request->username;
            $storagePath = Storage::path('public/images/profile');
            $ext = $file->getClientOriginalExtension();
            $filename = $namaFile.'-'.time().'.'.$ext;
            if(empty($adminData->photo)){
                try {
                    $file->move($storagePath, $filename);
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
            } else {
                Storage::delete('public/images/profile/'.$adminData->photo);
                $file->move($storagePath, $filename);
            }
            $adminData['photo'] = $filename;
            $adminData->save();
            $notification = array(
                'message' => 'Data akun berhasil diupdate!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        } else {
            $adminData->save();
            $notification = array(
                'message' => 'Data akun berhasil diupdate!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function adminProfileInfoStore(Request $request){
        $id = Auth::user()->id;
        $adminInfo = DetailUser::where('id_user', $id)->first();
        $adminInfo->nama_lengkap = $request->nama_lengkap;
        $adminInfo->save();
        $notification = array(
            'message' => 'Data informasi user profil berhasil diupdate!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function changePassword(){
        return view ('admin.change_password');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->old_password, auth::user()->password)){
            $notification = array(
                'message' => 'Password lama tidak sesuai!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        $notification = array(
            'message' => 'Password berhasil diperbarui!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }

    public function adminMarketingDashboard(){
        $marketingList = User::where('type', 1)->count();
        $invitationCode = InvitationCode::count();
        $marketingData = User::with('detailUser')->where('type', 1)->where('is_active', 1)->latest()->take(5)->get();
        $marketingAktivasi = User::with('detailUser')->where('type', 1)->where('is_active', 0)->latest()->take(10)->get();
        return view('admin.admin_marketing_dashboard', compact('marketingList', 'marketingData', 'marketingAktivasi', 'invitationCode'));
    }

    public function adminMarketingList(){
        $userMarketing = User::with('detailUser')->where('type', 1)->orderBy('id', 'DESC')->get();
        return view('admin.admin_marketing_list_all', compact('userMarketing'));
    }

    public function adminMarketingProfileDetail($id){
        $marketingData = User::with('detailUser')->find($id);
        return view('admin.admin_marketing_detail', compact('marketingData'));
    }

    public function adminMarketingProfileDetailAccountStore(Request $request){
        $userMarketing = User::find($request->id);
        $userMarketing->username = $request->username;
        $userMarketing->email = $request->email;
        $userMarketing->phone = $request->phone;
        $userMarketing->is_active = $request->status;

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $namaFile = $request->username;
            $storagePath = Storage::path('public/images/profile');
            $ext = $file->getClientOriginalExtension();
            $filename = $namaFile.'-'.time().'.'.$ext;
            if(empty($userMarketing->photo)){
                try {
                    $file->move($storagePath, $filename);
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
            } else {
                Storage::delete('public/images/profile/'.$userMarketing->photo);
                $file->move($storagePath, $filename);
            }
            $userMarketing['photo'] = $filename;
            $userMarketing->save();
            $notification = array(
                'message' => 'Data akun berhasil diupdate!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        } else {
            $userMarketing->save();
            $notification = array(
                'message' => 'Data akun berhasil diupdate!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function adminMarketingProfileDetailInfoStore(Request $request){
        $userMarketing = DetailUser::find($request->id);
        $userMarketing->update([
            'nama_lengkap' => $request->nama_lengkap,
            'no_ktp' => $request->no_ktp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
        ]);
        $notification = array(
            'message' => 'Data akun berhasil diupdate!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function adminMarketingProfileAccountActivation($id){
        $userMarketing = User::find($id);
        if($userMarketing->is_active == 0){
            $userMarketing->is_active = 1;
        } else if($userMarketing->is_active == 1) {
            $userMarketing->is_active = 2;
        } else if($userMarketing->is_active == 2){
            $userMarketing->is_active = 1;
        }
        $userMarketing->save();  
        $notification = array(
            'message' => 'Data akun berhasil diupdate!',
            'alert-type' => 'info',
        );
        return redirect()->back()->with($notification);      
    }

    public function calendar(){
        return view('admin.admin_calendar');
    }
    
    public function adminMarketingProfileInvitationCodeInfo(){
        return view('admin.admin_marketing_invitation_code_info');
    }

    public function adminMarketingProfileInvitationCodeInvoice(){
        return view('admin.admin_marketing_invitation_code_invoice');
    }

    public function adminMerchantList(){
        return view('admin.admin_merchant_list');
    }

    public function adminFinanceData(){
        return view('admin.admin_finance_data');
    }
}
