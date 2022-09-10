<?php


 class Redirect
 {
     public static function to($path = null)
     {
          if ($path) {
             if (is_numeric($path)) {
                 switch ($path) {
                     case 404:
                         header('HTTP/1.0 404 Not Found');
                         include 'includes/errors/404.php';
                         exit();
                         break;
                     
                     default:
                         # code...
                         break;
                 }
             }
             header('Location:'. $path);
             exit();
         }
     }

     public static function toError($path = null)
     {
         if ($path) {
             if (is_numeric($path)) {
                 switch ($path) {
                     case 404:
                         header('HTTP/1.0 404 Not Found');
                         include 'includes/errors/404.php';
                         exit();
                         break;
                     
                     default:
                         # code...
                         break;
                 }
             }
             header('Location:'. $path);
             exit();
         }
     }
 }