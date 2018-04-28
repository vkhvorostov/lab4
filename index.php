<?
require_once "inc/common.php";
require_once "inc/CNews.php";
require_once "inc/header.php";

$newsPos = strpos($_SERVER["REQUEST_URI"], 'news'); // номер символа в адресной строке, чтобы отрезать лишнее, если есть
if (!$newsPos) {
    echo 'Такой страницы не существует'; die();
}

$url = substr($_SERVER["REQUEST_URI"], $newsPos); // убираем лишнее в строке запроса: /slstudents/practice/lab4/news/1 превращается в news/1
$path = explode('/', $url); // $path теперь массив - в первом элементе news, во втором номер, если есть
$baseUrl = substr($_SERVER["REQUEST_URI"], 0, $newsPos) . 'news/';

$news = new CNews($mysqli, $baseUrl);
if (isset($path[1]) && ($newsId = intval($path[1])) > 0) {
    $news->printOne($newsId);
} else {
    $news->printAll();
}

require_once "inc/footer.php";
?>