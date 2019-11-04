Dropzone.autoDiscover = false;
var myDropzone = new Dropzone(".dropzone",{
    url: "upload.php",
    autoProcessQueue: false,
    parallelUploads: 10,
    uploadMultiple:true,
    maxFiles: 5,
    addRemoveLinks: true,
    acceptedFiles: "image/jpeg",
    renameFilename: function () {
        var d = new Date();
        var year = d.getFullYear();
        var date = d.getDate();
        var month = d.getMonth();
        var hour = d.getHours();
        var minute = d.getMinutes();
        var sec = d.getSeconds();
        var msec = d.getMilliseconds();
        return year+'-'+month+'-'+date+'-'+hour+'-'+minute+'-'+sec+'-' + msec +'_file.jpg';
    },
    init: function() {
        myDropzone = this;
        $('#uploadfiles').click(function(){
            myDropzone.processQueue();
        });
        this.on("complete", function(){
            if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                var _this = this;
                _this.removeAllFiles();
            }
        });
    }
    });
 
    