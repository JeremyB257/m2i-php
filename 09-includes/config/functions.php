<?php

function pageName() {
    $uri = $_SERVER['REQUEST_URI'];
    $name = strrchr($uri, '/');
    $name = substr($name, 1, -4);
    $name = empty($name) ? 'index' : $name;

    return $name;
}
