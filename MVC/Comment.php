<?php

class Comment
{
    public string $author;
    public string $french_creation_date;
    public string $comment;
}

// $commentaire = new Comment();
// $commentaire->$author = "Kévin";
// $commentaire->$french_creation_date = "10/01/2024 à 14h40";
// $commentaire->$comment = "Bonjour";

function getComments($identifier) : array
{
    $database = dbConnect();
    $statement = $database->prepare(
        "SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC"
    );
    $statement->execute([$identifier]);

    $comments = [];
    while (($row = $statement->fetch())) {
        $comment = [
            'author' => $row['author'],
            'french_creation_date' => $row['french_creation_date'],
            'comment' => $row['comment'],
        ];

        $comments[] = $comment;
    }

    return $comments;
}
