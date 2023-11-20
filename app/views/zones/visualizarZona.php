<!DOCTYPE html>
<?php
include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
include_once("../../controllers/LoginController.php");
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php include_once("../../bootstrap/header.php"); ?>
</head>

<body>
    <nav>

        <?php include_once("../../bootstrap/navADM.php"); ?>

    </nav>
</body>

<?php include_once("../../bootstrap/footer.php"); ?>

</html>