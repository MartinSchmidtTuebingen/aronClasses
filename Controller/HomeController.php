<?php

namespace Aron\Controller;

use Aron\Controller\FrontendController;
use Aron\Model\User;
use Aron\Core\Registry;
use Aron\Core\Session;

class HomeController extends FrontendController
{
    protected $content = './tpl/home.tpl';

    public function render()
    {
        $userId = Registry::getSession()->getSessionVariable('userId');
        $user = null;
        $userName = '';

        if (!empty($userId)) {
            $user = new User();
            $user->load($userId);
            $userName = $user->getUserName();
            if ($userName) {
                $this->navigation = "./tpl/aron_navi_inGame.tpl";
                $this->content = str_replace('[%name%]', $userName, file_get_contents("./tpl/account.tpl"));
            }
        }

        return parent::render();
    }
}
