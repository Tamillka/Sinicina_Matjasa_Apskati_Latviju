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
function toggleInfo(id) {
    var infoDiv = document.getElementById(id);
    if (infoDiv.style.display === 'none' || infoDiv.style.display === '') {
        infoDiv.style.display = 'block';
    } else {
        infoDiv.style.display = 'none';
    }
}


    let lastScrollTop = 7;
    const header = document.querySelector('header');

    window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop) {
            // Scroll down
            header.style.top = '-7rem';
        } else {
            // Scroll up
            header.style.top = '0';
        }
        lastScrollTop = scrollTop;
    });

    document.addEventListener('DOMContentLoaded', function() {
        const animateElements = document.querySelectorAll('.animate');

        function onScroll() {
            animateElements.forEach(element => {
                const rect = element.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    element.classList.add('visible');
                } else {
                    element.classList.remove('visible');
                }
            });
        }

        window.addEventListener('scroll', onScroll);
        onScroll(); // Initial check on load
    });

    
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('#VisasAktualitates .apr i').forEach(function(plusIcon) {
            plusIcon.addEventListener('click', function() {
                const content = this.closest('.box').querySelector('.content');
                content.classList.toggle('visible');
            });
        });
    });

    let menu = document.querySelector('#menu-btn')
let navbar = document.querySelector('nav')

menu.onclick = () => {
    navbar.classList.toggle('active')
    menu.classList.toggle('fa-times') //piliek ikonu - krustinu
}
window.onscroll = () =>{
    navbar.classList.remove('active')
    menu.classList.remove('fa-times')
}

if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

x = () => {
    let alert = document.getElementById("pazinojums")
    alert.style.display = "none"
}