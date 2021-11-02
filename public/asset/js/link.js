let $addLink = document.getElementById("buttonAdd");

if($addLink) {
    $addLink.addEventListener("click", modalWindows);
}

/**
 * Creat a modal windows for add and update a link
 * @param $data
 */
function modalWindows($data) {
    let $div = document.createElement("div");
    let $pTitle = document.createElement("p");
    let $buttonConfirm = document.createElement("button");
    let $buttonBack = document.createElement("button");

    if(!$data.target.dataset.delete) {
        let $name = document.createElement("div");
        let $title = document.createElement("div");
        let $href = document.createElement("div");

        if($data.target.dataset.id) {
            $pTitle.innerHTML = "Modifier un lien."
            $data.target.removeEventListener("click", modalWindows);

            let $xhr = new XMLHttpRequest();
            $xhr.responseType = "json";
            $xhr.open("SEARCH", "../../api/link/link.php");
            let $dataLink = {'id': $data.target.dataset.id};
            $xhr.send(JSON.stringify($dataLink));
            $xhr.onload = function () {
                let $response = $xhr.response;
                $name.innerHTML = "<label style='color: dodgerblue'>Nom:</label><input style='width: 20rem; margin-left: 2rem;' type='text' value='" + $response['name'] + "'>";
                $title.innerHTML = "<label style='color: dodgerblue'>Titre:</label><input style='width: 20rem; margin-left: 2rem;' type='text' value='" + $response['title'] + "'>";
                $href.innerHTML = "<label style='color: dodgerblue'>Lien:</label><input style='width: 20rem; margin-left: 2rem;' type='text' value='" + $response['href'] + "'>";
            }
        }
        else {
            $pTitle.innerHTML = "Creation de lien."
            $addLink.removeEventListener("click", modalWindows);
            $name.innerHTML = "<label style='color: dodgerblue'>Nom:</label><input style='width: 20rem; margin-left: 2rem;' type='text'>";
            $title.innerHTML = "<label style='color: dodgerblue'>Titre:</label><input style='width: 20rem; margin-left: 2rem;' type='text'>";
            $href.innerHTML = "<label style='color: dodgerblue'>Lien:</label><input style='width: 20rem; margin-left: 2rem;' type='text'>";
        }

        $name.style.cssText = "width: 60%; margin: 2rem auto";
        $title.style.cssText = "width: 60%; margin: 2rem auto";
        $href.style.cssText = "width: 60%; margin: 2rem auto";
        $div.appendChild($name);
        $div.appendChild($title);
        $div.appendChild($href);

        $buttonConfirm.addEventListener("click", function () {
            if($data.target.dataset.id) {
                let $dataSend = {'href': $href.lastChild.value, 'title': $title.lastChild.value, 'name': $name.lastChild.value, "id": $data.target.dataset.id}
                buttonLink( "PUT", $dataSend);
            }
            else {
                let $dataSend = {'href': $href.lastChild.value, 'title': $title.lastChild.value, 'name': $name.lastChild.value}
                buttonLink("POST", $dataSend);
            }
            setTimeout(function () {
                getLinks();
            }, 500)

        });
    }

    if($data.target.dataset.delete) {
        $pTitle.innerHTML = "Supprimer ce lien?";
        $data.target.removeEventListener("click", modalWindows);
    }

    $div.id = "modalLink";
    $buttonConfirm.innerHTML = "Confirmer";
    $buttonBack.innerHTML = "Annuler";
    $div.style.cssText = "position: absolute; background-color: #f0f0f0; width: 50%; border-radius: 5px; box-shadow: 5px 5px 5px darkgray; top: 20vh; left: 25vw;";
    $pTitle.style.cssText = "width: 100%; text-align: center; padding-top: 10px;"
    $buttonConfirm.style.cssText = "width: 20%; margin-left: 28.5%; margin-bottom: 10px;";
    $buttonBack.style.cssText = "width: 20%; margin-left: 5%; margin-bottom: 10px;";

    $div.appendChild($pTitle);
    $div.appendChild($buttonConfirm);
    $div.appendChild($buttonBack);
    document.body.appendChild($div);

    if($data.target.dataset.delete) {
        $buttonConfirm.addEventListener("click", function () {
            if($data.target.dataset.delete) {
                let $dataSend = {"id": $data.target.dataset.delete}
                buttonLink("DELETE", $dataSend);
            }

            setTimeout(function () {
                getLinks();
            }, 500)

        });
    }

    $buttonBack.addEventListener("click", function () {
        $addLink.addEventListener("click", modalWindows);
        $data.target.addEventListener("click", modalWindows);
        $div.remove();
        getLinks();
    });
}

/**
 * Api for create a link
 * @param $action
 * @param $data
 */
function buttonLink($action, $data) {
    let $xhr = new XMLHttpRequest();
    $xhr.responseType = "json";
    $xhr.open($action, "../../api/link/link.php");
    $xhr.send(JSON.stringify($data));
    $xhr.onload = function () {
        let $response = $xhr.response;
        let $modalLink = document.getElementById("modalLink");

        if($response === false) {
            let $p = document.createElement("p");
            $p.innerHTML = "Le lien n'est pas valide";
            $p.style.cssText = "text-align: center; color: red;";
            $modalLink.appendChild(p);
        }
        else {
            $modalLink.remove();
        }
    }
}

let $homePage = document.getElementById("homePage");

if($homePage) {
    getLinks();
}

/**
 * Create all link visual into homePage
 */
function getLinks() {
    $homePage.innerHTML = "";
    let $xhr = new XMLHttpRequest();
    $xhr.responseType = "json";
    $xhr.open("GET", "../../api/link/link.php");
    $xhr.send();
    $xhr.onload = function () {
        let $response = $xhr.response;
        if($response !== null) {
            $response.forEach(function ($e) {
                let $divContainer = document.createElement("div");
                let $divImg = document.createElement("div");
                let $divName = document.createElement("div");
                let $a = document.createElement("a");
                let $iUpdate = document.createElement("i");
                let $iDelete = document.createElement("i");

                $divContainer.className = "link";
                $divImg.className = "imgLink";
                $divName.className = "nameLink";

                $a.href = $e['href'];
                $a.target = "_blanc";
                $a.title = $e['title'];
                $a.innerHTML = $e['name'];

                $iUpdate.className = "far fa-edit";
                $iUpdate.dataset.id = $e['id'];
                $iDelete.className = "fas fa-ban";
                $iDelete.dataset.delete = $e['id'];
                $iDelete.style.cssText = "float: right; color: red;"

                $divContainer.appendChild($divImg);
                $divContainer.appendChild($divName);
                $divImg.appendChild($iUpdate);
                $divImg.appendChild($iDelete)
                $divName.appendChild($a);
                $homePage.appendChild($divContainer);

                $iUpdate.addEventListener("click", modalWindows);
                $iDelete.addEventListener("click", modalWindows);
            });
        }
    }
}