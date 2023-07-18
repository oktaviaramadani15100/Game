<?php
include 'koneksi.php';

if(isset($_SESSION["id"])){
	header("Location: index.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       
        .container{
            background-color: white;
            width: 600px;
            height: 250px;
            margin-left: 300px;
            margin-top: 200px;
            border-radius: 15px;
       
        }

        .container p{
            margin-left: 50px;
           font-size: 30px;
          
        }
        .container label{
            font-size: 30px;
            margin-left: 40px;
        }
        #tombol1{
            border: none;
            color: white;
            background-color:dodgerblue;
            margin-left: 50px;
            width: 150px;
            height: 50px;
            border-radius: 15px;
            font-size: 30px;
        }
        #tombol2{
            border: none;
            color: white;
            background-color: dodgerblue;
            width: 150px;
            height: 50px;
            border-radius: 15px;
            font-size: 30px;
        }
        canvas{
            border: 1px solid black;
            background-image: url(asset/Screenshot_236.png);
            background-size: cover;
            background-position: center;
            position: absolute;
            margin-top: -120px;
            margin-left: 280px;
        }


        .footer{
            font-size: 20px;
            margin-top: 180px;
            height: 25px;
            text-align: center;
        }


        body{
            background-image: url(asset/6038af62c2e8f.jpg);
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        #play h1{
            text-align: center;
           background-color:blue;
           width: 340px;
           height: 50px;
           border-radius: 15px;
           color: white;
           margin-left: 450px;
           position: absolute;
           margin-top: -60px;
        }

        #gambar{
            font-size: 25px;
            background-color: blue;
            height: 40px;

        }
    </style>
</head>
<body>
    <div id="play" oninput="nama()">
         <h1>hallo games</h1>
    </div>
    <div class="container" id="nama">
        <p>PLAYER:</p>
        <label>Choose color: <input type="color" id="warna"></label>
        <br> 
        <a href="logout.php"><button onclick="logout()" id="tombol1" style="margin-top: 60px;">Logout</button></a> 
        <button onclick="startGame()" id="tombol2" style="margin-left: 200px;">Start</button>
    </div>

    <p id="player" style="position: absolute;"></p>
    <p id="game"></p>

    <div class="footer" id="footer2">
        <p style="color: white;" id="gambar">Devloper by oktavia</p>
    </div>

    <div id="btn" style="display: none;" >
        <button onclick="tombol()" id="ulang" style="display: none;">Try Again</button>
        <br>
        <button onclick="tombol2()" id="kembali" style="display: none;">Exit</button>   
    </div>
   
    
   <script>
  
    var myGamePiece;
    var myObstacles = [];
    var myScore;

    function startGame() {
        document.getElementById("gambar").style.position="absolute"
        document.getElementById("gambar").style.marginTop= "446px"
        document.getElementById("gambar").style.height="37px"
        document.getElementById("gambar").style.width="100%"
        document.getElementById("nama").style.display="none"
        document.getElementById("play").style.display="block"
        document.getElementById("ulang").style.display="block"
        document.getElementById("kembali").style.display="block"
        document.getElementById("ulang").style.marginTop="300px"
        document.getElementById("kembali").style.marginLeft="840px"
        document.getElementById("ulang").style.marginLeft="280px"
        document.getElementById("kembali").style.marginTop="-60px"
        document.getElementById("ulang").style.width="150px"
        document.getElementById("kembali").style.width="150px"
        document.getElementById("ulang").style.height="50px"
        document.getElementById("kembali").style.height="50px"
        document.getElementById("ulang").style.backgroundColor="blue"
        document.getElementById("kembali").style.backgroundColor="blue"
        document.getElementById("ulang").style.border="none"
        document.getElementById("kembali").style.border="none"
        document.getElementById("ulang").style.color="white"
        document.getElementById("kembali").style.color="white"
        document.getElementById("ulang").style.borderRadius="15px"
        document.getElementById("kembali").style.borderRadius="15px"
        document.getElementById("ulang").style.fontSize="20px"
        document.getElementById("kembali").style.fontSize="20px"
    
        
        var nama = document.getElementById("warna").value;
        myGamePiece = new component(30, 30, nama, 10, 120);
        myObstacles = [];
        myScore = new component("30px", "Consolas", "blue", 500, 40, "text");
        myGameArea.start();
        var usergame = document.getElementById("username").value
        document.getElementById("player").innerHTML = "player: " + usergame
    }

    
    var myGameArea = {
        canvas : document.createElement("canvas"),
        start : function() {
            this.canvas.width = 700;
            this.canvas.height = 400;
            this.context = this.canvas.getContext("2d");
            document.getElementById("game").insertBefore(this.canvas, document.getElementById("game").childNodes[0]);
            this.frameNo = 0;
            this.interval = setInterval(updateGameArea, 20);
            window.addEventListener("keydown", function(c){
                myGameArea.key = c.keyCode;
            })
            window.addEventListener("keyup", function(){
                myGameArea.key = false;
            })
            },
        clear : function() {
            this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
        },
        stop : function() {
            clearInterval(this.interval);
        }
    }

    function component(width, height, color, x, y, type) {
        this.type = type;
        this.width = width;
        this.height = height;
        this.speedX = 0;
        this.speedY = 0;    
        this.x = x;
        this.y = y;    
        this.update = function() {
            ctx = myGameArea.context;
            if (this.type == "text") {
                ctx.font = this.width + " " + this.height;
                ctx.fillStyle = color;
                ctx.fillText(this.text, this.x, this.y);
            } else {
                ctx.fillStyle = color;
                ctx.fillRect(this.x, this.y, this.width, this.height);
            }
        }
        this.newPos = function() {
            this.x += this.speedX;
            this.y += this.speedY;        
        }
        this.crashWith = function(otherobj) {
            var myleft = this.x;
            var myright = this.x + (this.width);
            var mytop = this.y;
            var mybottom = this.y + (this.height);
            var otherleft = otherobj.x;
            var otherright = otherobj.x + (otherobj.width);
            var othertop = otherobj.y;
            var otherbottom = otherobj.y + (otherobj.height);
            var crash = true;
            if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
                crash = false;
            }
            return crash;
        }
    }

    function updateGameArea() {
        var x, height, gap, minHeight, maxHeight, minGap, maxGap;
        for (i = 0; i < myObstacles.length; i += 1) {
            if (myGamePiece.crashWith(myObstacles[i])) {
                document.getElementById("btn").style.display="block"
                myGameArea.stop();
                return;
            } 
        }
        myGameArea.clear();
        myGamePiece.speedX = 0;
        myGamePiece.speedY = 0;

        if(myGameArea.key == 37){
            myGamePiece.speedX = -5;
        }
        if(myGameArea.key && myGameArea.key == 39){
            myGamePiece.speedX = 5;
        }
        if(myGameArea.key && myGameArea.key == 38){
            myGamePiece.speedY = -5;
        }
        if(myGameArea.key && myGameArea.key == 40){
            myGamePiece.speedY = 5;
        }

        myGameArea.frameNo += 1;
        if (myGameArea.frameNo == 1 || everyinterval(150)) {
            x = myGameArea.canvas.width;
            minHeight = 20;
            maxHeight = 200;
            height = Math.floor(Math.random()*(maxHeight-minHeight+1)+minHeight);
            minGap = 50;
            maxGap = 200;
            gap = Math.floor(Math.random()*(maxGap-minGap+1)+minGap);
            myObstacles.push(new component(10, height, "green", x, 0));
            myObstacles.push(new component(10, x - height - gap, "green", x, height + gap));
        }
        for (i = 0; i < myObstacles.length; i += 1) {
            myObstacles[i].speedX = -3;
            myObstacles[i].newPos();
            myObstacles[i].update();
        }
        myScore.text="SCORE: " + myGameArea.frameNo;
        myScore.update();
        myGamePiece.newPos();    
        myGamePiece.update();

      
    }

    function everyinterval(n) {
        if ((myGameArea.frameNo / n) % 1 == 0) {return true;}
        return false;
    }

function clearmove() {
    myGamePiece.speedX = 0; 
    myGamePiece.speedY = 0; 
}

function tombol(){
    myGameArea.stop();
    myGameArea.clear();
    startGame();
}

function tombol2(){
    location.reload();
}

    
    </script>

</body>
</html>