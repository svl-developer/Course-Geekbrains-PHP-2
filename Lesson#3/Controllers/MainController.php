<?php
namespace Controllers;

use Models\Images\Img;


class MainController{

    public static  function viewMain()
    {

        $images =  Img::getImages();
        
        

       include __DIR__ . '/../View.php';

       $templates = $twig->load('main.html.twig');

        return $templates->render(['images' => $images]);



    }
}



?>