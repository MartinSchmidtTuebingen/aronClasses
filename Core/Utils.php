<?php

namespace Aron\Core;

class Utils
{
    public function redirect(string $location)
    {
        header('Location: ' . $location);
    }
}
