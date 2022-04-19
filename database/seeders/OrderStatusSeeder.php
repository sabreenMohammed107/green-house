<?php

namespace Database\Seeders;

use App\Models\Order_status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            'pendding',
            'waitpoints',
            'confirmed',





        ];
   // for update data commit olde and open new and udate admin user
        foreach ($status as $index=>$type) {


           Order_status::create(['id'=>$index+1,'status' => $type]);


        }
    }
}
