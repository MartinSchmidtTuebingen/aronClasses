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
                    $functionName = $_GET['fnc'];
                    $actionClass->$functionName();
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
            echo "Exception!\n";
            echo $exception->getMessage() . "\n\n";
            echo $exception->getTraceAsString();
            //$log = fopen("./log/EXCEPTION_LOG.txt", "a");
            //fwrite($log, $exception->getMessage() . "\n");
            //fclose($log);
        }
    }
}
