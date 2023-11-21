<?php

function helloWorld() : void 
{
    echo "Hello World ! ";
}

helloWorld();

function hello(string $name) : string
{
    return "Hello $name ! ";
}

echo hello("Kévin");

function newHelloWorld(string $name) : string
{
    if($name !== '')
    {
        return 'Hello ' . $name . ' ! ';
    }
    else
    {
        return 'Hello Nobody ! ';
    }
}

echo newHelloWorld('Kévin');
echo newHelloWorld('');
