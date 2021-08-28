<?php

namespace Aron\Controller;

use Aron\Model\User;

class LoginController extends FrontendController
{
    protected $content = "./tpl/login.tpl";

    public function login()
    {
        $userName = $_POST['username'];
        $password = $_POST['password'];
        $user = new User();

        if ($user->checkPassword($userName, $password)) {
            echo "Login successful";
        } else {
            echo "Login not successful";
        }
    }
}
