$(document).ready(function () {
    console.log('ok');

    $('.nav-item.nav-link').on('click', function (e) {
        $('.nav-item.nav-link.active').removeClass('active');
        $(this).addClass('active');
    })


    $('.carousel').carousel({
        interval: 500
    });


    var sms = $('.pesan').data('pesan');

    if (sms) {
        $('.berasil').data('');
        Swal.fire(
            'Data Anda ' + sms,
            'You clicked the button!',
            'success'
        )
    }



    var mes_rows = $('.mes').data('mes');
    var Num_rows = $('.numrows').data('num_rows');
    var visitorSum = $('.sumV').data('sumvisitor');
    var totalfile = $('.total').data('totalfile');
    // console.log(totalfile);
    // var arrSum = totalfile => totalfile.reduce((a, b) => a + b, 0);

    // console.log(Array(Num_rows));
    var mes = parseInt(mes_rows);

    var num = parseInt(Num_rows);

    var totalDatabase = mes + num
    console.log(totalDatabase);

    var numbers = totalfile // sums to 100


    // const numbers = [10, 20, 30, 40] // sums to 100

    var add = (a, b) =>
        a + b

    var sum = numbers.reduce(add)

    // console.log(sum);

    var kb = Math.round(sum / 1024);

    var mb = Math.round(kb / 1024);

    // console.log(mb);



    var ctx = document.getElementById('grapik').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
            labels: ['Banyak Data tb_music', 'Banyak Data tb_message'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [Num_rows, mes_rows]
            }]
        },


    });
    var ctx = document.getElementById('grapik1').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',

        // The data for our dataset
        data: {
            labels: ['Rata-rata di Putar'],
            datasets: [{
                label: 'My First dataset',
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
            labels: ['penyimpanan Database', 'Mb'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [Num_rows, mb]
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
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [totalDatabase, visitorSum, mb]
            }]
        },


    });






});