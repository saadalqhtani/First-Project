var ctx = document.getElementById('circularLoader').getContext('2d');
var al = 0;
var start = 4.72;
var cw = ctx.canvas.width;
var ch = ctx.canvas.height; 
var diff;
var sim;
function progressSim(){
	diff = ((al / 100) * Math.PI*2*10).toFixed(2);
	ctx.clearRect(0, 0, cw, ch);
	ctx.lineWidth = 17;
	ctx.fillStyle = '#4285f4';
	ctx.strokeStyle = "#4285f4";
	ctx.textAlign = "center";
	ctx.font="28px monospace";
	ctx.fillText(al+'%', cw*.52, ch*.5+5, cw+12);
	ctx.beginPath();
	ctx.arc(100, 100, 75, start, diff/10+start, false);
	ctx.stroke();
	if(al >= 100){
		clearTimeout(sim);
	    
        myModal.show(); 
        loader.style.display = 'none'; 
        launchConfetti();
	}
	al++;
}


function launchConfetti(){
	var confettiCanvas = document.createElement('canvas');
	confettiCanvas.id = 'confettiCanvas';
	confettiCanvas.style.position = 'fixed';
	confettiCanvas.style.top = '0';
	confettiCanvas.style.left = '0';
	confettiCanvas.style.width = '100%';
	confettiCanvas.style.height = '100%';
	confettiCanvas.style.pointerEvents = 'none';
	confettiCanvas.style.zIndex = '2000'; // above the modal
	document.body.appendChild(confettiCanvas);

	var cctx = confettiCanvas.getContext('2d');

	function resizeConfettiCanvas(){
		confettiCanvas.width = window.innerWidth;
		confettiCanvas.height = window.innerHeight;
	}
	resizeConfettiCanvas();
	window.addEventListener('resize', resizeConfettiCanvas);

	var colors = ['#f44336', '#ffeb3b', '#4caf50', '#2196f3', '#9c27b0', '#ff9800'];
	var pieces = [];
	var pieceCount = 180;

	for(var i = 0; i < pieceCount; i++){
		pieces.push({
			x: Math.random() * confettiCanvas.width,
			y: Math.random() * confettiCanvas.height * -1,
			w: Math.random() * 8 + 4,
			h: Math.random() * 12 + 6,
			color: colors[Math.floor(Math.random() * colors.length)],
			speedY: Math.random() * 3 + 2,
			speedX: Math.random() * 2 - 1,
			rotation: Math.random() * 360,
			rotationSpeed: Math.random() * 10 - 5
		});
	}

	var confettiDuration = 8000; // ms
	var confettiStart = Date.now();
	var confettiFrame;

	function drawConfetti(){
		cctx.clearRect(0, 0, confettiCanvas.width, confettiCanvas.height);

		pieces.forEach(function(p){
			p.y += p.speedY;
			p.x += p.speedX;
			p.rotation += p.rotationSpeed;

			if(p.y > confettiCanvas.height){
				p.y = -20;
				p.x = Math.random() * confettiCanvas.width;
			}

			cctx.save();
			cctx.translate(p.x, p.y);
			cctx.rotate(p.rotation * Math.PI / 180);
			cctx.fillStyle = p.color;
			cctx.fillRect(-p.w / 2, -p.h / 2, p.w, p.h);
			cctx.restore();
		});

		if(Date.now() - confettiStart < confettiDuration){
			confettiFrame = requestAnimationFrame(drawConfetti);
		} else {
			cancelAnimationFrame(confettiFrame);
			window.removeEventListener('resize', resizeConfettiCanvas);
			confettiCanvas.remove();
		}
	}

	drawConfetti();
}

const win = document.querySelector("#winner");
const loader = document.querySelector(".loader-con");


var myModal = new bootstrap.Modal(document.getElementById('modal'), {
  keyboard: false
})

win.addEventListener('click',function(){
loader.style.display = 'block';
 sim = setInterval(progressSim, 50);

});
