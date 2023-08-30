<?php
namespace App\Service\Category;

use App\Models\Carricullam;
use App\Models\Category;
use App\Models\Course;
use App\Models\Faq;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CategoryRepo implements CategoryInterface {
    public function storeCategory(array $data, $image) {
        if ($image != null) {
            $db_image = time() . rand(0000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->storeAs("public/CateImg", $db_image);
            $data['cover_image'] = $db_image;
        }
        return DB::table('categories')->insert($data);
    }

    public function getAllCategories() {
        return DB::table('categories')->get();
    }

    
    public function getCategoryBySlug($slug) {
        return DB::table('categories')->where('catagory_slug', $slug)->first(); 
    }

    public function updateCategory(array $data,$image, $slug) {
        if ($image != null) {   
            $old_img = Category::where('catagory_slug', $slug)->first();
            File::delete(public_path("storage/CateImg/" . $old_img->cover_image));
            $db_image = time() . rand(0000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->storeAs("public/CateImg", $db_image);
            $data['cover_image'] = $db_image;
        }
        return DB::table('categories')->where('catagory_slug', $slug)->update($data);
    }

    public function deleteCat($slug) {
        $cat =  DB::table('categories')->where('catagory_slug', $slug)->first();
        if($cat){
            $course = Course::where('category_id', $cat->id)->get();
            foreach($course as $c) {
                $faq = Faq::where('course_id', $c->id)->get();
                foreach ($faq as $f) {
                    $f->delete();
                }
                $carriC = Carricullam::where('course_id', $c->id)->get();
                foreach ($carriC as $c) {
                    $c->delete();
                }
                $c->delete();
            }
            return DB::table('categories')->where('catagory_slug', $slug)->delete();
        }
    }

}