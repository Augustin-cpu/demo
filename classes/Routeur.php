<?php
class Routeur
{
    private $request;
    private $routes = [
                        'home.html' =>  ['controller' => 'Home', 'method' => 'showHome'], 
                        'edit'      =>  ['controller' => 'Home', 'method' => 'showEdit'], 
                        'login'     =>  ['controller' => 'Home', 'method' => 'showLogin'], 
                        'delete'    =>  ['controller' => 'Home', 'method' => 'Delete']
                    ];
    
        public function __construct($request)
    {
        $this->request = $request;
    }

    public function renderController()
    {
        $request = $this->request;
        if(key_exists($request, $this->routes)){
            $controller = $this->routes[$request]['controller'];
            $method = $this->routes[$request]['method'];

            $currentController = new $controller();
            $currentController->$method();
        }else{
            echo '404';
            exit;
        }
    }
}
