const $ = window.jQuery;

module.exports = {
    ready: function () {
        //$('select').niceSelect();
        this.mediaSelection();
        this.inputClear();
        this.codeMirror();
    },
    mediaSelection: function () {
        $('.mc-btn[data-moco-selection]').on('click', function (e) {
            let frame,
                t       = $(this),
                target       = t.parent().children('input'),
                defaultOptions = {
                    title: 'Select Media',
                    multiple : false,
                    library : {
                        type : 'image',
                    }
                };
            e.preventDefault();
            if(frame){
                frame.open();
            }
            frame = wp.media(defaultOptions);
            frame.on('close',function() {

                let selection =  frame.state().get('selection').first();
                if (selection !== undefined){
                    selection = selection.toJSON();
                    target.val(selection.url);
                    target.attr('data-media-id',selection.id);
                }
                // var gallery_ids = new Array();
                // var my_index = 0;
                // selection.each(function(attachment) {
                //     gallery_ids[my_index] = attachment['id'];
                //     my_index++;
                // });
                // var ids = gallery_ids.join(",");
                // jQuery('input#myprefix_image_id').val(ids);
                // Refresh_Image(ids);
            });
            frame.on('open',function() {
                let   selection =  frame.state().get('selection'),
                        attachment,
                        id = target.data('media-id');

                if (id !== undefined){
                    attachment = wp.media.attachment(id);
                    selection.add( attachment ? [ attachment ] : [] );
                }

            });
            frame.open();
        })
    },
    inputClear: function () {
        $('.mc-btn[data-moco-clear]').on('click', function (e) {
            let
                t       = $(this),
                target       = t.parent().children('input');
            e.preventDefault();
            if (target.attr('data-media-id') !== undefined){
                target.removeAttr('data-media-id');
            }
            target.val('');
        })
    },
    codeMirror: function () {
        let selector            =  $('.moco-code-editor'),
            settings            =  selector.data('settings');
        wp.codeEditor.initialize(selector, settings);
    },

};
