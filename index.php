<?php

session_start();

    require_once('connect.php');

    $sql='SELECT * FROM `genres`';
    $query = $dbco->prepare($sql);
    $query->execute();
    $resultat = $query->fetchAll(PDO::FETCH_ASSOC);

    $sql1='SELECT * FROM `styles`';
    $query1 = $dbco->prepare($sql1);
    $query1->execute();
    $resultat1 = $query1->fetchAll(PDO::FETCH_ASSOC);

    $sql2='SELECT * FROM `artistes`';
    $query2 = $dbco->prepare($sql2);
    $query2->execute();
    $resultat2 = $query2->fetchAll(PDO::FETCH_ASSOC);

    $sql3='SELECT * FROM `assoc_artistes_styles`';
    $query3 = $dbco->prepare($sql3);
    $query3->execute();
    $resultat3 = $query3->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identité</title>
    <link rel="stylesheet" href="enforme.css">
</head>
<body>
<?php
            if(!empty($_SESSION['erreur'])){
                echo'<div>'.$_SESSION['erreur'].'</div>';
                $_SESSION['erreur']="";
            }
            if(!empty($_SESSION['message'])){
                echo'<div>'.$_SESSION['message'].'</div>';
                $_SESSION['message']="";
            }
?>
<h1>Genres</h1>
   <table>
        <thead>
            <td>Id</td>
            <td>nOm du genre</td>
            <td>Opérations</td>
        </thead>
        <tbody>
        <?php
        foreach($resultat as $soustab){
            ?>
            <tr>
            <td><?=$soustab['genre_id']?></td>
            <td><?=$soustab['genre_name']?></td>
            <td><a href="delete.php?id=<?=$soustab['genre_id']?>">Supprimer</a>
                <a href="edit.php?id=<?=$soustab['genre_id']?>">Modifier</a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
        <a href="add.php">Ajouter un genre</a>


        <?php
            if(!empty($_SESSION['erreur'])){
                echo'<div>'.$_SESSION['erreur'].'</div>';
                $_SESSION['erreur']="";
            }
            if(!empty($_SESSION['message'])){
                echo'<div>'.$_SESSION['message'].'</div>';
                $_SESSION['message']="";
            }
            ?>
    <h1>Styles</h1>
   <table>
        <thead>
            <td>Id</td>
            <td>Nom du style</td>
            <td>Opérations</td>
        </thead>
        <tbody>
        <?php
        foreach($resultat1 as $soustab){
            ?>
            <tr>
            <td><?=$soustab['style_id']?></td>
            <td><?=$soustab['style_name']?></td>
            <td><a href="delete1.php?id=<?=$soustab['style_id']?>">Supprimer</a>
                <a href="edit1.php?id=<?=$soustab['style_id']?>">Modifier</a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
        <a href="add1.php">Ajouter un style</a>
        <?php
            if(!empty($_SESSION['erreur'])){
                echo'<div>'.$_SESSION['erreur'].'</div>';
                $_SESSION['erreur']="";
            }
            if(!empty($_SESSION['message'])){
                echo'<div>'.$_SESSION['message'].'</div>';
                $_SESSION['message']="";
            }
            ?>
    <h1>Artistes</h1>
   <table>
        <thead>
            <td>Id</td>
            <td>Nom de l'artiste</td>
            <td>Opérations</td>
        </thead>
        <tbody>
        <?php
        foreach($resultat2 as $soustab){
            ?>
            <tr>
            <td><?=$soustab['artiste_id']?></td>
            <td><?=$soustab['artiste_name']?></td>
            <td><a href="delete2.php?id=<?=$soustab['artiste_id']?>">Supprimer</a>
                <a href="edit2.php?id=<?=$soustab['artiste_id']?>">Modifier</a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
        <a href="add2.php">Ajouter un artiste</a>
    
        
        <?php
            if(!empty($_SESSION['erreur'])){
                echo'<div>'.$_SESSION['erreur'].'</div>';
                $_SESSION['erreur']="";
            }
            if(!empty($_SESSION['message'])){
                echo'<div>'.$_SESSION['message'].'</div>';
                $_SESSION['message']="";
            }
            ?>
    <h1>Association Artiste et Style</h1>
   <table>
        <thead>
            <td>Id</td>
            <td>ID de l'artiste</td>
            <td>ID du Style</td>
            <td>Opérations</td>
        </thead>
        <tbody>
        <?php
        foreach($resultat3 as $soustab){
            ?>
            <tr>
            <td><?=$soustab['assoc_id']?></td>
            <td><?=$soustab['assoc_artiste_id']?></td>
            <td><?=$soustab['assoc_style_id']?></td>
            <td><a href="delete3.php?id=<?=$soustab['assoc_id']?>">Supprimer</a>
                <a href="edit3.php?id=<?=$soustab['assoc_id']?>">Modifier</a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
        <a href="add3.php">Ajouter une association</a>
</body>
</html>