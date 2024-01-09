<?php

include('src/model.php');

function addComment(string $_id, array $_input): void
{
    $author = null;
    $comment = null;
    if (!empty($_input['author']) && !empty($_input['comment'])) {
        $author = $_input['author'];
        $comment = $_input['comment'];
    } else {
        die('Veuillez remplir tous les champs!');
    }

    $success = createComment($_id, $author, $comment);
    if (!$success) {
        die('Impossible d\'ajouter le commentaire!');
    } else {
        header('Location:index.php?action=post&id=' . $_id);
    }
}
