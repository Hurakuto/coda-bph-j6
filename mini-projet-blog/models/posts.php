<?php

class Post extends User{

    private ? int $id = NULL;
    private array $categories = [];

    public function __construct(private string $title, private string $excerpt, private string $content, private int $author, private datetime $created_at){

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

    public function getExcerpt(){
        return $this->excerpt;
    }

    public function setExcerpt($excerpt){
        $this->excerpt = $excerpt;
    }

    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function setAuthor($author){
        $this->author = $author;
    }

    public function getCreated_at(){
        return $this->created_at;
    }

    public function setCreated_at($created_at){
        $this->created_at = $created_at;
    }

    public function getCategories(){
        foreach($this->categories as $categorie){
            echo $categorie;
        }
    }

    public function setCategories($categories){
        $this->categories[] = $categories;
    }

    public function addCategory(Categorie $categorie){
        foreach($this->categories as $c){
            if($c===$categorie){
                return;
            }
        }

        $this->setCategories($categorie);
    }

    public function removeCategory(Categorie $categorie){
        foreach($this->getCategories() as $c){
            $new_categories[] = $c;
        }

        $this->categories = [];

        foreach($new_categories as $c){
            if($c!=$categorie){
                $this->addCategory($c);
            }
        }
    }
}
?>