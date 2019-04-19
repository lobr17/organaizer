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
    <?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'test';

    $link = mysqli_connect($host, $user, $password, $db_name);
    mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));

    mysqli_query($link, "SET NAMES 'utf8'");


    $date = date('d.m.Y');

    $query = "SELECT * FROM guest WHERE id = '$_REQUEST[id]'";
    $id = $_REQUEST[id];

    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

    ?>
    <a href="guest.php">На главную</a>
    <form method="POST" action="">
    <?php $i = 0; foreach ($data as $item): ?>
        <textarea><?php echo $item['date'].' '?></textarea></br></br>
        <textarea name="name"> <?php echo $item['name'] ?></textarea></br></br>
        <textarea name="text"><?php echo $item['text']?></textarea></br></br>
        <?php $i++; endforeach; ?>
        <input type="submit" name="go">
    </form>
    <a href="http://localhost/www/tasks/add.php">Добавить запись</a>

   <?php if (isset($_POST['name']) and isset($_POST['text'])){
    $query = "UPDATE guest SET date=NOW(),name='$_POST[name]', text='$_POST[text]' WHERE id='$id'";
    var_dump($query);
    if (!mysqli_query($link, $query)) {
    echo "Запись не изменена!";
    }
    }
    ?>


</div>

</body>
</html>