<?php

use Illuminate\Database\Seeder;
use App\Coupon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => 'BLACKFRIDAY100',
            'type' => 'fixed',
            'value' => 100,
        ]);

        Coupon::create([
            'code'          => 'FIRST50',
            'type'          => 'percent',
            'percent_off'   => 50,
        ]);
    }
}
