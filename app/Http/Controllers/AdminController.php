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
        $id = Auth::user()->id;
        $adminData = User::with('detailUser')->find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function adminProfileStore(Request $request) {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        $adminData->name = $request->username;
        $adminData->email = $request->email;
        $adminData->phone = $request->phone;
        $adminData->is_active = $request->status;

        // if($request->password){
        //     $adminData->password = Hash::make($request->password);
        // }

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
}
