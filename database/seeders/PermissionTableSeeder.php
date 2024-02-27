<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'id' => 1,
                'name' => 'dashboard.view',
                'group' => 'dashboard',
            ],
            [
                'id' => 2,
                'name' => 'users.view',
                'group' => 'users',
            ],
            [
                'id' => 3,
                'name' => 'users.create',
                'group' => 'users',
            ],
            [
                'id' => 4,
                'name' => 'users.edit',
                'group' => 'users',
            ],
            [
                'id' => 5,
                'name' => 'users.delete',
                'group' => 'users',
            ],
            [
                'id' => 6,
                'name' => 'users.toggle_status',
                'group' => 'users',
            ],
            [
                'id' => 7,
                'name' => 'users.change_password',
                'group' => 'users',
            ],
            [
                'id' => 8,
                'name' => 'roles.view',
                'group' => 'roles',
            ],
            [
                'id' => 9,
                'name' => 'roles.create',
                'group' => 'roles',
            ],
            [
                'id' => 10,
                'name' => 'roles.edit',
                'group' => 'roles',
            ],
            [
                'id' => 11,
                'name' => 'roles.delete',
                'group' => 'roles',
            ],
            [
                'id' => 12,
                'name' => 'roles.assign',
                'group' => 'roles',
            ],
            [
                'id' => 13,
                'name' => 'wards.view',
                'group' => 'wards',
            ],
            [
                'id' => 14,
                'name' => 'wards.create',
                'group' => 'wards',
            ],
            [
                'id' => 15,
                'name' => 'wards.edit',
                'group' => 'wards',
            ],
            [
                'id' => 16,
                'name' => 'wards.delete',
                'group' => 'wards',
            ],

            [
                'id' => 17,
                'name' => 'category.view',
                'group' => 'category',
            ],

            [
                'id' => 18,
                'name' => 'category.create',
                'group' => 'category',
            ],

            [
                'id' => 19,
                'name' => 'category.edit',
                'group' => 'category',
            ],

            [
                'id' => 20,
                'name' => 'category.delete',
                'group' => 'category',
            ],

            [
                'id' => 21,
                'name' => 'scheme.view',
                'group' => 'scheme',
            ],

            [
                'id' => 22,
                'name' => 'scheme.create',
                'group' => 'scheme',
            ],

            [
                'id' => 23,
                'name' => 'scheme.edit',
                'group' => 'scheme',
            ],

            [
                'id' => 24,
                'name' => 'scheme.delete',
                'group' => 'scheme',
            ],

            [
                'id' => 25,
                'name' => 'category-wise-scheme.view',
                'group' => 'category-wise-scheme',
            ],

            [
                'id' => 26,
                'name' => 'category-wise-scheme.create',
                'group' => 'category-wise-scheme',
            ],

            [
                'id' => 27,
                'name' => 'category-wise-scheme.edit',
                'group' => 'category-wise-scheme',
            ],
            [
                'id' => 28,
                'name' => 'category-wise-scheme.delete',
                'group' => 'category-wise-scheme',
            ],


            [
                'id' => 29,
                'name' => 'document-type.view',
                'group' => 'document-type',
            ],
            [
                'id' => 30,
                'name' => 'document-type.create',
                'group' => 'document-type',
            ],

            [
                'id' => 31,
                'name' => 'document-type.edit',
                'group' => 'document-type',
            ],

            [
                'id' => 32,
                'name' => 'document-type.delete',
                'group' => 'document-type',
            ],

            [
                'id' => 33,
                'name' => 'financial-year.view',
                'group' => 'financial-year',
            ],
            [
                'id' => 34,
                'name' => 'financial-year.create',
                'group' => 'financial-year',
            ],

            [
                'id' => 35,
                'name' => 'financial-year.edit',
                'group' => 'financial-year',
            ],

            [
                'id' => 36,
                'name' => 'financial-year.delete',
                'group' => 'financial-year',
            ],
            [
                'id' => 37,
                'name' => 'terms-conditions.view',
                'group' => 'terms-conditions',
            ],
            [
                'id' => 38,
                'name' => 'terms-conditions.create',
                'group' => 'terms-conditions',
            ],

            [
                'id' => 39,
                'name' => 'terms-conditions.edit',
                'group' => 'terms-conditions',
            ],

            [
                'id' => 40,
                'name' => 'terms-conditions.delete',
                'group' => 'terms-conditions',
            ],

            [
                'id' => 41,
                'name' => 'hod.application',
                'group' => 'hod',
            ],

            [
                'id' => 42,
                'name' => 'ac.application',
                'group' => 'ac',
            ],

            [
                'id' => 43,
                'name' => 'amc.application',
                'group' => 'amc',
            ],

            [
                'id' => 44,
                'name' => 'dmc.application',
                'group' => 'amc',
            ],

            [
                'id' => 45,
                'name' => 'users.applicationList',
                'group' => 'users',
            ],


        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate([
                'id' => $permission['id']
            ], [
                'id' => $permission['id'],
                'name' => $permission['name'],
                'group' => $permission['group']
            ]);
        }
    }
}