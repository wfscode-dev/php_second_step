<?php
$id = $_GET['id'];
//подключение к бд
$connect = mysqli_connect('localhost',"root", "", "box");
//запрос на получение данных
$query = "SELECT * FROM users WHERE id = $id";
//результат запроса
$result = mysqli_query($connect, $query);
//получаем первый елемент масива резулт
$user = mysqli_fetch_row($result);

$query = "SELECT * FROM books WHERE parent_id = $id";
//результат запроса
$result = mysqli_query($connect, $query);
//получаем все елемент масива резулт
$books = mysqli_fetch_all($result);

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
        echo "$user[1] $user[2]";
        ?>
    </h1>

<?php
    echo "<ul>";
    foreach ($books as $key => $book){
        echo "<li><a href='book.php?id=$book[0]'>$book[1]</a></li>";
    }
    echo "</ul>";
?>