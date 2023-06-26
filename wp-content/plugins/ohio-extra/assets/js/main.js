jQuery(function ($) {

    // Ohio Hub
    if ($('.clb-hub').length) {
        // Tabs
        jQuery(".clb-hub #tabs > ul a").on('click', function () {
            jQuery(".clb-hub #tabs > ul a").removeClass('selected');
            jQuery(this).addClass('selected');

            jQuery('.clb-hub #tabs .tab-item').hide();
            jQuery(jQuery(this).attr('href')).show();

            return false;
        });

        // Accordion
        var accordion = $('.clb-hub #accordion');
        var items = accordion.find('.accordionItem');
        var contents = accordion.find('.accordionItem_content');

        var toggle = function (num) {
            var opened = accordion.find('.visible');
            var content = accordion.find('.accordionItem_content').eq(num);

            if (!items.eq(num).hasClass('active')) {
                items.removeClass('active').eq(num).addClass('active');

                setTimeout(function () {
                    content.css('height', '').addClass('no-transition visible');
                    let height = content.outerHeight() + 'px';
                    content.removeClass('no-transition visible').css('height', '0px');

                    setTimeout(function () {
                        opened.removeClass('visible no-transition').css('height', '0px');
                        content.addClass('visible').css('height', height);

                        accordion.find('.accordionItem_title .accordionItem_control i').removeClass('ion-md-remove').addClass('ion-md-add');
                        accordion.find('.accordionItem_title').eq(num).find('.accordionItem_control i').removeClass('ion-md-add').addClass('ion-md-remove');
                    }, 30);
                }, 30);
            } else {
                items.eq(num).removeClass('active');
                items.eq(num).find('.accordionItem_content.visible').removeClass('visible').css('height', '0px');
                items.eq(num).find('.accordionItem_title .accordionItem_control i').removeClass('ion-md-remove').addClass('ion-md-add');
            }
        };

        accordion.find('.accordionItem_title').each(function (i) {
            $(this).on('click', function () { toggle(i); });
        });

        contents.attr('style', 'height:0;overflow:hidden');

        // Activation button
        $('#ohio-activate-theme-license').on('click', function () {
            if ($(this).attr('loading')) {
                return false;
            }

			const popupWindow = window.open(
				'https://demo.clbthemes.com/v1/activate?product=ohio',
				'Theme activation',
				'resizable,width=840,height=570'
			);

			/**
			 * 
			 * @param {MessageEvent} e 
			 * @returns
			 */
			const messageListener = (e) => {
				const licenseJSON = e.data;

				let license;
				try {
					license = JSON.parse(licenseJSON);
				} catch (e) {
					// Not a license
					return;
				}

				if (!license?.code) {
					// Not a license
					return;
				}

				popupWindow.close();
				$(this).attr('loading', true).addClass('btn-spinner').text('Proceeding..');

				jQuery.post(window.ajaxurl, {
					action: 'ohio_save_license_code',
					license: licenseJSON
				}, () => {
					window.location.reload();
				});

				window.removeEventListener('message', messageListener);
			};

			window.addEventListener('message', messageListener);

            return false;
        });

        $('#ohio-remove-theme-license').on('click', function () {
            if ($(this).attr('loading')) {
                return false;
            }

            $(this).attr('loading', true).addClass('btn-spinner').text('Detaching..');

            jQuery.post(window.ajaxurl, { 'action': 'ohio_remove_license_code' }, () => {
                window.location.reload();
            });
        });

        jQuery('#sync-languages-action').on('click', function () {
            if (!confirm('It will take all non-empty global settings from the main language and apply them to the current. This action cannot be undone. Are you sure?')) return;

            jQuery.post(window.ajaxurl, {
                'action': 'ohio_sync_settings_with_main_lang',
                'current_lang': jQuery(this).attr('lang-code')
            }, (res) => {
                if (res != 'OK') alert('Сan\'t sync languages. An unknown error has occurred');
                window.location.reload();
            });
        });

        jQuery('#export_theme_settings').on('click', function(e) {
            e.preventDefault();

            if (this.classList.contains('btn-spinner')) return;
            this.classList.add('btn-spinner');

            jQuery.post(window.ajaxurl, {
                action: 'ohio_export_theme_settings'
            }, response => {
                const link = document.createElement('a');
                const file = new Blob([response], { type: 'application/json' });
                link.href = URL.createObjectURL(file);
                link.download = `ohio_setting_export_${new Date().toISOString()}.json`;
                link.click();
                URL.revokeObjectURL(link.href);
                
                this.classList.remove('btn-spinner');
            });
        });

        const submitButton = document.querySelector('#settings_import_submit');
        const triggerButton = document.querySelector('#settings_import_file_trigger');
        jQuery(triggerButton).on('click', function() {
            const file = document.querySelector('#settings_import_file');
            file.click();
            file.addEventListener('change', function(e) {
                if (this.files.length) {
                    const fileName = this.files[0].name;
                    triggerButton.style = "display: none;";
                    submitButton.style = '';
                    submitButton.innerText = `Import ${fileName.length > 50 ? fileName.slice(0, 50) + '...' : fileName}`;
                }
            });
        });

        jQuery('#import_theme_settings').on('submit', function(e) {
            e.preventDefault();
            const submitButton = document.querySelector('#settings_import_submit');

            if (submitButton.classList.contains('btn-spinner')) {
                return;
            }

            submitButton.classList.add('btn-spinner');
            const data = new FormData(this);
            data.append('action', 'ohio_import_theme_settings');

            jQuery.post({
                url: window.ajaxurl,
                processData: false,
                contentType: false,
                enctype: 'multipart/form-data',
            }, data, () => {
                $('.notice.o-notice.o-notice-settings.notice-success').addClass('visible');

                setTimeout(() => {
                    window.location.reload();
                }, 500);
            });
        });

        jQuery('#reset_theme_settings').on('click', function(e) {
            e.preventDefault();

            if (this.classList.contains('btn-spinner')) return;
            this.classList.add('btn-spinner');


            if (confirm('Are you sure you want to reset your settings? This process is irreversible unless you\'ve made a backup.')) {
                jQuery.post(window.ajaxurl, {
                    action: 'ohio_reset_theme_settings'
                }, () => {
                    window.location.reload();
                })
            }
        });

        // Check actual theme version
        jQuery.post(window.ajaxurl, { 'action': 'ohio_check_last_version' }, (response) => {
            let data = JSON.parse(response);

            if (versionCompare(data.current, data.actual) < 0) {
                $('#ohio-version-table-placeholder').text(data.actual);
                $('#ohio-version-table-value').find('mark').removeClass('yes').addClass('no');
                $('#ohio-version-table-value').find('.ohio-new-version-available').show();
            }
        });

        // Show system issues message
        if ($('#tabs-3 mark.no').length) {
            $('.wp-header-end').after('<div class="notice o-notice warning is-dismissible"><div class="holder"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16"><path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/><path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/></svg> Check your System Status to make sure that your server is configured properly. This could cause some issues while importing demos.</div></div>');
        }

        jQuery('#get-system-report').on('click', function(e) {
            e.preventDefault();

            const systemReportContent = document.getElementById('system-report');
            systemReportContent.setAttribute('style', '');
            systemReportContent.focus();
            systemReportContent.select();
        });
    }

    // Save settings
    $('#fake-publishing-action .button-publish').on('click', function () {
        $(this).addClass('btn-spinner').text('Updating..');
        $('input#publish').trigger('click');
        return false;
    });

    $('.clb-hub .acf-settings-wrap form#post').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        var actionUrl = form.attr('action');

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(),
            success() {
                $('.notice.o-notice.o-notice-settings.notice-success').addClass('visible');
                $('#fake-publishing-action .button-publish').removeClass('btn-spinner').text('Update');
                setTimeout(function () {
                    $('.notice.o-notice.o-notice-settings.notice-success').removeClass('visible');
                }, 2000);
            },
            error() {
                $('.notice.o-notice.o-notice-settings.notice-error').addClass('visible');
                $('#fake-publishing-action .button-publish').removeClass('btn-spinner').text('Update');
                setTimeout(function () {
                    $('.notice.o-notice.o-notice-settings.notice-error').removeClass('visible');
                }, 2000);
            }
        });
    });

    function versionCompare(v1, v2, options) {
        var lexicographical = options && options.lexicographical,
            zeroExtend = options && options.zeroExtend,
            v1parts = v1.split('.'),
            v2parts = v2.split('.');

        function isValidPart(x) {
            return (lexicographical ? /^\d+[A-Za-z]*$/ : /^\d+$/).test(x);
        }

        if (!v1parts.every(isValidPart) || !v2parts.every(isValidPart)) {
            return NaN;
        }

        if (zeroExtend) {
            while (v1parts.length < v2parts.length) v1parts.push("0");
            while (v2parts.length < v1parts.length) v2parts.push("0");
        }

        if (!lexicographical) {
            v1parts = v1parts.map(Number);
            v2parts = v2parts.map(Number);
        }

        for (var i = 0; i < v1parts.length; ++i) {
            if (v2parts.length == i) {
                return 1;
            }

            if (v1parts[i] == v2parts[i]) {
                continue;
            }
            else if (v1parts[i] > v2parts[i]) {
                return 1;
            }
            else {
                return -1;
            }
        }

        if (v1parts.length != v2parts.length) {
            return -1;
        }

        return 0;
    }

    $(document).ready(function () {
        // ACF fields preloader
        $('.acf-postbox').addClass('visible');

        // ACF notice
        // $('.acf-admin-notice.notice-success').addClass('visible');
        // $('.acf-admin-notice.notice-success p').text('Theme Settings have been successfully updated.');

        $(window).unbind('beforeunload');
        $('.notice.o-notice.o-notice-settings button.notice-dismiss')
            .off('click')
            .on('click', function () {
                $(this).parent('.notice.o-notice.o-notice-settings').removeClass('visible');
            });
    });


    $(".clb-steps-item:first-child").on({
        mouseenter: function () {
            $('.toplevel_page_ohio_hub').addClass('visible');
        },
        mouseleave: function () {
            $('.toplevel_page_ohio_hub').removeClass('visible');
        }
    });
});
