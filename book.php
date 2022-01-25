<?php
$id = $_GET['id'];
//подключение к бд
$connect = mysqli_connect('localhost',"root", "", "box");
//запрос на получение данных

$query = "SELECT * FROM books WHERE id = $id";
//результат запроса
$result = mysqli_query($connect, $query);
//получаем все елемент масива резулт
$book = mysqli_fetch_row($result);

//закрыть соединение
mysqli_close($connect);

?>

<!--HTML Для вывода данных-->
<!DOCTYPE HTML PUBLIC>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset=utf-8">
    <title>Пример</title>
</head>
<body>
<h1>
    <?php
    echo "$book[1]";
    ?>
</h1>

<?php
    echo "<p> $book[3]</p>";
?>
