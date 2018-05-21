var snake = [];
var i = 0;
var j = 0;
var n = 2; //=length-1
var m = 0;
var d = 0;
var kp = 0; // egy lépéssel előbbi dir
var wtr = 0; //
var length = 3;
//nyomon követi hányadik szelvényke (index) mik az x ill y koord.ái
var y = [];
var x = [];

var hit_step = 0;

var last_x = 0;
var last_y = 0;

var rnd_y;
var rnd_x;


function init() {


for(j=0; j<25; j++) {
  snake[j] = new Array(75);

  for(i=0; i<75; i++){

    snake[j][i] = 0;

  }

}

y[0] = 0; x[0] = 0;
y[1] = 0; x[1] = 1;
y[2] = 0; x[2] = 2;

snake [0][0] = 1;
snake [0][1] = 1;
snake [0][2] = 1;
rnd_pos();
document.onkeypress = dir;

}



function draw ()
{
  //alert("drawing");


  var ring = document.getElementById("game_area");

  while (ring.firstChild) {
    ring.removeChild(ring.firstChild);
  }

  for (j=0; j<25; j++){
    for (i=0; i<75; i++)
    {
      //alert (j+' '+i+' '+ snake[j][i]);
      nd = document.createElement("div");
      if(snake[j][i] === 1){
        nd.setAttribute("class","snake");}
      else {
        nd.setAttribute("class","nt_snake");}

      sn = ring.appendChild(nd);
      ch = document.createTextNode(String.fromCharCode(9606));

      sn.appendChild(ch);
    }

    ch = document.createTextNode(String.fromCharCode(13));
    sn.appendChild(ch);
  }
}


function move() {

  if((kp === 100 && d === 97) || ( kp === 97 && d === 100) ||
      (kp === 115 && d === 119) || (kp === 119 && d === 115))
        d = kp;


  if(d === 100) { /*RIGHT*/
    n++;
    if (n > 74) n=0;

    kp=100;
    wtr=1;
  }

  if(d === 97)  /*LEFT*/
  {
    n--;
    if (n < 0) n=74;

    kp=97;
    wtr=1;
  }



  if(d === 115)  /*DOWN*/
  {
    m++;
    if (m > 24) m=0;

    kp=115;
    wtr=1;
  }

  if(d === 119) /*UP*/
  {
    m--;
    if (m < 0) m=24;

    kp=119;
    wtr=1;

  }

  if (wtr === 1 && kp>0){
    snake [m][n] = 1;
    chck_fail();
    if (hit_step === 0) {
      snake [last_y][last_x] = 0;
          }

    draw();

    if (hit_step === 0) {
      r=0;
      while(r<(length-1))
        {
          y[r]= y[r+1]; x[r]=x[r+1];
          r++;
        }
      }

      if (hit_step === 1) {
        length++;
        hit_step = 0;
      }

     y[length-1] = m; x[length-1] = n;

     last_y = y[0]; last_x = x[0];
     chck_hit();

     wtr=0;
  }


}



function dir (event) {

  var k = event.charCode || event.keyCode;
  d = k;

}

function rnd_pos () {
  var rnd;
  var again;

  while(1){
  rnd = Math.random();
  again = 0;
  rnd_y = (rnd*25);
  rnd_y = Math.floor(rnd_y);

  rnd = Math.random();
  rnd_x = (rnd*75);
  rnd_x = Math.floor(rnd_x);

  snake[rnd_y][rnd_x] = 1;

  for (q=0; q<length; q++){
    if (rnd_y === y[q] && rnd_x === x[q]) again = 1;
  }

  if (again === 0) break;
  //draw();
  }
}

function chck_hit ()
{

  if (y[length-1] === rnd_y && x[length-1] === rnd_x)
  {
    hit_step = 1;
    rnd_pos();

  }

}


function chck_fail () {
  for (p=0; p<length; p++)
  {
    if (m === y[p] && n === x[p]) {alert("GAME OVER!");}
  }

}
