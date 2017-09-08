/**
 * Load jQuery into global `$` for plugin usage
 * @type {jQuery}
 */
window.$ = window.jQuery = require('jquery');
require('bootstrap');

/**
 * Say hello
 */
$(document).ready(function () {
    const Console = console;
    Console.log("Hello world!");
});
