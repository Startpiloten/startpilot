// Import jQuery global
import {$,jQuery} from 'jquery';

window.$ = $;
window.jQuery = jQuery;

// Example for modules
import {sayhello} from "./modules/sayhello";
sayhello('TYPO3');
