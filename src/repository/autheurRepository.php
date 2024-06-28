<?php 
function getAllAuthors($conn){
    $stmt=$conn->query('SELECT * FROM author');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function createdBook($livres,$nom_livres,$description,$annee,$idAutheur){
    $stmt=$livres->prepare("INSERT INTO book (nom,description,annee_parution,id_auteur) VALUES (:titre, :description, :annee, :id)");

    $stmt->bindParam(':titre',$nom_livres);
    $stmt->bindParam(':description',$description);
    $stmt->bindParam(':annee',$annee);
    $stmt->bindParam(':id',$idAutheur,PDO::PARAM_INT);

    $stmt->execute();
}
?>
