<?php

/**
 * Работа с пользователем
 */
	include_once 'm/user.php';
	include_once 'config/db.php';
	include_once 'm/User.php';

	class C_User extends C_Base {
		
		public function action_info() {
		    if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            } else {
            
				header('Location:index.php', true, 302);
            }
			$get_user = new user();
			$user_info = $get_user->get($user_id);
			$this->title .= '';
			$this->content = $this->Template('v/u_info.php', ['username' => $user_info['name'], 'userlogin' => $user_info['login']]);
		}
		
		public function action_reg() {
			
			$this->title .= '';
			$this->content = $this->Template('v/u_reg.php', array());

			if($this->isPost()) {
	
				$new_user = new user();
				$result = $new_user->register($_POST['name'], $_POST['login'],$_POST['telefone'], $_POST['password']);
				if ($result) {
					$this->content = $this->Template('v/u_reg.php', ['text' => "Пользователь зарегистрировался успешно!"]);
				} else {
				$this->content = $this->Template('v/u_reg.php', ['text' => "Такой пользователь уже существует!"]);
				}
			}
		}

		public function action_login() {
			$this->title .= '';
			$this->content = $this->Template('v/u_login.php', array());

			if($this->isPost()) {
				$login = new user();
				$result = $login->login($_POST['login'], $_POST['password']);
				$this->content = $this->Template('v/u_login.php', ['text' => $result]);
				
			}
		}

		public function action_logout() {
			$logout = new user();
			$result = $logout->logout_admin();
			header('Location:index.php');
		}
	}
?>