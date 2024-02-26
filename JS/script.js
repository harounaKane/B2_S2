//let h1 = document.getElementsByTagName("h1");
let liens = document.querySelectorAll("a");
//h1.innerHTML = "Cours de JS";

for (let i = 0; i < liens.length; i++) {
    liens[i].style.backgroundColor = "red";
    liens[i].style.padding = "5px"; 

    liens[i].addEventListener("mouseover", function(){
        liens[i].style.backgroundColor = "green";
    });
}

let paras = document.getElementsByClassName("paragraphe");

let input = document.getElementById('prenom');

let btn = document.getElementById('btn');

btn.addEventListener("click", lireForm);

function lireForm(){
    console.log(this);
}