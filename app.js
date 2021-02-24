let controller;
let slideScene;
let pageScene;
let detailScene;

const mouse = document.querySelector('.cursor');
const mouseTxt = mouse.querySelector('span');
const burger = document.querySelector(".burger");
const menu = document.querySelector(".nav-bar");
const img = document.querySelectorAll(".hero-img");
const head = document.querySelector(".nav-header");
const logo = document.querySelector("#logo");
const nova = document.querySelector(".a");
const nova2 = document.querySelector(".b");
const plus = document.getElementsByName('+');



burger.addEventListener("click", navToggle);




function cursor(e){
    mouse.style.top = e.pageY + "px";
    mouse.style.left = e.pageX + "px";
}
function activeCursor(e){
  const item = e.target;
  if (item.id === 'logo' || item.classList.contains('burger')) {
    mouse.classList.add('nav-active');
  }else{
    mouse.classList.remove('nav-active');
  }
  if (item.classList.contains('explore')) {
    mouse.classList.add('explore-active');
    gsap.to('.title-swipe', 1, { y: "0%"});
    mouseTxt.innerText = "Tap";
  }else{
    mouse.classList.remove("explore-active");
    mouseTxt.innerText = "";
    gsap.to(".title-swipe", 0.6, { y: "100%" });
  }
}


function navToggle(e){
    if (!e.target.classList.contains("active")) {
    e.target.classList.add('active');
    gsap.to('.line1', 0.5, {rotate: "45", y: 5, background:"black"});
    gsap.to('.line2', 0.5, {rotate: "-45", y: -5, background:"black"});
    gsap.to("#logo", 1, { img: "img/logonoir.png" });
    gsap.to('.nav-bar', 1, {clipPath: "circle(2500px at 100% -10%)"});
    document.body.classList.add("hide");
    menu.style.height = "100%";
    menu.style.width = "100%";
    mouse.style.border = " 2px solid black";
    head.style.position = "fixed";
    nova2.style.display = "flex"
    nova.style.display = "none"

    }else{
    e.target.classList.remove('active');
    gsap.to('.line1', 0.5, {rotate: "0", y: 0, background:"white"});
    gsap.to('.line2', 0.5, {rotate: "0", y: 0, background:"white"});
    gsap.to("#logo", 1, { color: "white" });
    gsap.to('.nav-bar', 1, {clipPath: "circle(50px at 100% -10%)"});
    document.body.classList.remove("hide");
    menu.style.height = "0%";
    menu.style.width = "0%";
    mouse.style.border = " 2px solid white";
    head.style.position = "";
    nova.style.display = "flex"
    nova2.style.display = "none"
    }
  }


  function Plus(i){
    var texte1=document.getElementsByClassName('text');
    var texte=document.getElementsByClassName('hidden');
    var titre=document.getElementsByClassName('Not-hidden');
    var texte2=document.getElementsByName('cache');
    var texte3=document.getElementsByName('titre-cache');



    if(texte[i].style.display != "flex"){
      texte[i].style.display = "flex";
      texte1[i].classList.add("size");
      titre[i].style.display="none";
      img[i].classList.add("img-hidden");

   }
   else{ texte[i].style.display = "none";
   titre[i].style.display="flex";
   texte1[i].classList.remove("size");
   img[i].classList.remove("img-hidden");
   }}





  window.addEventListener('mousemove', cursor);
  window.addEventListener('mouseover', activeCursor);
  plus[0].addEventListener('click',  function (){Plus(0)});
  plus[1].addEventListener('click',  function (){Plus(1)});
  plus[2].addEventListener('click',  function (){Plus(2)});
  plus[3].addEventListener('click',  function (){Plus(3)});
