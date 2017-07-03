/**
 * Load jQuery into global `$` for plugin usage
 * @type {jQuery}
 */
window.$ = window.jQuery = require('jquery');

/**
 * Say hello
 */
$(document).ready(function () {
    Console.log("Hello world!");
});
