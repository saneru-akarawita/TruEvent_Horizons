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
  min-height: 100vh;
  background-attachment: fixed;
  background-size: cover;
  background: #c4bfc7;
  display: flex;
  justify-content: center;
  align-items: center;
}
    

.carousel {
  padding-top:120px;
  height: 80vh;
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
  transform: translateZ(20rem);
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
  margin-top: 20px;
}
.carousel__btn:hover {
  transform: scale(1.04);
  background: #000000;
}
    
  </style>
</head>

<body>
<div class="images-body">
        <div class="carousel">
                <div class="carousel__cards">
                        <div class="carousel__card">
                                <img class="carousel__img"
                                src="https://images.pexels.com/photos/1024984/pexels-photo-1024984.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!">
                        </div>

                        <div class="carousel__card">
                                <img class="carousel__img"
                                src="https://images.pexels.com/photos/7867912/pexels-photo-7867912.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!">
                        </div>

                        <div class="carousel__card">
                                <img class="carousel__img"
                                src="https://images.pexels.com/photos/15202808/pexels-photo-15202808.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!">
                        </div>

                        <div class="carousel__card">
                                <img class="carousel__img"
                                src="https://images.pexels.com/photos/12224243/pexels-photo-12224243.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!">
                        </div>

                        <div class="carousel__card">
                                <img class="carousel__img"
                                src="https://images.pexels.com/photos/7871159/pexels-photo-7871159.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!">
                        </div>

                        <div class="carousel__card">
                                <img class="carousel__img"
                                src="https://images.pexels.com/photos/1921168/pexels-photo-1921168.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!">
                        </div>

                        <div class="carousel__card">
                                <img class="carousel__img"
                                src="https://images.pexels.com/photos/462030/pexels-photo-462030.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!">
                        </div>

                        <div class="carousel__card">
                                <img class="carousel__img"
                                src="https://images.pexels.com/photos/7149143/pexels-photo-7149143.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="oops!!">
                        </div>
                

                </div>

                <div class="carousel__control">
                        <button class="carousel__btn carousel__btn--back">&#8678; Prev</button>
                        <button class="carousel__btn carousel__btn--next">Next &#8680;</button>
                </div>
        </div>
</div>
 
<script>
 const next = document.querySelector(".carousel__btn--next"),
  back = document.querySelector(".carousel__btn--back"),
  carousel = document.querySelector(".carousel__cards");
let angle = 0;

next.addEventListener("click", () => {
  angle -= 45;
  carousel.style.transform = `translateZ(20rem) rotateY(${angle}deg)`;
});

back.addEventListener("click", () => {
  angle += 45;
  carousel.style.transform = `translateZ(20rem) rotateY(${angle}deg)`;
});

// let a = 0;
// let timeout;
// function updategellary() {
//   carousel.style.transform = `perspective(1000px) rotateY(${a}deg)`;
//   timeout=setTimeout(() => {
//     a = a - 45;

//     updategellary();
//   }, 4000);
// }
// updategellary();

    </script>
</body>
</html>