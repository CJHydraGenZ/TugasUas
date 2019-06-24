$(document).ready(function () {
    // console.log('ok');

    $('.nav-item.nav-link').on('click', function (e) {
        $('.nav-item.nav-link.active').removeClass('active');
        $(this).addClass('active');
    })


    $('.carousel').carousel({
        interval: 500
    });






    var mes_rows = $('.mes').data('mes');
    var Num_rows = $('.numrows').data('num_rows');
    var visitorSum = $('.sumV').data('sumvisitor');
    var totalfile = $('.total').data('totalfile');


    var sizeGambar = $('.sizeG').data('gambar');






    var mes = parseInt(mes_rows);
    var num = parseInt(Num_rows);
    var totalDatabase = mes + num
    // console.log(totalDatabase);
    var numbers1 = sizeGambar
    var add1 = (a, b) =>
        a + b
    var sum = numbers1.reduce(add1)
    var Gambarkb = Math.round(sum / 1024);
    var Gambarmb = Math.round(Gambarkb / 1024);


    var numbers = totalfile
    var add = (a, b) =>
        a + b
    var sum = numbers.reduce(add)
    var Muisckb = Math.round(sum / 1024);
    var Musicmb = Math.round(Muisckb / 1024);

    var totalSizeDatabase = parseInt(Gambarmb + Musicmb);
    console.log(Gambarmb);
    console.log(Musicmb);

    console.log(totalSizeDatabase);



    var ctx = document.getElementById('grapik').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
            labels: ['Banyak Data tb_music', 'Banyak Data tb_message'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: ['rgb(0, 255, 93)', 'rgb(244, 241, 66)'],

                borderColor: 'rgb(233, 236, 239)',
                data: [Num_rows, mes_rows]
            }]
        },


    });
    var ctx = document.getElementById('grapik1').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['Rata-rata di Putar'],
            datasets: [{
                label: 'Total Lagu di Putar',
                backgroundColor: 'rgb(255, 99, 132)',

                borderColor: 'rgb(255, 99, 132)',
                data: [visitorSum]
            }]
        },


    });
    var ctx = document.getElementById('grapik2').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
            labels: ['penyimpanan Database Gambar/Music', 'Gambar{mb}', 'Music{mb}'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: ['rgb(74, 224, 0)',
                    'rgb(0, 112, 224)',
                    'rgb(0, 224, 190)'
                ],
                borderColor: 'rgb(233, 236, 239)',
                data: [Num_rows, Gambarmb, Musicmb]
            }]
        },


    });
    var ctx = document.getElementById('grapik3').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
            labels: ['Database Total Data', 'View', 'Total SizeFile(Mb)'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: ['rgb(255, 212, 164)', 'rgb(0, 255, 246)', 'rgb(255, 0, 34)'],
                borderColor: 'rgb(233, 236, 239)',
                data: [totalDatabase, visitorSum, totalSizeDatabase]
            }]
        },


    });




    $('#ajax').submit(function (e) {
        e.preventDefault();
        // console.log('okKKK');
        var url = 'http://localhost/TugasUas/';
        var pesan = $('#pesan').val();
        var kesan = $('#kesan').val();

        $.ajax({
            url: url + 'project/message.php',
            type: 'post',
            data: {
                pesan,
                kesan,
            },
            success: function (data, status) {
                if (data) {
                    $('#pesan').val('');
                    $('#kesan').val('');
                    Swal.fire(
                        'Data Anda Berhasil',
                        'You clicked the button!',
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Data Anda Gagal',
                        'You clicked the button!',
                        'error'
                    )
                    alert('kayaknya ada error');
                }

            }
        })

    })





});