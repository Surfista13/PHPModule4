<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <?php
        try{
            $dsn="mysql:host=localhost;dbname=demo";
            $pdo= new PDO($dsn,"root","2099Bogus");
            $query = "SELECT id,nom,prenom from utilisateur;";
            $pstmt = $pdo->prepare($query);
            $pstmt->execute();
            $resultats = $pstmt->fetchAll();
            echo'<ul>';
            foreach ($resultats as $element){
                echo'<li>'.$element['nom'].'</li>';
            }
            echo'</ul>';
        }catch(PDOException $exception){
            echo $exception->getMessage();
        }
    ?>
</body>
</html>



