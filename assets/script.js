// let currentSlide = 0;
// const slides = document.querySelectorAll('#slideshow img');
// const totalSlides = slides.length;

// function showSlide(index) {
//   slides.forEach((slide, i) => {
//     if (i === index) {
//       slide.classList.add('active');
//     } else {
//       slide.classList.remove('active');
//     }
//   });
// }

// function changeSlide(direction) {
//   currentSlide += direction;
//   if (currentSlide < 0) {
//     currentSlide = totalSlides - 1;
//   } else if (currentSlide >= totalSlides) {
//     currentSlide = 0;
//   }
//   showSlide(currentSlide);
// }

// showSlide(currentSlide);
// setInterval(() => {
//   changeSlide(1);
// }, 3000);

var video = document.getElementById("myVideo");
