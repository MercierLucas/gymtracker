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

function ajaxSelect(){
  var httpRequest=getHttpRequest();
  httpRequest.open('POST','./Model/getExerciceList.php',true);
  var data=new FormData();
  data.append('name',document.getElementById('mslgroup').value.toLowerCase());
  httpRequest.send(data);
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
}

function ajaxExinprogram(id){
  var httpRequest=getHttpRequest();
  httpRequest.open('POST','./Model/getExinprogram.php',true);
  var data=new FormData();
  var temp=id;
  data.append('idprogram',temp.replace('program',''));
  httpRequest.send(data);
  httpRequest.onreadystatechange=function(){
    if(httpRequest.readyState===4){
        console.log(httpRequest.responseText);
        obj=JSON.parse(httpRequest.responseText);
        removeChild('tablecontent'); // efface les anciennes données
        if(obj.length==0) $('#tablecontent').append("<option disabled>No exercices found</option>");
        for(var i=0;i<obj.length;i++){
          $('#tablecontent').append("<tr id='exinprogram"+obj[i].idExinprogram+"' class='program"+obj[i].idProgram+"' ><td>"+obj[i].exname+"</td><td>"+obj[i].sets+"</td><td>"+obj[i].reps+"</td><td>"+obj[i].rest+"<td></td><td><a href='#' class='delinprogram'>&#10005</a></td></tr>");
        }      
    }
  }

}
  // Add row to form
$('#mslgroup').change(function(e){
    console.log('changed');
    e.preventDefault();
    ajaxSelect()
    //var form=document.getElementById('form');

});  

window.addEventListener("load", function(e) {
  ajaxSelect();
});

$('.program').click(function(e) {
  e.preventDefault();
  ajaxExinprogram(this.id);
});


// delete exercices in program
$(document).on('click','.delinprogram', function() {
  var httpRequest=getHttpRequest();
  httpRequest.open('POST','./Model/delExinprogram.php',true);
  var data=new FormData();
  var id=this.parentNode.parentNode.getAttribute('id');
  var idProgram=this.parentNode.parentNode.getAttribute('class');
  data.append('idinprogram',id.replace('exinprogram',''));
  httpRequest.send(data);
  httpRequest.onreadystatechange=function(){
    if(httpRequest.readyState===4){
      ajaxExinprogram(idProgram.replace('program',''));
      console.log('Delete success');    
    }
  }

});