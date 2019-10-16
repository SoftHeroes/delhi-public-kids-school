$(document).on("change", ".file_multi_video", function (evt) {
    var $source = $('#video_here');
    if($source){
        $source[0].src = URL.createObjectURL(this.files[0]);
        $source.parent()[0].load();
    }
});
