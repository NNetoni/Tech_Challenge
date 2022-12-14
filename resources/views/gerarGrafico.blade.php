<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <canvas class="line-chart"></canvas>
    <canvas id="bar-chart" width="800" height="450"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
       
        @foreach ($reposi as $reposi)
        <?php


        $teste = $reposi;
        $mysqli = new mysqli("localhost",  "root", "","techchallenge");
        $res = $mysqli->query("SELECT repositorio,data FROM commits WHERE repositorio like '%$teste%' ");
        $itens = $res->fetch_all(MYSQLI_ASSOC);

        $teste1 = $mysqli->query("SELECT data FROM commits WHERE repositorio like '%$teste%' ");
        $dates = $teste1->fetch_all(MYSQLI_ASSOC);

        /*dd($date)*/
        
        ?>

        @endforeach


        <script>
        /*var ctx = document.getElementsByClassName("line-chart");

        var chartGraph = new Chart(ctx,{
            type:'line',
            data:{
                labels:[
,
                datasets:[
                    {
                        label:"Commits",
                        data:[5,10,5],
                        borderWidth: 6,
                        borderColor:'rgba(6,204,6,0.85)',
                        backgroundColor:'transparent'
                    }
                ]
                
            }
        });*/
        new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: [],
      datasets: [
        {
          label: "Datas",
          data: []
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Commits'
      }
    }
});

        </script>

</body>
</html>