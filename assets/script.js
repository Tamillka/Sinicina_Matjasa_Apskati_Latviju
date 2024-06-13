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
    menu.classList.toggle('fa-times') //pieliek ikonu - krustinu
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




var expanded = false;

function showCheckboxes() {
    var checkboxes = document.getElementById("checkboxes");
    if (!expanded) {
        checkboxes.style.display = "block";
        expanded = true;
    } else {
        checkboxes.style.display = "none";
        expanded = false;
    }
}

function showCheckboxes() {
    var checkboxes = document.getElementById("checkboxes");
    if (checkboxes.style.display === "block") {
        checkboxes.style.display = "none";
    } else {
        checkboxes.style.display = "block";
    }
}

function toggleCheckboxes(selectAllCheckbox) {
    var checkboxes = document.querySelectorAll('#checkboxes input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] !== selectAllCheckbox) {
            checkboxes[i].checked = selectAllCheckbox.checked;
        }
    }
}

