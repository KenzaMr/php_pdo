<?php 
require_once './config/db.php';
require_once'./repository/autheurRepository.php';

session_start();
var_dump($_POST);
if($_SERVER['REQUEST_METHOD'] ==='POST'){
    if(!isset($_POST['name']) ||
    !isset($_POST['description']) ||
    !isset($_POST['year']) ||
    !isset($_POST['autheur']) ||
    empty($_POST['name']) ||
    empty($_POST['description']) ||
    empty($_POST['year']) ||
    empty($_POST['autheur'])){
        $_SESSION['message']='Veuillez recommencer';
        header('Location: ../view/addbook.php');
        exit;
    }
    // Récuperer les données du formulaire
    $nameL=trim($_POST['name']);
    $descripL=trim($_POST['description']);
    $dateL=trim($_POST['year']);
    $authorL=trim($_POST['autheur']);
    // Insertion dans la base de données 
    $test=connectDB();
    createdBook($test,$nameL,$descripL,$dateL,$authorL);
    echo 'tu as réussie';

    // Redirection ou affichage 
    $_SESSION['message']='Tu as réussis';
    header('Location: ../view/addbook.php');
    exit();
}

/*
if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['year'])&& isset($_POST['autheur']) && !empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['year'])&& !empty($_POST['autheur'])){
    echo'tout est carré, tu as réussie à ajouter le livre';
    $nameL=$_POST['name'];
    $descripL=$_POST['description'];
    $dateL=$_POST['year'];
    $authorL=$_POST['autheur'];

    $nameL=trim($_POST['name']);
    $descripL=trim($_POST['description']);
    $dateL=trim($_POST['year']);
    $authorL=trim($_POST['autheur']);

    if(gettype($dateL) =='number'){
        echo 'La date est sous une bonne forme ';
    }
    
}
else{
    echo 'Recommences il manque des données';
};
*/
?>
