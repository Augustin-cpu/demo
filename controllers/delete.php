<?php

function Del(){
    $id_delete = (int)$_GET['id'];
    deletePost($id_delete);
}