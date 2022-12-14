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
      
      
         @foreach ($array as $array)
         
         <form action="/selecionar-repos" method="POST">
         @csrf

         <?php
         $url =  $array['url'];
         $nome = $array['name'];
         ?>

         <ul>
            <input type=text value="{{$nome}}" name="repos" readonly>
            <input type=text value="{{$url}}" name="url" hidden>
            <button>Selecionar</button>
         </ul>
            
         </form>
         @endforeach


   </div>
</body>
</html>