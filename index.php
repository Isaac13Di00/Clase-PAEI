<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas</title>
    <style type="text/css">
        canvas{
            background-color: cyan;
        }
   </style>
</head>
<body>
    <canvas id="mycanvas" width="500" height="500">
        Hola soy un canvas
    </canvas>

    <script type="text/javascript">
        var cv = document.getElementById('mycanvas');
        var ctx = cv.getContext('2d');

        //cuadrados
        ctx.fillStyle="rgb(200,0,0)";
        ctx.fillRect(10,10,55,50);

        ctx.fillStyle="rgb(0,200,0,0.5)";
        ctx.fillRect(30,30,55,50);

        ctx.fillStyle="rgb(0,0,200)";
        ctx.fillRect(50,50,55,50);

        //linea
        ctx.moveTo(80, 0);
        ctx.lineTo(200, 200);
        ctx.stroke();
        
        //triangulos
        ctx.moveTo(250,250);
        ctx.lineTo(350, 300);
        ctx.lineTo(350, 400);
        ctx.lineTo(250, 250);
        ctx.fillStyle="rgb(100,100,0)";
        ctx.fill()
        ctx.stroke();

        //circulo
        ctx.beginPath();
        ctx.arc(70, 350, 50, 0, 2 * Math.PI);
        ctx.stroke();

        ctx.beginPath();
        ctx.arc(180, 350, 50, 0, 2 * Math.PI);
        ctx.fillStyle="rgb(80,10,0)";
        ctx.fill();
        ctx.stroke();
        
    </script>
</body>
</html>