<?php
require_once './assets/database/model/User.php';
require_once './assets/database/DAO/DAOUser.php';

require_once './assets/database/model/Books.php';
require_once './assets/database/DAO/DAOBooks.php';

require_once './assets/database/model/Publisher.php';
require_once './assets/database/DAO/DAOPublisher.php';

// $obj  = new User(null, 'Eduardo', 'edumaia89@outlook.com', '12345', '111');
// $dao = new DaoUser();

// if ($dao->insertUser($obj)) echo 'Aluno inserido com sucesso!';
// else echo 'Não foi possível inserir o aluno!';

$objB = new Books(null, 'Java', 'Eduardo Maia', 'livro de programação', '199.99', '2001-09-15', 'didático', '2222', 1);
$daoB = new DaoBooks();

if ($daoB->insertBook($objB)) echo 'Livro inserido com sucesso!';
else echo 'Não foi possível inserir o livro!';

$objP = new Publisher(null, 'Pabllo');
$daoP = new DaoPublisher();

if ($daoP->insertPublisher($objP)) echo 'Editora inserido com sucesso!';
else echo 'Não foi possível inserir a Editora!';