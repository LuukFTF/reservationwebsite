<?php

$host       = "localhost";
$database   = "reservation_system";
$user       = "root";
$password   = "";

$db = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());;



//variables
$id = '';
$id_customer = '';
$email = '';
$massage_type = '';
$date = '';
$begin_time = '';
$ending_time = '';
$status = '';
$message_customer = '';
$message_moderator = '';
$date_created = '';
$date_updated = '';

$tc = '';

//variable setting from POST_GET
if (isset($_POST['submit'])) {
    $ok = true;

    if (!isset($_POST['id_customer']) || $_POST['id_customer'] === '') {
        $ok = false;
    } else {
        $id_customer = $_POST['id_customer'];
    };
    if (!isset($_POST['email']) || $_POST['email'] === '') {
        $ok = false;
    } else {
        $email = $_POST['email'];
    };
    if (!isset($_POST['massage_type']) || $_POST['massage_type'] === '') {
        $ok = false;
    } else {
        $massage_type = $_POST['massage_type'];
    };
    if (!isset($_POST['date']) || $_POST['date'] === '') {
        $ok = false;
    } else {
        $date = $_POST['date'];
    };
    if (!isset($_POST['begin_time']) || $_POST['begin_time'] === '') {
        $ok = false;
    } else {
        $begin_time = $_POST['begin_time'];
    };
    if (!isset($_POST['ending_time']) || $_POST['ending_time'] === '') {
        $ok = false;
    } else {
        $ending_time = $_POST['ending_time'];
    };
    if (!isset($_POST['status']) || $_POST['status'] === '') {
        $ok = false;
    } else {
        $status = $_POST['status'];
    };
    if (!isset($_POST['message_customer']) || $_POST['message_customer'] === '') {
        $ok = false;
    } else {
        $message_customer = $_POST['message_customer'];
    };
    if (!isset($_POST['message_moderator']) || $_POST['message_moderator'] === '') {
        $ok = false;
    } else {
        $message_moderator = $_POST['message_moderator'];
    };
    if (!isset($_POST['tc']) || $_POST['tc'] === '') {
        $ok = false;
    } else {
        $tc = $_POST['tc'];
    };
}


if (isset($_POST['submit'])) {

    if (empty($errors)) {
        $query = "
            INSERT INTO reservations (id_customer, email, massage_type, date, begin_time, ending_time, status, message_customer, message_moderator, date_created, date_updated)
            VALUES ($id_customer, '$email', $massage_type, '$date', '$begin_time', '$ending_time', $status, '$message_customer', '$message_moderator', '$date_created', '$date_updated')";

        $result = mysqli_query($db, $query)
        or die('Error: ' . $query);
    }

    if ($result) {
        echo 'Added Successfully!';
        exit;
    } else {
        $errors[] = 'Oepsie Woopsie Database Qwerie: ' . mysqli_error($db);
    }

    mysqli_close($db);
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link href="/css/main.css" type="text/css" rel="stylesheet">
    <link href="music_collection.css" type="text/css" rel="stylesheet">
    <title>LuukFTF's Website</title>
</head>
<body>
<!--header-->
<?php include '../header.php'; ?>


<main class="main">
    <div class="container page">
    <form
        action=""
        method="post"
        <p>Customer ID: <input type="text" name="id_customer" value='<?=$id_customer?>'</p>
        <p>E-Mail: <input type="text" name="email" value='<?=$email?>'></p>
        <p>Massage type: <select name="massage_type"></p>
        <option value="" selected="selected">Selecteer Massage</option>
        <option value="1">Sport therapie</option>
        <option value="2">Massage</option>
        <option value="3">Medical taping</option>
        <option value="4">Triggerpoint therapie</option>
        <option value="5">ADHD</option>
        </select>
        <p>Date: <input type="date" name="date" value='<?=$date?>'></p>
        <p>Begin Time: <input type="time" name="begin_time" value='<?=$begin_time?>'></p>
        <p>Customer Message: <textarea name="message_customer"><?=$message_customer?></textarea></p>
        <p><input type="checkbox" name="tc" value="ok" value='<?=$tc?>'> I accept the terms &amp; conditions </p>
        <input type="submit" name="submit" value="Register Account">
    </form>


    </div>

</main>


</body>
</html>