<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ErkRegister v2.0 - CRUD</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <style type="text/css">
        html {
            margin: 0;
            min-height: 100%;
            height: auto;
        }

        body {
            margin: 0;
            background-image: url("img/mountains.jpg");
            background-size: cover;
            overflow-x: hidden;
            overflow-y: auto;
            background-repeat: no-repeat;
            background-position: center center;
            background-color: #eee;
        }

        ::-webkit-scrollbar {
            width: 0;
            background: transparent; /* make scrollbar transparent */
        }

        .container {
            margin-left: -15px; !important;
        }
    </style>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/825da8a2f7.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</head>
<body>

<div class="header">
    <h1>Welkom bij ErkRegister</h1>
    <h2>Selecteer een tabel om te beginnen.</h2>
    <button type="button" class="btn btn-primary" id="deelnemerButton" value="deelnemers">Deelnemers <i class='fa fa-user'></i></button>
    <button type="button" class="btn btn-primary" id="opleidingButton" value="opleidingen">Opleidingen <i class='fa fa-graduation-cap'></i></button>
    <button type="button" class="btn btn-primary" id="klasButton" value="klassen">Klassen <i class='fa fa-users'></i></button><br><br>
    <p>U bent ingelogd als <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. <a href="logout.php" class="btn btn-danger">Uitloggen</a></p>
</div>

<div id="displaycrud"  class="container"></div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div id="myModalHeader" class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div id="myModalValues" class="modal-body">

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success editsave" id="modalconfirm">Opslaan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuleren</button>
            </div>

        </div>
    </div>
</div>


</body>

</html>
