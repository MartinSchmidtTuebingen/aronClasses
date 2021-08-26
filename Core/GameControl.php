<?php

namespace Aron\Core;

use Aron\Controller\FrontendController;
use Exception;

class GameControl
{
    public static function start()
    {
        try {
            $view = null;
            if (isset($_GET['cl']) && !empty($_GET['cl'])) {
                $className = 'Aron\Controller\\' . ucfirst($_GET['cl']) . 'Controller';
                $actionClass = new $className();

                if ($_GET['fnc'] !== null) {
                    $actionClass->$_GET['fnc']();
                }
                $view = $actionClass;
            } else {
                $view = new FrontendController();
            }
            $outString = $view->render();
            echo $outString;
        }

        catch (Exception $exception)
        {
            echo "Exception!";
            $log = fopen("./log/EXCEPTION_LOG.txt", "a");
            fwrite($log, $exception->getMessage() . "\n");
        }
    }
}