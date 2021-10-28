let $createAccount = document.getElementById("createDiv");

if($createAccount) {
    let $buttonCreate = document.getElementById("confirmCreate");
    let $passwordInput = document.getElementById("createPassword");
    let $passwordCheckInput = document.getElementById("confirmCreatePassword");

    $buttonCreate.disabled = "true";

    $passwordInput.addEventListener("keyup", function () {
        check($buttonCreate, $passwordInput, $passwordCheckInput);
    })

    $passwordCheckInput.addEventListener("keyup", function () {
        check($buttonCreate, $passwordInput, $passwordCheckInput);
    })
}

/**
 * Check if password is correct
 * @param $button
 * @param $content
 * @param $contentCheck
 */
function check($button, $content, $contentCheck) {
    const $regex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[@$!%*?&])[A-Za-z\\d@$!%*?&]{8,}$");
    if((!$regex.test($content.value) === false) && ($content.value === $contentCheck.value)) {
        $button.removeAttribute("disabled");
        $content.style.borderColor = "black";
        $contentCheck.style.borderColor = "black";
    }
    else {
        $button.disabled = "true";
        $content.style.borderColor = "red";
        $contentCheck.style.borderColor = "red";
    }
}

