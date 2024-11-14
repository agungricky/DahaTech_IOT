$(document).ready(function () {
    $('#main').hide();

    setTimeout(function () {
        $('#loading_sc').fadeOut();
        $('.main').css('display', '').hide().fadeIn();
    }, 3000);

    $('#btnKonsultasi').click(function () {
        window.location.href = 'konsultasi';
    });

    $('#btnBeliJamu').click(function () {
        window.location.href = 'beliJamu';
    });

    $('#btnAbout').click(function () {
        window.location.href = 'about';
    });
});
