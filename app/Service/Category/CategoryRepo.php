<?php
namespace App\Service\Category;

use Illuminate\Support\Facades\DB;

class CategoryRepo implements CategoryInterface {
    public function storeCategory(array $data) {
        return DB::table('categories')->insert($data);
    }

    public function getAllCategories() {
        return DB::table('categories')->get();
    }

    
    public function getCategoryBySlug($slug) {
        return DB::table('categories')->where('catagory_slug', $slug)->first(); 
    }

    public function updateCategory(array $data, $slug) {
        return DB::table('categories')->where('catagory_slug', $slug)->update($data);
    }

    public function deleteCat($slug) {
        return DB::table('categories')->where('catagory_slug', $slug)->delete();
    }

}