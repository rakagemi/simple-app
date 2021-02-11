let role;
let table;
let action;
let _token;

$(document).ready(() => {
    load_data();
    role = $('meta[name="_role"]').attr('content');
    _token = $('meta[name="_token"]').attr('content');
});

function load_data() {
    const container = $('.card-body .container');
    container.html(`
    <div class="d-flex justify-content-center">
        <div class="spinner-grow text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    `);

    $.ajax({
        url: APP_URL + "/admin/versiaplikasi/getAll",
        dataType: 'JSON',
        method: 'GET',
        data: {
            _token: _token
        },
        success: (result) => {
            console.log(result);
            load_form();
            for (const key in result) {
                $('#' + key).val(result[key]);
            }
            if (role != "super admin") {
                $('#saveButton').remove();
                $('input').attr('disabled', true);
                $('input').addClass('disabled');
            }
            $('input[name="_token"]').val(_token)
        },
        error: () => {
            container.html(`
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

function load_form() {
    $('.card-body .container').html( /*html*/ `
        <form method="POST" id="versionForm" class="w-100">
            <input type="hidden" name="_token">
            <div class="row">
                <div class="col col-xl-6 col-lg-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="versioncode">Version Code</label>
                        <input class="form-control" type="text" id="versioncode" name="versioncode"
                            placeholder="Masukkan version code...">

                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
                <div class="col col-xl-6 col-lg-12 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="versionname">Version Name</label>
                        <input class="form-control" type="text" id="versionname" name="versionname"
                            placeholder="Masukkan nama versi...">

                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-12">
                    <div class="form-group">
                        <label for="link">URL</label>
                        <input class="form-control" type="text" id="link" name="link" placeholder="http://">

                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <div class="row">
                <div class="col col-12">
                    <button class="btn btn-primary float-right" id="saveButton">Save changes</button>
                </div>
            </div>
    `);
}

function submit_version() {
    let button = $('#saveButton');
    button.addClass('btn-progress');
    console.log($('form#versionForm').serialize());

    $.ajax({
        url: APP_URL + '/admin/versiaplikasi',
        type: "POST",
        data: $('form').serialize(),
        success: function (response) {
            console.log(response);
            if (response['status']) {
                reload_table();
            } else {
                alert('Something went wrong');
            }

            button.removeClass('btn-progress');
        },
        error: (response) => {
            console.log(response);
            $.notify('Something went wrong :( please try again');

            button.removeClass('btn-progress');
        }
    });
}

$('.card-body .container').on('click', '#saveButton', () => {
    submit_version();
});
