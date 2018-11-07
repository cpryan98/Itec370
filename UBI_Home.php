<?php
session_start();
?>


<!DOCTYPE html>
<!--Nick mercado
itec 370
ubi profile page-->
<html>
    <title>Ubi</title>
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
                <!-- Right Column -->
                <div class="w3-twothird">
                    <div class="w3-container w3-card w3-white w3-margin-bottom">
                        <div class="w3-container">
                            </br>
                        <img id="profpic1" src ="Pics/avi.png" alt = "profile pic" width="80" height="80" class = "w3-circle" align="left" vspace="10px" style="margin-right: 5px">
                        <textarea rows="4" cols="80" maxlength="240" style="border: none; resize: none">Say what's up!</textarea>

                        <button class="edit" type="submit" style="height: auto; width: 50px; float: right; width: 19%; border: none;">Post!</button>
                        <hr>
                    </div>
                    <div class="w3-container">
                        <img id="profpic2" src="Pics/avi.png" class="w3-circle" alt="profile pic" width="80" height="80" align="left" vspace="10px" style="margin-right: 5px;">
                        <textarea rows="4" cols="80" readonly="true" style="border-style: none; border-color: Transparent; overflow: auto; background-color: #DCDCDC;"> Here is your post</textarea>
                        <br>
                        <img src="Pics/pika.jpg" class="w3-circle" alt="pika" width="80" height="80" align="left" vspace="10px" style="margin-right: 5px;">
                        <textarea rows="4" cols="80" readonly="true" style="border-style: none; border-color: Transparent; overflow: auto; background-color: #DCDCDC;"> Here is pikachu's post</textarea>
                        <br>
                        <img src="Pics/luigi.jpeg" class="w3-circle" alt="luigi" width="80" height="80" align="left" vspace="10px" style="margin-right: 5px;">
                        <textarea rows="4" cols="80" readonly="true" style="border-style: none; border-color: Transparent; overflow: auto; background-color: #DCDCDC;"> Here is Luigi's post</textarea>
                        <br>
                        <img src="Pics/bugs.jpg" class="w3-circle" alt="bugs bunny" width="80" height="80" align="left" vspace="10px" style="margin-right: 5px;">
                        <textarea rows="4" cols="80" readonly="true" style="border-style: none; border-color: Transparent; overflow: auto; background-color: #DCDCDC;"> Here is Bug Bunny's post</textarea>
                        <br>
                        <img src="Pics/yoda.jpg" class="w3-circle" alt="shoo" width="80" height="80" align="left" vspace="10px" style="margin-right: 5px;">
                        <textarea rows="4" cols="80" readonly="true" style="border-style: none; border-color: Transparent; overflow: auto; background-color: #DCDCDC;"> Yoda's post, here it is</textarea>
                        <br>
                        <img src="Pics/baby.jpg" class="w3-circle" alt="pika" width="80" height="80" align="left" vspace="10px" style="margin-right: 5px;">
                        <textarea rows="4" cols="80" readonly="true" style="border-style: none; border-color: Transparent; overflow: auto; background-color: #DCDCDC;"> Here is the baby's post</textarea>
                        <br>
                    </div>
                </div>

                <!-- End Right Column -->
            </div>
            <!-- Left Column -->
            <div class="w3-third w3-transparent">
                <div class="w3-white w3-text-grey w3-card-4">
                    <div class="w3-display-container ">
                        <img id="profpic3" src= "Pics/avi.jpg" style="display: block; margin-left: auto; margin-right: auto; width:80%;" alt="profile pic">
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
                $profpic = $csv[$index][9];

                echo "<script> 
                    document.getElementById('name').innerHTML = '" . $fname . " " . $lname . "';
                    document.getElementById('location').innerHTML = '" . $location . "';
                    document.getElementById('grade').innerHTML = '" . $grade . "';
                    document.getElementById('major').innerHTML = '" . $major . "';
                    document.getElementById('bday').innerHTML = '" . $bday . "';
                    document.getElementById('profpic1').src = '" . $profpic . "';
                    document.getElementById('profpic2').src = '" . $profpic . "';
                    document.getElementById('profpic3').src = '" . $profpic . "';



                    </script>";
                ?>

                <!-- End Left Column -->
            </div>



            <!-- End Grid -->
        </div>

        <!-- End Page Container -->
        </div>


    </body>
</html>