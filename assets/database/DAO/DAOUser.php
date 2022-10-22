<?php
require_once './assets/database/connection/connection.php';

class DaoUser {
    public function insertUser(User $user) {
        $sql = 'INSERT INTO user (name, email, password, cpf) VALUES (?, ?, ?, ?);';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $user->getName());
        $pst->bindValue(2, $user->getEmail());
        $pst->bindValue(3, $user->getPassword());
        $pst->bindValue(4, $user->getCpf());

        if($pst->execute()) return true;
        else return false;
    }

    public function listUser() {
        $listUser = [];
        $pst = Connection::getPreparedStatement('SELECT * FROM user;');
        $pst->execute();
        $listUser = $pst->fetchAll(PDO::FETCH_ASSOC);
        
        return $listUser;
    }

    public function searchUser() {
        $listUser = [];
        $sql = 'SELECT * FROM user WHERE id = ?';
        $pst = Connection::getPreparedStatement($sql);
        $pst->execute();
        $listUser = $pst->fetch(PDO::FETCH_ASSOC);

        return $listUser;
    }

    public function updateUser(User $user) {
        $sql = $sql = 'UPDATE user SET name = ?, email = ?, password = ? cpf = ? WHERE id = ?';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $user->getName());
        $pst->bindValue(2, $user->getEmail());
        $pst->bindValue(3, $user->getPassword());
        $pst->bindValue(4, $user->getCpf());

        if($pst->execute()) return $pst->rowCount();
        else return false;
    }

    public function deleteUser(User $user) {
        $sql = 'DELETE FROM users WHERE id = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $user->getId());

        if($pst->execute()) return $pst->rowCount();
        else return false;
    }
}