let validating = false;

let formElement = document.querySelector("form");
formElement.innerHTML += `<div
                        id='recaptcha'
                        class='g-recaptcha'
                        data-sitekey='6LfEANslAAAAABfZL76sMdlX1I_1VaH90UC2u7OD'
                        data-callback='onValidCaptcha'
                        data-size='invisible'></div>`;

let submitButton = formElement.querySelector(".lp-pom-button");
if (submitButton) {
    submitButton.onclick = checkCaptcha;
}

function onValidCaptcha(token) {
    validating = token;
    submitButton.click();
}

function checkCaptcha(event) {
    if (! validating) {
        event.preventDefault();
        grecaptcha.execute();
    }
}
