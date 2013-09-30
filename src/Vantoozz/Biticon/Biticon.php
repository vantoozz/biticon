<?php

namespace Vantoozz\Biticon;

class Biticon
{

    private $size = 400;

    public function generate($filename, $sex = null, $all = false)
    {
        $parts = array('background', 'face', 'clothes', 'hair', 'eyes', 'mouth');

        if (!in_array($sex, array('male', 'female'))) {
            $sex = 1 === mt_rand(1, 2) ? 'male' : 'female';
        }

        $img = \Intervention\Image\Image::canvas($this->size, $this->size);

        foreach ($parts as $part) {
            $images = glob(__DIR__ . '/img/' . $sex . '/' . $part . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

            if (!$all) {
                $images = array_filter(
                    $images,
                    function ($image) {
                        $path_parts = pathinfo($image);
                        return false === stristr($path_parts['filename'], 'all-');
                    }
                );
            }
            $img->insert($images[array_rand($images)]);
        }

        $img->save($filename);
    }

}
