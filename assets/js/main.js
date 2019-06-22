console.log('oas');

console.log('liatsad');

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


$('.tbn-hapus').on('click', function (e) {
    e.preventDefault();

    const href = $(this).attr('href');


    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success ml-2',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false,
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'

            )

            setTimeout(function () {
                document.location.href = href;
            }, 2000);
        } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    })

});

var Num_rows = $('.numrows').data('num_rows');
var visitorSum = $('.sumV').data('sumvisitor');
var totalfile = $('.total').data('totalfile');
// console.log(totalfile);
// var arrSum = totalfile => totalfile.reduce((a, b) => a + b, 0);



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
        labels: ['Banyak Data Yang Ada Di Database'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [Num_rows]
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
        labels: ['Database', 'View', 'Total SizeFile(Mb)'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [Num_rows, visitorSum, mb]
        }]
    },


});