<?php
namespace Rigo\Controller;

use Rigo\Types\Course;

class SampleController{
    
    public function getHomeData(){
        return [
            'name' => 'Rigoberto'
        ];
    }
    
    public function getDraftCourses(){
        $query = Course::all([ 'status' => 'draft' ]);
        return $query->posts;
    }
    
    
    public function getDraftAnimals(){
        $query = Animal::all([ 'status' => 'draft' ]);
        return $query->posts;
    }
    
    
    public function getDraftTrainings(){
        $query = Training::all([ 'status' => 'draft' ]);
        return $query->posts;
    }
    
}
?>