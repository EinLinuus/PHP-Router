$('#loadAjax').on('click', (event) => {

    var els = $('#ajax');

    $.http('/router/php-router/ajax/', {
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