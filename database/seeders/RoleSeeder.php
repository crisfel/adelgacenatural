<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleTherapist = Role::create(['name' => 'administrator']);
        $roleTherapist = Role::create(['name' => 'therapist']);
        $rolePatient = Role::create(['name' => 'patient']);

    }
}
