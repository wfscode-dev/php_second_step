<?php
//подключение к бд
$connect = mysqli_connect('localhost',"root", "", "box");
//запрос на получение данных
$query = "SELECT * FROM users";
//результат запроса
$result = mysqli_query($connect, $query);
//получаем данные
$users = mysqli_fetch_all($result);
//закрыть соединение
foreach ($users as $key => $user){
    $query = "SELECT * FROM books WHERE parent_id = $user[0] ORDER BY name DESC "; //DESC - от я до а ASC - от а до я
    $result = mysqli_query($connect, $query);
    $books = mysqli_fetch_all($result);
    $users[$key]['books'] = $books;
}
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
<h1>Авторы</h1>

<?php
    foreach ($users as $key => $user){
        echo "<ul><b><a href='author.php?id=$user[0]'>$user[1] $user[2]</a></b>";
        foreach ($user['books'] as $keyBook => $book){
            echo "<li><a href='book.php?id=$book[0]'>$book[1]</a></li>";
        }
        echo "</ul";
    }

?>


</body>
</html>
