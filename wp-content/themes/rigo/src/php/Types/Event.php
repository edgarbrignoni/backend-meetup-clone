<?php
namespace Rigo\Types;
    
use WPAS\Types\BasePostType;

class Event extends BasePostType{

    function initialize(){
        add_action('acf/init', array($this, 'add_event_fields'));
    }

    function add_event_fields() {
        acf_add_local_field_group(array(
        	'key' => 'group_5c0b0648ef964',
        	'title' => 'Event Field Group',
        	'fields' => array(
        		array(
        			'key' => 'field_5c0b07a37d02b',
        			'label' => 'Event Date Time',
        			'name' => 'event_date_time',
        			'type' => 'date_time_picker',
        			'instructions' => '',
        			'required' => 1,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '',
        				'class' => '',
        				'id' => '',
        			),
        			'display_format' => 'F j, Y g:i a',
        			'return_format' => 'Y-m-d H:i:s',
        			'first_day' => 0,
        		),
        		array(
        			'key' => 'field_5c0b1149e391d',
        			'label' => 'Location',
        			'name' => 'location',
        			'type' => 'text',
        			'instructions' => '',
        			'required' => 1,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '',
        				'class' => '',
        				'id' => '',
        			),
        			'default_value' => '',
        			'placeholder' => '',
        			'prepend' => '',
        			'append' => '',
        			'maxlength' => '',
        		),
        		array(
        			'key' => 'field_5c7c1c163e828',
        			'label' => 'Meetup ID',
        			'name' => 'meetup_id',
        			'type' => 'relationship',
        			'instructions' => '',
        			'required' => 1,
        			'conditional_logic' => 0,
        			'wrapper' => array(
        				'width' => '',
        				'class' => '',
        				'id' => '',
        			),
        			'post_type' => array(
        				0 => 'meetup',
        			),
        			'taxonomy' => '',
        			'filters' => '',
        			'elements' => '',
        			'min' => '',
        			'max' => '',
        			'return_format' => 'object',
        		),
        	),
        	'location' => array(
        		array(
        			array(
        				'param' => 'post_type',
        				'operator' => '==',
        				'value' => 'event',
        			),
        		),
        	),
        	'menu_order' => 0,
        	'position' => 'normal',
        	'style' => 'default',
        	'label_placement' => 'top',
        	'instruction_placement' => 'label',
        	'hide_on_screen' => '',
        	'active' => 1,
        	'description' => '',
        ));
    }
}
?>