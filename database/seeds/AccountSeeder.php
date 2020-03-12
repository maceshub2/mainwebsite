<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['icon'=>'','name'=>'Facebook'],
            ['icon'=>'','name'=>'Skype'],
            ['icon'=>'','name'=>'Twitter'],
            ['icon'=>'','name'=>'Whatsapp'],
            ['icon'=>'','name'=>'Viber'],
            ['icon'=>'','name'=>'Youtube'],
            ['icon'=>'','name'=>'Line'],
            ['icon'=>'','name'=>'Instagram'],
        ];
        DB::table('accounts')->insert($data);
    }
}
