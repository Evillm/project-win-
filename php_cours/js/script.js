var countDownDate = new Date("august 30, 2025 15:37:25").getTime();

var x = setInterval(function() {

  var counter =document.querySelector("#countdown") ;
  var now = new Date().getTime();

  var distance = countDownDate - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  counter.innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  if (distance < 0) {
    clearInterval(x);
    innerHTML = "EXPIRED";
  }
}, 1000);


//for choose the winner
 const win = document.querySelector("#winner");
 


  var myModal = new bootstrap.Modal(document.getElementById('model'), {
    Keyboard: false 
 })

 win.addEventListener('click' , function(){

    setTimeout(function(){
        myModal.show();

    } , 3000)
 });



 