function hamb() {
  let hamburger = document.getElementById("hamburger");
  let navigatie = document.querySelector(".navigatie");
  //.split("/") splits bij de slashen en de .pop selecteert het laatste element
  var fileName = hamburger.src.split("/").pop();
  if (fileName === "hamburger.png") {
    hamburger.src = "/img/close.png";
    navigatie.style.display = "block";
  } else {
    hamburger.src = "/img/hamburger.png";
    navigatie.style.display = "none";
  }
}
