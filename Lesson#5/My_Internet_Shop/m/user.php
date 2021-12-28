<?php
include_once "config/db.php";

class user{

    protected $db;

    public function __construct() {
    //создаем коннект к базе данных для общего пользования
        $this->db = M_Db::db();
    }
    public function pass ($name, $password) {
    //шифруем пароль и логин
        return strrev(md5($name)) . md5($password);}
    //склеиваем наше имя и пароль и сразу шифруем md5
    //псоле переварачиваем в целях безопасности
        
        
    public function get($id){
    //мы хотим получить все данные о нашем пользователе
    // когда будем делать личный кобинет хотим узнать информацию о пользователе
        $sth=$this->db->prepare('SELECT*FROM users WHERE id=?');
        $sth->execute(array($id));
        return $sth->fetch(PDO::FETCH_ASSOC);
    
    }
    public function register($name, $login, int $telefone,  $password){
    //метод проверки 
    //есть ли еще такой пользователь в системе
    // var_dump($name);var_dump($login);var_dump($telefone);var_dump($password);

    
        $users=$this->db->prepare('SELECT * FROM users WHERE `login`=?');
    //при регистрации нужно узнать нет ли такого пользователя в системе
        $users->execute([$login]);
        $log=$users->fetchAll(PDO::FETCH_ASSOC);

        if($log['login']==[])
         if(!$log){//если нет такого логина
            $stn=$this->db->prepare("INSERT INTO `users` ( `name`, `login`,`telefone`, `password`, `role`) VALUES ( ?,?,?,?,?)");
            $stn->execute([$name, $login, $telefone, $this->pass($name, $password), 0]);
           return true;
         }
        //если есть то false
             return false;
        
    
    }
    
    public function login ($login, $password) {
        
        $user1 = $this->db->prepare("SELECT * FROM users WHERE login =? ");
        $user1->execute(array("$login"));
        $user=$user1->fetch(PDO::FETCH_ASSOC);
        


            if ($user) {
              if ($user['password'] == $this->pass($user['name'], $password)) {
                  $_SESSION['user_id'] = $user['id'];
                    if($user['role']==1){
                        $_SESSION['admin_id'] = $user['role'];}
                       return 'Добро пожаловать в систему, ' . $user['name'] . '!';}
                       else {
                            return 'Пароль не верный!';
                  }
              } else {
                  return 'Пользователь с таким логином не зарегистрирован!';
              }
          }
        

    
    public function logout_admin() {//выход из системы 
        if ($_SESSION['user_id'] || $_SESSION['admin_id']) {
            //закрываем session
            session_destroy();
            return true;
        } 
        return false;
        
    } 
    }
    
    
    ?>