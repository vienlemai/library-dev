<?php

class Slider {

    const SLIDE_IMAGES_DIR_PATH = 'assets/sliders';
    const DEFAULT_BANNER_IMAGE_PATH = '/assets/img/banner.jpg';

    public static function scanImages() {
        $slide_photos_path = public_path() . DIRECTORY_SEPARATOR . self::SLIDE_IMAGES_DIR_PATH . DIRECTORY_SEPARATOR;
        $photo_urls = array();
        if (file_exists($slide_photos_path)) {
            // Scan file ảnh, chấp nhận các định dạng .jpg, .jpeg, .png, .bmp]
            $photo_files = preg_grep('~\.(jpeg|jpg|png|bmp|JPG|JPEG|PNG)$~', scandir($slide_photos_path));

            foreach ($photo_files as $photo_file) {
                $relative_path = '/' . self::SLIDE_IMAGES_DIR_PATH . '/' . $photo_file;
                array_push($photo_urls, $relative_path);
            }
        }
        if (empty($photo_urls)) {
            array_push($photo_urls, self::DEFAULT_BANNER_IMAGE_PATH);
        }
        return $photo_urls;
    }

}