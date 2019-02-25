<?php

/**
 * To create new API calls, you have to instanciate the API controller and start adding endpoints
*/
$api = new \WPAS\Controller\WPASAPIController([ 
    'version' => '1', 
    'application_name' => 'sample_api', 
    'namespace' => 'Rigo\\Controller\\',
    'allow-origin' => '*',
    'allow-methods' => 'GET,POST,PUT'
]);
/**
 * Then you can start adding each endpoint one by one
*/
$api->get([ 
    'path' => '/samples', 
    'controller' => 'SampleController:getAllSamples' 
]); 

$api->put([ 
    'path' => '/samples', 
    'controller' => 'SampleController:putNewSample'
]);

$api->get([ 
    'path' => '/meetups', 
    'controller' => 'MeetupController:getAllMeetups' 
]);

$api->get([ 
    'path' => '/events', 
    'controller' => 'EventController:getAllEvents' 
]); 