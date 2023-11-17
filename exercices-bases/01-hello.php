<?php

function helloWorld() : void 
{
    echo "Hello World ! ";
}

helloWorld();

function hello(string $name) : string
{
    return "Hello $name";
}

echo hello("Kévin");
