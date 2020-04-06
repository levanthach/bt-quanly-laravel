<?php

use Illuminate\Database\Seeder;

class SachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      	DB::table("sach")->insert([
      		['name' => 'Ngày Xưa Có 1 Con Bò', 'theloai' => 'Xã Hội' , 'visible' => true ],
      		['name' => 'Ngày Giông Bão', 'theloai' => 'Gia Đình' , 'visible' => false ],
      		['name' => 'Trò Chơi Cuộc Sống', 'theloai' => 'Giáo Dục' , 'visible' => true ],
      		['name' => 'Huyền Thoại CR7', 'theloai' => 'Thể Thao' , 'visible' => true ],
      	]);
    }
}


