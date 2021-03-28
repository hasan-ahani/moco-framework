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
