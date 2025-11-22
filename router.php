<?php

// class Route{
//     private static $uriList = array();
//     private static $uriCallback = array();

//     static public function add($uri, $function)
//     {
//         self::$uriList[] = $uri;
//         self::$uriCallback[$uri] = $function;
//     }

//     static public function submit()
//     {
//         $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
//         $doesUriMatch = false;

//         foreach(self::$uriList as $u)
//         {
//             if($u == $uri) {
//                 $doesUriMatch = true;
//                 break;
//             }
//         }

//         if($doesUriMatch) {
//             call_user_func(self::$uriCallback[$uri]);
//         } else {
//             http_response_code(404);
//             require __DIR__ . '/views/404.php';
//         }
//     }
// }

static public function submit()
{
    // Si viene ?uri=shop, usamos eso
    if (isset($_GET['uri']) && $_GET['uri'] !== '') {
        $uri = '/' . trim($_GET['uri'], '/');
    } else {
        // Si no, usamos la ruta tal cual
        $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
        if ($uri === '') {
            $uri = '/';
        }
    }

    $doesUriMatch = false;

    foreach (self::$uriList as $u) {
        if ($u == $uri) {
            $doesUriMatch = true;
            break;
        }
    }

    if ($doesUriMatch) {
        call_user_func(self::$uriCallback[$uri]);
    } else {
        http_response_code(404);
        require __DIR__ . '/views/404.php';
    }
}
