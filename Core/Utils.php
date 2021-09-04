<?php

namespace Aron\Core;

class Utils
{
    public function redirect(string $location)
    {
        header('Location: ' . $location);
    }

    public function generateUId(): string
    {
        return md5(uniqid('', true) . '|' . microtime());
    }
}
