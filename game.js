var canvas = null;
var ctx = null;
var img = document.createElement("img");
img.src = "img/backcard.png";

window.onload = function() {
	canvas = document.getElementById('myCanvas');
	ctx = canvas.getContext('2d');
	canvas.width = $(document).width();
	canvas.height = $(document).height();
	tracerCarteEnnemie();
	tracerCarteAllie();
	canvas.addEventListener("mousemove", onMouseMove, false);
}
function onMouseMove(event){////////////////////////////////////////////////////////////
	var x = event.pageX-canvas.offsetLeft;	
	var y = event.pageY-canvas.offsetTop;
}

function tracerCarte(x,y,largeur,longueur){
	ctx.rect(x,y,largeur,longueur);
	ctx.stokeStyle = "black";
	ctx.drawImage(img,x,y,largeur,longueur);
}

function tracerCarteEnnemie(){
	var tailleCarteX = 130;
	var tailleCarteY = 180;
	var lignePosX = 500; 
	var lignePosY = 10;
	var espace = 0;
	for (var i=0;i<10;i++){
		tracerCarte(espace+lignePosX,lignePosY,tailleCarteX,tailleCarteY);
		if (i<5) {
			espace += tailleCarteX+10;
		}
		if (i>=5) {
			espace += 10;
		}
	}
}

function tracerCarteAllie(){
	var tailleCarteX = 130;
	var tailleCarteY = 180;
	var lignePosX = 300; 
	var lignePosY = canvas.height-tailleCarteY-10;
	var espace = 0;
	for (var i=0;i<10;i++){
		tracerCarte(espace+lignePosX,lignePosY,tailleCarteX,tailleCarteY);
		if (i<5) {
			espace += tailleCarteX+20;
		}
		if (i>=5) {
			espace += 10;
		}
	}
}