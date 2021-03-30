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
            let   t = $(this),
                    btn = $('.btn-submit', t),
                    data = t.serialize();


            e.preventDefault();
            $.ajax({
                type : "post",
                dataType : "json",
                url : moco.ajax_url,
                data : data,
                beforeSend: function() {
                    $.Toasted.info('loading ...')
                },
                success: function(response) {
                    $.Toasted.clear();
                    if (response.success){
                        $.Toasted.success(response.message)
                    }else{
                        $.Toasted.error(response.message)
                    }
                }
            })
        })
    }

};
