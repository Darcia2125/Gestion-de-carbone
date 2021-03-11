// Exécute un appel AJAX GET
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

function requete_api(url,area_name){
    if($("#mode_view").val()=="graphe"){
        ajaxGet(url, function (reponse) {
            $("#columnchart_material").attr("id","linechart_material");
            // Transforme la réponse en tableau d'objets JavaScript
            var result = JSON.parse(reponse);
            //Pour récupérer la date:
            var date = result.results.date;
            var label_date=[];
            for (let i=0;i < date.length ;i++){
                var d=date[i].selected_date;
                label_date.push(d);
            } 
            $("#area_name").html(area_name.toUpperCase());
          //Pour récuperer les nouveau_cas:
            var nouveau_cas= result.results.nouveau_cas; 
            cas= recup(label_date,nouveau_cas);     
            //Pour récuperr les gueris: 
            var gueris=result.results.gueris;
            gueris= recup(label_date,gueris);
            //Pour récuperer les morts:
            var deces=result.results.deces;
            deces= recup(label_date,deces);
            //Pour récuperer les cas total:
            //0:nombre de cas|| 1:nombre total de mort ||nombre total de guéris
            var total=[parseInt(result.results.total.case[0].total),parseInt(result.results.total.deaths[0].total),parseInt(result.results.total.gueris[0].total) ];   
            $("#cas_total").html(total[0]);
            $("#deces").html(total[1]);
            $("#gueri").html(total[2]);
            
            //Les nouveaux cas de la date d'aujourd'hui:
            var nb_nouveau_cas= parseInt(cas[cas.length-1]);
            $("#nouveau_cas").html(nb_nouveau_cas);
        
            $("#en_traitement").html(total[0]-(total[2]+total[1]));
            
            google.charts.load('current', {'packages':['line']});
            google.charts.setOnLoadCallback(drawChart);
        
          function drawChart() {
        
            var data = new google.visualization.DataTable();
            data.addColumn('date', 'Day');
            data.addColumn('number', 'Nouveau cas');
            data.addColumn('number', 'Gueris');
            data.addColumn('number', 'Deces');
            for (var i=label_date.length-8;i<label_date.length;i++){
                data.addRow([new Date(label_date[i]),cas[i], gueris[i], deces[i]]);
            }
            var options = {
              chart: {
                title: 'Statistique Covid 19 Madagascar',
                subtitle: 'respectons les autres - aidons-nous - suivant les gèstes barriières'
              },
              width: 900,
              height: 500
            };
        
            var chart = new google.charts.Line(document.getElementById('linechart_material'));
            chart.draw(data, google.charts.Line.convertOptions(options));
          }
            });
    }
    else{
        $("#linechart_material").attr("id","columnchart_material");
        var region=area_name;
        if((area_name)=="madagascar"){
            var url="http://localhost/covid_api/par_moi.php";
            console.log("tonga aty eee");
        }
        else {
            var url="http://localhost/covid_api/par_moi.php?region="+region;
        }

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
            $("#area_name").html(region.toUpperCase());
        
        
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                [' ', 'Deces', 'Gueris', 'En Traitement'],
                ['Mars', result["3"][2], result["3"][0], result["3"][1]],
                ['Avril',result["4"][2], result["4"][0], result["4"][1]],
                ['Mai', result["5"][2], result["5"][0], result["5"][1]],
                ['Juin',result["6"][2],result["6"][0], result["6"][1]],
                ['Juillet',result["7"][2], result["7"][0],result["7"][1]],
                ['Aout',result["8"][2],result["8"][1],result["8"][1]],
                ['Septembre',result["9"][2],result["9"][0],result["9"][1]],
                ['Octobre',result["10"][2],result["10"][0],result["10"][1]],
                ['Novembre',result["11"][2],result["11"][0],result["12"][1]],
              ]);
            
              var options = {
                chart: {
                  title:"Statistique covid 19 à Madagascar" ,
                  subtitle: 'respectons les autres  -aidons-nous - suivant les geste barrières',
                }
              };
            
              var chart = new google.charts.Bar(document.getElementById('columnchart_material'));    
              chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        });
    }
    var ges=" ";
    if(area_name){
        if (area_name=="madagascar"){
            ges="http://localhost/covid_api/result.php?jours=7";
        }
        else{   
            ges="http://localhost/covid_api/result.php?jours=7&region="+area_name;
        }       
    }

    ajaxGet(ges, function (reponse) {
    // Transforme la réponse en tableau d'objets JavaScript
    var result = JSON.parse(reponse);
    //Pour récupérer la date:
    var date = result.results.date;
    var label_date=[];
    for (let i=0;i < date.length ;i++){
        var d=date[i].selected_date;
        label_date.push(d);
    } 
    $("#area_name").html(area_name.toUpperCase());
  //Pour récuperer les nouveau_cas:
    var nouveau_cas= result.results.nouveau_cas; 
    cas= recup(label_date,nouveau_cas);     
    //Pour récuperr les gueris: 
    var gueris=result.results.gueris;
    gueris= recup(label_date,gueris);
    //Pour récuperer les morts:
    var deces=result.results.deces;
    deces= recup(label_date,deces);
    //Pour récuperer les cas total:
    //0:nombre de cas|| 1:nombre total de mort ||nombre total de guéris
    var total=[parseInt(result.results.total.case[0].total),parseInt(result.results.total.deaths[0].total),parseInt(result.results.total.gueris[0].total) ];   
    $("#cas_total").html(total[0]);
    $("#deces").html(total[1]);
    $("#gueri").html(total[2]);
    
    //Les nouveaux cas de la date d'aujourd'hui:
    var nb_nouveau_cas= parseInt(cas[cas.length-1]);
    $("#nouveau_cas").html(nb_nouveau_cas);

    $("#en_traitement").html(total[0]-(total[2]+total[1]));
});
}
function update_view() {

    if($("#mode_view").val()=="graphe"){
        requete_api("http://localhost/covid_api/result.php?jours="+7,"madagascar");
    } 
    else if( $("#mode_view").val()=="mois"){
        requete_api("http://localhost/covid_api/par_moi.php","madagascar");
    }
     hotspot_tl.to(closeMap, { duration:0.6, ease: "sine.out", autoAlpha: 0 });
     hotspot_tl.to($(".region"), { duration: 0.6, ease: "sine.out", scale: 1, autoAlpha: 1, fill: "#7c7c7c", position: "relative", top: "0", left: "0", x: "0", y: "0" });
     hotspot_tl.play();
  };
$(document).ready(function(){
        url="http://localhost/covid_api/result.php?jours="+7,  
        hotspot_tl = gsap.timeline({ paused: true }),
        closeMap = $("#close_map"),
        region=$(".region").not(".active"),
    requete_api(url,"Madagascar");
    gsap.set(closeMap, { autoAlpha: 0 });
    gsap.set(region, { autoAlpha: 1 });
    $(".region").on("click",function(event){
        $(this).addClass("active");
        $this = $(this);
        var bbox = this.getBBox();

        svg = document.getElementById('map_img'),
        viewBox = svg.getAttribute('viewBox');
        viewBox = viewBox.split(' ');

        var cx = parseFloat(viewBox[0]) + (parseFloat(viewBox[2]) / 2.5),
            cy = parseFloat(viewBox[1]) + (parseFloat(viewBox[3]) / 2.5),
            x = cx - bbox.x - (bbox.width),
            y = cy - bbox.y - (bbox.height);

        hotspot_tl.to($(".region"), { duration: 0.6, ease: "none", scale: 2, fill: "#7c7c7c", opacity: 1, position: "relative", top: "0", left: "0", x: x, y: y});
        var name=$(this).attr("name");
        var jeu= $(".region").not($(this)),

        url_region="http://localhost/covid_api/result.php?region="+name+"&jours="+7;
        requete_api(url_region,name);
        $(this).css("fill","#7c7c7c");  
        hotspot_tl.to(closeMap, { duration: 0.6, ease: "sine.out", autoAlpha: 1 });    
        hotspot_tl.to(jeu, { duration: 0.6, ease: "sine.out", autoAlpha: 0 }, "-=1");    
        hotspot_tl.play(); 
    });
    $("#close_map").on("click", function () {
        $(".region active").removeClass("active");    
        if($("#mode_view").val()=="graphe"){
            requete_api("http://localhost/covid_api/result.php?jours="+7,"madagascar");
        } 
        else if( $("#mode_view").val()=="mois"){
            requete_api("http://localhost/covid_api/par_moi.php","madagascar");
            console.log("nety");
        }
         
        hotspot_tl.to(closeMap, { duration:0.6, ease: "sine.out", autoAlpha: 0 });
        hotspot_tl.to($(".region"), { duration: 0.6, ease: "sine.out", scale: 1, autoAlpha: 1, fill: "#7c7c7c", position: "relative", top: "0", left: "0", x: "0", y: "0" });
    }) 
});

