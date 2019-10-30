Dropzone.autoDiscover = false;
var myDropzone = new Dropzone(".dropzone",{
    url: "upload.php",
    autoProcessQueue: false,
    parallelUploads: 10,
    maxFiles: 5,
    addRemoveLinks: true,
    acceptedFiles: "image/jpeg",
    init: function() {
        $('#uploadfiles').click(function(){
            myDropzone.processQueue();
        });
    }
    });
 
    