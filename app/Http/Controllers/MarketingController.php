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
use App\Models\Merchant;

class MarketingController extends Controller {

    public function index(){
        $invitationCode = InvitationCode::count();
        return view('marketing.marketing_dashboard', compact('invitationCode'));
    }

    public function marketingDestroy(Request $request): RedirectResponse {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Anda telah sukses logout!',
            'alert-type' => 'info',
        );
        return redirect('/logout')->with($notification);
    }

    public function marketingProfile(){
        return view('marketing.marketing_profile');
    }

    public function marketingProfileStore(Request $request){
        $id = Auth::user()->id;
        $marketingData = User::find($id);
        $marketingData->email = $request->email;
        $marketingData->phone = $request->phone;

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $namaFile = $marketingData->username;
            $storagePath = Storage::path('public/images/profile');
            $ext = $file->getClientOriginalExtension();
            $filename = $namaFile.'-'.time().'.'.$ext;
            if(empty($marketingData->photo)){
                try {
                    $file->move($storagePath, $filename);
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
            } else {
                Storage::delete('public/images/profile/'.$marketingData->photo);
                $file->move($storagePath, $filename);
            }
            $marketingData['photo'] = $filename;
            $marketingData->save();
            $notification = array(
                'message' => 'Data akun berhasil diupdate!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        } else {
            $marketingData->save();
            $notification = array(
                'message' => 'Data akun berhasil diupdate!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function marketingProfileInfoStore(Request $request){
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

    public function changePassword(){
        return view ('marketing.change_password');
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

    public function marketingInvitationCodeList(){
        $invitationCodeList = InvitationCode::where('id_marketing', auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('marketing.marketing_invitation_code', compact('invitationCodeList'));
    }

    public function marketingInvitationCodeStore(Request $request){
        InvitationCode::create([
            'id_marketing' => auth()->user()->id,
            'holder_name' => $request->holder,
            'code' => $request->code,
        ]);

        $notification = array(
            'message' => 'Kode telah dibuat!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function calendar(){
        return view('marketing.marketing_calendar');
    }

    public function marketingInvitationCodeDetail(){
        return view('marketing.marketing_invitation_code_detail');
    }

    public function marketingMerchantListAll(){
        return view('marketing.marketing_merchant_list');
    }

    public function marketingTeantListAll(){
        // $userTenant = User::with(['userMerchant' => function($query){
        //     $query->where('id_marketing', auth()->user()->id);
        // }])->orderBy('id', 'DESC')->get();
        // $user = User::with('userMerchant')->whereHas('id_marketing', function ($q) {
        //         $q->where('expiration', 'like', 'somethingToSearchFor');
        //     })->get();
        $userTenant = User::with('userMerchant')->get();
        return view('marketing.marketing_tenant_list', compact('userTenant'));
    }

    public function marketingMerchantDetail() {
        return view('marketing.marketing_merchant_detail');
    }

    public function marketingTenantDetail(){
        return view('marketing.marketing_tenant_detail');
    }

    public function marketingCashOutList() {
        return view('marketing.marketing_merchant_data_penarikan');
    }
}
