<?php
require_once './assets/database/connection/connection.php';

class DaoBook {
    public function insertBook(Book $book) {
        $sql = 'INSERT INTO book (title, author, description, price, published_date, genre, isbn, publisher_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?);';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $book->getTitle());
        $pst->bindValue(2, $book->getAuthor());
        $pst->bindValue(3, $book->getDescription());
        $pst->bindValue(4, $book->getPrice());
        $pst->bindValue(5, $book->getPublishedDate());
        $pst->bindValue(6, $book->getGenre());
        $pst->bindValue(7, $book->getIsbn());
        $pst->bindValue(8, $book->getPubId());

        if($pst->execute()) return true;
        else return false;
    }

    public function listBook() {
        $listBook = [];
        $pst = Connection::getPreparedStatement('SELECT * FROM book;');
        $pst->execute();
        $listBook = $pst->fetchAll(PDO::FETCH_ASSOC);

        return $listBook;
    }

    public function searchBook($id) {
        $listBook = [];
        $sql = 'SELECT * FROM book WHERE id = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $id);
        $pst->execute();
        $listBook = $pst->fetchAll(PDO::FETCH_ASSOC);

        return $listBook;
    }

    public function updateBook(Book $book) {
        $sql = 'UPDATE book SET title = ?, author = ?, description = ?, price = ? published_date = ? genre = ?, isbn = ? WHERE id = ?';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $book->getTitle());
        $pst->bindValue(2, $book->getAuthor());
        $pst->bindValue(3, $book->getDescription());
        $pst->bindValue(4, $book->getPrice());
        $pst->bindValue(1, $book->getPublishedDate());
        $pst->bindValue(2, $book->getGenre());
        $pst->bindValue(3, $book->getIsbn());

        if($pst->execute()) return $pst->rowCount();
        else return false;
    }

    public function deleteBook(User $book) {
        $sql = 'DELETE FROM book WHERE id = ?;';
        $pst = Connection::getPreparedStatement($sql);
        
        $pst->bindValue(1, $book->getId());
        if ($pst->execute()) return $pst->rowCount();
        else return false;
    }
}