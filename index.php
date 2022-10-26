<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// require_once './assets/database/model/User.php';
// require_once './assets/database/DAO/DAOUser.php';

require_once './assets/database/model/Book.php';
require_once './assets/database/DAO/DAOBook.php';

require_once './assets/database/model/Publisher.php';
require_once './assets/database/DAO/DAOPublisher.php';

// $obj  = new User(null, 'Carlos', 'carlos@outlook.com', '123', '111', '(33)98855-8899', 'user');
// $dao = new DaoUser();
// if ($dao->insertUser($obj)) echo 'Usuário inserido com sucesso!';
// else echo 'Não foi possível inserir o usuário!';

// $objP = new Publisher(null, 'Saraiva', 'saraiva@gmail.com', '(33)90000-7777');
// $daoP = new DaoPublisher();

// if($daoP->insertPublisher($objP)) {
//     echo 'Editora inserida com sucesso!';
// } else {
//     echo 'Deu ruim';
// }

$obj = new Book(null, 'Java', 'Eduardo', 'livro sobre java', 299.99, '2002/08/09', 'didático', '00', 1);
$dao = new DAOBook();
if($dao->insertBook($obj)) {
    echo 'Livro inserido com sucesso!';
} else {
    echo 'Deu ruim';
}
?>
</body>
</html>