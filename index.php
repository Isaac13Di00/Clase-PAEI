<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas</title>
    <style type="text/css">
        canvas{
            background-color: white;
        }
   </style>
</head>
<body>
    <canvas id="mycanvas" width="1000" height="1000">
        Hola soy un canvas
    </canvas>
    <img src="imagen.jpg" id="img" style="display: none">
    <script type="text/javascript">
        var cv = document.getElementById('mycanvas');
        var ctx = cv.getContext('2d');
        var r=0, g=0, b=0;
        /*
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
        //lineas
        ctx.font = "30px Arial";
        ctx.fillText("Isaac Pérez", 200, 30);
        ctx.strokeText("Isaac Pérez", 200, 60);
        //gradiante
        var grd=ctx.createLinearGradient(200, 80, 400, 80);
        grd.addColorStop(0, 'red');
        grd.addColorStop(0.3, 'yellow');
        grd.addColorStop(0.6, 'cyan');
        grd.addColorStop(1, 'purple');
        ctx.fillStyle=grd;
        ctx.fillRect(200,80,200,80);
        //radianl gradient
        grd=ctx.createRadialGradient(60, 200, 200, 120, 210, 30);
        grd.addColorStop(0, 'red');
        grd.addColorStop(1, 'white');
        ctx.fillStyle=grd;
        ctx.fillRect(10,170,200,100);
        //imagenes
        var img=document.getElementById("img");
        ctx.moveTo(100, 200);
        ctx.drawImage(img, 0, 0, 300, 300);
        */
        cv.addEventListener('click',function (e){
            //console.log(e);
            ctx.beginPath();
            ctx.fillStyle=`rgb(${r}, ${g}, ${b}, 0.5)`;
            ctx.arc(e.offsetX, e.offsetY, 50, 0, 2 * Math.PI);
            ctx.fill();
            ctx.stroke();     
        });
        cv.addEventListener('mouseover', (e)=>{
            r=Math.floor(Math.random()*254);
            g=Math.floor(Math.random()*254);
            b=Math.floor(Math.random()*254);
        });
    </script>
</body>
</html>