<?php

/**
 * Полготовака страницы для показа
 */
include_once 'm/Product.php';
include_once 'm/user.php';
    // spl_autoload_register(function ($classnam){
    // 	include_once("m/$classnam.php");
    // });
    //передаем данные моделей

class C_Page extends C_Base{
    //cоздаем наследника от С_Base
    //в нем будут методы по редактированию контента
    //здесь будут две страницы редактирования и основная страница

    public function action_index(){
    //создаем метод котороый будет создавать контент
    //запускаем наш шаблонизатор
    $product_object = new Product();
	$catalog = $product_object->getAllProducts();

	$this->title .= '';
    $this->content=$this->Template('v/v_index.php', ['catalog' => $catalog]);
   

   
}

    public function action_product() {
        if($_GET['id']){
            $id=$_GET['id'];
        }    

        $product_object = new Product();
        $product = $product_object->getProduct($id);
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
        } else {
            $user_id = false;
        }

        $this->title .= '';
        $this->content = $this->Template('v/v_product.php', ['product' => $product, 'user_id' => $user_id]);

        if($this->isPost()) {
            $new_basket = new Basket();
            $result = $new_basket->addProduct($product['id'], $user_id, $_POST['count']);
            $this->content = $this->Template('v/v_product.php', ['product' => $product, 'user_id' => $user_id, 'text' => $result]);
        }
    }

    

    public function action_admin($id){
    //создаем метод котороый будет создавать контент    
    //запускаем наш шаблонизатор
        $product_object = new Admin();
        $productOrder = $product_object->OrderProduct($id);
    
        $this->title .= '';
        $this->content=$this->Template('v/v_admin.php',['adminorder' => $productOrder]);
    
        }
    }



