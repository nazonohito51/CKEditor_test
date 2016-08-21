var image_modal = $('[data-remodal-id=modal]').remodal();
var images = {};

$(document).on('opening', '.remodal', function () {
    console.log('Modal is opening');
    console.log('getting images...');
    $.ajax({
        url: '/api/image/',
        type: 'GET',
        dataType: 'json',
        data: {},
        timeout: 5000,
        success: function(data) {
            console.log(data);
            images = data.images;
            var container = $('#images-container');
            images.forEach(function(image) {
                container.append(newImageElement(image.url, image.name));
            });
        },
        error: function() {
            console.alert('failed get images');
        }
    });
    console.log('getting images done.')
});

$(document).on('opened', '.remodal', function () {
    console.log('Modal is opened');
});

$(document).on('closing', '.remodal', function (e) {
    // Reason: 'confirmation', 'cancellation'
    console.log('Modal is closing' + (e.reason ? ', reason: ' + e.reason : ''));
});

$(document).on('closed', '.remodal', function (e) {
    // Reason: 'confirmation', 'cancellation'
    console.log('Modal is closed' + (e.reason ? ', reason: ' + e.reason : ''));
});

$(document).on('confirmation', '.remodal', function () {
    console.log('Confirmation button is clicked');
});

$(document).on('cancellation', '.remodal', function () {
    console.log('Cancel button is clicked');
});

function newImageElement(url, name) {
    return $('<img />', {
        src: url,
        alt: name
    });
}
