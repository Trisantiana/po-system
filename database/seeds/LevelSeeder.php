<?php

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('level')->insert([
        	[
        		'id' => '1',
        		'nama_level' => 'Administrator'
        	],
        	[
        		'id' => '2',
        		'nama_level' => 'Admin'
        	],
            [
                'id' => '3',
                'nama_level' => 'Pelanggan'
            ]

        ]);
    }
}
