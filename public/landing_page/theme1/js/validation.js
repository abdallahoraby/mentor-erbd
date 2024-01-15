function setMinMaxLength(inputElementSelector, minLength, maxLength) {
    const inputElement = document.querySelector(inputElementSelector);
    if (!inputElement) return;
    inputElement.setAttribute('minlength', minLength);
    inputElement.setAttribute('maxlength', maxLength);
}

function acceptNumbersOnly(inputElementSelector, minLength, maxLength) {
    setMinMaxLength(inputElementSelector, minLength, maxLength);
    const inputElement = document.querySelector(inputElementSelector);
    if (!inputElement) return;
    inputElement.addEventListener('keypress', (event) => {
        const valueLength = inputElement.value.length;
        var regex = new RegExp("^[0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key) || valueLength >= maxLength) {
            event.preventDefault();
        }
    });
}

setMinMaxLength('#cib_first_name',5, 15);
setMinMaxLength('#cib_last_name',5, 15);
setMinMaxLength('#cib_work_email',6, 50);
setMinMaxLength('#cib_alternative_email',6, 50);
setMinMaxLength('#company_name',3, 15);
acceptNumbersOnly('#cib_mobile_number', 11, 11);
acceptNumbersOnly('#cib_first_6_digits', 6, 6);
acceptNumbersOnly('#cib_last_4_digits',4, 4);
