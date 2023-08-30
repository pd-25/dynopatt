<?php
namespace App\Service\Course;

interface CourseInterface {
    public function storeCourse(array $courseInfo, array $faqInfo, array $carriculamInfo, $image);
    public function getAllCourses();
    public function getSingleCourse($slug);
    public function updateCourse(array $courseInfo, array $faqInfo, array $carriculamInfo, $image, $id);
    public function categoryWiseCourse($cat_id);
}