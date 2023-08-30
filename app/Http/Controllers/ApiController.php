<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Service\Category\CategoryInterface;
use App\Service\Course\CourseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    private $categoryInterface, $courseInterface;
    public function __construct(CategoryInterface $categoryInterface, CourseInterface $courseInterface)
    {
        $this->categoryInterface = $categoryInterface;
        $this->courseInterface = $courseInterface;
    }
    public function getCategory($cat_id = null)
    {
        if($cat_id != null) {
            $data = $this->courseInterface->categoryWiseCourse($cat_id);
            return response()->json([
                'cata' => $data,
            ],200);
        }else{
            $data = $this->categoryInterface->getAllCategories();
        }

        return response()->json([
            'data' => $data
        ],200);
       
    }

    public function siteInfo() {
        $data = DB::table('site_infos')->where('id', 1)->first();
        if($data){
            return response()->json([
                'siteInfo' => $data
            ],200);
        }else{
            return response()->json([
                'siteInfo' => null
            ],404);
        }
    }


    public function getSingleCourse($slug) {
        $course = Course::with('faqs','carriculams')->where('slug', $slug)->first();
        return response()->json([
            'data' => $course
        ],404);
    }
}
