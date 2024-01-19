<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class DefaultLoginUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Super Admin Seeder ##
        $superAdminRole = Role::updateOrCreate(['name'=> 'Super Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $superAdminRole->syncPermissions($permissions);

        $user = User::updateOrCreate([
            'email' => 'superadmin@gmail.com'
        ],[
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'mobile' => '9999999991',
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole([$superAdminRole->id]);



        // Admin Seeder ##
        $adminRole = Role::updateOrCreate(['name'=> 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $adminRole->syncPermissions($permissions);

        $user = User::updateOrCreate([
            'email' => 'admin@gmail.com'
        ],[
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'mobile' => '9999999992',
            'password' => Hash::make('12345678')
        ]);
        $user->assignRole([$adminRole->id]);

        // HOD Seeder ##
        $hodRole = Role::updateOrCreate(['name'=> 'Hod']);
        $permissions = Permission::pluck('id','id')->all();
        $hodRole->syncPermissions($permissions);

        $user = User::updateOrCreate([
            'email' => 'hod@gmail.com'
        ],[
            'name' => 'Hod',
            'email' => 'hod@gmail.com',
            'mobile' => '9999999993',
            'password' => Hash::make('12345678')
        ]);
        $user->assignRole([$hodRole->id]);

         // Ac Seeder ##
         $acRole = Role::updateOrCreate(['name'=> 'Ac']);
         $permissions = Permission::pluck('id','id')->all();
         $acRole->syncPermissions($permissions);

         $user = User::updateOrCreate([
             'email' => 'ac@gmail.com'
         ],[
             'name' => 'Ac',
             'email' => 'ac@gmail.com',
             'mobile' => '9999999994',
             'password' => Hash::make('12345678')
         ]);
         $user->assignRole([$acRole->id]);

          // AMC Seeder ##
          $AmcRole = Role::updateOrCreate(['name'=> 'AMC']);
          $permissions = Permission::pluck('id','id')->all();
          $AmcRole->syncPermissions($permissions);

          $user = User::updateOrCreate([
              'email' => 'amc@gmail.com'
          ],[
              'name' => 'AMC',
              'email' => 'amc@gmail.com',
              'mobile' => '9999999995',
              'password' => Hash::make('12345678')
          ]);
          $user->assignRole([$AmcRole->id]);

          // DMC Seeder ##
          $DmcRole = Role::updateOrCreate(['name'=> 'DMC']);
          $permissions = Permission::pluck('id','id')->all();
          $DmcRole->syncPermissions($permissions);

          $user = User::updateOrCreate([
              'email' => 'dmc@gmail.com'
          ],[
              'name' => 'DMC',
              'email' => 'dmc@gmail.com',
              'mobile' => '9999999996',
              'password' => Hash::make('12345678')
          ]);
          $user->assignRole([$DmcRole->id]);

          // User Seeder ##
          $UserRole = Role::updateOrCreate(['name'=> 'User']);
          $permissions = Permission::pluck('id','id')->all();
          $UserRole->syncPermissions($permissions);

          $user = User::updateOrCreate([
              'email' => 'user@gmail.com'
          ],[
              'name' => 'User',
              'email' => 'user@gmail.com',
              'mobile' => '9999999997',
              'password' => Hash::make('12345678')
          ]);
          $user->assignRole([$UserRole->id]);

    }
}
