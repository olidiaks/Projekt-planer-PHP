const activeItemOnNavbar = item => {
    const navLink = document.getElementsByClassName('nav-link');

    for (let i = 0; i < navLink.length; i++) {
        if (navLink[i].innerHTML == item) {
            navLink[i].className += ' active';
        }
    }
}

function activeSortOption(dataSortOption) {
    if (dataSortOption == 1) {
        document.getElementById('dataSort').className += ' active';
    } else {
        document.getElementById('isDoneSort').className += ' active';
    }
}

