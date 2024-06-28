<?php 
session_start();
require_once '../src/config/db.php';
require_once '../src/repository/autheurRepository.php';


$pdo = connectDB();
$authors=getAllAuthors($pdo);
?>

<!-- Créer un formmulaire pour ajouter un nouveau livre -->
 <!DOCTYPE html>
 <html lang="fr">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Document</title>
 </head>
 <body>
    <h2>Ajout d'un livre</h2>
    <form action="../src/traitement.php" method="post">
    <div>
        <label for="name">Nom du livre</label>
        <input type="text" id="name" name="name">
    </div>
    <div>
        <label for="description">Description du livre</label>
        <textarea name="description" id="description"></textarea>
    </div>
    <div>
        <label for="year">Année de sortie</label>
        <input type="number" id="year" name="year" step="1" min="0" max="9999">
    </div>
    <div>
        <label for="formulaire">Autheur</label>
        <!-- Champs de formulaire pour afficher la liste des auteurs -->
         <select name="autheur" id="formulaire">
            <?php 
            foreach($authors as $author){?>
                <option value="<?= $author['id'] ?>"><?= $author['nom'] ?> <?= $author['prenom'] ?></option>
            <?php } ?>
            
         </select>
    </div>
    <input type="submit" value="J'ajoute">
    <?php 
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    
    ?>
    </form>
 </body>
 </html>