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
        var cv, ctx, player1, player2, direccion="", velocidad=5, score=0;
        function generateRandomColor(){
            r=Math.floor(Math.random()*254);
            g=Math.floor(Math.random()*254);
            b=Math.floor(Math.random()*254);}
        function run(){
            cv = document.getElementById('mycanvas');
            ctx = cv.getContext('2d');
            player1 = new Cuadro(0, 0, 40, 40, "red");
            player2 = new Cuadro(40 , 40, 40, 40, "brown");
            paint();}
        function paint(){
            window.requestAnimationFrame(paint);
            player1.unPaint(ctx);
            player1.paint(ctx);
            player2.paint(ctx);
            ctx.fillStyle = "black";
            ctx.fillText("SCORE:"+score,100,110);
            update();
        }
        function update(){
            if(player1.se_tocan(player2)){
                velocidad+=2;
                score+=5;
            };
            if(player1.x > 500){
                player1.x = 0;
            }
            if(player1.x < -1){
                player1.x = 500;
            }
            if(player1.y > 500){
                player1.y = 0;
            }
            if(player1.y < 0){
                player1.y = 500;
            }
            if(direccion=="right"){
                player1.x+=velocidad;
            }
            if(direccion=="left"){
                player1.x-=velocidad;
            }
            if(direccion=="down"){
                player1.y+=velocidad;
            }
            if(direccion=="up"){
                player1.y-=velocidad;
            }            
        }
        document.addEventListener('keydown', (e)=>{
            if (e.keyCode == 65 || e.keyCode == 37) {
                direccion = "left";
            }
            //down
            if (e.keyCode == 83 || e.keyCode == 40) {
                direccion = "down";
            }
            //right
            if (e.keyCode == 68 || e.keyCode == 39) {
                direccion = "right";
            }
            //up
            if (e.keyCode == 87 || e.keyCode == 38) {
                direccion = "up";
            }
        });
        window.requestAnimationFrame = (function () {
            return window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            function (callback) {
                window.setTimeout(callback, 17);
            };}());
        window.addEventListener("load", run, false);
        function Cuadro(x, y, w, h, c){
            this.x = x;this.y = y;
            this.w = w;this.h = h;
            this.c = c;
            this.paint = function(ctx){
                ctx.strokeRect(this.x, this.y, this.w, this.h);
                ctx.fillStyle=this.c;
                ctx.fillRect(this.x, this.y, this.w, this.h);};
            this.unPaint = function(ctx){
                ctx.fillStyle="white";
                ctx.fillRect(0, 0, 500, 500);
            }
            this.se_tocan = function (target) { 
                if(this.x < target.x + target.w &&
                    this.x + this.w > target.x && 
                    this.y < target.y + target.h && 
                    this.y + this.h > target.y){
                        target.x = Math.floor(Math.random()*459);
                        target.y = Math.floor(Math.random()*459);
                        return true;
                    }
                };
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
    </script>
</body>
</html>