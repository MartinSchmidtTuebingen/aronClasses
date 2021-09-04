<?php

namespace Aron\Core;

use Aron\Controller\HomeController;
use Exception;

class GameControl
{
    public static function start()
    {
        try {
            Registry::getSession()->startSession();

            $view = null;
            if (isset($_GET['cl']) && !empty($_GET['cl'])) {
                $className = 'Aron\Controller\\' . ucfirst($_GET['cl']) . 'Controller';
                $actionClass = new $className();

                if ($_GET['fnc'] !== null) {
                    $functionName = $_GET['fnc'];
                    $newAction = $actionClass->$functionName();

                    if (is_string($newAction)) {
                        Registry::getUtils()->redirect('index.php?cl=' . $newAction);
                    }
                }
                $view = $actionClass;
            } else {
                $view = new HomeController();
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
