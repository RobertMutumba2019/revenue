<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Optional: clear existing records
        DB::table('departments')->truncate();

        // Insert default departments
        DB::table('departments')->insert([
            [
                'dept_name' => 'Finance',
                'dept_office_id' => 0,
                'dept_status' => 1,
                'dept_date_added' => Carbon::now(),
                'dept_added_by' => 1, // adjust user ID as needed
            ],
            [
                'dept_name' => 'HR',
                'dept_office_id' => 0,
                'dept_status' => 1,
                'dept_date_added' => Carbon::now(),
                'dept_added_by' => 1,
            ],
            [
                'dept_name' => 'IT',
                'dept_office_id' => 0,
                'dept_status' => 1,
                'dept_date_added' => Carbon::now(),
                'dept_added_by' => 1,
            ],
            [
                'dept_name' => 'Operations',
                'dept_office_id' => 0,
                'dept_status' => 1,
                'dept_date_added' => Carbon::now(),
                'dept_added_by' => 1,
            ],
        ]);
    }
}
