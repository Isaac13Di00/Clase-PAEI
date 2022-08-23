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
    <canvas id="mycanvas" width="500" height="500">
        Hola soy un canvas
    </canvas>
    <script type="text/javascript">
        var cv, ctx, super_X=0, super_Y=0;
        var r=0, g=0, b=0;
        function generateRandomColor(){
            r=Math.floor(Math.random()*254);
            g=Math.floor(Math.random()*254);
            b=Math.floor(Math.random()*254);
        }
        function run(){
            cv = document.getElementById('mycanvas');
            ctx = cv.getContext('2d');
            paint();
        }
        function generateRandomColor(){
            r=Math.floor(Math.random()*254);
            g=Math.floor(Math.random()*254);
            b=Math.floor(Math.random()*254);}
        function paint(){
            generateRandomColor();
            unPaint();
            window.requestAnimationFrame(paint);
            super_X+=2;
            ctx.strokeRect(super_X, super_Y, 40, 40);
            ctx.fillStyle=`rgb(${r}, ${g}, ${b}, 0.5)`;
            ctx.fillRect(super_X, super_Y, 40, 40);
        }
        function unPaint(){
            ctx.strokeStyle="white";
            ctx.strokeRect(super_X, super_Y, 40, 40);
            ctx.fillStyle="white";
            ctx.fillRect(super_X, super_Y, 40, 40);
        }
        /*document.addEventListener('keydown', (e)=>{
            //console.log(e.keyCode);
            unPaint();
            //left
            if (e.keyCode == 65 || e.keyCode == 37) {
                super_X-=20;
            }
            //down
            if (e.keyCode == 83 || e.keyCode == 40) {
                super_Y+=20;
            }
            //right
            if (e.keyCode == 68 || e.keyCode == 39) {
                super_X+=20;
            }
            //up
            if (e.keyCode == 87 || e.keyCode == 38) {
                super_Y-=20;
            }
            paint();})*/

        window.requestAnimationFrame = (function () {
            return window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            function (callback) {
                window.setTimeout(callback, 17);
            };}());
        window.addEventListener("load", run, false);
    </script>
</body>
</html>