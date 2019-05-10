// Import jQuery global
import $ from 'jquery';

window.jQuery = $;
window.$ = $;

// Import bootstrap
import 'bootstrap'

// Example for modules
import {sayhello} from "./modules/sayhello";
import {srcsethelper} from "./modules/srcset-helper";
import {devLog} from "./modules/debug";

// DEBUG
const devDomain = 'localhost';
export {devDomain};

$(function () {
    sayhello('Bo');
    devLog('Console Log');
    srcsethelper();
});
