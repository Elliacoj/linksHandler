let $contact = document.getElementById("contact");

if($contact) {
    let $send = document.getElementById("sendContact");

    $send.addEventListener("click", function () {
        let $text = document.getElementById("contactText");
        if($text.value !== "") {
            let $xhr = new XMLHttpRequest();
            $xhr.responseType = "json";
            $xhr.open("POST", "../../api/mail/mail.php");

            $xhr.send(JSON.stringify({text: $text.value}));

            $text.value = "";
        }
    })
}