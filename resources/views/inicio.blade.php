<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pesquisar</title>
</head>
<body>
    <form action="/pesquisar-login" method="POST">
        @csrf
        <label>Pesquisar</label>
        <input type="text" name="login">
        <br>
        <button>Buscar</button>
    </form>

    
</body>
</html>