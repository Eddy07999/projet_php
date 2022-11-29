<?php


class User
{

    private $id_;
    private $isAdmin_ = false;
    private $login_;

    public function __construct($id, $isAdmin, $login)
    {
        $this->id_ = $id;
        $this->isAdmin_ = $isAdmin;
        $this->login_ = $login;
    }
    public function seConnecter($login, $pass)
    {

        $requeteSql = "SELECT * FROM `User` WHERE `login`='" . $_POST['login'] . "' AND `pass`='" . $_POST['pass'] . "';";

        $resultat = $GLOBALS["pdo"]->query($requeteSql);

        if ($resultat->rowCount() > 0) {
            // echo ('c est le bon login');
            $_SESSION['Connexion'] = true;
            return true;
        } else {
            echo ('C esst pas bon');
            return false;
        }
    }


}

?>