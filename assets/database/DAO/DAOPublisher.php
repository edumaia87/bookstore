<?php
require_once './assets/database/connection/connection.php';

class DaoPublisher {
    public function insertPublisher(Publisher $pub) {
        try {
            $sql = 'INSERT INTO publisher (name, email, telefone) VALUES (?, ?, ?);';
            $pst = Connection::getPreparedStatement($sql);
            $pst->bindValue(1, $pub->getName());
            $pst->bindValue(2, $pub->getEmail());
            $pst->bindValue(3, $pub->getTelefone());

            if($pst->execute()) return true;
            else return false;
        } catch (PDOException $e) {
            return false;
        }
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

    public function updatePublisher(Publisher $pub) {
        try {
            $sql = $sql = 'UPDATE publisher SET name = ?, email = ?, telefone = ? WHERE id = ?';
            $pst = Connection::getPreparedStatement($sql);
            $pst->bindValue(1, $pub->getName());

            if($pst->execute()) return $pst->rowCount();
            else return false;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deletePublisher(Publisher $pub) {
        try {
            $sql = 'DELETE FROM publisher WHERE id = ?;';
            $pst = Connection::getPreparedStatement($sql);
            $pst->bindValue(1, $pub->getId());

            if($pst->execute()) return $pst->rowCount();
            else return false;
        } catch (PDOException $e) {
            return false;
        }
    }
}