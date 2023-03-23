<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Cristian Delgado';
        $user->email = 'cristian@gmail.com';
        $user->role = 'administrator';
        $user->cellphone = '3212773777';
        $user->password = bcrypt('cristian');
        $user->assignRole('administrator');
        $user->save();
    }
}
