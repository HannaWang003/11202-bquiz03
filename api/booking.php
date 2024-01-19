<?php
include_once "db.php";
$movie_id = $_GET['movie_id'];
$date = $_GET['date'];
$session = $_GET['session'];
$movie = $Movie->find($_GET['movie_id']);
?>

<style>
    #room {
        background-image: url('../icon/03D04.png');
        background
    }
</style>
<div id="room">
    <div>您選擇的電影是:<?= $movie['name'] ?></div>
    <div>您選擇的時刻是:<?= $date . $session ?></div>
    <div>您已勾選<span id="tickets">0</span>張票，最多可以購買四張票:</div>
</div>
<div id="info">
    <button onclick=""></button>
</div>