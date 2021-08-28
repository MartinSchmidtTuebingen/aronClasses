<?php

namespace Aron\Model;

use \Aron\Core\DatabaseProvider;
use PDO;

class User
{
    private $pepper = '69cd9406ce7ea11fecbafae9f7e9d44e';

    public function checkPassword(string $userName, string $password)
    {
        if ($userName == '' || $password == '') {
            return false;
        }

        $db = DatabaseProvider::getDb();

        $getPasswordStatement = $db->prepare('SELECT usr_pw, usr_salt FROM user_daten WHERE usr_mail = ? LIMIT 1');
        $getPasswordStatement->execute([$userName]);
        $userData = $getPasswordStatement->fetch(PDO::FETCH_ASSOC);

        $passwordHash = $userData['usr_pw'];

        if ($passwordHash === $this->getPasswordHash($password, $userData['usr_salt'])) {
            return true;
        } else {
            return false;
        }
    }

    private function getPasswordHash(string $userPassword, string $salt)
    {
        return md5($salt . $userPassword . $this->pepper);
    }
}
