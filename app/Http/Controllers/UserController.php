<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Alert;
use Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash; // library untuk enkripsi password
use Illuminate\Support\Facades\Storage; // menyimpan file selayaknya public dan storage dan dihubungkan ke public
//jika library ini dipanggil, ketika mengambil dari github harus memberikan perintah php artisan link:storage
//agar storage terhubung ke public

class UserController extends Controller
{
    //
    public function index(){
        $userAll = User::all();
        // $users = User::where('is_active', false)->get();
        return view('admin.user.index', compact('userAll'));
    }

    public function activate(User $user){
        $user->is_active = true;
        $user->save();
        return redirect('admin/user')->with('success', 'User Berhasil Diaktifkan');
    }

    public function showProfile(){
        $user = User::findOrFail(Auth::id());
        return view('admin.user.profile', compact('user'));
    }

    public function update(Request $request, $id){
        // validate
        request()->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|unique:users,email,' .$id. ',id',
            'old_password' => 'nullable|string',
            'password' => 'nullable|required_with:old_password|string|confirmed|min:6',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->filled('old_password')){
            if(Hash::check($request->old_password, $user->password)){
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
            }
            else {
                return back()
                ->withErrors(['old_password' => __('Tolong periksa passwordnya lagi')])
                ->withInput();
            }
        }

        if(request()->hasFile('foto')){
            // kodingan untuk cek foto sudah ada atau belum
            if($user->foto && file_exists(storage_path('app/public/fotos'.$user->foto))){
                Storage::delete('app/public/fotos'.$user->foto);
            }
            // proses request foto setelah dicek
            $file = $request->file('foto');

            // cek ekstensi, apakah jpg/jpeg/png dll
            $fileName = 'foto-'.uniqid().$file->getClientOriginalName();

            // pemasukan file ke storage
            $request->foto->move(storage_path('app/public/fotos/'), $fileName);

            // request menggunakan eloquent 
            $user->foto = $fileName;
        }
        $user->role = $request->role;
        $user->save();
        return back()->with('success', 'Profile Terupdate');

    }
}
