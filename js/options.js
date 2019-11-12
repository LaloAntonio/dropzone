Dropzone.autoDiscover = false;
var myDropzone = new Dropzone(".dropzone",{
    url: "upload.php?p=upload",
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
        return year+'-'+month+'-'+date+'-'+hour+'-'+minute+'-'+sec+'-' + msec +'_';
    },
    init: function() {
        $('#uploadfiles').click(function(){
            swal({
                title: "Desea Registrar esta Noticia?",
                icon: "info",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    if(myDropzone.getQueuedFiles().length == 0 && myDropzone.getUploadingFiles().length == 0 ){
                        swal("No hay imagenes agregadas al DropZone");
                    }else {
                        myDropzone.processQueue();
                        swal("Noticia Agregada", {
                            icon: "success",
                        });
                    }
                }
            });
            
        });
        this.on("sendingmultiple", function(data, xhr, formData) {
            var ckdata = CKEDITOR.instances['editor'].getData();
            formData.append('name', jQuery('#name').val());
            formData.append('subname', jQuery('#subname').val());
            formData.append('editor', ckdata);
        });
        this.on("complete", function(file){
            myDropzone.removeFile(file);
            $("#name").val('');
            $("#subname").val('');
            CKEDITOR.instances['editor'].setData('');
        });
    }
});

