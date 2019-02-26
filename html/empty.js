var x=document.forms["subform"]["mail"].value;
var y;

function emptyForm() {
  var x = document.forms["subform"]["mail"].value;
  if (x == "") {
    //alert("Valid email is required!");
    document.getElementById("hey").style.display="block";
    document.getElementsByClassName("suby")[0].style.border="2px solid #EE4400";
    //document.getElementsByTagName("form")[0].style.display="none";
    
    return false;
  }
  else {//document.getElementsByTagName("form")[0].style.display="none"; 
        return true;}
}
