<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class departmentseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    foreach ([
        [
            'name' => 'IT',
            'code' => 'IT',
            'is_active' => true,
        ],
        [
            'name' => 'HR',
            'code' => 'HR',
            'is_active' => true,
        ],
        [
            'name' => 'Accounts',
            'code' => 'ACC',
            'is_active' => true,
        ],
        [
            'name' => 'Sales',
            'code' => 'SAL',
            'is_active' => true,
        ],
        [
            'name' => 'Management',
            'code' => 'MGT',
            'is_active' => true,
        ],
    ] as $department) {

        Department::updateOrCreate(
            ['code' => $department['code']],
            $department
        );
    }
 }

}   


