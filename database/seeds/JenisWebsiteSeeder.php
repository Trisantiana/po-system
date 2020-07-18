<?php

use Illuminate\Database\Seeder;

class JenisWebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jns_website')->insert([
        	[
        		'id' => '1',
        		'jenis_website' => 'Web Sewa'
        	],
        	[
        		'id' => '2',
        		'jenis_website' => 'Web Portal dealermobil.info'
        	],
        	[
        		'id' => '3',
        		'jenis_website' => 'Web Portal infomobilbaru.id'
        	]

        ]);
    }
}
