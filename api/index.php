<?php
$request = $_SERVER['REQUEST_URI'];

// Remove query string from request URI
$request = strtok($request, '?');

// Define the path to the public directory
$publicPath = realpath(__DIR__ . '/../public');

// Log information for debugging
error_log("Original request: $request");
error_log("Public path: $publicPath");

switch ($request) {
    case '/' :
        require $publicPath . '/HTML/index.html';
        break;
    case '/contact' :
        require $publicPath . '/HTML/contact.html';
        break;
    case '/about':
        require $publicPath . '/HTML/about.html';
        break;
    default:
        if (strpos($request, '/public/') === 0) {
            // Handle all requests under /public
            $filePath = realpath($publicPath . str_replace('/public', '', $request));
            error_log("Resolved file path: $filePath");
            if ($filePath && strpos($filePath, $publicPath) === 0 && is_file($filePath)) {
                $ext = pathinfo($filePath, PATHINFO_EXTENSION);
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
                            header("Content-Type: text/html"); // For PHP scripts
                            include($filePath);
                            exit;
                    default:
                        header("Content-Type: application/octet-stream");
                }
                readfile($filePath);
                exit;
            } else {
                error_log("File not found or invalid path: $filePath");
            }
        }
        // 404 for all other cases
        http_response_code(404);
        require $publicPath . '/HTML/404.html';
        break;
}
?>