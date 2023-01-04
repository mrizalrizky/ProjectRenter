<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();


        $data = [
            ['name' => 'Comic'],
            ['name' => 'Novel'],
            ['name' => 'Fantasy'],
            ['name' => 'Fiction'],
            ['name' => 'Mystery'],
            ['name' => 'Horror'],
            ['name' => 'Romance'],
            ['name' => 'Western'],
        ];

        DB::table('categories')->insert($data);
        // foreach($data as $value){
        //     Category::insert([
        //         'name' => $value
        //     ]);
        // }
    }
}
