

$(document).foundation();
$(window).on('changed.zf.mediaquery', function() {
    $('.is-dropdown-submenu.invisible').removeClass('invisible');
});

$(function() {

    $('.chocolat-parent').Chocolat({
        loop: true,
        imageSize: 'native',
        enableZoom: true
    });

    $('#counter').textcounter({
        type: "character",
        max: 100,
        min: 32,
        stopInputAtMaximum: true,
        minimumErrorText: 'Opis mora imati barem 32 znaka.',
        counterText: 'Broj znakova: %d',
        maximumErrorText: 'Maksimalan broj znakova 1000.',
        inputErrorClass: 'danger',
        displayErrorText: true,
        stopInputAtMaximum: false
    });

    $('.owl-carousel').owlCarousel({
        items: 1,
        margin: 10,
        autoHeight: true,
        nav: true,
        loop: true
    });

    $('.flash-message').delay(1000).fadeOut(1000);;

    // enable fileuploader plugin
    var input = $('input[name="files"]').fileuploader({
        extensions: ['jpg', 'png', 'gif', 'bmp'],
        changeInput: ' ',
        theme: 'thumbnails',
        enableApi: true,
        addMore: true,
        limit: 3,
        maxSize: 2,
        editor: {
			cropper: {
				ratio: '1:1',
				minWidth: 100,
				minHeight: 100,
				showGrid: true
			}
		},
        thumbnails: {
            box: '<div class="fileuploader-items">' +
            '<ul class="fileuploader-items-list">' +
            '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner">+</div></li>' +
            '</ul>' +
            '</div>',
            item: '<li class="fileuploader-item">' +
            '<div class="fileuploader-item-inner">' +
            '<div class="thumbnail-holder">${image}</div>' +
            '<div class="actions-holder">' +
            '<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a>' +
            '<span class="fileuploader-action-popup"></span>' +
            '</div>' +
            '<div class="progress-holder">${progressBar}</div>' +
            '</div>' +
            '</li>',
            item2: '<li class="fileuploader-item">' +
            '<div class="fileuploader-item-inner">' +
            '<div class="thumbnail-holder">${image}</div>' +
            '<div class="actions-holder">' +
            '<a class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="remove"></i></a>' +
            '<span class="fileuploader-action-popup"></span>' +
            '</div>' +
            '</div>' +
            '</li>',
            startImageRenderer: true,
            canvasImage: false,
            _selectors: {
                list: '.fileuploader-items-list',
                item: '.fileuploader-item',
                start: '.fileuploader-action-start',
                retry: '.fileuploader-action-retry',
                remove: '.fileuploader-action-remove'
            },
            onItemShow: function(item, listEl) {
                var plusInput = listEl.find('.fileuploader-thumbnails-input');

                plusInput.insertAfter(item.html);

                if(item.format == 'image') {
                    item.html.find('.fileuploader-item-icon').hide();
                }

                item.html.find('.fileuploader-action-remove').before('<a class="fileuploader-action fileuploader-action-sort" title="Sort"><i></i></a>');

            }
        },
        sorter: {
            selectorExclude: null,
            placeholder: null,
            scrollContainer: window,
            onSort: function(list, listEl, parentEl, newInputEl, inputEl) {
                console.log('Sorted ')
            }
        },
        afterRender: function(listEl, parentEl, newInputEl, inputEl) {
            var plusInput = listEl.find('.fileuploader-thumbnails-input'),
            api = $.fileuploader.getInstance(inputEl.get(0));

            plusInput.on('click', function() {
                api.open();
            });
        }
    });

    // get API methods
    window.api = $.fileuploader.getInstance(input);
});
