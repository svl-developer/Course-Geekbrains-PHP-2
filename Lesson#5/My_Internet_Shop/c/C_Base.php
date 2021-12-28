<?php include_once 'm/user.php';

abstract class C_Base extends C_Controller
{
	protected $title;		// названия интернет магазина
	protected $content;		// контент интернет магазина


	
	protected function before()
	{
		$this->title = 'Товары для города Жиздра';
		$this->content = '';
	}
	
	//
	// medhod render проверяет наличия в сесии id если он существует 
	// то окрывается доступ к странице пользователю
	//	
	public function render()
	{
		$get_user = new user();
		if (isset($_SESSION['user_id'])) {
			$user_info = $get_user->get($_SESSION['user_id']);
		} else {
			$user_info['name'] = false;
		}
		$vars = array('title' => $this->title, 'content' => $this->content, 'user' => $user_info['name']);
		$page = $this->Template('v/v_main.php', $vars);
		echo $page;
	}	
}
