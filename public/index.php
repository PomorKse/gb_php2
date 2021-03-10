<?php
// подгружаем и активируем авто-загрузчик Twig-а
require_once '../config/init.php';

$data = array_slice(scandir('img'), 2);
try {
    $content = [
        'title' => 'Yoga tours',
        'path' => IMG_PATH,
        'images' => $data
    ];
    $template = $twig->render('index.tmpl', $content);
    echo $template;
} catch (Exception $e) {
    'Error: ' . $e->getMessage();
}