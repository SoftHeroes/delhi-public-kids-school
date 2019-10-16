let previewImgRef = document.getElementById("PreviewImg");

filesRef = document.getElementById("files");
if (filesRef && previewImgRef){
    filesRef.onchange = function () {
        let imgPreviewBoxRef = document.getElementsByClassName("imgPreviewBox");

        imgArr = this.files;

        if (imgPreviewBoxRef[0]){
            imgPreviewBoxRef[0].innerHTML = "";

            for (let index = 0; index < this.files.length; index++) {
                // input Element
                let inputRef = document.createElement('input');

                inputRef.type = "radio";
                inputRef.name = "ProdPrimaryImg";
                inputRef.value = index;
                inputRef.checked = false;
                if (index == 0) {
                    inputRef.checked = true;
                }


                // image Element
                let thumbnailImgRef = document.createElement('img');
                thumbnailImgRef.className = "thumbnailImg";
                thumbnailImgRef.src = URL.createObjectURL(event.target.files[index]);
                thumbnailImgRef.onclick = function(){
                    document.getElementById('PreviewImg').src = this.src;
                }

                // label Element
                let labelRef = document.createElement('label');

                labelRef.appendChild(inputRef);
                labelRef.appendChild(thumbnailImgRef);

                imgPreviewBoxRef[0].appendChild(labelRef);
            }
        }

        currentImageIndex = 0;
        previewImgRef.src = URL.createObjectURL(event.target.files[0]);
    };
}
