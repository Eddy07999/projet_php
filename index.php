<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php


    try {
        $ipserver = "localhost";

        $nomBase = "projet_php";
        $loginPrivilege = "userWeb";
        $passwordPrivilege = "password";


        $pdo = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passwordPrivilege);
        ;
        echo "connexion ok";
    } catch (Exception $error) {
        $error->getMessage();
    }

    if (isset($_POST['connexion'])) {
        echo "vous avez saisi" . " " . $_POST['login'] . " et " . $_POST['pass'] . " en password ";
        $requeteSql = "SELECT * FROM `User` WHERE `login`='" . $_POST['login'] . "' AND `pass`='" . $_POST['pass'] . "';";

        $resultat = $pdo->query($requeteSql);

        if ($resultat->rowCount() > 0) {
            echo ('c est tout bon');
        } else {
            echo ('C esst pas bon');
        }

    } else {
        echo "veuillez vous identifier";
    }


    ?>

    <form action="" method="post">
        Login: <input type="text" name="login" />
        Pass: <input type="password" name="pass" />
        <input type="submit" name="connexion" />

    </form>

</body>

</html>