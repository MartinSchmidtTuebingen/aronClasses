<?php

namespace Aron\Controller;

class FrontendController
{
    protected $template = "./tpl/aron.tpl";
    protected $navigation = "./tpl/aron_navi.tpl";
    protected $content = "./tpl/home.tpl";

    public function render()
    {
        $outString = file_get_contents($this->template);
        $outString = str_replace('[%navigation%]', file_get_contents($this->navigation), $outString);
        $outString = str_replace('[%content%]', file_get_contents($this->content), $outString);

      return $outString;
    }
}