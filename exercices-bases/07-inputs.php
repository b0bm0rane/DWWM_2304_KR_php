<?php

// Fini : 7.A, 7.B, 7.C 
// Reste : 

function stringLength(string $mdp) : bool 
{
    if(strlen($mdp) >= 9){
        return true;
    }

    else{
        return false;
    }
}

//echo var_dump(stringLength("Kévin"));
//echo var_dump(stringLength("Roussotte"));

function passwordCheck(string $mdp) : bool
{
    if(stringLength($mdp) && preg_match("/[a-z]/", $mdp) && preg_match("/[A-Z]/", $mdp) && preg_match("/[0-9]/", $mdp) && !preg_match("/[ ]/", $mdp)){
        return true;
    // if(stringLength($mdp) && preg_match("/[^a-zA-Z0-9]/", $mdp)){
    //     return true;
    }

    else{
        return false;
    }
}

// echo var_dump(passwordCheck("kevin"));
// echo var_dump(passwordCheck("kevin1"));
// echo var_dump(passwordCheck("KEVIN"));
// echo var_dump(passwordCheck("KEVIN1"));
// echo var_dump(passwordCheck("Kevin"));
// echo var_dump(passwordCheck("Kevin1"));
// echo var_dump(passwordCheck("roussotte"));
// echo var_dump(passwordCheck("roussotte1"));
// echo var_dump(passwordCheck("ROUSSOTTE"));
// echo var_dump(passwordCheck("ROUSSOTTE1"));
// echo var_dump(passwordCheck("Roussotte"));
// echo var_dump(passwordCheck("Roussotte1"));
// echo var_dump(passwordCheck("Rous sot te1 "));

$users = [
    "joe" => "Azer1234!",
    "jack" => "Azer-1234",
    "admin" => "1234_Azer"
];

function userLogin(string $username, string $password, array $arrayUsers) : bool
{
    global $users; // global car extérieur

    if(array_key_exists($username, $arrayUsers) && passwordCheck($password) && $password == $arrayUsers[$username]) {
        return true;
    }

    else{
        return false;
    }
}

$id_renseigner = "joe";
$mdp_renseigner = "Azer1234!";

echo var_dump(userLogin($id_renseigner, $mdp_renseigner, $users));

// echo var_dump($users);




// <?php 
// $users = [
//     'joe' => 'Azer1234!', 
//     'jack' => 'Azer-4321', 
//     'admin' => '1234_Azer',
// ];

// $nomDutilisateur = "joe";
// $motDePasseAtester = "Azer1234!";

// // si le tableau d'utilisateurs contient "$nomDutilisateur"
// if(array_key_exists($nomDutilisateur, $users)) {
//     $utilisateur = $users[$nomDutilisateur];
// }

// if(array_key_exists("joe", $users)
// {
//     $users["joe"]

// var_export($users["joe"]);
