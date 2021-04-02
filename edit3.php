<?php
require_once('connect.php');

if(isset($_POST)){
    if(isset($_POST['id'])
        && isset($_POST['artisteID'])
        && isset($_POST['styleID'])
        ){
            
        $id = strip_tags($_GET['id']);
        $artisteID=strip_tags($_POST['artisteID']);
        $styleID=strip_tags($_POST['styleID']);
        
        $sql = "UPDATE `assoc_artistes_styles` 
                SET `assoc_artiste_id`=:artisteID, `assoc_style_id`=:styleID 
                WHERE `assoc_id`=:id;";

        $query = $dbco->prepare($sql);

        $query->bindValue(':artisteID', $artisteID, PDO::PARAM_INT);
        $query->bindValue(':styleID', $styleID, PDO::PARAM_INT);
        $query->bindValue(':id', $id, PDO::PARAM_INT);

        $query->execute();

        header('Location: index.php');
    }
}


    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `assoc_artistes_styles` WHERE `assoc_id`=:id;";

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
    <title>Liste des produits</title>

</head>
<body>
    <h1>Modifier une association</h1>
    <form method="post">
        <p>
            <label for="artisteID">ArtisteID</label>
            <input type="int" name="artisteID" id="artisteID" value="<?= $result['assoc_artiste_id'] ?>" required>
        </p>
        <p>
            <label for="styleID">StyleID</label>
            <input type="int" name="styleID" id="styleID" value="<?= $result['assoc_style_id'] ?>" required>
        </p>
        <p>
            <button>Enregistrer</button>
        </p>
        <input type="hidden" name="id" value="<?= $result['id'] ?>">
    </form>
</body>
</html>