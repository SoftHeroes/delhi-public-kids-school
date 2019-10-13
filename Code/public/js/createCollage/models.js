/*
 * This file is used for interaction with the canvas element and initializations
 */

/*******************************************************
 * Change canvas 1 background after image was selected *
 ******************************************************/
function setBackground() {
    var file = $("#singleUpload")[0].files[0];
    var canvas = document.getElementById("background");
    var context = canvas.getContext("2d");
    var reader = new FileReader();
    reader.addEventListener("load", function () {
        var backgroundImage = new Image();
        backgroundImage.src = this.result;
        backgroundImage.onload = function () {
            context.drawImage(backgroundImage, 0, 0, canvas.width, canvas.height);      // Draw and stretch image to fill canvas
        };
    }, false);
    reader.readAsDataURL(file);
}



/*************************************
 * Global variables, initialisations *
 ************************************/
$("#singleUpload").val("");                // Reset background selection on page refresh
$("#modelSelect").val("");                 // Reset model selection on page refresh

// document.getElementById("background").style.visibility = "hidden";// Hide canvas until model is selected


/***************************************
 * Change model after drop-down select *
 **************************************/
function modelSelect() {

    var background = document.getElementById("background"); // Keep background canvas

    var photo = document.getElementById("photo");
    while (photo.firstChild) {                              // Remove all child canvases
        photo.removeChild(photo.firstChild);
    }
    photo.appendChild(background);                          // Attach background canvas back

    var selectedModel = document.getElementById("modelSelect").value;    // Get the selected model value


    var canvasRef = document.getElementById("background");
    let clientWidth = canvasRef.clientWidth;
    let clientHeight = canvasRef.clientHeight;

    switch (selectedModel) {

        case "model1":

            clientWidthRef = (canvasRef.clientWidth / 100) * 45;
            clientHeightRef = (canvasRef.clientHeight / 100) * 82;

            var layer1 = document.createElement('canvas');
            layer1.className = "layer";
            layer1.width = clientWidthRef;
            layer1.height = clientHeightRef;
            layer1.style.top = "15px";
            layer1.style.left = "30px";
            layer1.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer1);
            registerEvents(layer1);

            var layer2 = document.createElement('canvas');
            layer2.className = "layer";
            layer2.width = clientWidthRef;
            layer2.height = clientHeightRef;
            layer2.style.top = "15px";
            layer2.style.left = (clientWidthRef + 30 * 2) + "px";
            layer2.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer2);
            registerEvents(layer2);

            break;

        case "model2":

            clientWidthRef = (canvasRef.clientWidth / 100) * 28;
            clientHeightRef = (canvasRef.clientHeight / 100) * 82;

            var layer1 = document.createElement('canvas');
            layer1.className = "layer";
            layer1.width = clientWidthRef;
            layer1.height = clientHeightRef;
            layer1.style.top = "15px";
            layer1.style.left = "35px";
            layer1.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer1);
            registerEvents(layer1);

            var layer2 = document.createElement('canvas');
            layer2.className = "layer";
            layer2.width = clientWidthRef;
            layer2.height = clientHeightRef;
            layer2.style.top = "15px";
            layer2.style.left = (clientWidthRef + 35 * 2) + "px";
            layer2.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer2);
            registerEvents(layer2);

            var layer3 = document.createElement('canvas');
            layer3.className = "layer";
            layer3.width = clientWidthRef;
            layer3.height = clientHeightRef;
            layer3.style.top = "15px";
            layer3.style.left = (clientWidthRef * 2 + 35 * 3) + "px";
            layer3.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer3);
            registerEvents(layer3);

            break;

        case "model3":

            clientWidthRef = (canvasRef.clientWidth / 100) * 45;
            clientHeightRef = (canvasRef.clientHeight / 100) * 38;

            var layer1 = document.createElement('canvas');
            layer1.className = "layer";
            layer1.width = clientWidthRef;
            layer1.height = clientHeightRef;
            layer1.style.top = "15px";
            layer1.style.left = "30px";
            layer1.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer1);
            registerEvents(layer1);

            var layer2 = document.createElement('canvas');
            layer2.className = "layer";
            layer2.width = clientWidthRef;
            layer2.height = clientHeightRef;
            layer2.style.top = "15px";
            layer2.style.left = (clientWidthRef + 30 * 2) + "px";
            layer2.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer2);
            registerEvents(layer2);

            var layer3 = document.createElement('canvas');
            layer3.className = "layer";
            layer3.width = clientWidthRef;
            layer3.height = clientHeightRef;
            layer3.style.top = (clientHeightRef + 15 * 2) + "px";
            layer3.style.left = "30px";
            layer3.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer3);
            registerEvents(layer3);

            var layer4 = document.createElement('canvas');
            layer4.className = "layer";
            layer4.width = clientWidthRef;
            layer4.height = clientHeightRef;
            layer4.style.top = (clientHeightRef + 15 * 2) + "px";
            layer4.style.left = (clientWidthRef + 30 * 2) + "px";
            layer4.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer4);
            registerEvents(layer4);

            break;

        case "model4":

            clientWidthRef = (canvasRef.clientWidth / 100) * 28.5;
            clientHeightRef = (canvasRef.clientHeight / 100) * 38;

            var layer1 = document.createElement('canvas');
            layer1.className = "layer";
            layer1.width = clientWidthRef;
            layer1.height = clientHeightRef;
            layer1.style.top = "15px";
            layer1.style.left = "30px";
            layer1.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer1);
            registerEvents(layer1);

            var layer2 = document.createElement('canvas');
            layer2.className = "layer";
            layer2.width = clientWidthRef;
            layer2.height = clientHeightRef;
            layer2.style.top = "15px";
            layer2.style.left = (clientWidthRef + 30 * 2) + "px";
            layer2.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer2);
            registerEvents(layer2);

            var layer3 = document.createElement('canvas');
            layer3.className = "layer";
            layer3.width = clientWidthRef;
            layer3.height = clientHeightRef;
            layer3.style.top = "15px";
            layer3.style.left = (clientWidthRef * 2 + 30 * 3) + "px";
            layer3.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer3);
            registerEvents(layer3);

            var layer4 = document.createElement('canvas');
            layer4.className = "layer";
            layer4.width = clientWidthRef;
            layer4.height = clientHeightRef;
            layer4.style.top = (clientHeightRef + 15 * 2) + "px";
            layer4.style.left = "30px";
            layer4.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer4);
            registerEvents(layer4);

            var layer5 = document.createElement('canvas');
            layer5.className = "layer";
            layer5.width = clientWidthRef;
            layer5.height = clientHeightRef;
            layer5.style.top = (clientHeightRef + 15 * 2) + "px";
            layer5.style.left = (clientWidthRef + 30 * 2) + "px";
            layer5.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer5);
            registerEvents(layer5);

            var layer6 = document.createElement('canvas');
            layer6.className = "layer";
            layer6.width = clientWidthRef;
            layer6.height = clientHeightRef;
            layer6.style.top = (clientHeightRef + 15 * 2) + "px";
            layer6.style.left = (clientWidthRef * 2 + 30 * 3) + "px";
            layer6.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer6);
            registerEvents(layer6);

            break;

        case "model5":

            clientWidthRef = (canvasRef.clientWidth / 100) * 20;
            clientHeightRef = (canvasRef.clientHeight / 100) * 38;

            var centerWidth = ( canvasRef.clientWidth - (clientWidthRef * 2 )) - 70;
            var centerHeight = (canvasRef.clientHeight / 100) * 82;

            var layer1 = document.createElement('canvas');
            layer1.className = "layer";
            layer1.width = clientWidthRef;
            layer1.height = clientHeightRef;
            layer1.style.top = "15px";
            layer1.style.left = "30px";
            layer1.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer1);
            registerEvents(layer1);

            var layer2 = document.createElement('canvas');
            layer2.className = "layer";
            layer2.width = clientWidthRef;
            layer2.height = clientHeightRef;
            layer2.style.top = (clientHeightRef + 15 * 2) + "px";
            layer2.style.left = "30px";
            layer2.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer2);
            registerEvents(layer2);


            var layer3 = document.createElement('canvas');
            layer3.className = "layer";
            layer3.width = centerWidth;
            layer3.height = centerHeight;
            layer3.style.top = "16px";
            layer3.style.left = (clientWidthRef + 42) + "px";
            layer3.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer3);
            registerEvents(layer3);

            var layer4 = document.createElement('canvas');
            layer4.className = "layer";
            layer4.width = clientWidthRef;
            layer4.height = clientHeightRef;
            layer4.style.top = "15px";
            layer4.style.left = (clientWidthRef + centerWidth + 55) + "px";
            layer4.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer4);
            registerEvents(layer4);

            var layer5 = document.createElement('canvas');
            layer5.className = "layer";
            layer5.width = clientWidthRef;
            layer5.height = clientHeightRef;
            layer5.style.top = (clientHeightRef + 15 * 2) + "px";
            layer5.style.left = (clientWidthRef + centerWidth + 55) + "px";
            layer5.style.visibility = "visible";

            var body = document.getElementById("photo");
            body.appendChild(layer5);
            registerEvents(layer5);

            break;

        default:
            document.getElementById("background").style.visibility = "hidden";  // Hide canvas until model is selected
    }
}

/**********************************************************
 * Register drag & drop event listeners to canvas element *
 *********************************************************/
function registerEvents(canvas) {

    canvas.ondragenter = function () {
        canvas.style.border = "dashed 2px #555";  // Change the canvas borders when hovering
    };
    canvas.ondragleave = function () {
        canvas.style.border = "none";    // Reset canvas borders when hovering is not active
    };
    canvas.ondragover = function (e) {
        e.preventDefault();
    };
    canvas.ondrop = function (e) {
        e.preventDefault();
        var id = e.dataTransfer.getData("text");
        var dropImage = document.getElementById(id);
        canvas.style.border = "none";              // Reset canvas borders after image drop

        var context = canvas.getContext("2d");

        context.drawImage(dropImage, 0, 0, canvas.width, canvas.height);     // Draw and stretch image to fill canvas
    };
}
