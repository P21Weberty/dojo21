<?php

namespace App\Router;

use App\Http\Controller\KeyResult;
use App\Http\Controller\Objective;
use App\Http\Controller\User;
use App\Helpers;

class Router
{
    /**
     * @return void
     */
    public function route(){

        switch ((new Helpers)->url()) {
            case '/user/login':
                (new User())->login();
                break;
            case '/user/save':
                (new User())->save();
                break;
            case '/objective/save':
                (new Objective())->save();
                break;
            case '/objective/delete':
                (new Objective())->delete();
                break;
            case '/objective/lista':
                (new Objective())->lista();
                break;
            case '/key-results/save':
                (new KeyResult())->save();
                break;
            case '/key-results/delete':
                (new KeyResult())->delete();
                break;
            case '/key-results/edit':
                (new KeyResult())->edit();
                break;
        }
    }
}
