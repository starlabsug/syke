const orderMenu = document.querySelector('.order-menu');

const orderBtn = document.querySelector('.order-btn');

//Set initial state of menu
let showMenu = false;

orderBtn.addEventListener('click', toggleMenu);

function toggleMenu() {
    if (!showMenu) {
        orderBtn.classList.add('close');
        orderMenu.classList.add('show');
        //Set order state
        showMenu = true;
    } else {
        orderBtn.classList.remove('close');
        orderMenu.classList.remove('show');
        //Set order state
        showMenu = false;
    }
}