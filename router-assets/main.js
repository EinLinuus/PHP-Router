$('#loadAjax').click((event) => {

    $('#loadAjax').remove();

    var els = $('#ajax');

    $.ajax('/router/php-router/ajax/', {
        method: 'POST',
        data: {
            ajax: true,
            name: 'Linus',
            lastname: 'Benkner',
            languages: [
                'german', 'english'
            ],
        },
        success: (data) => {
            els.html(data);
        },
        error: (data) => {
            console.error(data);
        }
    });

});