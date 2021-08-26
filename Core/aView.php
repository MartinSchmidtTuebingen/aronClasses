<?php

namespace Aron\Core;

class aView
{

    protected $template = "./tpl/aron.tpl";
    protected $navigation = "./tpl/aron_navi.tpl";
    const CONTENT = [
        'home' => "./tpl/home.tpl",
        'login' => "./tpl/login.tpl",
        'register' => "./tpl/register.tpl",
        'impressum' => "./tpl/impressum.tpl",
        ];

    public function render()
    {
        $content = '';
        if ($_GET['page'] !== null && self::CONTENT[$_GET['page']] !== null) {
            $content = file_get_contents(self::CONTENT[$_GET['page']]);
        }

        $tpl = file_get_contents($this->template);
        $tpl = str_replace('[%navigation%]', file_get_contents($this->navigation), $tpl);
        $tpl = str_replace('[%content%]', $content, $tpl);

      return $tpl;
    }
}