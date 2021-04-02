<?php
//connection à la bdd
require_once('connect.php');

session_start();

//on verifie les les variables sont définies et non vides
if($_POST){
      
        
        
            $artisteID=strip_tags($_POST['artisteID']);
            $styleID=strip_tags($_POST['styleID']);
                    
        // on prepare la requete
            $sql='INSERT INTO `assoc_artistes_styles` (`assoc_artiste_id`,`assoc_style_id`) 
                  VALUES (:artisteID, :styleID);';
    
            $query=$dbco->prepare($sql);

        // on lie les valeurs

            $query->bindvalue(':artisteID',$artisteID,PDO::PARAM_INT);
            $query->bindValue(':styleID',$styleID,PDO::PARAM_INT);
            
        //on execute la requete
            $query->execute();

            $_SESSION['message'] = "Association ajoutée";
            header('Location:index.php');
}
?>           
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Artistes</title>
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
            <h1>Ajouter une association</h1>
            <form method="post">
                <div>
                   <label for="artisteID">ArtisteID</label> 
                   <input type="int" id="artisteID" name="artisteID" required>
                </div>
                <div>
                    <label for="styleID">StyleID</label> 
                    <input type="int" id="styleID" name="styleID" required>
                </div>
                <button>Envoyer</button>
            </form>
        </section>
    </main>
</body>
</html>