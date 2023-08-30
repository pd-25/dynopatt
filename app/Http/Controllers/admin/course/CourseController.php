<?php

namespace App\Http\Controllers\admin\course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Service\Category\CategoryInterface;
use App\Service\Course\CourseInterface;
use Illuminate\Http\Request;

class CourseController extends Controller
{
   private $categoryInterface;
   private $courseInterface;
   public function __construct(CategoryInterface $categoryInterface, CourseInterface $courseInterface)
   {
      $this->categoryInterface = $categoryInterface;
      $this->courseInterface = $courseInterface;
   }
   public function index()
   {
      $data['courses'] = $this->courseInterface->getAllCourses();
      return view('admin.course.index', $data);
   }

   public function create()
   {
      $data['categories'] =  $this->categoryInterface->getAllCategories();
      return view('admin.course.create', $data);
   }

   public function store(Request $request)
   {
      $request->validate([
         'name' => 'required|string',
         'price' => 'required|string',
         'status' => 'required|boolean',
         'enroll_url' => 'required|string',
         'category_id' => 'required',
         'slug' => 'required|unique:courses',
         'overview' => 'required|string',
      ]);
      $courseInfo  = $request->only('name', 'type', 'price', 'status', 'enroll_url', 'category_id', 'slug', 'overview',  'objective_fo', 'objective_t', 'objective_s', 'objective_f');
      $image = $request->cover_image ?? null;
      // $faqInfo = ;
      // $carriculamInfo = ;
      $this->courseInterface->storeCourse($courseInfo, $request->addFaq, $request->addCarricullam, $image);
      return redirect()->route('courses.index')->with('msg', 'Course created successfully');
      // }else {
      //    return back()->with('msg', 'Some errro occur');
      // }


   }

   public function edit($slug_p)
   {
      $slug = decrypt($slug_p);
      $data['course'] = $this->courseInterface->getSingleCourse($slug);
      $data['categories'] =  $this->categoryInterface->getAllCategories();
      return view('admin.course.edit', $data);
   }


   public function update(Request $request, $id) {
      $request->validate([
         'name' => 'required|string',
         'price' => 'required|string',
         'status' => 'required|boolean',
         'enroll_url' => 'required|string',
         'category_id' => 'required',
         'overview' => 'required|string',
      ]);
      $image = $request->cover_image ?? null;
      $courseInfo  = $request->only('name',  'price', 'status', 'enroll_url', 'category_id', 'overview', 'objective_fo', 'objective_t', 'objective_s', 'objective_f');
      $this->courseInterface->updateCourse($courseInfo, $request->addFaq, $request->addCarricullam, $image, $id);
      return redirect()->route('courses.index')->with('msg', 'Course updated successfully');

   }

   public function destroy($id) {
      $course = Course::where('slug', $id)->first();
      foreach ($course->faqs as $faq) {
         $faq->delete();
      }
      foreach ($course->carriculams as $carri) {
         $carri->delete();
      }
      $course->delete();
      return back()->with('msg', 'Course deleted successfully');
   }
}
