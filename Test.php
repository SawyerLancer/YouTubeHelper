<?php
/**
 * Created by PhpStorm.
 * User: sawyerlancer
 * Date: 09.02.2019
 * Time: 19:28
 */

require_once __DIR__ . '/vendor/autoload.php'; // Autoload files using Composer autoload


 $Helper = new YouTubeHelper();
 $Helper->putUrl ('https://www.youtube.com/watch?v=WQZHLA_1umQ&list=OLAK5uy_m7rAtJlnIvt2XqI7P5B5A3iWhhHFgZxEA&index=6');
 $array =  $Helper->getImages ();
 echo  $array['default'];

?>