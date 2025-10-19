<?php
require_once('lib/include.php');


if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 'home';
}

 if($page == 'home'){
    homepage();
}elseif($page == 'edit'){
    edit();
}elseif($page == 'delete'){
    Del();
}elseif($page == 'login'){
    auth();
}elseif($page == 'logout'){
    logout();
}