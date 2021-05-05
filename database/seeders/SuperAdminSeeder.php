<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $superAdmin = User::create([
            'name'      => 'SuperAdmin',
            'email'     => 'superadmin@mail.com',
            'password'  => Hash::make('EAq5pC43ucgmS8g'),
        ]);

        Role::create(['name' => 'SuperAdmin']);
        Role::create(['name' => 'Admin']);

        $superAdmin->assignRole('SuperAdmin');
    }
}
