<?php
class UserManager {

    private $_db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }

    // Ajouter un utilisateur
    public function add(User $account) {
        $q = $this->_db->prepare('INSERT INTO accounts SET password = :password, email = :email, role = :role, registration_date = NOW(), data = :data');

        $q->bindValue(':password',$account->password);
        $q->bindValue(':email',$account->email);
        $q->bindValue(':role',$account->role);
        $q->bindValue(':jsondata',$account->jsondata);

        $q->execute();

        return ($this->_db->lastInsertId());
    }

    // Supprimer un utilisateur
    public function delete(User $account) {
        $q = $this->_db->prepare('DELETE FROM accounts WHERE id = :id');
        $q->bindValue(':id',$account->id);
        $q->execute();
        return (true);
    }

    // Renvois un objet User selon l'id
    public function get($id) {
        if($id = filter_var($id,FILTER_VALIDATE_INT))
        {
            $q = $this->_db->prepare('SELECT * FROM accounts WHERE id = :id');
            $q->bindValue(':id',$id);
            $q->execute();
            $userData = $q->fetch(PDO::FETCH_ASSOC);
            $user = new User;
            if ($userData !== false) {
                $user->hydrate($userData);
            }
            return ($user);
        }
        return (false);
    }

    // Renvois un objet User selon l'email
    public function getByEmail($email) {
        $q = $this->_db->prepare('SELECT * FROM accounts WHERE email = :email');
        $q->bindValue(':email',$email);
        $q->execute();
        $userData = $q->fetch(PDO::FETCH_ASSOC);
        $user = new User;
        if ($userData !== false) {
            $user->hydrate($userData);
        }
        return $user;
    }

    public function getAll() {
        $q = $this->_db->query('SELECT * FROM accounts');
        $data = $q->fetchAll();
        return ($data);
    }

    // 
    public function getCount() {
        $q = $this->_db->query('SELECT count(id) FROM accounts');
        return $q->fetch()[0];
    }

    public function update(User $account) {
        $q = $this->_db->prepare('UPDATE accounts SET password = :password, email = :email, email = :email, role = :role, jsondata = :jsondata WHERE id = :id');

        $q->bindValue(':id',$account->id);
        $q->bindValue(':password',$account->password);
        $q->bindValue(':email',$account->email);
        $q->bindValue(':role',$account->role);
        $q->bindValue(':jsondata',$account->jsondata);

        $q->execute();
        return (true);
    }
}

?>