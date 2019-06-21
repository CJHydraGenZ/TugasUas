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