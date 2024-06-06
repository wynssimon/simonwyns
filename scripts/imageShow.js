/*const kader = document.getElementById("kader");

const img = document.getElementById("simon");
const kaderImg = document.getElementById("imgPlace");
const captionText = document.getElementById("caption");
img.onclick = function () {
  kader.style.display = "block";
  kaderImg.src = this.src;
  captionText.innerHTML = this.alt;
};


}*/

function vergroot(element) {
  const img = document.getElementById(element);
  const kader = document.getElementById("kader");
  const kaderImg = document.getElementById("imgPlace");
  const captionText = document.getElementById("caption");
  kader.style.display = "block";
  kaderImg.src = img.src;
  captionText.innerHTML = img.alt;
}
const span = document.getElementsByClassName("close");

function closeModal() {
  kader.style.display = "none";
}
