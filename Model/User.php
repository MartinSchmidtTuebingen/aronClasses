<?php

namespace Aron\Model;

use Aron\Core\DatabaseProvider;
use Aron\Model\BaseModel;
use PDO;

class User extends BaseModel
{
    protected $baseTable = 'user_daten';

    protected $properties = [
        'IDX' => '',
        'usr_name' => '',
        'usr_mail' => '',
        'usr_pw' => '',
        'usr_aktiv' => '',
        'usr_salt' => '',
    ];

    private $pepper = '69cd9406ce7ea11fecbafae9f7e9d44e';

    public function loadWithName(?string $userName)
    {
        if (is_null($userName) || $userName == '') {
            return false;
        }

        $getIndexStatement = DatabaseProvider::getDb()->prepare("SELECT IDX FROM $this->baseTable WHERE usr_mail = ? LIMIT 1");
        $getIndexStatement->execute([$userName]);
        $userId = $getIndexStatement->fetch()[0];

        return $this->load($userId);
    }

    public function checkPassword(?string $password, ?string $userName): bool
    {
        if (is_null($password) || $password == '') {
            return false;
        }

        if (!$this->isLoaded) {
            if (is_null($userName) || $userName == '') {
                return false;
            }

            $getPasswordStatement = DatabaseProvider::getDb()->prepare("SELECT usr_pw, usr_salt FROM $this->baseTable WHERE usr_mail = ? LIMIT 1");
            $getPasswordStatement->execute([$userName]);
            $userData = $getPasswordStatement->fetch(PDO::FETCH_ASSOC);

            $passwordHash = $userData['usr_pw'];
            $salt = $userData['usr_salt'];
        } else {
            $passwordHash = $this->properties['usr_pw'];
            $salt = $this->properties['usr_salt'];
        }

        if ($passwordHash === $this->getPasswordHash($password, $salt)) {
            return true;
        } else {
            return false;
        }
    }

    private function getPasswordHash(string $userPassword, string $salt): string
    {
        return md5($salt . $userPassword . $this->pepper);
    }

    public function getUserName(): string
    {
        return $this->properties['usr_name'];
    }
}
