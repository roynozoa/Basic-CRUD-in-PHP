$(document).ready(function() {
    // hilangkan tombol cari
    $('#searchButton').hide();

    // event ketika keyword ditulis
    $('#keyword').on('keyup', function() {
        // munculkan icon loading
        $('.loader').show();

        // ajax menggunakan load
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

        // $.get()
        $.get('ajax/food.php?s=' + $('#keyword').val(), function(data) {

            $('#container').html(data);
            $('.loader').hide();

        });

    });

});