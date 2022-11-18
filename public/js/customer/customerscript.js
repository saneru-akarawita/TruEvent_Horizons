let menu = document.querySelector('#menu-btn');
let nav = document.querySelector('.header .navbar');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};


window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
};

let slideIndex = 1;

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slide");

    console.log(slides);

    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "flex";
}


const service = document.getElementById('service');
const package = document.getElementById('package');
const sdetails = document.getElementById('service-details');
const sname = document.getElementById('service-name');
const pdetails = document.getElementById('package-details');
const pname = document.getElementById('package-name');

package.addEventListener('change', function () {
    pdetails.disabled = false;
    pname.disabled = false;
    sdetails.disabled = true;
    sname.disabled = true;
});

service.addEventListener('change', function () {
    sdetails.disabled = false;
    sname.disabled = false;
    pdetails.disabled = true;
    pname.disabled = true;
});