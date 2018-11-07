<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Ubi Login Page</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

        <!-- Plugin CSS -->
        <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/creative.min.css" rel="stylesheet">

    </head>

    <body id="page-top">



        <header class="masthead text-center text-white d-flex">
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <h1 class="text-uppercase"; style="font-size: 150px;">
                            <strong>Ubi.</strong>
                        </h1>
                        <hr>
                    </div>
                    <div class="col-lg-8 mx-auto">
                        <form method="POST" action="UBI_Login.php">  

                            <p class="login-info"; style="font-size: 12px;">

                                <label for="uname"><b>Username: &nbsp;</b></label>
                                <input type = "text" placeholder="Enter Username" name= "uname" size="14" required>
                                <br>
                                <label for="psw"><b>Password: &nbsp;</b></label>
                                <input type="password" placeholder="Enter Password" name= "psw" size="14" required>
                            </p>
                            <br>
                            <!--href="UBI_Profile.html"
class="btn btn-primary btn-xl js-scroll-trigger" 
-->
                            <input type="submit" class="btn btn-primary btn-xl js-scroll-trigger" value="Login"></a>

                        <a class="btn btn-primary  btn-xl js-scroll-trigger" href="UBI_CreateProfile.php">Create a profile</a>
                        </form>

                </div>
            </div>
            </div>
        </header>
    <h6>
        <?php
        $_SESSION['userIndex'] = -1;
        $csv = array();

        if(($handle = fopen("sample.csv", "r")) !== FALSE)
        {
            while(($data = fgetcsv($handle, 1000, ",")) !== FALSE)
            {
                $csv[] = $data;
            }
        }

        fclose($handle);


        if (isset($_POST['uname'])) {
            $user = $_POST['uname'];
            $pass = $_POST['psw'];
            //echo $user;
            //echo $pass;
            //echo $csv[0][2];
            //echo searchArray($user, $pass, $csv);
            $_SESSION['userIndex'] = searchArray($user, $pass, $csv);
            if (!is_null($_SESSION['userIndex'])){
                header("Location: UBI_Profile.php");
            }
        }
        function searchArray($user, $pass, $array) {
            for($i = 0; $i <= sizeOf($array) - 1; $i = $i + 1){
                if ($user === $array[$i][0] and $pass === $array[$i][1]){
                    return $i;
                }
            }

            return null;
        }




        ?>
    </h6>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

    </body>

</html>
