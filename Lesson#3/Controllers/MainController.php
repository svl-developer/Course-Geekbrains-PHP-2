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


    public static function viewBigPhoto(int $id)
    {

        $images =  Img::getOneImg($id);
        

       include __DIR__ . '/../View.php';

       $templates = $twig->load('big.html.twig');

       return $templates->render(['images' => $images[0]]);

    }
}



?>