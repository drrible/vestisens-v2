$('.datepicker').datepicker({
    format: 'dd.mm.yyyy',
    language: 'ru',
    autoclose: true,
    startDate: '01/01/1950',
});


$(function () {
    $('[data-toggle="popover"]').popover({
        html: true
    })
})



$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})


$('div.flash-message').delay(3000).slideUp(500);
