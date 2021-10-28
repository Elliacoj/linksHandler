let addLink = document.getElementById("buttonAdd");

if(addLink) {
    addLink.addEventListener("click", modalWindows);
}

function modalWindows() {
    addLink.removeEventListener("click", modalWindows);

    let div = document.createElement("div");
    let pTitle = document.createElement("p");
    let name = document.createElement("div");
    let title = document.createElement("div");
    let href = document.createElement("div");
    let buttonConfirm = document.createElement("button");
    let buttonBack = document.createElement("button");

    div.id = "modalLink";
    pTitle.innerHTML = "Creation de lien."
    buttonConfirm.innerHTML = "Confirmer";
    buttonBack.innerHTML = "Annuler";
    name.innerHTML = "<label style='color: dodgerblue'>Nom:</label><input style='width: 20rem; margin-left: 2rem;' type='text'>";
    title.innerHTML = "<label style='color: dodgerblue'>Titre:</label><input style='width: 20rem; margin-left: 2rem;' type='text'>";
    href.innerHTML = "<label style='color: dodgerblue'>Lien:</label><input style='width: 20rem; margin-left: 2rem;' type='text'>";

    div.style.cssText = "position: absolute; background-color: #f0f0f0; width: 50%; border-radius: 5px; box-shadow: 5px 5px 5px darkgray; top: 20vh; left: 25vw;";
    pTitle.style.cssText = "width: 100%; text-align: center; padding-top: 10px;"
    buttonConfirm.style.cssText = "width: 20%; margin-left: 28.5%; margin-bottom: 10px;";
    buttonBack.style.cssText = "width: 20%; margin-left: 5%; margin-bottom: 10px;";
    name.style.cssText = "width: 60%; margin: 2rem auto";
    title.style.cssText = "width: 60%; margin: 2rem auto";
    href.style.cssText = "width: 60%; margin: 2rem auto";

    div.appendChild(pTitle);
    div.appendChild(name);
    div.appendChild(title);
    div.appendChild(href);
    div.appendChild(buttonConfirm);
    div.appendChild(buttonBack);
    document.body.appendChild(div);

    buttonConfirm.addEventListener("click", function () {
        let data = {'href': href.lastChild.value, 'title': title.lastChild.value, 'name': name.lastChild.value}
        buttonCreateLink(addLink, "delete", data);
    });

    buttonBack.addEventListener("click", function () {
        addLink.addEventListener("click", modalWindows);
        div.remove();
    })
}


function buttonCreateLink(button, action, data) {
    let xhr = new XMLHttpRequest();
    xhr.responseType = "json";
    xhr.open("POST", "../../api/link/link.php");
    /*xhr.onload = function () {
        let response = xhr.response;
        let modalLink = document.getElementById("modalLink");

        if(response === false) {
            let p = document.createElement("p");
            p.innerHTML = "Le lien n'est pas valide";
            modalLink.appendChild(p);
        }
        else {
            modalLink.remove();
        }

    }*/
    xhr.send(JSON.stringify(data));
}

