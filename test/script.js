$(function(){

  $('div')
  .css({'width':'100px','height':'100px'});
  $('#vert').fadeOut(1);
  $('#orange').fadeOut(1);

function passeAuVert(){
$('#rouge').fadeOut(500);
$('#vert').fadeIn(500);

}

function passeAuOrange(){
  $('#vert').fadeOut(500);
  $('#orange').fadeIn(500);
}

function passeAuRouge(){
  $('#orange').fadeOut(500);
  $('#rouge').fadeIn(500);
}
function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}


async function feu(){
  await sleep(4000);
  passeAuVert();
  await sleep(3000);
  passeAuOrange();
  await sleep(1000);
  passeAuRouge();
}



  $('#button').click(function(){
    feu();
  });
});
