<?php
namespace Rigo\Controller;

use Rigo\Types\Animal;

class AnimalController{

    public function getDraftAnimals(){
        $query = Course::all([ 'status' => 'draft' ]);
        return $query->posts;
    }
    
}
?>