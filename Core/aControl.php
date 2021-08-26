<?php

namespace Aron\Core;

use Exception;

class aControl
{
    public static function start()
    {
        try {
            if ($_GET['cl'] !== null) {
                $actionClass = new $_GET['cl']();

                if ($_GET['fnc'] !== null) {
                    echo "Läuft4";
                    call_user_func("$actionClass::" . $_GET['fnc']);
                }
            } else {
                $view = new aView();
                $outString = $view->render();
                echo $outString;
            }
        }

        catch (Exception $exception)
        {
            echo "Exception!";
            $log = fopen("./log/EXCEPTION_LOG.txt", "w");
            fwrite($log, $exception->getMessage() . "\n");
        }
    }
}