$(document).ready(function () {
    var local = window.location.origin + '/cat/';

    $('.summernotejawab').summernote();
    $('.summernote').summernote({
        height: 300
    });

    $('#datatable').DataTable();

    $('#lihatKode').click(function () {
        var kode = $('#kodeUjian').val();
        var getUrl = local + 'ajaxKode/' + kode;
        var html = '';
        if (kode === '') {
            html += '' +
                '<div class="alert alert-danger animated fadeInDown hide-it" role="alert">' +
                '    <button type="button" class="close" data-dismiss="alert"></button>' +
                '    Isi dulu kodenya..' +
                '</div>' +
                '';
            $('#hasilKode').html(html);
        } else if (kode != null) {
            $.ajax({
                url: getUrl,
                type: 'POST',
                contentType: "application/json; charset=utf-8", // this
                dataType: 'json',
                success: function (response) {
                    if (response != null) {
                        html += '' +
                            '<div class="form-group">' +
                            '    <label for="kelas" class="form-label">Kelas</label>' +
                            '    <input type="hidden" name="ujianId" value="' + response.ujian_id + '">' +
                            '    <input type="text" class="form-control" id="kelas" name="kelas" value="' + response.ujian_kelas + '" readonly>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '    <label for="jurusan" class="form-label">Jurusan</label>' +
                            '    <input type="text" class="form-control" id="jurusan" name="jurusan" value="' + response.ujian_jurusan + '" readonly>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '    <label for="matpel" class="form-label">Mata Pelajaran</label>' +
                            '    <input type="text" class="form-control" id="matpel" name="matpel" value="' + response.ujian_matpel + '" readonly>' +
                            '</div>' +
                            '<div class="form-group">' +
                            '    <label for="durasi" class="form-label">Durasi (Menit)</label>' +
                            '    <input type="number" class="form-control" id="durasi" name="durasi" value="' + response.ujian_durasi + '" readonly>' +
                            '</div>' +
                            '';
                        $('#hasilKode').html(html);
                    } else {
                        html += '' +
                            '<div class="alert alert-danger animated fadeInDown hide-it" role="alert">' +
                            '    <button type="button" class="close" data-dismiss="alert"></button>' +
                            '    Kode tidak ditemukan, coba lagi' +
                            '</div>' +
                            '';
                        $('#hasilKode').html(html);
                    }
                },
                error: function (response) {
                    console.log(response);
                }
            });
        }
    });

//    ----------------------------------

    $(".next-step").click(function (e) {
        var id = parseInt($(this).val());
        var step = id + 1;
        $('.tab-pane').removeClass('active');
        $('#step' + (step)).addClass('active');
    });
    $(".prev-step").click(function (e) {
        var id = parseInt($(this).val());
        var step = id - 1;
        $('.tab-pane').removeClass('active');
        $('#step' + (step)).addClass('active');
    });

//    ----------------------------------

    var durasi = $('#durasi').val();
    $(function() {
        $("#waktu").countdowntimer({
            minutes: durasi,
            displayFormat : "H:M:S",
            timeUp: waktuHabis
        });
    });

    function waktuHabis() {
        $('#selesaiUjian').click();
    }

});
