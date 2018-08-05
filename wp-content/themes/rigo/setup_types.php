<?php

/**
 * To create new Post Types, you have to instanciate the PostTypesManager
*/
$typeManager = new \WPAS\Types\PostTypesManager([ 'namespace' => 'Rigo\\Types\\' ]);

/**
 * Then, start adding your types one by one.
*/
$typeManager->newType([
    'type' => 'course', 
    'class' => 'Course',
    'options' => [
        'supports' => ['title','editor','thumbnail']
        ]
    ])->register();
    
$typeManager->newType([
    'type' => 'animal', 
    'class' => 'Animal',
    'options' => [
        'supports' => ['title','editor','thumbnail']
        ]
    ])->register();
    
$typeManager->newType([
    'type' => 'training', 
    'class' => 'Training',
    'options' => [
        'supports' => ['title','editor','thumbnail']
        ]
    ])->register();