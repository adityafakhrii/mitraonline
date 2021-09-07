<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->foto = NULL;
        $user->nama = "Admin";
        $user->username = "admin123";
        $user->email = "admin123@gmail.com";
        $user->password = bcrypt('admin123'); 
        $user->role = "admin";
        $user->no_hp = "0881111223";
        $user->kode_pos = 44131;
        $user->alamat = 'Bandung';
        $user->save();
    }
}
