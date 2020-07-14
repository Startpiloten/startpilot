// Import jQuery global
import {$, jQuery} from 'jquery';

window.$ = $;
window.jQuery = jQuery;

// Lazy Load sayhello Modules if body.lazy exists
if (document.body.classList.contains('lazy')) {
    import(/* webpackChunkName: "sayhello" */'./modules/sayhello').then(module => {
        module.sayhello('TYPO3');
    })
}
