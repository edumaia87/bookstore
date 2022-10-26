<?php
require_once './assets/database/connection/connection.php';

class DaoAdapter {
    public function insertAddress(Address $address) {
        $sql = 'INSERT INTO address (user_id, street, district, number, city, state) VALUES (?, ?, ?, ?, ?, ?);';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $address->getId());
        $pst->bindValue(2, $address->getStreet());
        $pst->bindValue(3, $address->getDistrict());
        $pst->bindValue(4, $address->getNumber());
        $pst->bindValue(5, $address->getCity());
        $pst->bindValue(6, $address->getState());

        if($pst->execute()) return true;
        else return false;
    }

    public function listAddress() {
        $listAddress = [];
        $pst = Connection::getPreparedStatement('SELECT * FROM address;');
        $pst->execute();
        $listAddress = $pst->fetchAll(PDO::FETCH_ASSOC);

        return $listAddress;
    }

    public function searchAddress($id) {
        $listAddress = [];
        $sql = 'SELECT * FROM address WHERE id = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $id);
        $pst->execute();
        $listAddress = $pst->fetchAll(PDO::FETCH_ASSOC);

        return $listAddress;
    }

    public function updateAddress(Address $address) {
        $sql = 'UPDATE address SET street = ?, district = ?, number = ?, city = ?, state = ? WHERE id = ?';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $address->getStreet());
        $pst->bindValue(2, $address->getDistrict());
        $pst->bindValue(3, $address->getNumber());
        $pst->bindValue(4, $address->getCity());
        $pst->bindValue(5, $address->getState());

        if($pst->execute()) return $pst->rowCount();
        else return false;
    }

    public function deleteAddress(User $address) {
        $sql = 'DELETE FROM address WHERE id = ?;';
        $pst = Connection::getPreparedStatement($sql);
        
        $pst->bindValue(1, $address->getId());
        if ($pst->execute()) return $pst->rowCount();
        else return false;
    }
}