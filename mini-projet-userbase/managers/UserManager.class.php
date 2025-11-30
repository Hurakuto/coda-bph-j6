<?php
require_once __DIR__ . '/../models/User.class.php';
class UserManager
{

    private array $users = [];
    private PDO $db;

    public function __construct()
    {
        $host = "localhost";
        $port = "3306";
        $dbname = "coda_bph_j6_userbase";
        $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

        $user = "root";
        $password = "demopma";

        $this->db = new PDO(
            $connexionString,
            $user,
            $password
        );
    }

    public function getUsers()
    {
        return $this->users;
    }

    public function setUsers($users)
    {
        $this->users = $users;
    }

    public function loadUsers()
    {
        $query = $this->db->prepare('SELECT * from users');
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_ASSOC);

        $tab_u = [];
        foreach ($users as $user) {
            $newUser = new User($user['username'], $user['email'], $user['password'], $user['role']);
            $newUser->setId($user['id']);
            $tab_u[] = $newUser;
        }

        $this->setUsers($tab_u);
    }

    public function saveUser(User $user)
    {
        $query = $this->db->prepare('INSERT INTO users(username, email, password, role, created_at) VALUES(:username, :email, :password, :role, CURRENT_DATE)');
        $parameters = [
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole()
        ];
        $query->execute($parameters);
    }

    public function deleteUser(User $user)
    {
        $tab_u = [];
        foreach ($this->users as $l_user) {
            if ($l_user->getId() != $user->getId()) {
                $tab_u[] = $l_user;
            }
        }

        $this->users = $tab_u;

        $query = $this->db->prepare('DELETE FROM users WHERE id=:id');
        $parameters = [
            'id' => $user->getId()
        ];
        $query->execute($parameters);
    }
}
?>