<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            [
                'link_name'=> '前进网',
                'link_title'=> '广州东圃',
                'link_url'=> 'http://www.gz.com',
                'link_order'=> 2,
                'link_time'=> time(),
            ],
            [
                'link_name'=> '前进网2',
                'link_title'=> '广州东圃2',
                'link_url'=> 'http://www.gz2.com',
                'link_order'=> 22,
                'link_time'=> time(),
            ],

        ];
        DB::table('links')->insert($data);
    }
}
