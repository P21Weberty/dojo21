<?php

namespace App\Router;

use App\Http\Controller\KeyResult;
use App\Http\Controller\Objective;
use App\Http\Controller\User;

class Router
{
    public function route(){

        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if($url === '/user/login'){
            (new User())->login();
        }

        if($url === '/user/save'){
            (new User())->save();
        }

        if($url === '/objective/save'){
            (new Objective())->save();
        }

        if($url === '/objective/delete'){
            (new Objective())->delete();
        }

        if($url === '/key-results/save'){
            (new KeyResult())->save();
        }
    }
}
