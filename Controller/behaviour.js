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

function sendAjaxSelect(httpRequest){
  httpRequest.open('POST','./Model/getExerciceList.php',true);
  var data=new FormData();
  data.append('name',document.getElementById('mslgroup').value.toLowerCase());
  httpRequest.send(data); 
}

  // Add row to form
$('#mslgroup').change(function(e){
    console.log('changed');
    e.preventDefault();
    //var form=document.getElementById('form');
    var httpRequest=getHttpRequest();
    sendAjaxSelect(httpRequest);
    console.log("recherche sur: "+document.getElementById('mslgroup').value.toLowerCase());
    httpRequest.onreadystatechange=function(){
      if(httpRequest.readyState===4){
          //document.getElementById('result').innerHTML=httpRequest.responseText;
          console.log('Input: '+httpRequest.responseText);
          obj=JSON.parse(httpRequest.responseText);
          console.log(obj);
          removeChild('exgroup'); // efface les anciennes données
          if(obj.length==0) $('#exgroup').append("<option disabled>No exercices found</option>");
          for(var i=0;i<obj.length;i++){
            $('#exgroup').append("<option value='"+obj[i].name+"'>"+obj[i].name+"</option>");
          }     
      }
  }
});  

window.addEventListener("load", function(e) {
  var httpRequest=getHttpRequest();
  sendAjaxSelect(httpRequest);
});

$('.program').click(function(e) {
  var httpRequest=getHttpRequest();
  httpRequest.open('POST','./Model/getExinprogram.php',true);
  var data=new FormData();
  var temp=this.id;
  data.append('idprogram',temp.replace('program',''));
  httpRequest.send(data);
  httpRequest.onreadystatechange=function(){
    if(httpRequest.readyState===4){
        //document.getElementById('result').innerHTML=httpRequest.responseText;
        console.log('program: '+httpRequest.responseText);
        obj=JSON.parse(httpRequest.responseText);
        console.log(obj);
         removeChild('tablecontent'); // efface les anciennes données
        if(obj.length==0) $('#tablecontent').append("<option disabled>No exercices found</option>");
        for(var i=0;i<obj.length;i++){
          $('#tablecontent').append("<tr><td>"+obj[i].exname+"</td><td>"+obj[i].sets+"</td><td>"+obj[i].reps+"</td><td>"+obj[i].rest+"</td></tr>");
        }      
    }
}
});