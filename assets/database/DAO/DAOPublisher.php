<?php
require_once './assets/database/connection/connection.php';

class DaoPublisher {
    public function insertPublisher(Publisher $pub) {
        $sql = 'INSERT INTO publisher (name) VALUES (?);';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $pub->getName());

        if($pst->execute()) return true;
        else return false;
    }

    public function listPublisher() {
        $listPublisher = [];
        $pst = Connection::getPreparedStatement('SELECT * FROM publisher;');
        $pst->execute();
        $listPublisher = $pst->fetchAll(PDO::FETCH_ASSOC);
        
        return $listPublisher;
    }

    public function searchPublisher() {
        $listPublisher = [];
        $sql = 'SELECT * FROM publisher WHERE id = ?';
        $pst = Connection::getPreparedStatement($sql);
        $pst->execute();
        $listPublisher = $pst->fetch(PDO::FETCH_ASSOC);

        return $listPublisher;
    }

    public function updateUser(Publisher $pub) {
        $sql = $sql = 'UPDATE publisher SET name = ? WHERE id = ?';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $pub->getName());

        if($pst->execute()) return $pst->rowCount();
        else return false;
    }

    public function deleteUser(Publisher $pub) {
        $sql = 'DELETE FROM publisher WHERE id = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $pub->getId());

        if($pst->execute()) return $pst->rowCount();
        else return false;
    }
}