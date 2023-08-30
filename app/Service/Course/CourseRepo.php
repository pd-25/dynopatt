<?php

namespace App\Service\Course;

use App\Models\Carricullam;
use App\Models\Category;
use App\Models\Course;
use App\Models\Faq;
use Illuminate\Support\Facades\File;

class CourseRepo implements CourseInterface
{

    public function getAllCourses()
    {
        return Course::get();
    }

    public function storeCourse(array $courseInfo, array $faqInfo, array $carriculamInfo, $image)
    {
        // dd($courseInfo, $faqInfo, $carriculamInfo, $image);
        // try {
        //     //code...

        if ($image != null) {
            $db_image = time() . rand(0000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->storeAs("public/CourseImage", $db_image);
            $courseInfo['cover_image'] = $db_image;
        }
        $course = Course::create($courseInfo);

        foreach ($faqInfo as $faq) {
            $faq['course_id'] = $course->id;
            Faq::create($faq);
        }

        foreach ($carriculamInfo as $carri) {
            $carri['course_id'] = $course->id;
            Carricullam::create($carri);
        }
        // } catch (\Exception $th) {
        //    return back()->with('msg', $th->getMessage());
        // }
    }

    public function getSingleCourse($slug)
    {
        return Course::where('slug', $slug)->first();
    }
    public function updateCourse(array $courseInfo, array $faqInfo, array $carriculamInfo, $image, $id)
    {
        if ($image != null) {
            $old_img = Course::where('id', $id)->first();
            File::delete(public_path("storage/CourseImage/" . $old_img->cover_image));
            $db_image = time() . rand(0000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->storeAs("public/CourseImage", $db_image);
            $courseInfo['cover_image'] = $db_image;
        }
        Course::where('id', $id)->update($courseInfo);
        $faq = Faq::where('course_id', $id)->get();
        foreach ($faq as $f) {
            $f->delete();
        }
        foreach ($faqInfo as $faq) {
            $faq['course_id'] = $id;
            Faq::create($faq);
        }

        $carriC = Carricullam::where('course_id', $id)->get();
        foreach ($carriC as $c) {
            $c->delete();
        }
        foreach ($carriculamInfo as $carri) {
            $carri['course_id'] = $id;
            Carricullam::create($carri);
        }
    }

    public function categoryWiseCourse($cat_id)
    {
        return Category::where('catagory_slug', $cat_id)->with('courses')->first();
        // return Course::with('category','faqs','carriculams')->where('category_id', $categoryy->id)->get();
        // ;
    }
}
