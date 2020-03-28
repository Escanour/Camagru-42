function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function functiondelete() {
    var n = document.getElementsByClassName("deleteconfirm")[0];
    n.style.display = "block";
    n = document.getElementsByClassName("container")[0];
    n.style = "opacity:0.1";
    event.returnValue = false;
}
