<?php
class CategoryManager extends AbstrasctManager
{

    public function __constrcut()
    {
        parent::__construct();
    }

    public function findAll(): array
    {
        $tab = [];
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();
        $categories = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($categories as $category) {
            $c = new Categorie($category['title'], $category['description']);
            $c->setId($category['id']);
            $tab[] = $c;
        }

        return $tab;
    }

    public function findOne(int $id): ?Categorie
    {
        $query = $this->db->prepare('SELECT * FROM categories WHERE id=:id');
        $parameter = [
            'id' => $id
        ];
        $query->execute($parameter);
        $category = $query->fetch(PDO::FETCH_ASSOC);

        if ($category === NULL) {
            return NULL;
        }

        $u = new Categorie($category['title'], $category['description']);
        $u->setId($category['id']);
        return $u;
    }

    public function create(Categorie $category)
    {
        $query = $this->db->prepare('INSERT INTO categories (title, description) VALUES(:title, :description)');
        $parameters = [
            'title' => $category->getTitle(), 
            'description' => $category->getDescription()
        ];
        $query->execute($parameters);
    }

    public function update(Categorie $category)
    {
        $query = $this->db->prepare('UPDATE categories SET title=:title, description=:description WHERE id=:id');
        $parameters = [
            'id' => $category->getId(),
            'title' => $category->getTitle(), 
            'description' => $category->getDescription()
        ];
        $query->execute($parameters);
    }

    public function delete(int $id)
    {
        $query = $this->db->prepare('DELETE FROM categories WHERE id=:id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
    }
}
?>