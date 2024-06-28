<?php

function getAllBooks($pdo)
{
    $stmt = $pdo->query('SELECT * FROM book');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getBookDetailsById($pdo, $bookId)
{
    $stmt = $pdo->prepare(
        'SELECT book.*, author.nom, author.prenom, author.date_naissance, author.pays_orgine
        FROM book
        JOIN author ON book.id_auteur = author.id
        WHERE book.id = :bookId'
    );
    $stmt->bindParam(':bookId', $bookId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
