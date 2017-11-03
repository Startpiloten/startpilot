/**
 * Load jQuery into global `$` for plugin usage
 * @type {jQuery}
 */
window.$ = window.jQuery = require('jquery/dist/jquery');

/**
 * Load Popper into global for plugin usage
 * @type {Popper}
 */
window.Popper = require('popper.js');

/**
 * Load Bootstrap
 */
require('bootstrap');

/**
 * Say hello
 */
$(document).ready(function () {
    const Console = console;
    Console.log("Hello world!");
});
