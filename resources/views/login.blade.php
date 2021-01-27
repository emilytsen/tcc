<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="shortcut icon" href="/img/logo.png">
</head>
<body>
    <form action="/logar" method="post">
      
        <img src="/img/logo.png" alt="logo">
        <h1>Wave of Grace</h1>

        @csrf
        <input type="text" name="email" placeholder="E-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>