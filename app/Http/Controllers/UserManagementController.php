<?php

namespace App\Http\Controllers;



use App\Models\Guru;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function CreateUserGuru(Guru $mahasiswa)
    {
        $mahasiswas = Guru::all();
        foreach ($mahasiswas as $mahasiswa) {
            // Check if the 'nuptk' is available before creating the user
            if (!empty($mahasiswa->nuptk)) {
                // Check if 'guru_id' and 'email' already exist, then skip
                if (User::where('guru_id', $mahasiswa->id)->orWhere('email', $mahasiswa->nuptk . '@smawa.my.id')->exists()) {
                    continue;
                }

                $user = new User();
                $user->name = $mahasiswa->nama_guru;
                $user->email = $mahasiswa->nuptk . '@smawa.my.id';
                $user->password = Hash::make($mahasiswa->nuptk);
                $user->guru_id = $mahasiswa->id;
                $user->save();
                $user->assignRole('guru'); // Memberikan peran 'guru' pada user
                $user->givePermissionTo('create post'); // Memberikan izin 'create post' pada user
                $user->givePermissionTo('show post'); // Memberikan izin 'show post' pada user
                $user->givePermissionTo('edit post'); // Memberikan izin 'edit post' pada user
            }
        }
        return redirect()->back();
    }
}
