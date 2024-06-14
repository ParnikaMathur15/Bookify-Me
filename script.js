function showButton() {
  var reviewButton = document.getElementById("reviewButton");
  reviewButton.style.display = "block";
}

function hideButton(){
  var reviewButton = document.getElementById("reviewButton");
  reviewButton.style.display = "none";
}

function show(){
  var formBox = document.getElementById('message');
    formBox.style.display = 'flex';
}

function add(){
    var formBox = document.getElementById('formBox');
    formBox.style.display = 'block';
}
  
function formclose(){
  formBox.style.display = 'none';
}

function showuser(){
   var user = document.getElementById('userb');
   user.style.display = 'inline-block';
}

// let userBox = document.querySelector('.header .header-1 .user-box');

// document.querySelector('#user-btn').onclick = () =>{
//    userBox.classList.toggle('active');
//    navbar.classList.remove('active');
// }

let navbar = document.querySelector('.header .header-2 .navbar');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   userBox.classList.remove('active');
}

window.onscroll = () =>{
   userBox.classList.remove('active');
   navbar.classList.remove('active');

   if(window.scrollY > 60){
      document.querySelector('.header .header-2').classList.add('active');
   }else{
      document.querySelector('.header .header-2').classList.remove('active');
   }
}