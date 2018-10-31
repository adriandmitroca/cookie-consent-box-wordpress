(function ($) {
    'use strict';

    $(document).ready(function () {
        $('.cookie-consent-box-color-picker').wpColorPicker();

        handleLinkType($('select[name*="link_type"]').val());

        $('select[name*="link_type"]').on('change', function () {
            handleLinkType($(this).val());
        });

        handleCustomContent($('input[name*="customized_content"]').is(':checked'));

        $('input[name*="customized_content"]').on('change', function () {
            handleCustomContent($(this).is(':checked'));
        });

        var frame;
        var imgUploadButton = $('#upload_privacy_policy_file_button');
        var fileInput = $('#privacy_policy_file_id');
        var filePreview = $('#upload_privacy_policy_file_preview');

        imgUploadButton.on('click', function (event) {
            event.preventDefault();

            if (frame) {
                frame.open();
                return;
            }

            frame = wp.media({
                title: 'Select Privacy Policy File',
            });

            frame.on('select', function () {
                var attachment = frame.state().get('selection').first().toJSON();
                filePreview.find('a').attr('href', attachment.url);
                fileInput.val(attachment.id);
                filePreview.removeClass('hidden');
            });

            frame.open();
        });
    });

    function handleLinkType(val) {
        $('[data-link-type]').hide();
        $('[data-link-type="' + val + '"]').show();
    }

    function handleCustomContent(val) {
        $('[data-custom-content]').toggle(val);
    }

})(jQuery);
