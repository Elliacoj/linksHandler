let $stat = document.getElementById("statDiv");
let $ctx = document.getElementById('myChart');

if($ctx) {
    $ctx.getContext('2d');
}

if($stat) {
    let $title = [];
    let $value = [];

    let $xhr = new XMLHttpRequest();
    $xhr.responseType = "json";
    $xhr.open("GET", "../../api/stat/stat.php");
    $xhr.onload = function() {

        let $response = $xhr.response;
        if($response.length !== 0) {
            $response.forEach(function($e) {
                $title.push($e['name']);
                $value.push($e['click']);
            })
        }
        table($title, $value);
    }
    $xhr.send();
}

function table($title, $value) {
    const $myChart = new Chart($ctx, {
        type: 'bar',
        data: {
            labels: $title,
            datasets: [{
                label: 'Nombre de click',
                data: $value,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

