var canvas = null;
var ctx = null;
var backcard = document.createElement("img");
var gameboard = document.createElement("img");
backcard.src = "img/backcard.png";
gameboard.src = "img/gameboard.jpg";

window.onload = function() {
	canvas = document.getElementById('myCanvas');
	ctx = canvas.getContext('2d');
	canvas.width = $(document).width();
	canvas.height = $(document).height();
	ctx.drawImage(this.gameboard,0, 0, canvas.width, canvas.height);
	tracerHealthBar(260,750,200,35,50,100);
	tracerHealthBar(1500,20,200,35,50,100);
	tracerCarteEnnemie();
	tracerCarteAllie();
	canvas.addEventListener("mousemove", onMouseMove, false);
}
function onMouseMove(event){////////////////////////////////////////////////////////////
	var x = event.pageX-canvas.offsetLeft;	
	var y = event.pageY-canvas.offsetTop;
	console.info(x,y)
}

function tracerCarte(x,y,largeur,longueur){
	ctx.rect(x,y,largeur,longueur);
	ctx.drawImage(backcard,x,y,largeur,longueur);
}

function tracerCarteEnnemie(){
	var tailleCarteX = 180;
	var tailleCarteY = 230;
	var lignePosX = 200; 
	var lignePosY = 10;
	var espace = 0;
	for (var i=0;i<10;i++){
		tracerCarte(espace+lignePosX,lignePosY,tailleCarteX,tailleCarteY);
		if (i<5) {
			espace += tailleCarteX+20;
		}
		if (i>=5) {
			espace += 20;
		}
	}
}

function tracerCarteAllie(){
	var tailleCarteX = 180;
	var tailleCarteY = 230;
	var lignePosX = 500; 
	var lignePosY = canvas.height-tailleCarteY-10;
	var espace = 0;
	for (var i=0;i<10;i++){
		tracerCarte(espace+lignePosX,lignePosY,tailleCarteX,tailleCarteY);
		if (i<5) {
			espace += tailleCarteX+20;
		}
		if (i>=5) {
			espace += 20;
		}
	}
}

function tracerHealthBar(x,y,tailleX,tailleY,vie,vieMax){
	ctx.strokeStyle = 'white';
	ctx.strokeRect(x,y,tailleX,tailleY);
	ctx.fillStyle = '#c0392b';
	ctx.fillRect(x,y,0+vie*(tailleX/vieMax),tailleY);
}