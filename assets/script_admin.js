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

document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.getElementById('menu-btn');
    const aside = document.querySelector('.aside');

    menuBtn.onclick = () => {
        aside.classList.toggle('active');
        menuBtn.classList.toggle('fa-times'); // Toggle icon to 'X'
    }

    window.onscroll = () => {
        aside.classList.remove('active');
        menuBtn.classList.remove('fa-times');
    }

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
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

function toggleForm() {
    var form = document.getElementById('passwordForm');
    if (form.classList.contains('hidden')) {
        form.classList.remove('hidden');
    } else {
        form.classList.add('hidden');
    }
}


