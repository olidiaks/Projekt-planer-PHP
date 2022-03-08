const activeItemOnNavbar = item => {
    const navLink = document.getElementsByClassName('nav-link');

    for (let i = 0; i < navLink.length; i++) {
        if (navLink[i].innerHTML == item) {
            navLink[i].className += ' active';
        }
    }
}