<?php
require_once './assets/database/connection/connection.php';

class DaoBooks {
    public function insertBook(Books $books) {
        $sql = 'INSERT INTO books (title, author, description, price, published_date, genre, isbn, pub_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?);';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $books->getTitle());
        $pst->bindValue(2, $books->getAuthor());
        $pst->bindValue(3, $books->getDescription());
        $pst->bindValue(4, $books->getPrice());
        $pst->bindValue(5, $books->getPublishedDate());
        $pst->bindValue(6, $books->getGenre());
        $pst->bindValue(7, $books->getIsbn());
        $pst->bindValue(8, $books->getPubId());

        if($pst->execute()) return true;
        else return false;
    }

    public function listBooks() {
        $listBooks = [];
        $pst = Connection::getPreparedStatement('SELECT * FROM books;');
        $pst->execute();
        $listBooks = $pst->fetchAll(PDO::FETCH_ASSOC);

        return $listBooks;
    }

    public function searchBook($id) {
        $listBooks = [];
        $sql = 'SELECT * FROM books WHERE id = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $id);
        $pst->execute();
        $listBooks = $pst->fetchAll(PDO::FETCH_ASSOC);

        return $listBooks;
    }

    public function updateBook(Books $books) {
        $sql = 'UPDATE books SET title = ?, author = ?, description = ?, price = ? published_date = ? genre = ? isbn = ? WHERE id = ?';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $books->getTitle());
        $pst->bindValue(2, $books->getAuthor());
        $pst->bindValue(3, $books->getDescription());
        $pst->bindValue(4, $books->getPrice());
        $pst->bindValue(1, $books->getPublishedDate());
        $pst->bindValue(2, $books->getGenre());
        $pst->bindValue(3, $books->getIsbn());

        if($pst->execute()) return $pst->rowCount();
        else return false;
    }

    public function deleteBook(User $books) {
        $sql = 'DELETE FROM books WHERE id = ?;';
        $pst = Connection::getPreparedStatement($sql);
        
        $pst->bindValue(1, $books->getId());
        if ($pst->execute()) return $pst->rowCount();
        else return false;
    }
}