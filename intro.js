var divs = [];
var x = [];
var y = [];
var xDir = [];
var yDir = [];
var angle = Math.PI / 15;
var canvas;
var ctx;
var height;
var width;

for (var n = 0; n < 31; n++)
{
  divs[n] = new Image;
  divs[n].src = "intro/slice" + pad(n+1) + ".png";
}

window.onload = function intro()
{
  height = window.innerHeight/2;
  width = window.innerWidth/2;
  var hyp = Math.sqrt(height*height+width*width);
  
  canvas = document.getElementById('intro');
  canvas.height = window.innerHeight;
  canvas.width = window.innerWidth;
  ctx = canvas.getContext('2d');  ////ctx.fillRect(10,10,10,10);

  for (var n = 0; n < 31; n++)
  {
    xDir[n] = Math.sin(angle*n+Math.PI/2);
    yDir[n] = Math.cos(angle*n+Math.PI/2);
    x[n] = xDir[n]*hyp + width;
    y[n] = yDir[n]*hyp + height;
  }
  animate();
}

function animate()
{
  var going = true;
  ctx.clearRect(0, 0, width*2, height*2);

  for (var n = 0; n < 30; n++)
  {
    x[n]-=xDir[n]*(17); // MOVE THE SLICE
    y[n]-=yDir[n]*(17); // " " ""
    if ((x[n] < width && xDir[n] < 0 || x[n] > width && xDir[n] > 0) && !(y[n] > height && n == 15)) //If it isn't in the center yet, draw its current location
      ctx.drawImage(divs[n],x[n]-550/2,y[n]-585/2);
    else if (n == 1) // if the last image reached the center…
    {
      ctx.drawImage(divs[30],width-550/2,height-585/2); //…draw it in the center.
      going = false; // And stop animating.
    }
    else // if the images are still moving but one has already finished, center it
      ctx.drawImage(divs[n],width-550/2,height-585/2);
  }

  if (going)
    setTimeout(animate, 1); // recursion is sexy
}

function pad(n) {
    return (n < 10) ? ("000" + n) : ("00" + n);
}