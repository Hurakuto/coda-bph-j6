<?php
class Categorie{

    private ? int $id = NULL;
    private array $posts = [];

    public function __construct(private string $title, private string $description){

    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }



    public function getPost(){
        foreach($this->posts as $post){
            echo $post;
        }
    }

    public function setPost($post){
        $this->posts[] = $post;
    }



    public function addPost(Post $post){
        foreach($this->posts as $p){
            if($p===$post){
                return;
            }
        }

        $this->setPost($post);
    }

    public function removePost(Post $post){
        foreach($this->getPost() as $p){
            $new_posts[] = $p;
        }

        $this->posts = [];

        foreach($new_posts as $p){
            if($p!=$post){
                $this->addPost($p);
            }
        }
    }
}
?>