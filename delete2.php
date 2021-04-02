<?php
session_start();    

    require_once('connect.php');

// on nettoie l'id envoyé des balises HTML
    $id=strip_tags($_GET['id']);

//on prepare la requete
    $sth = $dbco->prepare("SELECT * FROM artistes WHERE artiste_id=:id;");

//on accroche les parametre id
    $sth->bindvalue(':id',$id,PDO::PARAM_INT);

//on execute la requete
    $sth->execute();

//on recupere le produit
    $nom = $sth->fetch();

//on prepare la requete
    $sth = $dbco->prepare("DELETE FROM artistes WHERE artiste_id=:id;");

//on accroche les parametre id
    $sth->bindvalue(':id',$id,PDO::PARAM_INT);

//on execute la requete
    $sth->execute();
    $_SESSION['message'] = "L'artiste est supprimé";
    header('Location:index.php');
?>