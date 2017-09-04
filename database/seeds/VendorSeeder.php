<?php

use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendor = [
        	'fullname'=>'self',
        	'address'=>'ktm',

        ];
        \App\Models\Vendor::insert($vendor);
    }
}
