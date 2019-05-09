var getHttpRequest= function(){
    // permet de supporter tous les navigateurs ( même les moins bons tels que IE .......)
    var httpRequest = false;
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        httpRequest = new XMLHttpRequest();
        if (httpRequest.overrideMimeType) {   // permet d'éviter un bug
          httpRequest.overrideMimeType('text/xml');
        }
      }
      else if (window.ActiveXObject) { // IE
        try {
          httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
          try {
            httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
          }
          catch (e) {}
        }
      }
      
      if (!httpRequest) {
        alert('Abandon :( Impossible de créer une instance XMLHTTP');
        return false;
      }
    return httpRequest;
}

// get ajax request
httpRequest=getHttpRequest();
httpRequest.onreadystatechange=function(){
    if(httpRequest.readyState===4){
        //document.getElementById('result').innerHTML=httpRequest.responseText;
        obj=JSON.parse(httpRequest.responseText);
        removeChild('table-body'); // efface les anciennes données
        for(var i=0;i<obj.length;i++){
        }     
    }
}

function removeChild(parent){
    var myNode = document.getElementById(parent);
    while (myNode.firstChild) {
        myNode.removeChild(myNode.firstChild);
    }
}

function dispDiv(div){
    document.getElementById(div).style.display="block";
}
function hideDiv(div){
    document.getElementById(div).style.display="none";
}

function addHiddenField(value){
    $('#hiddenfield').remove();     // pour éviter de rajouter plusieurs fois un hidden field
    $('#addnewexercices').append('<input type="hidden" name="id" value="'+value+'" id="hiddenfield"/> ');
}

function addDetails(name){
    document.getElementById('programdetails').innerHTML="Program: "+name;
}
// add exercices row
$('.program').click(function(e) {
    hideDiv('addProgram');
    e.preventDefault();
    var name=this.innerHTML;
    var temp=this.id;
    var id=temp.replace('program','');
    dispDiv('addexercices');
    document.getElementById('addPrgLegend').innerHTML="Add to "+name;
    addHiddenField(id);
    addDetails(name);
  });


/* $('#exnb').on('input',function(e){
    removeChild('#newexgrp')
    for(var i=0;i<parseInt($('#exnb').val());i++){
        var selectGroup='<select name="exgroup" id="exgroup"><option value="quadriceps">Quadriceps</option><option value="hamstrings">Hamstrings</option><option value="gluteals">Gluteals</option><option value="pectoralis">Pectoralis</option><option value="back">Back</option><option value="lats">Lats</option><option value="biceps">Biceps</option><option value="triceps">Triceps</option><option value="deltoids">Deltoids</option><option value="abs">Abs</option><option value="calves">Calves</option><option value="forearm">Forearm</option></select>';
        var mslgrp='<tr><td>Muscle groupe</td><td>'+selectGroup+'</td><tr></tr>';
        var exlist='<select name="exglist" id="exgroup"><option value="quadriceps">Quadriceps</option>
    
        var exercice=''
        var content='<div>'+mslgrp+'</div>';
    }

});   */