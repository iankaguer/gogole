<?php

use Core\Main;
require 'vendor/autoload.php';
if(isset($_POST['wordset'])){
    $wordset = $_POST['wordset'];
    
    $main = new Main($wordset);
    return $main->getLang();
}