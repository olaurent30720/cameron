<?php
//connection à la bdd
require_once('connect.php');

session_start();

//on verifie les les variables sont définies et non vides
if($_POST){
      
        
        
            $nom=strip_tags($_POST['nom']);
                    
        // on prepare la requete
            $sql='INSERT INTO `styles` (`style_name`) 
                  VALUES (:nom);';
    
            $query=$dbco->prepare($sql);

        // on lie les valeurs

            $query->bindvalue(':nom',$nom,PDO::PARAM_STR);
            
        //on execute la requete
            $query->execute();

            $_SESSION['message'] = "Style ajouté";
            header('Location:index.php');
}
?>           
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Style'</title>
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
            <h1>Ajouter un style</h1>
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