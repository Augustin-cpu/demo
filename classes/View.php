<?php

class View{
    private $template;

    public function __construct($template)
    {
        $this->template = $template;
    }

    public function render(array $datas = []){
        $template = $this->template;
        ob_start();
        extract($datas);
        include_once(TEMPLATE.$template.'.php');
        $contentpage = ob_get_clean();
        include_once(TEMPLATE.'layout.php');

    }
}