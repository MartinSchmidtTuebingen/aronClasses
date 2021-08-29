<?php

namespace Aron\Core;

class Request
{
    public function getParameter(string $parameterName)
    {
        if (isset($_POST[$parameterName])) {
            return $_POST[$parameterName];
        } elseif (isset($_GET[$parameterName])) {
            return $_GET[$parameterName];
        } else {
            return null;
        }
    }
}
