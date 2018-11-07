<?php
session_start();
?>

<!DOCTYPE html>
<!--Nick mercado
itec 370
ubi messages page-->
<html>
    <title>Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html,body,h1,h2,h3,h4,h5,h6 {
            font-family: "Roboto", sans-serif
        }
        ul {
            list-style-type: none;
            margin: 10;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }
        li {
            float: left;
        }
        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        li a:hover:not(.active) {
            background-color: #c2011b;
        }
        .active {
            background-color: #c2011b;
        } 
        img{
            margin-left: 20px;
        }
        .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }
        .darker {
            border-color: #ccc;
            background-color: #ddd;
        }

        .container img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
        }
        .time{
            font-size: 12px;
            color: #999;
        }


    </style>

    <body style="background-color: black">
        <!-- Page Container -->
        <div class="w3-content w3-margin-top w3-light-grey" style="max-width:1400px;">
            <ul>
                <li><a href="UBI_Home.php">Home</a></li>
                <li><a href="UBI_Profile.php">Profile</a></li>
                <li><a href="UBI_Messages.php">Messages</a></li>
                <li style="float:right"><a class="active" href="UBI_Login.php">Sign out</a></li>
            </ul>

            <!-- The Grid -->
            <div class="w3-row-padding ">

                <!-- Left Column -->
                <div class="w3-third " >
                    <div class="w3-white w3-text-grey w3-card-4" >
                        <div class="w3-display-container"  style="overflow: scroll">
                            <h1 style="margin-left: 30px">Friends</h1>
                            <p><img src="Pics/pika.jpg" class="w3-circle" alt="pika" width="120" height="120">    &nbsp;&nbsp;&nbsp;&nbsp;@pikapika55</p>
                            <p><img src="Pics/bugs.jpg" class="w3-circle" alt="bugs" width="120" height="120">    &nbsp;&nbsp;&nbsp;&nbsp;@Whatsupdoc</p>
                            <p><img src="Pics/luigi.jpeg" class="w3-circle" alt="luigi" width="120" height="120">    &nbsp;&nbsp;&nbsp;&nbsp;@luigitime89</p>
                            <p><img src="Pics/yoda.jpg" class="w3-circle" alt="yoda" width="120" height="120">    &nbsp;&nbsp;&nbsp;&nbsp;@MrGr33n</p>
                            <p><img src="Pics/drake.jpg" class="w3-circle" alt="drake" width="120" height="120">    &nbsp;&nbsp;&nbsp;&nbsp;@Drizzy6god</p>
                            <p><img src="Pics/baby.jpg" class="w3-circle" alt="baby" width="120" height="120">    &nbsp;&nbsp;&nbsp;&nbsp;@lilbaby</p>
                        </div>

                    </div><br>

                    <!-- End Left Column -->
                </div>

                <!-- Right Column -->
                <div class="w3-twothird">
                    <div class="w3-container w3-card w3-white w3-margin-bottom">
                        <h2 class="about_heather" >Messages</h2>

                        <div class="container">
                            <img id="profpic1" src="Pics/avi.png" alt="Avatar" style="width:100%;">
                            <p>yoooooooo</p>
                            <span class="time">11:00</span>
                        </div>
                        <div class="container darker">
                            <img src="Pics/drake.jpg" alt="drake" class="right" style="width:100%;">
                            <p>what up chillen in the stuuuuuu</p>
                            <span class="time">11:06</span>
                        </div>
                        <div class="container">
                            <img id="profpic2" src="Pics/avi.png" alt="Avatar" style="width:100%;">
                            <p>check out this new song i been working on <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"> www.goodmusic.com</a>&nbsp;</p>
                            <span class="time">11:08</span>
                        </div>
                        <div class="container darker">
                            <img src="Pics/drake.jpg" alt="drake" class="right" style="width:100%;">
                            <p>Damn bro you really got me XD!</p>
                            <span class="time">11:20</span>
                        </div>
                        <div class="container">
                            <img id="profpic3" src="Pics/avi.png" alt="Avatar" style="width:100%;">
                            <textarea rows="3" cols="90">type something...</textarea>

                            <button type="button" style="width: auto; height: auto; float: right; background-color: lightblue">Send it!</button>
                        </div>



                    </div>

                    <?php

                    $index = $_SESSION['userIndex'];
                    $csv = array();

                    if(($handle = fopen("sample.csv", "r")) !== FALSE)
                    {
                        while(($data = fgetcsv($handle, 1000, ",")) !== FALSE)
                        {
                            $csv[] = $data;
                        }
                    }

                    fclose($handle);

                    $profpic = $csv[$index][9];

                    echo "<script> 

                    document.getElementById('profpic1').src = '" . $profpic . "';
                    document.getElementById('profpic2').src = '" . $profpic . "';
                    document.getElementById('profpic3').src = '" . $profpic . "';

                    </script>";
                    ?>
                    <!-- End Right Column -->
                </div>

                <!-- End Grid -->
            </div>

            <!-- End Page Container -->
        </div>


    </body>
</html>