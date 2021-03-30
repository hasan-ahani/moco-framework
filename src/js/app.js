import Toastify from 'toastify-js';
import Toasted from 'toastedjs'
jQuery.Toasted = new Toasted({
    position : 'top-center',
    theme : 'bootstrap',
    duration: 3000
});
jQuery.Toastify = Toastify;
const init = require('./init');
const fields = require('./fields');

jQuery(function ($) {
    $(document).ready(
        function () {
            init.ready();
            fields.ready();
        }
    );

});
