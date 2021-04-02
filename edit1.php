<?php
require_once('connect.php');

if(isset($_POST)){
    if(isset($_POST['id'])
        && isset($_POST['nom'])){
            
        $id = strip_tags($_GET['id']);
        $nom = strip_tags($_POST['nom']);
        
        $sql = "UPDATE `styles` SET `style_name`=:nom WHERE `style_id`=:id;";

        $query = $dbco->prepare($sql);

        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();

        header('Location: index.php');
    }
}


    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `styles` WHERE `style_id`=:id;";

    $query = $dbco->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail d'un style</title>

</head>
<body>
    <h1>Modifier un style</h1>
    <form method="post">
        <p>
            <label for="nom">Genre</label>
            <input type="text" name="nom" id="nom" value="<?= $result['style_name'] ?>" required>
        </p>
        <p>
            <button>Enregistrer</button>
        </p>
        <input type="hidden" name="id" value="<?= $result['id'] ?>">
    </form>
</body>
</html>