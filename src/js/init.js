const $ = window.jQuery;

module.exports = {
    ready: function () {
        this.sidebar();
        this.optionForm();
    },
    sidebar: function () {
        $('.moco-nav a').on('click', function (e) {
            const   t       = $(this),
                    p       = t.parent('li'),
                    target  = $('#moco-content-' + p.data('target')),
                    href    = t.attr('href');

            if (href !== undefined) return;

            if (!p.hasClass('active')){
                $('.moco-content .moco-tab-content.show').removeClass('show');
                if (target.length){
                    target.addClass('show')
                }
                $('.moco-nav li.active').removeClass('active');
                p.addClass('active')
            }
        })
    },
    optionForm: function () {
        $('#moco-framework form').submit(function (e) {
            const t = $(this),
                    data = t.serialize();
            e.preventDefault();
            console.log(data)
        })
    }

};
