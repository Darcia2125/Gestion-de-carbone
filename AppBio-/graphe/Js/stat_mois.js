
function ajaxGet(url,callback) {
    var req = new XMLHttpRequest();
    req.open("GET", url);
    req.send(null);
    req.addEventListener("load", function () {
        if (req.status >= 200 && req.status < 400) {
            // Appelle la fonction callback en lui passant la réponse de la requête
            callback(req.responseText);
        } else {
            console.error(req.status + " " + req.statusText + " " + url);
        }
    });
    req.addEventListener("error", function () {
        console.error("Erreur réseau avec l'URL " + url);
    });   
}
var region="antsinanana";
var url="http://localhost/covid_api/par_moi.php?region="+region;
ajaxGet(url, function (reponse) {
    // Transforme la réponse en tableau d'objets JavaScript
    var result = JSON.parse(reponse);
    for (var a=1;a<13;a++){
      if( typeof(result[a.toString()])==='undefined'){
          result[a.toString()]=[0,0,0];
      }
      else{
        var test=result[a.toString()];
        for (var i=0;i<3;i++){
          if (typeof(test[i])=='undefined'){
            test[i]=0;
          }
          else{
            test[i]=parseInt(test[i]);
          }
        }
      }
    }

    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);


    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        [' ', 'En traitement', 'Gueris', 'Deces'],
        ['Mars', result["3"][2], result["3"][1], result["3"][0]],
        ['Avril',result["4"][2], result["4"][1], result["4"][0]],
        ['Mai', result["5"][2], result["5"][1], result["5"][0]],
        ['Juin',result["6"][2],result["6"][1], result["6"][0]],
        ['Juillet',result["7"][2], result["7"][1],result["7"][0]],
        ['Aout',result["8"][2],result["8"][1],result["8"][0]],
        ['Septembre',result["9"][2],result["9"][1],result["9"][0]],
        ['Octobre',result["10"][2],result["10"][1],result["10"][0]],
        ['Novembre',result["11"][2],result["11"][1],result["12"][0]],
      ]);
    
      var options = {
        chart: {
          title: region.toUpperCase(),
          subtitle: 'Cas de covid 19',
        }
      };
    
      var chart = new google.charts.Bar(document.getElementById('columnchart_material'));    
      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
});
