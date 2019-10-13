filesRef = document.getElementById("files");
if (filesRef){
    filesRef.onchange = function () {

        let PreviewImgRef = document.getElementById("PreviewImg");
        PreviewImgRef.src = URL.createObjectURL(event.target.files[0]);
    };
}
