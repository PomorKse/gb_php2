<?php
// подгружаем и активируем авто-загрузчик Twig-а
require_once '../config/init.php';

try {
    //получаем количество записей для выдачи пользователю
    if (isset($_GET['limit'])) {
        $limit = $_GET['limit'];
    } else {
        $limit = 4;
    }
    

    //Формируем запрос в БД, используем объект $db класса PDO, помещаем данные в ассоц.массив
    $query = $db->query("SELECT * FROM `products` limit $limit");
    $products = ($query->fetchAll(PDO::FETCH_ASSOC));

    $content = [
        'title' => 'Products',
        'products' => $products,
        'limit' => $limit,
        'count' => count($products)
    ];
    $template = $twig->render('index.tmpl', $content);
    echo $template;
    
} catch (Exception $e) {
    'Error: ' . $e->getMessage();
}