"use strict";

//Pobiera wszystkie potencjalne formularze, które trzeba zwalidować.
const forms = document.querySelectorAll('.needs-validation');

//Iteruje po kolei po każdym formularzu znajdującym się na stronie internetowej
for (const form of forms) {

    //Dodaje słuchacza, który nasłuchuje, czy formularz został wysłany.
    form.addEventListener('submit', event => {

        //Sprawdzenie, czy dany element formularza spełnia wszystkie warunki (określone w HTML).
        if (!form.checkValidity()) {
            //Zapobiega wysłaniu formularza.
            event.preventDefault();
            event.stopPropagation();
        }
    })
    form.classList.add('was-validated');
}

