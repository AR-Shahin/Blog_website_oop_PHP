<?php
require_once '../vendor/autoload.php';

use App\classes\Session;
Session::init();
Session::destroy();