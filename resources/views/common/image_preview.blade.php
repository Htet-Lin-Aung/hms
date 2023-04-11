<script>
    var dT = new ClipboardEvent('').clipboardData || new DataTransfer(); 

    function deletePreview(index){
        var filelistall = $('#customFile').prop("files");
        var fileBuffer=[];

        //store upload files to array
        Array.prototype.push.apply( fileBuffer, filelistall );
        
        //remove clicked file
        fileBuffer.splice(index, 1);

        //append new files 
        dT = new ClipboardEvent('').clipboardData || new DataTransfer(); 
        for (let file of fileBuffer) { dT.items.add(file); }
        $('#customFile').prop("files",dT.files);

        //remove preview image
        $(".thumbParent").remove();

        //show new images
        previewImage($('#customFile').prop("files")); 
    }
  
    $('#customFile').on('change', function(){
        if(this.files)
        {
            var filelistall =this.files;

            //add image preview with FileReader 
            previewImage(filelistall);
            
            //old file append
            var fileBuffer=[];
            Array.prototype.push.apply( fileBuffer, filelistall );
            
            for (let file of fileBuffer) { dT.items.add(file); }
            $('#customFile').prop("files",dT.files);
        }
    });

    function previewImage(uploadFiles){
        var names = $.map(uploadFiles, function(val) { return val.name; });
        for (n in names){
            var reader = new FileReader();
            reader.onload = (function(f) {
                return function(e) {
                html = $('<div class="col-lg-4 thumbParent" id="preload_'+f+'"><div class="row" style="margin: 10px;"><img src="'+e.target.result+'" width="100%" height="100px" onclick="PopupImage(this.src)" /><span class="btn btn-danger col-lg-12" onclick="deletePreview('+f+')">Delete</span></div></div>');
                html.appendTo("#upload_preview");
                }
            })(n);
            reader.readAsDataURL(uploadFiles[n]);
        }
    }
</script>