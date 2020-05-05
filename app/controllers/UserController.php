<?php

namespace app\controllers;
use app\models\Task;
use vendor\core\base\View;
class UserController extends AppController{
    
    public function signinAction(){
        $title = 'LogIn';
        $this->set(compact('title'));
        $admin = 'admin';
        $pass = '202cb962ac59075b964b07152d234b70';

        if(isset($_POST['submit']) && $_POST['submit']){

            if (isset($_SESSION['user']) && ($_SESSION['user'] == 'admin')){
                unset($_SESSION['user']);
                session_destroy();
            }
            else

                if($admin == $_POST['user'] AND $pass == md5($_POST['pass'])){
                    $_SESSION['user'] = $admin;
                    echo '<p>Вы зашли с правами администратора.</p>';
                }else echo '<p>Логин или пароль неверны!!</p>';

        }

    }

    public function indexAction(){
    }



}
