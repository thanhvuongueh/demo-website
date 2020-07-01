<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        DB::table('users')->insert([
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt("123123"),
            'level'=>1
        ]);

        DB::table('cates')->insert([
            ['name'=>'Áo','alias'=>'ao','order'=>1,'parent_id'=>0,'keyword'=>'Áo','description'=>'Áo'],
            ['name'=>'Quần','alias'=>'quan','order'=>2,'parent_id'=>0,'keyword'=>'Quần','description'=>'Quần'],
            ['name'=>'Phụ Kiện','alias'=>'phu-kien','order'=>3,'parent_id'=>0,'keyword'=>'Áo','description'=>'Áo'],
            ['name'=>'Áo Sơ Mi','alias'=>'ao-so-mi','order'=>1,'parent_id'=>1,'keyword'=>'Áo Sơ Mi','description'=>'Áo Sơ Mi'],
            ['name'=>'Áo Thun','alias'=>'ao-thun','order'=>2,'parent_id'=>1,'keyword'=>'Áo Thun','description'=>'Áo'],
            ['name'=>'Áo Khoác','alias'=>'ao-khoat','order'=>3,'parent_id'=>1,'keyword'=>'Áo Khoác','description'=>'Áo Khoác'],
            ['name'=>'Áo Sơ Mi Tay Dài','alias'=>'ao-so-mi-tay-dai','order'=>1,'parent_id'=>4,'keyword'=>'Áo Sơ Mi Tay Dài','description'=>'Áo Sơ Mi Tay Dài'],
            ['name'=>'Áo Sơ Mi Tay Ngắn','alias'=>'ao-so-mi-tay-ngan','order'=>2,'parent_id'=>4,'keyword'=>'Áo Sơ Mi Tay Ngắn','description'=>'Áo Sơ Mi Tay Ngắn'],
            ['name'=>'Quần Tây','alias'=>'quan-tay','order'=>1,'parent_id'=>2,'keyword'=>'Quần Tây','description'=>'Quần Tây'],
            ['name'=>'Quần Kaki','alias'=>'quan-kaki','order'=>2,'parent_id'=>2,'keyword'=>'Quần Kaki','description'=>'Quần Kaki'],
            ['name'=>'Quần Short','alias'=>'quan-short','order'=>3,'parent_id'=>2,'keyword'=>'Quần Short','description'=>'Quần Short'],
            ['name'=>'Thắt Lưng','alias'=>'that-lung','order'=>1,'parent_id'=>3,'keyword'=>'Thắt Lưng','description'=>'Thắt Lưng'],
            ['name'=>'Ví','alias'=>'vi','order'=>2,'parent_id'=>3,'keyword'=>'Ví','description'=>'Ví'],
        ]);

        DB::table('products')->insert([
            ['name'=>'Áo Sơ Mi Tay Dài 1','alias'=>'ao-so-mi-tay-dai-1','price'=>50000,'intro'=>'Áo Sơ Mi Tay Dài 1','content'=>'Áo Sơ Mi Tay Dài 1','image'=>'ao-so-mi-tay-dai1.jpg','keywords'=>'Áo Sơ Mi Tay Dài 1','description'=>'Áo Sơ Mi Tay Dài 1','hot'=>1,'user_id'=>1,'cate_id'=>7],
            ['name'=>'Áo Sơ Mi Tay Dài 2','alias'=>'ao-so-mi-tay-dai-1','price'=>100000,'intro'=>'Áo Sơ Mi Tay Dài 2','content'=>'Áo Sơ Mi Tay Dài 2','image'=>'ao-so-mi-tay-dai2.jpg','keywords'=>'Áo Sơ Mi Tay Dài 2','description'=>'Áo Sơ Mi Tay Dài 2','hot'=>1,'user_id'=>1,'cate_id'=>7],
            ['name'=>'Áo Sơ Mi Tay Dài 3','alias'=>'ao-so-mi-tay-dai-3','price'=>200000,'intro'=>'Áo Sơ Mi Tay Dài 3','content'=>'Áo Sơ Mi Tay Dài 3','image'=>'ao-so-mi-tay-dai3.jpg','keywords'=>'Áo Sơ Mi Tay Dài 3','description'=>'Áo Sơ Mi Tay Dài 3','hot'=>0,'user_id'=>1,'cate_id'=>7],
            ['name'=>'Áo Sơ Mi Tay Dài 4','alias'=>'ao-so-mi-tay-dai-4','price'=>150000,'intro'=>'Áo Sơ Mi Tay Dài 4','content'=>'Áo Sơ Mi Tay Dài 4','image'=>'ao-so-mi-tay-dai4.jpg','keywords'=>'Áo Sơ Mi Tay Dài 4','description'=>'Áo Sơ Mi Tay Dài 4','hot'=>0,'user_id'=>1,'cate_id'=>7],
            ['name'=>'Áo Sơ Mi Tay Ngắn 1','alias'=>'ao-so-mi-tay-ngan-1','price'=>250000,'intro'=>'Áo Sơ Mi Tay Ngắn 1','content'=>'Áo Sơ Mi Tay Ngắn 1','image'=>'ao-so-mi-tay-ngan1.jpg','keywords'=>'Áo Sơ Mi Tay Ngắn 1','description'=>'Áo Sơ Mi Tay Ngắn 1','hot'=>1,'user_id'=>1,'cate_id'=>8],
            ['name'=>'Áo Sơ Mi Tay Ngắn 2','alias'=>'ao-so-mi-tay-ngan-2','price'=>150000,'intro'=>'Áo Sơ Mi Tay Ngắn 2','content'=>'Áo Sơ Mi Tay Ngắn 2','image'=>'ao-so-mi-tay-ngan2.jpg','keywords'=>'Áo Sơ Mi Tay Ngắn 2','description'=>'Áo Sơ Mi Tay Ngắn 2','hot'=>1,'user_id'=>1,'cate_id'=>8],
            ['name'=>'Áo Sơ Mi Tay Ngắn 3','alias'=>'ao-so-mi-tay-ngan-3','price'=>140000,'intro'=>'Áo Sơ Mi Tay Ngắn 3','content'=>'Áo Sơ Mi Tay Ngắn 3','image'=>'ao-so-mi-tay-ngan3.jpg','keywords'=>'Áo Sơ Mi Tay Ngắn 3','description'=>'Áo Sơ Mi Tay Ngắn 3','hot'=>0,'user_id'=>1,'cate_id'=>8],
            ['name'=>'Áo Thun 1','alias'=>'ao-thu-1','price'=>80000,'intro'=>'Áo Thun 1','content'=>'Áo Thun 1','image'=>'ao-thun1.jpg','keywords'=>'Áo Thun 1','description'=>'Áo Thun 1','hot'=>1,'user_id'=>1,'cate_id'=>5],
            ['name'=>'Áo Thun 2','alias'=>'ao-thun-2','price'=>90000,'intro'=>'Áo Thun 2','content'=>'Áo Thun 2','image'=>'ao-thun2.jpg','keywords'=>'Áo Thun 2','description'=>'Áo Thun 2','hot'=>0,'user_id'=>1,'cate_id'=>5],
            ['name'=>'Áo Khoác 1','alias'=>'ao-khoac-1','price'=>280000,'intro'=>'Áo Khoác 1','content'=>'Áo Khoác 1','image'=>'ao-khoac1.jpg','keywords'=>'Áo Khoác 1','description'=>'Áo Khoác 1','hot'=>1,'user_id'=>1,'cate_id'=>6],
            ['name'=>'Áo Khoác 2','alias'=>'ao-khoac-2','price'=>350000,'intro'=>'Áo Khoác 2','content'=>'Áo Khoác 2','image'=>'ao-khoac2.jpg','keywords'=>'Áo Khoác 2','description'=>'Áo Khoác 2','hot'=>0,'user_id'=>1,'cate_id'=>6],
            ['name'=>'Quần Tây 1','alias'=>'quan-tay-1','price'=>400000,'intro'=>'Quần Tây 1','content'=>'Quần Tây 1','image'=>'quan-tay1.jpg','keywords'=>'Quần Tây 1','description'=>'Quần Tây 1','hot'=>1,'user_id'=>1,'cate_id'=>9],
            ['name'=>'Quần Tây 2','alias'=>'quan-tay-2','price'=>320000,'intro'=>'Quần Tây 2','content'=>'Quần Tây 2','image'=>'quan-tay2.jpg','keywords'=>'Quần Tây 2','description'=>'Quần Tây 2','hot'=>1,'user_id'=>1,'cate_id'=>9],
            ['name'=>'Quần Tây 3','alias'=>'quan-tay-3','price'=>300000,'intro'=>'Quần Tây 3','content'=>'Quần Tây 3','image'=>'quan-tay3.jpg','keywords'=>'Quần Tây 3','description'=>'Quần Tây 3','hot'=>1,'user_id'=>1,'cate_id'=>9],
            ['name'=>'Quần Kaki 1','alias'=>'quan-kaki-1','price'=>150000,'intro'=>'Quần Kaki 1','content'=>'Quần Kaki 1','image'=>'quan-kaki1.jpg','keywords'=>'Quần Kaki 1','description'=>'Quần Kaki 1','hot'=>1,'user_id'=>1,'cate_id'=>10],
            ['name'=>'Quần Kaki 2','alias'=>'quan-kaki-2','price'=>190000,'intro'=>'Quần Kaki 2','content'=>'Quần Kaki 2','image'=>'quan-kaki2.jpg','keywords'=>'Quần Kaki 2','description'=>'Quần Kaki 2','hot'=>1,'user_id'=>1,'cate_id'=>10],
            ['name'=>'Quần Short 1','alias'=>'quan-short-1','price'=>80000,'intro'=>'Quần Short 1','content'=>'Quần Short 1','image'=>'quan-short1.jpg','keywords'=>'Quần Short 1','description'=>'Quần Short 1','hot'=>1,'user_id'=>1,'cate_id'=>11],
            ['name'=>'Quần Short 2','alias'=>'quan-short-2','price'=>120000,'intro'=>'Quần Short 2','content'=>'Quần Short 2','image'=>'quan-short2.jpg','keywords'=>'Quần Short 2','description'=>'Quần Short 2','hot'=>1,'user_id'=>1,'cate_id'=>11],
            ['name'=>'Quần Short 3','alias'=>'quan-short-3','price'=>130000,'intro'=>'Quần Short 3','content'=>'Quần Short 3','image'=>'quan-short3.jpg','keywords'=>'Quần Short 3','description'=>'Quần Short 3','hot'=>1,'user_id'=>1,'cate_id'=>11],
            ['name'=>'Thắt Lưng 1','alias'=>'that-lung-1','price'=>150000,'intro'=>'Thắt Lưng 1','content'=>'Thắt Lưng 1','image'=>'that-lung1.jpg','keywords'=>'Thắt Lưng 1','description'=>'Thắt Lưng 1','hot'=>1,'user_id'=>1,'cate_id'=>12],
            ['name'=>'Thắt Lưng 2','alias'=>'that-lung-2','price'=>100000,'intro'=>'Thắt Lưng 2','content'=>'Thắt Lưng 2','image'=>'that-lung2.jpg','keywords'=>'Thắt Lưng 2','description'=>'Thắt Lưng 2','hot'=>1,'user_id'=>1,'cate_id'=>12],
            ['name'=>'Thắt Lưng 3','alias'=>'that-lung-3','price'=>110000,'intro'=>'Thắt Lưng 3','content'=>'Thắt Lưng 3','image'=>'that-lung3.jpg','keywords'=>'Thắt Lưng 3','description'=>'Thắt Lưng 3','hot'=>0,'user_id'=>1,'cate_id'=>12],
            ['name'=>'Ví 1','alias'=>'vi-1','price'=>200000,'intro'=>'Ví 1','content'=>'Ví 1','image'=>'vi1.jpg','keywords'=>'Ví 1','description'=>'Ví 1','hot'=>1,'user_id'=>1,'cate_id'=>13],
            ['name'=>'Ví 2','alias'=>'vi-2','price'=>210000,'intro'=>'Ví 2','content'=>'Ví 2','image'=>'vi2.jpg','keywords'=>'Ví 2','description'=>'Ví 2','hot'=>1,'user_id'=>1,'cate_id'=>13],
            ['name'=>'Ví 3','alias'=>'vi-3','price'=>180000,'intro'=>'Ví 3','content'=>'Ví 3','image'=>'vi3.jpg','keywords'=>'Ví 3','description'=>'Ví 3','hot'=>0,'user_id'=>1,'cate_id'=>13], 
        ]);

        DB::table('product_images')->insert([
            ['image'=>'ao-so-mi-tay-dai1-1.jpg','product_id'=>1],
            ['image'=>'ao-so-mi-tay-dai1-2.jpg','product_id'=>1],
            ['image'=>'ao-so-mi-tay-dai1-3.jpg','product_id'=>1],
            ['image'=>'ao-so-mi-tay-dai2-1.jpg','product_id'=>2],
            ['image'=>'ao-so-mi-tay-dai2-2.jpg','product_id'=>2],
            ['image'=>'ao-so-mi-tay-dai3-1.jpg','product_id'=>3],
            ['image'=>'ao-so-mi-tay-dai3-2.jpg','product_id'=>3],
            ['image'=>'ao-so-mi-tay-dai3-3.jpg','product_id'=>3],
            ['image'=>'ao-so-mi-tay-dai4-1.jpg','product_id'=>4],
            ['image'=>'ao-so-mi-tay-dai4-2.jpg','product_id'=>4],
            ['image'=>'ao-so-mi-tay-dai4-3.jpg','product_id'=>4],


            ['image'=>'ao-so-mi-tay-ngan1-1.jpg','product_id'=>5],
            ['image'=>'ao-so-mi-tay-ngan1-2.jpg','product_id'=>5],
            ['image'=>'ao-so-mi-tay-ngan2-1.jpg','product_id'=>6],
            ['image'=>'ao-so-mi-tay-ngan2-2.jpg','product_id'=>6],
            ['image'=>'ao-so-mi-tay-ngan3-1.jpg','product_id'=>7],
            ['image'=>'ao-so-mi-tay-ngan3-2.jpg','product_id'=>7],
            ['image'=>'ao-thun1-1.jpg','product_id'=>8],
            ['image'=>'ao-thun1-2.jpg','product_id'=>8],
            ['image'=>'ao-thun2-1.jpg','product_id'=>9],
            ['image'=>'ao-thun2-2.jpg','product_id'=>9],
            ['image'=>'ao-thun2-3.jpg','product_id'=>9],
            ['image'=>'ao-khoac1-1.jpg','product_id'=>10],
            ['image'=>'ao-khoac1-2.jpg','product_id'=>10],
            ['image'=>'ao-khoac1-3.jpg','product_id'=>10],
            ['image'=>'ao-khoac2-1.jpg','product_id'=>11],
            ['image'=>'ao-khoac2-2.jpg','product_id'=>11],
            ['image'=>'quan-tay1-1.jpg','product_id'=>12],

            ['image'=>'quan-tay2-1.jpg','product_id'=>13],
            ['image'=>'quan-tay2-2.jpg','product_id'=>13],
            ['image'=>'quan-tay3-1.jpg','product_id'=>14],
            ['image'=>'quan-tay3-2.jpg','product_id'=>14],
            ['image'=>'quan-kaki1-1.jpg','product_id'=>15],
            ['image'=>'quan-kaki1-2.jpg','product_id'=>15],
            ['image'=>'quan-kaki2-1.jpg','product_id'=>16],
            ['image'=>'quan-kaki2-2.jpg','product_id'=>16],
            ['image'=>'quan-short1-1.jpg','product_id'=>17],
            ['image'=>'quan-short1-2.jpg','product_id'=>17],
            ['image'=>'quan-short1-3.jpg','product_id'=>17],
            ['image'=>'quan-short2-1.jpg','product_id'=>18],
            ['image'=>'quan-short2-2.jpg','product_id'=>18],
            ['image'=>'quan-short2-3.jpg','product_id'=>19],
            ['image'=>'quan-short3-1.jpg','product_id'=>19],
            ['image'=>'quan-short3-2.jpg','product_id'=>19],
            ['image'=>'quan-short3-3.jpg','product_id'=>19],
            ['image'=>'vi1-1.jpg','product_id'=>23],
            ['image'=>'vi1-2.jpg','product_id'=>23],
            ['image'=>'vi2-1.jpg','product_id'=>24],
            ['image'=>'vi2-2.jpg','product_id'=>24],
            ['image'=>'vi2-2.jpg','product_id'=>24],
            ['image'=>'vi3-1.jpg','product_id'=>25],
            ['image'=>'vi3-2.jpg','product_id'=>25],
        ]);
    }
}
