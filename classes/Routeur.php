<?php
class Routeur
{
    private $request;
    private $routes = [
        'home'         =>  ['controller' => 'Home', 'method' => 'showHome'],
        'edit'         =>  ['controller' => 'Home', 'method' => 'showEdit'],
        'login'        =>  ['controller' => 'Auth', 'method' => 'AuthUsers'],
        'register'     =>  ['controller' => 'Auth', 'method' => 'ShowRegister'],
        'logout'       =>  ['controller' => 'Auth', 'method' => 'LogoutUsers'],
        'delete'       =>  ['controller' => 'Home', 'method' => 'Delete']
    ];

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function getRoute(){
        $elements = explode('/',$this->request);
        return $elements[0];
    }

    public function getParams(){

        // extract GET
        $elements = explode('/',$this->request);
        unset($elements[0]);
        for($i = 1; $i < count($elements); $i++){
            $params[$elements[$i]] = $elements[$i+1];
            $i++;
        }
        if(!isset($params)) $params = null;

        // extract POST
        if($_POST){
            foreach($_POST as $key => $value){
                $params[$key] = $value;
            }
        }

        return $params;
    }

    public function renderController()
    {
        $route = $this->getRoute();
        $params = $this->getParams();

        if (key_exists($route, $this->routes)) {
            $controller = $this->routes[$route]['controller'];
            $method = $this->routes[$route]['method'];

            $currentController = new $controller();
            $currentController->$method($params);
        } else {
            HttpHelpers::error404();
        }
    }
}
