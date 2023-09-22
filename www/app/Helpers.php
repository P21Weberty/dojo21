<?php

namespace App;

class Helpers {
    /**
     * @param $value
     * @return void
     */
    public function dd($value)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";

        die();
    }

    /**
     * @return array|false|int|string|null
     */
    public function url()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}