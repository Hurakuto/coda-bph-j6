<?php
require "AbstractUser.php";

$m = new Member("Nom_du_membre", "son_password", "la_bio");
echo $m->getUsername().' '.$m->getPassword().' '.$m->getRole().' '.$m->getBiography().' '.$m->getFavorites().'<br>';
$a = new Admin("Nom_de_l'admin", "son_password");
echo $m->getUsername().' '.$m->getPassword().' '.$a->getRole().'<br><br>';


$a->changeMemberRole($m);

echo $m->getUsername().' '.$m->getPassword().' '.$m->getRole().' '.$m->getBiography().' '.$m->getFavorites().'<br>';

$a->changeMemberRole($m);

echo $m->getUsername().' '.$m->getPassword().' '.$m->getRole().' '.$m->getBiography().' '.$m->getFavorites().'<br>';
?>