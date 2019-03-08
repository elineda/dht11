


function temp(da,of,option){
  var val;
  let test=$.getJSON("https://elineda.ovh/dht11/index.php?w=takeTen&u="+da+"&v="+of, function(result){
    val=result;
    if (da>24) {
      var res=[];
      var j=0;
      var tabCalc=[];
      var label=[];
      var tabsum=0;
      var x=0;
      for (var i = 0; i < val.length; i++) {

        if (j<23) {
          tabCalc.push(val[i]);
          j++;
        }

        else {
          tabCalc.push(val[i]);

          for (var k = 0; k < tabCalc.length; k++) {
            tabsum+=parseInt(tabCalc[k]);
          }

          let tabMoy=parseInt(tabsum)/tabCalc.length;
          tabMoy=tabMoy.toFixed(2);
          label.push(x);
          x+=1;
          res.push(tabMoy);
          tabsum=0;
          tabMoy=0;
          tabCalc=[];
          j=0;
        }
      }

    }
    else {
      var label=[];
      for (var i = 0; i < val.length; i++) {
        var res=result
        label.push(i);
      }
    }

    console.log(val);

    var ctx = document.getElementById("lineChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: label,
            datasets: [{
                label: 'température',
                data: res,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    let min = Math.min.apply(Math,val);
    let max = Math.max.apply(Math,val);
    let sum=0;
    for (var i = 0; i < val.length; i++) {
      sum+=parseInt(val[i]);
    }
    let moy=sum/val.length;
    if (val.length===24) {
      $('#titre').html("Au cours du dernier jour :");
    }
    else {
      $('#titre').html("Sur les "+(val.length/24).toFixed(0)+" derniers jours :");
    }


    $('#min').html("Température minimale : "+min+" °C");
    $('#max').html("Température maximale : "+max+" °C");
    $('#moy').html("Température moyenne : "+moy.toFixed(2)+" °C");

  })
}


temp(24,0,"none");


$('#go').click(function(){
  let da=$('#da').val()*24;
  let of=0*24;
  temp(da,of,"none");
})
