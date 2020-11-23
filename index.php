<?php

declare(strict_types=1);

spl_autoload_register(function (string $classNamespace) {
    $path = str_replace(['\\', 'App/'], ['/', ''], $classNamespace);
    $path = "src/$path.php";
    require_once($path);
});

require_once("./src/Utils/debug.php");
$configuration = require_once("config/config.php");

use App\Controller\AbstractController;
use App\Controller\TodoController;
use App\Request;
use App\Exception\AppException;
use App\Exception\ConfigurationException;

$request = new Request($_GET, $_POST, $_SERVER);

try {
    AbstractController::initConfiguration($configuration);
    (new TodoController($request))->run();
} catch (ConfigurationException $exception) {
    echo '<h1>There is a error in Application</h1>';
    echo 'Problem with application, please try in a moment again.';
    dump($exception);
} catch (AppException $exception) {
    echo '<h1>There is a error in Application</h1>';
    echo '<h3>' . $exception->getMessage() . '</h3>';
} catch (\Throwable $exception) {
    echo '<h1>There is a error in Application</h1>';
    dump($exception);
}
