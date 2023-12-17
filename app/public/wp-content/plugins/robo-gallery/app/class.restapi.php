<?php
/* 
*      Robo Gallery     
*      Version: 3.2.14 - 40722
*      By Robosoft
*
*      Contact: https://robogallery.co/ 
*      Created: 2021
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php

 */

if (!defined('WPINC')) {
    exit;
}

class RoboGalleryRestAPI
{

    public function __construct()
    {}

    public static function init()
    {
        add_action('rest_api_init', array('RoboGalleryRestAPI', 'add_restapi_meta_field'));
    }

    public static function add_images_field()
    {
        $db_fieldname = 'rsg_galleryImages';
        $api_fieldname = 'robo-images';

        register_rest_field(ROBO_GALLERY_TYPE_POST, $api_fieldname, array(

            'get_callback' => function ($object) {
                if (!isset($object['id']) || !$object['id']) {
                    return array();
                }

                $imageIds = get_post_meta($object['id'], 'rsg_galleryImages', true);

                if (empty($imageIds) || !is_array($imageIds) || !count($imageIds)) {
                    return array();
                }
                $imageIds = array_map(function ($item) {return (int) $item;}, $imageIds);

                return array_values($imageIds);
            },
            'update_callback' => function ($value, $object) {
                // Update the field/meta value.
                update_post_meta($object->ID, 'rsg_galleryImages', $value);
            },

            'schema' => array(
                'type' => 'array',
                'items' => array(
                    'type' => 'integer',
                ),
                'arg_options' => array(
                    'sanitize_callback' => function ($imageIds) {

                        if (!is_array($imageIds)) {
                            return array();
                        }

                        $imageIds = array_map(function ($v) {return (int) $v;}, $imageIds);
                        $imageIds = array_filter($imageIds, function ($v) {return $v > 0;});
                        $imageIds = array_values($imageIds);
                        return $imageIds;
                    },
                    'validate_callback' => function ($imageIds) {
                        return is_array($imageIds); // array_filter($imageIds, 'is_int');
                    },
                ),
            ),
        ));
    }

    public static function add_restapi_meta_field()
    {
        self::add_images_field();

        register_rest_field(ROBO_GALLERY_TYPE_POST, 'meta-fields',
            array(
                'get_callback' => array('RoboGalleryRestAPI', 'get_post_meta_for_api'),
                'schema' => null,
            )
        );
    }

    public static function get_post_meta_for_api($object)
    {

        $post_id = $object['id'];
        $metaData = get_post_meta($post_id);

        if (!empty($metaData['rsg_shadow-options'][0])) {
            $metaData['rsg_shadow-options'][0] = unserialize($metaData['rsg_shadow-options'][0]);
        }

        if (!empty($metaData['rsg_galleryImages'][0])) {
            $imagesArray = unserialize($metaData['rsg_galleryImages'][0]);
            $imagesArray = array_map(function ($v) {return (int) $v;}, $imagesArray);
            $metaData['rsg_galleryImages'] = array('count' => count($imagesArray), 'items' => $imagesArray);
        }

        if (!empty($metaData['robo-images'][0])) {
            $imagesArray = unserialize($metaData['robo-images'][0]);
            $imagesArray = array_map(function ($v) {return (int) $v;}, $imagesArray);
            $metaData['robo-images'] = array('count' => count($imagesArray), 'items' => array_values($imagesArray));
        }

        if (!empty($metaData['rsg_width-size'])) {
            $metaData['rsg_width-size'] = unserialize($metaData['rsg_width-size'][0]);
        }

        return $metaData;
    }

}

RoboGalleryRestAPI::init();
