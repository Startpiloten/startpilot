/**
 * Load jQuery into global `$` for plugin usage
 * @type {jQuery}
 */
window.$ = window.jQuery = require('jquery');
window.Popper = require('popper.js'); // Bootstrap 4-beta.2 dependencies

require('bootstrap'); // Bootstrap

/**
 * Say hello
 */
$(document).ready(function () {
    const Console = console;
    Console.log("Hello - TYPO3!");
});
