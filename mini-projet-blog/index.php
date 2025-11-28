<?php
require "all_classes.php";

// $u = new User("nom_du_user", "user@name.com", "password_du_user", "ADMIN", new DateTime('2016-01-07 13:53:51'));
// var_dump($u);

$p = new Post("titre_du_post", "test", "<h1>test</h1>", 1, new DateTime('2016-01-07 17:53:51'));
// var_dump($p);

// $c = new Categorie("titre_de_la_categorie", "description_de_la_categorie");
// var_dump($c);

// $p->addCategory($c);
// $c->addPost($p);

// var_dump($p);
// echo '<br><br>';
// var_dump($c);

// $user_m = new UserManager();

// var_dump($user_m->findAll());
// var_dump($user_m->findOne(2));
// var_dump($user_m->create($u));
// var_dump($user_m->delete(9));

// $cat_m = new CategoryManager();

// var_dump($cat_m->findAll());
// var_dump($cat_m->findOne(2));
// var_dump($cat_m->create($c));
// var_dump($cat_m->delete(5));

$post_m = new PostManager();

var_dump($post_m->findAll());
var_dump($post_m->findOne(2));
// var_dump($post_m->create($p));
// var_dump($post_m->delete(7));

?>