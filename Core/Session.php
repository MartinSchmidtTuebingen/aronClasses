<?php

namespace Aron\Core;

class Session
{
    public function startSession()
    {
        session_start();
    }

    public function endSession()
    {
        session_destroy();
    }

    public function setSessionVariable(string $name, $value): void
    {
        $_SESSION[$name] = $value;
    }

    public function unsetSessionVariable(string $name): void
    {
        unset($_SESSION[$name]);
    }

    public function getSessionVariable(string $name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        } else {
            return null;
        }
    }
}
