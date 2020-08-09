<?php
require_once '../vendor/autoload.php';

use App\classes\Session;

Session::destroy();
header('location: login.php');