<?php

namespace Aron\Controller;

use Aron\Model\User;
use Aron\Core\Registry;
use Aron\Core\Request;

class LoginController extends FrontendController
{
    protected $content = "./tpl/login.tpl";

    public function login()
    {
        $request = Registry::getRequest();
        $userName = $request->getParameter('username');
        $password = $request->getParameter('password');
        $user = new User();

        if ($user->checkPassword($userName, $password)) {
            echo "Login successful";
        } else {
            echo "Login not successful";
        }
    }
}
