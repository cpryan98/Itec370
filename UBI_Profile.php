<?php
session_start();
?>


<!DOCTYPE html>
<!--Nick mercado, carter wood
itec 370
ubi profile page-->
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
                <div class="w3-third w3-transparent">
                    <div class="w3-white w3-text-grey w3-card-4">
                        <div class="w3-display-container ">
                            <img id="profpic" src= "Pics/avi.png" style="display: block; margin-left: auto; margin-right: auto; width:80%;" alt="Avatar" >
                            <div class="name_tag">
                                <h2 id="name" align="center"></h2>
                            </div>
                        </div>
                        <div class="w3-container">
                            <p>Lives in <span id="location" style="color:blue"></span></p>
                            <p>Grade <span id="grade" style="color: blue"></span></p>
                            <p>Major <spam id="major" style="color: blue"></spam></p>
                            <p>Born on <span id="bday" style="color: blue"></span></p>
                        </div>
                    </div><br>

                    <!-- End Left Column -->
                </div>

                <!-- Right Column -->
                <div class="w3-twothird">
                    <div class="w3-container w3-card w3-white w3-margin-bottom">
                        <h2 class="about_heather" align="center">About me</h2>
                        <div class="w3-container">
                            <textarea id="bio" rows="4" cols="100" style="border: none; resize: none">Hi welcome to my Ubi!</textarea>
                            <br>
                            <button style="border: none">Save</button>
                            <hr>
                        </div>
                        <div class="w3-container">
                            <h5 class="w3-opacity"><b>Friends</b></h5>
                            <img src="Pics/pika.jpg" class="w3-circle" alt="pika" width="120" height="120">
                            <img src="Pics/bugs.jpg" class="w3-circle" alt="bugs" width="120" height="120">
                            <img src="Pics/luigi.jpeg" class="w3-circle" alt="luigi" width="120" height="120">
                            <img src="Pics/yoda.jpg" class="w3-circle" alt="yoda" width="120" height="120">
                            <img src="Pics/drake.jpg" class="w3-circle" alt="drake" width="120" height="120">
                            <img src="Pics/baby.jpg" class="w3-circle" alt="baby" width="120" height="120">
                            <hr>
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
                    $fname = $csv[$index][2];
                    $lname = $csv[$index][3];
                    $location = $csv[$index][4];
                    $grade = $csv[$index][5];
                    $major = $csv[$index][6];
                    $bday = $csv[$index][7];
                    $bio = $csv[$index][8];
                    $profpic = $csv[$index][9];

                    echo "<script> 
                    document.getElementById('name').innerHTML = '" . $fname . " " . $lname . "';
                    document.getElementById('location').innerHTML = '" . $location . "';
                    document.getElementById('grade').innerHTML = '" . $grade . "';
                    document.getElementById('major').innerHTML = '" . $major . "';
                    document.getElementById('bday').innerHTML = '" . $bday . "';
                    document.getElementById('bio').innerHTML = '" . $bio . "';
                    document.getElementById('profpic').src = '" . $profpic . "';

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