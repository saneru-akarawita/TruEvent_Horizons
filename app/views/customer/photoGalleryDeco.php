<!DOCTYPE html>
<!--Code By foolishdeveloper.com-->
<html lang="en" >

<head>
  <meta charset="UTF-8">

  <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
  <style media="screen">
 html {
  box-sizing: border-box;
}

*, *::after, *::before {
  box-sizing: inherit;
  margin: 0;
  padding: 0;
}

.images-body{
  font-family: sans-serif;
  min-height: 90vh;
  background-attachment: fixed;
  background-size: cover;
  background: #c4bfc7;
  display: flex;
  justify-content: center;
  align-items: center;
}
    

.carousel {
  padding-top:90px;
  height: 70vh;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  perspective: 100rem;
}
.carousel__cards {
  position: relative;
  width: 20rem;
  height: 30rem;
  transform-style: preserve-3d;
  transform: translateZ(15rem);
  transition: transform 0.3s ease-in;
}
.carousel__img {
  display: inline-block;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  box-shadow:0 1px 2px rgba(0,0,0,0.15);
  transition: box-shadow 0.3s ease-in-out;
}
.carousel__card {
  width: 100%;
  height: 100%;
  position: absolute;
  border-radius: 0.2rem;
  font-size: 3em;
  font-weight: 700;
}
.carousel__card:nth-child(1) {
  transform: rotateY(0deg) translateZ(25rem);
}
.carousel__card:nth-child(2) {
  transform: rotateY(45deg) translateZ(25rem);
}
.carousel__card:nth-child(3) {
  transform: rotateY(90deg) translateZ(25rem);
}
.carousel__card:nth-child(4) {
  transform: rotateY(135deg) translateZ(25rem);
}
.carousel__card:nth-child(5) {
  transform: rotateY(180deg) translateZ(25rem);
}
.carousel__card:nth-child(6) {
  transform: rotateY(225deg) translateZ(25rem);
}
.carousel__card:nth-child(7) {
  transform: rotateY(270deg) translateZ(25rem);
}
.carousel__card:nth-child(8) {
  transform: rotateY(315deg) translateZ(25rem);
}

.carousel__btn {
  outline: none;
  border: none;
  border-radius: 0.2rem;
  background: #6f055d;
  padding: 0.5em 1em;
  font-size: 1.2em;
  font-weight: 500;
  color: #ffffff;
  cursor: pointer;
  margin: 0 2rem;
  margin-top: 100px;
}
.carousel__btn:hover {
  transform: scale(1.04);
  background: #000000;
}
    
  </style>
</head>

<body>
<div class="images-body">
<img class="carousel__img"
        src="<?php echo URLROOT?>/public/images/temp.png" alt="oops!!"
        style="width:265px; height:auto; margin-top:-70px; margin-left:80px; box-shadow:none;">

        <div class="carousel">
                <div class="carousel__cards">
                        <div class="carousel__card">
                                <img class="carousel__img"
                                src="https://images.pexels.com/photos/698907/pexels-photo-698907.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!">
                        </div>

                        <div class="carousel__card">
                                <img class="carousel__img"
                                src="https://images.pexels.com/photos/6211092/pexels-photo-6211092.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!">
                        </div>

                        <div class="carousel__card">
                                <img class="carousel__img"
                                src="https://images.pexels.com/photos/6102575/pexels-photo-6102575.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!">
                        </div>

                        <div class="carousel__card">
                                <img class="carousel__img"
                                src="https://images.pexels.com/photos/6211036/pexels-photo-6211036.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!">
                        </div>

                        <div class="carousel__card">
                                <img class="carousel__img"
                                src="https://images.pexels.com/photos/4916677/pexels-photo-4916677.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!">
                        </div>

                        <div class="carousel__card">
                                <img class="carousel__img"
                                src="https://images.pexels.com/photos/6102440/pexels-photo-6102440.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!">
                        </div>

                        <div class="carousel__card">
                                <img class="carousel__img"
                                src="https://images.pexels.com/photos/6152029/pexels-photo-6152029.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!">
                        </div>

                        <div class="carousel__card">
                                <img class="carousel__img"
                                src="https://images.pexels.com/photos/4947272/pexels-photo-4947272.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!">
                        </div>
                

                </div>

                <div class="carousel__control">
        
         <button class="carousel__btn carousel__btn--back" id="prev">&#8678; Prev</button>
                        <button class="carousel__btn carousel__btn--next" id="next">Next &#8680;</button>
                </div>
        </div>

        <img class="carousel__img"
        src="<?php echo URLROOT?>/public/images/temp.png" alt="oops!!"
        style="width:265px; height:auto; margin-top:-70px; margin-right:80px; box-shadow:none;">

</div>
 
<script>
 const next = document.querySelector(".carousel__btn--next"),
  back = document.querySelector(".carousel__btn--back"),
  carousel = document.querySelector(".carousel__cards");
let angle = 0;


setInterval(displayHello, 3000);

function displayHello() {
  document.getElementById("next").click();
}

next.addEventListener("click", () => {
  angle -= 45;
  carousel.style.transform = `translateZ(15rem) rotateY(${angle}deg)`;
});

back.addEventListener("click", () => {
  angle += 45;
  carousel.style.transform = `translateZ(15rem) rotateY(${angle}deg)`;
});

    </script>
</body>
</html>