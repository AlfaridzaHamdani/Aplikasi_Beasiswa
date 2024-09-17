<?php
require_once __DIR__ . '/../database/database.php';
require_once __DIR__ . '/../app/App/Autoloader.php';

use Beasiswa\App\Router;
use Beasiswa\Controller\HomeController;
use Beasiswa\Controller\RegistrationController;
use Beasiswa\Controller\ResultController;

Router::setDatabase($conn);

Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/registration', RegistrationController::class, 'index');
Router::add('POST', '/registration/submit', RegistrationController::class, 'register');
Router::add('GET', '/result', ResultController::class, 'index');

Router::run();
