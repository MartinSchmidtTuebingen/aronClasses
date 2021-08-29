<?php

namespace Aron\Controller;

use Aron\Core\Registry;
use Aron\Model\User;
use Aron\Core\Utils;

abstract class FrontendController
{
    protected $template = "./tpl/aron.tpl";
    protected $navigation = "./tpl/aron_navi.tpl";
    protected $content = "";

    public function render()
    {
        $outString = file_exists($this->template) ? file_get_contents($this->template) : $this->template;
        $outString = str_replace('[%navigation%]', file_exists($this->navigation) ? file_get_contents($this->navigation) : $this->navigation, $outString);
        $outString = str_replace('[%content%]', file_exists($this->content) ? file_get_contents($this->content) : $this->content, $outString);

        return $outString;
    }
}
