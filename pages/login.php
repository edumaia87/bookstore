<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cantinho da leitura - Login</title>

    <link rel="stylesheet" href="../assets/css/login-register.css">
</head>
<body>
    <div id="container">
        <h1>Entrar</h1>
        <form method="POST" action="home.php">
            <label for="name-email">Nome de usuário ou E-mail</label>
            <input name="name-email" type="text" placeholder=" digite seu nome de usuário ou e-mail">
            <label for="password">Senha</label>
            <input name="password" type="password" placeholder="Digite sua senha">
            <input id="login-button" name="login" type="submit" value="Login">
            <p>Ainda não tem conta? <a href="register.php"><strong>Cadastre-se</strong></a></p>
        </form>
    </div>
</body>
</html>