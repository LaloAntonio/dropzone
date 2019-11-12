var id = window.location.toString().split('=')[1];
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone(".dropzone",{
    url: "upload.php?p=edit",
    autoProcessQueue: false,
    parallelUploads: 10,
    uploadMultiple:true,
    maxFiles: 5,
    addRemoveLinks: true,
    acceptedFiles: "image/jpeg",
    init: function() {
        $.get('showimages.php?i='+id, function(data) {
            $.each(data, function(key,value){
                var mockFile = { name: value.name, size: value.size };
                myDropzone.options.addedfile.call(myDropzone, mockFile);
                myDropzone.options.thumbnail.call(myDropzone, mockFile, "upload/"+value.name);
            });

        });
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

