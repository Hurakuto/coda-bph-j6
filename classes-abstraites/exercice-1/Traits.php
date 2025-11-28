<?php
trait Print_all {
    public function print() : void
    {
        // ici on récupère toutes les méthodes d'une classe
        $methods = get_class_methods($this);

        // je parcours toutes les méthodes
        foreach($methods as $method)
        {
            // je vérifie si le nom de la méthode contient le mot get
            if(str_contains($method, "get"))
            {
                // j'echo le retour de la méthode
                echo $this->$method() . "<br>";
            }
        }
    }
}
?>