<?php

require("./controller/filmController.php");


$method = $_SERVER['REQUEST_METHOD'];
header('Content-type: text/javascript');
$url = explode('/', $_SERVER['REQUEST_URI']);

switch ($url[2]) {
    case "films" : 
        switch ($method) {
            case 'GET':
                //give all the films from the db
                echo giveJSONofAllFilm();
                break;
            
            case 'POST':
                # code...
                break;
            
            default:
                # code...
                break;
        }
        break;
    case "film":
        if(is_numeric($url[count($url) - 1])){
            $id = intval($url[count($url) - 1]);
            echo giveJSONofAFilm($id);
            
        } else {
            echo 'Wrong parameters, should looks like /planete/4 or another number.';
        }
        break;



}

?>