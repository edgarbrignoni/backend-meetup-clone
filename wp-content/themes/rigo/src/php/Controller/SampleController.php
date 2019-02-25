<?php
namespace Rigo\Controller;

use Rigo\Types\Sample;
use WP_REST_Response;

class SampleController{
    
    public function getHomeData(){
        return [
            'name' => 'Rigoberto'
        ];
    }
    
    public function getDraftSamples(){
        $query = Sample::all([ 'status' => 'draft' ]);
        return $query->posts;
    }
    
    public function getAllSamples(){
        $query = Sample::all([ 'post_status' => 'publish' ]);
        
        if ( $query->have_posts() ) {
        	while ( $query->have_posts() ) {
        		$query->the_post();
        		
        		//Include the Meta Tags and Values
        		$query->post->meta_keys = get_post_meta($query->post->ID);
        		foreach($query->post->meta_keys as $key => $value){
        		    $query->post->meta_keys[$key] = maybe_unserialize($value[0]);
        		}
        		//Include the Featured Image
        		$query->post->thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $query->post->ID ), "large" );
        	}
        	/* Restore original Post Data */
        	wp_reset_postdata();
        }
        
        return $query->posts;
    }
    
    public function putNewSample( $request ){
        $data = $request->get_json_params();
        //print_r( $data) ;
        //die;
        
        if($data["fracture"]==true){
            $data["fracture"] = "fracture";
        }
        if($data["luxation"]==true){
            $data["luxation"] = "luxation";
        }
        if($data["sprain"]==true){
            $data["sprain"] = "sprain";
        }
    
        $post_arr = array(
            //"ID"           => $data["id"],
            "post_title"   => $data["title"],
            "post_content" => $data["content"],
            "post_status"  => "publish",
            "post_type"    => "sample",
            "meta_input"   => array(
                "text"      => $data["text"],
                "select"    => $data["select"],
                "text_area" => $data["text_area"],
                "radio"     => $data["radio"],
                "checkbox"  => array(
                    "fracture"=> $data["fracture"],
                    "luxation"=>$data["luxation"],
                    "sprain"=>$data["sprain"]
                )
            )
        );
        
        $result = wp_insert_post($post_arr);
        
        if($result !== 0){
            return new WP_REST_Response(
                array(
                    "code" => "success",
                    "message" => "successfully created"
                ), 200
            );
        }else{
            return new WP_REST_Response(
                array(
                    "code"=>"error",
                    "message" => "something went wrong while inserting"
                ), 500
            );
        }
    }
    
}
?>