function load_data() {
    $('#countUser').html('<div class="fas fa-circle-notch fa-spin h-100"></div>');
    $('#countUsaha').html('<div class="fas fa-circle-notch fa-spin h-100"></div>');
    $('#countBarang').html('<div class="fas fa-circle-notch fa-spin h-100"></div>');
    $('#countSuplier').html('<div class="fas fa-circle-notch fa-spin h-100"></div>');
    $('#userChartDiv').html(`
        <div class="d-flex justify-content-center">
            <div class="fas fa-circle-notch fa-spin h-100"></div>
        </div>
    `);
    $.ajax({
        url: APP_URL + '/admin/dashboard',
        type: 'GET',
        success: function (response) {
            $('#countUser').html(response['user']);
            $('#countUsaha').html(response['usaha']);
            $('#countBarang').html(response['barang']);
            $('#countSuplier').html(response['suplier']);
            $('#userChartDiv').html('<canvas id="userChart"></canvas>');

            var ctx = document.getElementById("userChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [
                            response['users_paid'],
                            response['users_free'],
                        ],
                        backgroundColor: [
                            '#63ed7a',
                            '#6777ef',
                        ],
                    }],
                    labels: [
                        'Paid',
                        'Free',
                    ],
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'bottom',
                    },
                }
            });
        },
        error: () => {
            $('#countUser').html(':(');
            $('#countUsaha').html(':(');
            $('#countBarang').html(':(');
            $('#countSuplier').html(':(');

            $('#userChartDiv').html(`
                <div class="d-flex justify-content-center">
                    <p>Something went wrong :( click this button to retry</p>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary" onclick="load_data()">Retry</button>
                </div>
            `);
        }
    });
}

$(document).ready(function () {
    load_data();
});
