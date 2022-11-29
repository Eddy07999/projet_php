<?php session_start();

include("./classes/User.php");

$TheUser = new User(null, null, null);

try {
    $ipserver = "localhost";

    $nomBase = "projet_php";
    $loginPrivilege = "userWeb";
    $passwordPrivilege = "password";


    $GLOBALS["pdo"] = new PDO('mysql:host=' . $ipserver . ';dbname=' . $nomBase . '', $loginPrivilege, $passwordPrivilege);
    ;
    // echo "connexion ok";
} catch (Exception $error) {
    $error->getMessage();
}

if (isset($_POST['connexion'])) {
    // echo "vous avez saisi" . " " . $_POST['login'] . " et " . $_POST['pass'] . " en password ";
    $TheUser->seConnecter($_POST['login'], $_POST['pass']);

}




if (isset($_POST["deconnexion"])) {
    echo "Vous etes déconnecté";
    session_unset();
    session_destroy();

}

if (isset($_SESSION['Connexion']) && $_SESSION['Connexion'] == true) {
    echo "vous etes deja connecté";


?>
<form action="" method="post">

    <input type="submit" name="deconnexion" value="Se déconnecter" />
    <a href="page2.php">page 2</a>

</form>
<?php
} else {
    echo "  veuillez vous identifier";
?>
<form action="" method="post">
    Login: <input type="text" name="login" />
    Pass: <input type="password" name="pass" />
    <input type="submit" name="connexion" />


</form>
<?php
}



?>