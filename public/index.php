<?php


// Start a Session
if( !session_id() ) @session_start();

require '../vendor/autoload.php';

if (true) {
    flash()->message('Hot!');
}

echo flash()->display();
// Create new Plates instance
$templates = new League\Plates\Engine('../app/views');
d($templates);

// Render a template
echo $templates->render('homepage', ['name' => 'Jonathan']);

//if ($_SERVER['REQUEST_URI'] === '/home') {
////    require '../app/controllers/homepage.php';
////}
////
////exit;