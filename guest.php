<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        div {
            margin: 0 auto;
            width: 600px;
            text-align: justify;
        }
        ul {
            list-style-type: none;

        }
        li {
            float: left;
            border: 1px;
            padding: 5px;
        }
        textarea {
            width: 600px;
            height: 400px;
        }

    </style>
</head>
<body>


<div>
    <h1>Органайзер.</h1>
  <!-- <div class="table">
    <ul>

        <li><a href="?date1">Понедельник</a></li>
        <li><a href="?date2">Вторник</a></li>
        <li><a href="?date3">Среда</a></li>
        <li><a href="?date4">Четверг</a></li>
        <li><a href="?date5">Пятница</a></li>
        <li><a href="?date6">Суббота</a></li>
        <li><a href="?date7">Воскресенье</a></li>

    </ul>
   </div>
    -->
    <div >Сегодня: <?php echo date('d.m.Y'); ?></div>

    <?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'test';

    $link = mysqli_connect($host, $user, $password, $db_name);
    mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
    mysqli_query($link, "SET NAMES 'utf8'");

    var_dump($_GET);
    $date = date('d.m.Y');
    if (isset($_POST['submit']) and isset($_POST['days'])){
        $query = "INSERT INTO organaizer (date, days, text) VALUES (NOW(), '$_POST[days]' ,'$_POST[text]')";
        var_dump($query);
        if (!mysqli_query($link, $query)) {
            echo "Запись не добавлена!";
        }
    }
    $query = "SELECT * FROM organaizer";
    $result = mysqli_query($link, $query) or die( mysqli_error($link) );

    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

    ?>

    <form method="POST" action="">
        <textarea name="text"></textarea><br><br>
        <input type="submit" name="submit" value="Сохранить">
            <select name="days">
                <option>Понедельник</option>
                <option>Вторник</option>
                <option>Среда</option>
                <option>Четверг</option>
                <option>Пятница</option>
                <option>Суббота</option>
                <option>Воскресенье</option>
            </select>
    </form>

</div>

</body>
</html>