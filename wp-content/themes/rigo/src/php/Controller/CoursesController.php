<?php
namespace Rigo\Controller;

use Rigo\Types\Course;

class CourseController{

    public function getDraftCourses(){
        $query = Course::all([ 'status' => 'draft' ]);
        return $query->posts;
    }
    
}
?>