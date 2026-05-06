function hasGetUserMedia() {
   return !!(navigator.getUserMedia || navigator.webkitGetUserMedia ||
        navigator.mozGetUserMedia || navigator.msGetUserMedia);
}

$(document).ready(function(){
if(!hasGetUserMedia()){
    $("div#media").hide();
    $("p#media").css("display","block").html("Sizin browser ses yazisini desteklemir!");
}
});

