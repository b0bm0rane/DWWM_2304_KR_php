<?php

require_once('src/model.php');

function homepage()
{
    $posts = getPosts();

    require('src/templates/homepage.php');
}
