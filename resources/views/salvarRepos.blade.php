<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecionar</title>
</head>
<body>
   <div>
         @foreach ($reposi as $reposi)
         <?php
         $repositorio = $reposi;
         ?>
         @endforeach
         
         @foreach ($array as $array)
            
         <form id="cadastrar" action="/cadastrar-commit" method="POST">
         @csrf

         <?php
         $author =  $array['author'];
         $login = $author['login'];
         $commit = $array['commit'];
         $dataCommit = $commit['author'];
         $data = $dataCommit['date'];
         $id = $array['sha'];
         /*$repositorio = $array['name'];
         $id =  $array['url'];
         $data = $array['name'];*/
         ?>
      
         <ul>
            <input type=text value="{{$login}}" disabled>
            <input type=text value="{{$id}}" disabled>
            <input type=text value="{{$repositorio}}" disabled>
            <input type=text value="{{$data}}" maxlength="10" disabled>

            <input type=text value="{{$login}}" name="login" hidden>
            <input type=text value="{{$id}}" name="id" hidden>
            <input type=text value="{{$repositorio}}" name="repos" hidden>
            <input type=text value="{{$data}}" name="data" hidden>
            
         </ul>
         </form>

         @endforeach
         
         <button form="cadastrar">Salvar Commits</button>
   </div>
</body>
</html>