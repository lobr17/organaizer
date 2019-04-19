<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form action="" method="GET">
    Редактировать данные:<br>
    Имя: <input name="name" ><br>
    Возраст: <input name="age"><br>
    Зарплата: <input name="salary"><br>
    <input type="submit" name="submit">
</form>

<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'test';

$link = mysqli_connect($host, $user, $password, $db_name);
mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
mysqli_query($link, "SET NAMES 'utf8'");


$id = $_GET['id'];
var_dump($id);
if (isset($_GET['id'])) {
    $id = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
    $query = "SELECT * FROM guest WHERE id = '$id'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));


    if($result && mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_row($result); // получаем первую строку
        $name = $row[1];
        $age = $row[2];

        echo "<h2>Изменить модель</h2>
            <form method='GET'>
            <input type='hidden' name='id' value='$id' />
            <p>Введите модель:<br> 
            <input type='text' name='name' value='$name' /></p>
            <p>Производитель: <br> 
            <input type='text' name='company' value='$company' /></p>
            <input type='submit' value='Сохранить'>
            </form>";

        mysqli_free_result($result);
    }
    }

if (isset($_POST['message1']) and isset($_POST['message2'])){
    $query = "INSERT INTO guest SET date=NOW(),name='$_POST[message1]', text='$_POST[message2]'";
    var_dump($query);
    if (!mysqli_query($link, $query)) {
        echo "Запись не добавлена!";
    }
}

?>

</body>
</html>