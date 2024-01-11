<?php $title = "Le blog de l'AVBN"; ?>

<?php ob_start(); ?>
<h1>Le super blog de l'AVBN !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['french_creation_date'] ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php
foreach ($comments as $comment) {
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['french_creation_date'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>

<h2>Ajout commentaire</h2>

<form action="index.php?action=addcomment&id= <?php echo ($post['id']) ?>" method="POST" enctype="multipart/form-data">
    <div>
        <label for="author">Auteur : </label>
        <input type="text" id="author" name="author">
    </div>
    <div>
        <label for="comment">Commentaire : </label>
        <br>
        <textarea name="comment" id="comment" cols="60" rows="10"></textarea>
    </div>

    <input type="submit" value="Ajouter">

</form>
