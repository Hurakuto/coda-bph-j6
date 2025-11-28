<?php
class PostManager extends AbstrasctManager
{

    public function __constrcut()
    {
        parent::__construct();
    }

    public function findAll(): array
    {
        $tab = [];
        $query = $this->db->prepare('SELECT * FROM posts');
        $query->execute();
        $Posts = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($Posts as $post) {
            $c = new Post($post['title'], $post['excerpt'], $post['content'], $post['author'], new DateTime($post['created_at']));
            $c->setId($post['id']);
            $tab[] = $c;
        }

        return $tab;
    }

    public function findOne(int $id): ?Post
    {
        $query = $this->db->prepare('SELECT * FROM posts WHERE id=:id');
        $parameter = [
            'id' => $id
        ];
        $query->execute($parameter);
        $post = $query->fetch(PDO::FETCH_ASSOC);

        if ($post === NULL) {
            return NULL;
        }

        $u = new Post($post['title'], $post['excerpt'], $post['content'], $post['author'], new DateTime($post['created_at']));
        $u->setId($post['id']);
        return $u;
    }

    public function create(Post $post)
    {
        $query = $this->db->prepare('INSERT INTO posts (title, excerpt, content, author, created_at) VALUES(:title, :excerpt, :content, :author, :created_at)');
        $parameters = [
            'title' => $post->getTitle(), 
            'excerpt' => $post->getExcerpt(),
            'content' => $post->getContent(),
            'author' => $post->getAuthor(),
            'created_at' => $post->getCreated_at()->format('Y-m-d H:i:s')
        ];
        $query->execute($parameters);
    }

    public function update(Post $post)
    {
        $query = $this->db->prepare('UPDATE posts SET title=:title, excerpt=:excerpt, content=:content, author=:author, created_at=:created_at WHERE id=:id');
        $parameters = [
            'id' => $post->getId(),
            'title' => $post->getTitle(), 
            'excerpt' => $post->getExcerpt(),
            'content' => $post->getContent(),
            'author' => $post->getAuthor(),
            'created_at' => $post->getCreated_at()->format('Y-m-d H:i:s')
        ];
        $query->execute($parameters);
    }

    public function delete(int $id)
    {
        $query = $this->db->prepare('DELETE FROM posts WHERE id=:id');
        $parameters = [
            'id' => $id
        ];
        $query->execute($parameters);
    }
}
?>