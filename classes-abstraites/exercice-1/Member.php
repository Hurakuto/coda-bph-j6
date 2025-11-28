<?php
class Member extends AbstractUser{

    // use Print_all;

    private array $favorites = [];
    protected string $role;

    public function __construct(protected string $username, protected string $password, private string $biography){
        $this->role = "MEMBER";
    }

    public function getFavorites(){
        foreach($this->favorites as $favorite){
            echo $favorite;
        }
    }

    public function setFavorites($favorites){
        
    }

    public function getBiography(){
        return $this->biography;
    }

    public function setBiography($biography){
        $this->biography = $biography;
    }
}
?>