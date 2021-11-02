let $stat = document.getElementById("stat");

if($stat) {
    let $xhr = new XMLHttpRequest();
    $xhr.responseType = "json";
    $xhr.open("GET", "../../api/stat/stat.php");
    $xhr.onload = function() {
        let $response = $xhr.response;

        if($response.length !== 0) {
            $response.forEach(function($e) {

            })
        }
    }
    $xhr.send();
}