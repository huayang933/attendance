<?php
    include_once 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="css/site.css" />

    <title>Attendance - <?php echo $title ?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">IT Conference</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="viewrecords.php">View Attendees</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if(!isset($_SESSION['userid'])){ ?>
            <li class="nav-item active">
                <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
            </li>
            <?php } else { ?>
                <a href="#" class="nav-link"><span>Hello <?php echo $_SESSION['username'] ?></span></a>
                <a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
            <?php } ?>
        </ul>
    </div>
</nav>
<div class="container">
    
    <br />