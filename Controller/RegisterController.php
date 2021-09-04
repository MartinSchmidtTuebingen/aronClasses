<?php

namespace Aron\Controller;

use Aron\Core\Registry;
use Aron\Model\User;

class RegisterController extends FrontendController
{
    protected $content = "./tpl/register.tpl";

    public function register()
    {
        $request = Registry::getRequest();
        $userName = $request->getParameter('username');
        $mailAdress = $request->getParameter('mailadress');
        $mailAdressValidation = $request->getParameter('mailadressvalidation');
        $password = $request->getParameter('password');
        $passwordValidation = $request->getParameter('passwordvalidation');

        if (!$this->validateUserName($userName)) {
            echo "Choose other userName";
        }

        if (!$this->validateMailAdress($mailAdress, $mailAdressValidation)) {
            echo "Choose other mailAdress or they dont match";
        }

        if (!$this->validatePassword($password, $passwordValidation)) {
            echo "Choose other password or they dont match";
        }

        $user = new User();
        if ($user->registerUser($userName, $mailAdress, $password)) {
            //Send activation mail
        } else {
            echo "Something went wrong in the registration";
        }

        return 'account';
    }

    private function validateUserName(?string $userName)
    {
        if ($userName == '') {
            return false;
        }

        return true;
    }

    private function validateMailAdress($mailAdress, $mailAdressValidation)
    {
        if ($mailAdress != $mailAdressValidation) {
            return false;
        }

        return true;
    }

    private function validatePassword($password, $passwordValidation)
    {
        if ($password != $passwordValidation) {
            return false;
        }

        return true;
    }
}
