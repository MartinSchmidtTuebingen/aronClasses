<?php

namespace Aron\Controller;

use Aron\Core\Registry;

class ImpressumController extends FrontendController
{
    protected $content = "./tpl/impressum.tpl";

    public function render()
    {
        $userId = Registry::getSession()->getSessionVariable('userId');

        if (!empty($userId)) {
            $this->navigation = "./tpl/aron_navi_inGame.tpl";
        }

        return parent::render();
    }
}
