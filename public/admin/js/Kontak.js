let role;
let table;
let action;
let kodeUser;
let kodeKontak;
let forms = {
    'nama': true,
    'email': true,
    'telepon': true
};

$(document).ready(function () {
    $('.segment-select').Segment();

    action = 'getAll';
    load_table();

    role = $('meta[name="_role"]').attr('content');
    if (role != "super admin") {
        $('#saveButton').remove();
    }

    let link = $('.card-header a').attr('href');
    link += '?_token=' + $('meta[name="_token"]').attr('content');
    $('.card-header a').attr('href', link);
});

function load_table() {
    if (table) {
        table.destroy();
    }
    table = $('#kontakDataTable').DataTable({
        responsive: true,
        "autoWidth": false,
        "ajax": {
            "url": APP_URL + "/admin/kontak/" + action,
            "type": "GET",
            "data": {
                "_token": $('meta[name="_token"]').attr('content')
            },
            "error": () => {
                $('#kontakDataTable tbody').html(`
                    <tr>
                        <td colspan="6">
                            <div class="d-flex justify-content-center">
                                <p>Something went wrong :( click this button to retry</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary" onclick="load_table()">Retry</button>
                            </div>
                        </td>
                    </tr>
                `);
            }
        },
        "columnDefs": [{
            "targets": 'no-sort',
            "orderable": false
        }],
    });
}

$('.card-header').on('click', 'span.option', function () {
    let semua = $(this).parent('div').find('span[value="semua"]');
    let suplier = $(this).parent('div').find('span[value="suplier"]');
    let pelanggan = $(this).parent('div').find('span[value="pelanggan"]');
    if (semua.hasClass('active')) {
        action = 'getAll';
    } else if (suplier.hasClass('active')) {
        action = 'getSuplier';
    } else if (pelanggan.hasClass('active')) {
        action = 'getPelanggan';
    }

    load_table();
});

function edit_kontak(kode_kontak, kode_user) {
    kodeUser = kode_user;
    kodeKontak = kode_kontak;

    $('#kontakModal').modal('show');
    let modalBody = $('.modal-body');

    modalBody.html('');
    modalBody.append(`
    <div class="d-flex justify-content-center">
        <div class="spinner-grow text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    `);

    $('#saveButton').addClass('disabled');
    $('#saveButton').attr('disabled', true);

    $.ajax({
        url: APP_URL + '/admin/kontak/' + kode_kontak + '/' + kode_user,
        type: 'GET',
        data: {
            _token: $('meta[name="_token"]').attr('content')
        },
        success: function (response) {
            let dataKontak = response[0];
            let disabled = role != 'super admin' ? 'disabled' : '';
            let _token = $('meta[name="_token"]').attr('content');
            modalBody.html(`
                <div class="scrollable">
                    <form method="post" id="form">
                        <input type="hidden" name="_token" value="` + _token + `">
                        <!--kodeuser-->
                        <div class="form-group">
                            <label for="kode_user">Kode user <small>(not necessary)</small></label>
                            <input class="form-control disabled" value="` + dataKontak.kode_user + `" disabled type="text" name="kode_user" id="kode_user">
                        </div>

                        <!--kodekontak-->
                        <div class="form-group">
                            <label for="kode_kontak">Kode kontak <small>(not necessary)</small></label>
                            <input class="form-control disabled" value="` + dataKontak.kode_kontak + `" disabled type="text" name="kode_kontak" id="kode_kontak">
                        </div>

                        <!--nama-->
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control ` + disabled + `" ` + disabled + ` type="text" value="` + dataKontak.nama + `" id="nama" name="nama" placeholder="Masukkan nama kontak...">

                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <!--alamat-->
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input class="form-control ` + disabled + `" ` + disabled + ` type="text" value="` + dataKontak.alamat + `" id="alamat" name="alamat" placeholder="Masukkan alamat...">

                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <!--email-->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control ` + disabled + `" ` + disabled + ` type="text" value="` + dataKontak.email + `" id="email" name="email" placeholder="Masukkan email...">

                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <!--telepon-->
                        <div class="form-group">
                            <label for="telepon">No. telp</label>
                            <input class="form-control ` + disabled + `" ` + disabled + ` type="number" value="` + dataKontak.telepon + `" id="telepon" name="telepon" placeholder="Masukkan no. telp...">

                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </form>
                </div>
            `);

            checkForm();
            checkButton();
        },
        error: function (response, error, status) {
            if (response.status == 401) {
                window.alert('You are not authorized, please re-login');
                window.location = APP_URL + '/admin/kontak';
            } else {
                modalBody.html(`
                    <div class="d-flex justify-content-center">
                        <p>Something went wrong :( click this button to retry</p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary" onclick="edit_kontak('` + kode_kontak + `', '` + kode_user + `')">Retry</button>
                    </div>
                `);
            }
        }
    });
}

function checkForm() {
    forms['nama'] = $('input[name="nama"]').val() == '' ? false : true;
    forms['email'] = $('input[name="email"]').val() == '' ? false : true;
    forms['telepon'] = $('input[name="telepon"]').val() == '' ? false : true;
}

function checkButton() {
    if (forms['nama'] && forms['email'] && forms['telepon']) {
        if ($('#saveButton').hasClass('disabled')) {
            $('#saveButton').removeClass('disabled');
            $('#saveButton').attr('disabled', false);
        }
    } else {
        $('#saveButton').addClass('disabled');
        $('#saveButton').attr('disabled', true);
    }
}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

$('#kontakModal').on('keyup', 'input', function () {
    let valueInput = $.trim($(this).val());
    let inputField = $(this).attr('name');

    if (valueInput == '' && inputField == 'nama') {
        $(this).addClass('is-invalid');
        $(this).siblings('.invalid-feedback').html('Mohon masukkan ' + inputField);
        forms[inputField] = false;
    } else {
        if (inputField == 'email') {
            if (!isEmail(valueInput)) {
                $(this).addClass('is-invalid');
                $(this).siblings('.invalid-feedback').html('Email tidak valid');
                forms[inputField] = false;
            } else {
                $(this).removeClass('is-invalid');
                forms[inputField] = true;
            }
        } else if (inputField == 'telepon') {
            if (!$.isNumeric(valueInput) || valueInput.length < 6) {
                $(this).addClass('is-invalid');
                $(this).siblings('.invalid-feedback').html('Nomor telepon tidak valid');
                forms[inputField] = false;
            } else {
                $(this).removeClass('is-invalid');
                forms[inputField] = true;
            }
        } else {
            $(this).removeClass('is-invalid');
            forms[inputField] = true;
        }
    }

    checkButton();
});

function submit_kontak() {
    let button = $('#saveButton');
    button.html(`<i class="fas fa-circle-notch fa-spin"></i> Saving`);
    button.attr('disabled', true);
    button.addClass('disabled');

    $.ajax({
        url: APP_URL + '/admin/kontak/' + kodeKontak + '/' + kodeUser,
        type: "POST",
        data: $('form#form').serialize(),
        success: function (response) {
            if (response['response'] == 'success') {
                button.removeAttr('disabled');
                button.removeClass('disabled');

                $('#kontakModal').modal('hide');
                button.attr('disabled', false);
                button.removeClass('disabled');
                load_table();
            } else {
                $.notify('Something went wrong :( please try again');

                button.removeAttr('disabled');
                button.removeClass('disabled');
            }

            button.html('Save changes');
        },
        error: () => {
            $.notify('Something went wrong :( please try again');

            button.removeAttr('disabled');
            button.removeClass('disabled');
            button.html('Save changes');
        }
    });
}

$('#kontakModal').on('click', '#saveButton', () => {
    submit_kontak();
});

$('#kontakModal').on('keypress', 'input', (e) => {
    if (e.which === 13) {
        submit_kontak();
    }
});
