function Show() {
  var i;
  var x = document.getElementsByClassName('affichagestock');
  for (i = 0; i < x.length; i++) {
      if (x[i].style.display === "none") {
          x[i].style.display = "block";
      } 
      else {
          x[i].style.display = "none";
      }
  }
};

function add(i) { 
  var input = document.getElementsByClassName('form-control');
  var max = parseInt(document.getElementsByClassName('form-control')[i].getAttribute('max'));
  var i;
  value = parseInt(input[i].value);
  if(input[i].value<max) {
	input[i].value = value + 1;
	}
};

function substract(i) {
  var input = document.getElementsByClassName('form-control');
  var i;
  value = parseInt(input[i].value);
  if(input[i].value>0) {
	input[i].value = value - 1;
	}
};

function ajouter(i) {
  var element=document.getElementsByClassName('quantite')[i];
  
  var quantite=element.value;
  var max=element.getAttribute('max');
  var min=element.getAttribute('min');

  if (quantite>max || min<quantite){
    return false;
  }
  return true;
}