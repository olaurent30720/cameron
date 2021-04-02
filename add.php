<?php
require_once('connect.php');

session_start();


if($_POST){
      
            $nom=strip_tags($_POST['nom']);
            $sql='INSERT INTO `genres` (`genre_name`) 
                  VALUES (:nom);';
            $query=$dbco->prepare($sql);
            $query->bindvalue(':nom',$nom,PDO::PARAM_STR);
            $query->execute();

            $_SESSION['message'] = "Genre ajouté";
            header('Location:index.php');
}
?>           
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajout d'un genre'</title>
</head>
<body>
    <main class="conteneur">
        <section class="col-12">
            <?php
            if(!empty($_SESSION['erreur'])){
                echo'<div>'.$_SESSION['erreur'].'</div>';
                $_SESSION['erreur']="";
            }
            ?>
            <h1>Ajouter un genre</h1>
            <form method="post">
                <div>
                   <label for="nom">nom</label> 
                   <input type="text" id="nom" name="nom" required>
                </div>
                
                <button>Envoyer</button>
            </form>
        </section>
    </main>
</body>
</html>