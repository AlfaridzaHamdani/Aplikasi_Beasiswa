<?php

namespace Beasiswa\App;

use Beasiswa\Controller\HomeController;
use Beasiswa\Controller\RegistrationController;

class Router
{
    // Menyimpan daftar rute dan database
    private static array $routes = [];
    private static $db;

    // Set koneksi database
    public static function setDatabase($database)
    {
        self::$db = $database;
    }

    // Menambahkan rute baru ke dalam array routes
    public static function add(string $method, string $path, string $controller, string $function)
    {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function
        ];
    }

    // Menjalankan routing berdasarkan URL dan method
    public static function run()
    {
        $path = '/';
        if (isset($_SERVER['PATH_INFO'])) {
            $path = $_SERVER['PATH_INFO'];
        }

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            if ($path == $route['path'] && $method == $route['method']) {
                $controllerName = $route['controller'];
                $function = $route['function'];

                // Membuat instance controller dengan koneksi database
                $controller = new $controllerName(self::$db);
                $controller->$function();
                return;
            }
        }

        // Jika rute tidak ditemukan, kirim respon 404
        http_response_code(404);
        echo "CONTROLLER NOT FOUND";
    }
}
