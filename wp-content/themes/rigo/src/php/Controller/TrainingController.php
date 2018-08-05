<?php
namespace Rigo\Controller;

use Rigo\Types\Training;

class TrainingController{

    public function getDraftTrainings(){
        $query = Course::all([ 'status' => 'draft' ]);
        return $query->posts;
    }
    
}
?>