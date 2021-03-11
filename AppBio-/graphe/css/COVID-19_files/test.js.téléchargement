function recup(label_date,nouveau_cas){
    var label_nouveau_cas = [];
    for (let i=0; i<label_date.length;i++){
        try{
            var d=nouveau_cas[i].date_resultat;
            var index= label_date.indexOf(d);
            label_nouveau_cas[index]=parseInt(nouveau_cas[index].chiffre);          
        }catch(error){
            continue;      
        }
    }   
    for (let i=0 ;i<label_date.length;i++){
        if (typeof(label_nouveau_cas[i])=='undefined'){
            
            label_nouveau_cas[i]=0
        }
    }
    return (label_nouveau_cas);
}
function ajaxGet(url,callback) {
    var req = new XMLHttpRequest();
    req.open("GET", url);
    req.send(null);
    req.addEventListener("load", function () {
        if (req.status >= 200 && req.status < 400) {
            callback(req.responseText);
        } else {
            console.error(req.status + " " + req.statusText + " " + url);
        }
    });
    req.addEventListener("error", function () {
        console.error("Erreur réseau avec l'URL " + url);
    });   
}


function toTitleCase(str) {
    return str.replace(
        /\w\S*/g,
        function(txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        }
    );
}
// the output: "Jeudi, 24 octobre 2019"
$(document).ready(function(){
var options = {year: 'numeric', month: 'long', day: 'numeric' };
var opt_weekday = { weekday: 'long' };
var today  = new Date();
var weekday = toTitleCase(today.toLocaleDateString("fr-FR", opt_weekday));
var the_date = weekday + ", " + today.toLocaleDateString("fr-FR", options)
$("#date").html(the_date);
var url="http://localhost/covid_api/result.php?jours=7";
ajaxGet(url,function(reponse){
            var result = JSON.parse(reponse);
            var date = result.results.date;
            var label_date=[];
            for (let i=0;i < date.length ;i++){
                var d=date[i].selected_date;
                label_date.push(d);
            } 
            var nouveau_cas= result.results.nouveau_cas; 
            cas= recup(label_date,nouveau_cas);     
            var gueris=result.results.gueris;
            gueris= recup(label_date,gueris);
            var deces=result.results.deces;
            deces= recup(label_date,deces);
            var new_gueri=parseInt(gueris[gueris.length-1]);
            var new_deces=parseInt(deces[deces.length-1]);
            var nb_nouveau_cas= parseInt(cas[cas.length-1]);       
            
            //--------cas||gueris||deces-------------------------------
            var total=[parseInt(result.results.total.case[0].total),parseInt(result.results.total.gueris[0].total),parseInt(result.results.total.deaths[0].total)];   
            var new_total=[nb_nouveau_cas,new_gueri,new_deces];

            //Ecrire la valeur de s données et les chiffres dans l'html:

            //Les totals
            $("#cas_total").html(total[0]-(total[1]+total[2]));
            $("#gueri_total").html(total[1]);           
            $("#deces_total").html(total[2]);

            //L'aujourd'hui:
            $("#nouveau_cas_today").html(new_total[0]);
            $("#nouveau_gueri_today").html(new_total[1]);
            $("#nouveau_deces_today").html(new_total[2]);

            //Tracer la graphede résultat:
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);   
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Etat', 'Numbrre de personne'],
                  ['En traitement',total[0]-(total[1]+total[2])],
                  ['Gueris', total[1]],
                  ['Deces', total[2]],
                ]);
            
                var options = {
                  title: 'Graphe des statistiques:'
                };          
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
              } 
})
});