<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('storegroups')->insert([
            /**
             * Store group Seeder
             */
            ['StoreGroup' => 'SM'],
            ['StoreGroup'=> 'Robinsons'],
            ['StoreGroup'=> 'Olympic Village'],
            ['StoreGroup'=> 'Planet Sports'],
            ['StoreGroup'=> 'Tobys'],
            ['StoreGroup'=> 'Gaisano Mall'],
            ['StoreGroup'=> 'Royal Sporting House'],
            ['StoreGroup'=>  'Sports Central'],
            ['StoreGroup'=>  'RSH'],        
        ]);
    }
}


