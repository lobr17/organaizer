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


//var_dump($_REQUEST);
$date = date('d.m.Y');
if (isset($_POST['message1']) and isset($_POST['message2'])){
    $query = "INSERT INTO guest SET date=NOW(),name='$_POST[message1]', text='$_POST[message2]'";
    //$query = "INSERT INTO guest (date , name, text) VALUES ('{NOW()}', '{$_POST['message1']}', '{$_POST['message2']}')";
    var_dump($query);
    if (!mysqli_query($link, $query)) {
        echo "Запись не добавлена!";
    }
}
$query = "SELECT * FROM guest WHERE id = '$_REQUEST[id]'";

$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

?>

<?php $i = 0; foreach ($data as $item): ?>
    <p><?php echo $item['date'].' '?><?php echo $item['name'] ?></p>
    <p><?php echo $item['text']?></p>
    <?php $i++; endforeach; ?>

    <a href="add.php">Добавить запись</a>




</div>

</body>
</html>