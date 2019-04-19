<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        div {
            margin: 0 auto;
            width: 480px;
            text-align: justify;
        }
    </style>
</head>
<body>


<div>
    <h1>Ваша запись.</h1>
    <?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'test';

    $link = mysqli_connect($host, $user, $password, $db_name);
    mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
    mysqli_query($link, "SET NAMES 'utf8'");

   // var_dump($_POST);
    $date = date('d.m.Y');
    if (isset($_POST['message1']) and isset($_POST['message2'])){
        $query = "INSERT INTO guest SET date=NOW(),name='$_POST[message1]', text='$_POST[message2]'";
        var_dump($query);
        if (!mysqli_query($link, $query)) {
            echo "Запись не добавлена!";
        }
    }
    $query = "SELECT * FROM guest";
    $result = mysqli_query($link, $query) or die( mysqli_error($link) );

    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

    ?>



    <form method="POST" action="">
        <input name="message1" placeholder="Ваше имя"><br><br>
        <textarea name="message2" placeholder="Ваме сообщение"></textarea><br><br>
        <input type="submit" name="submit" value="Сохранить">
    </form>



</div>

</body>
</html>