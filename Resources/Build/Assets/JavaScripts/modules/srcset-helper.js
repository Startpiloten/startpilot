const srcsethelper = function () {
    const picture = $('picture img');
    const Console = console;
    $(picture).addClass('d-block');

    $(picture).click(function () {
        Console.log('Screensize: ' + window.innerWidth + 'px >>>');
        Console.log('Image natural width:   ' + $(this).prop('naturalWidth'));
        Console.log('Image shown width:     ' + $(this).width());
    });
};

export {srcsethelper};
