<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Department;

class categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $categories = [
            'IT' => ['Hardware', 'Software', 'Network', 'Email', 'Access Request'],
            'HR' => ['Leave', 'Documents', 'Attendance', 'Employee Request'],
            'ACC' => ['Payment', 'Invoice', 'Expense Claim', 'Salary'],
            'SAL' => ['Customer Issue', 'Order Issue', 'Pricing', 'CRM'],
            'MGT' => ['Approval', 'Complaint', 'Policy', 'General Request'],
        ];

        foreach ($categories as $departmentCode => $categoryNames) {

            $department = Department::where('code', $departmentCode)->first();

            if (!$department) {
                continue;
            }

            foreach ($categoryNames as $categoryName) {

                Category::updateOrCreate(
                    [
                        'department_id' => $department->id,
                        'name' => $categoryName,
                    ],
                    [
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}
