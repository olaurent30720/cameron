<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
            $servername = 'localhost';
            $username = 'olaurent';
            $password = 'asdr';
            $dbname = 'cameron';
            
            //On essaie de se connecter

            try{
                $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                //On définit le mode d'erreur de PDO sur Exception
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
            
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/

            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
            
        ?>
</body>
</html>