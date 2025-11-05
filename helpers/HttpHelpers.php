<?php

class HttpHelpers{
    private $url;
    public function __construct($url)
    {
        $this->url = $url;
    }

    public function redirect(){
        header('Location : ?page='.$this->url);
        exit;
    }
    public static function error404(){
        $myView = new View('error404');
        $myView->render();
    }
}