<?php

namespace Aron\Controller;

use Aron\Core\Registry;
use Aron\Core\Request;
use Aron\Core\Session;
use Aron\Core\Utils;
use Aron\Model\User;
use Aron\Controller\FrontendController;

class AccountController extends FrontendController
{
    protected $navigation = "./tpl/aron_navi_inGame.tpl";
    protected $content = 'Deine Accountinformationen';

    public function login()
    {
        $request = Registry::getRequest();
        $userName = $request->getParameter('username');
        $password = $request->getParameter('password');
        $user = new User();

        $user->loadWithName($userName);
        if ($user->checkPassword($password, $userName)) {
            Registry::getSession()->setSessionVariable('userId', $user->getId());
        }
            
        Registry::getUtils()->redirect('index.php');
    }

    public function logout()
    {
        Registry::getSession()->setSessionVariable('userId', null);
        Registry::getUtils()->redirect('index.php');
    }
}
