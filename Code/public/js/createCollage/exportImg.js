/**************************************
 * Export canvas and download as imag *
 *************************************/
var link = document.getElementById('btn-download');
link.addEventListener('click', function (e) {

    var mainCanvas = document.getElementById("background");
    var canvas = document.createElement('canvas');
    var context = canvas.getContext("2d");
    canvas.width = mainCanvas.clientWidth * 2;
    canvas.height = mainCanvas.clientHeight * 2;

    // We need to get all images droped on all canvases and combine them on above canvas
    $('#photo').children('canvas').each(function () {
        var image = this;

        if (image.id == "background") {

            context.drawImage(image,0, image.offsetTop * 2, (image.clientWidth * 2) -5, (image.clientHeight * 2));    // Draw image
        }
        else {
            context.beginPath();
            context.rect((image.offsetLeft - 5) * 2, (image.offsetTop - 5) * 2, image.clientWidth * 2, image.clientHeight * 2);
            context.fillStyle = "white";
            context.fill();

            context.drawImage(image, image.offsetLeft * 2, image.offsetTop * 2, (image.clientWidth - 10) * 2, (image.clientHeight - 10) * 2);    // Draw image
        }
    });

    link.href = canvas.toDataURL();   // Save all combined images to one image
    link.download = "photo.png";      // Download the image
}, false);
