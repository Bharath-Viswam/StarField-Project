<?php
$request = $_SERVER['REQUEST_URI'];

// Remove query string from request URI
$request = strtok($request, '?');

// Define the path to the public directory
$publicPath = __DIR__ . '/../public';

switch ($request) {
    case '/' :
        require $publicPath . '/HTML/index.html';
        break;
    case '/contact' :
        require $publicPath . '/HTML/contact.html';
        break;
    default:
        if (strpos($request, '/public/') === 0) {
            // Handle all requests under /public
            $file = realpath($publicPath . str_replace('/public', '', $request));
            if ($file && strpos($file, $publicPath) === 0 && is_file($file)) {
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                switch ($ext) {
                    case 'css':
                        header("Content-Type: text/css");
                        break;
                    case 'js':
                        header("Content-Type: application/javascript");
                        break;
                    case 'png':
                        header("Content-Type: image/png");
                        break;
                    case 'jpg':
                    case 'jpeg':
                        header("Content-Type: image/jpeg");
                        break;
                    case 'gif':
                        header("Content-Type: image/gif");
                        break;
                    case 'svg':
                        header("Content-Type: image/svg+xml");
                        break;
                    case 'php':
                        include $file;
                        exit;
                    default:
                        header("Content-Type: application/octet-stream");
                }
                readfile($file);
                exit;
            }
        }
        // 404 for all other cases
        http_response_code(404);
        require $publicPath . '/HTML/404.html';
        break;
}
