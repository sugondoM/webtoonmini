<script>
    $(document).ready(function () {
        var file_count = 1;

        $("#add-new-file").click(function () {
            file_count++;
            
            var append_div = '<div class="upload-item">'
                                +'<div class="upload-cancel-button" id="upload-cancel'+file_count+'"></div>'                
                                +'<div class="upload-image-container">'
                                +'<img class="upload-image-priview" id="upload-image-'+file_count+'" src="" height="200">'
                                +'<input class="upload-image-button" id="upload-file-'+file_count+'" type="file" name="photo[]">'
                                +'</div>'
                                +'<div class="upload-number-container">'
                                +'<label for="pageNumber[]">Page</label>'
                                +'<input class="upload-page-number" id="upload-number-'+file_count+'" type="text" name="pageNumber[]" value="'+file_count+'">'
                                +'</div></div>';
                
            $("#upload-basket").append(append_div);    
            $("#upload-count-total").val(file_count);
        });
        
        $('.thumbnail-image-priview').click(function(){
            console.log("thumbnail clicked");
            $("#thumbnail-file").click();
        });
        
        $("#thumbnail-file").change(function(){
            if ($('#thumbnail-file')[0].files && $('#thumbnail-file')[0].files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#thumbnail-image').attr('src', e.target.result);
                }
                reader.readAsDataURL($('#thumbnail-file')[0].files[0]);
            } else {
                $('#thumbnail-image').attr('src', '');
            }
        });
        
        $("#upload-finalize").click(function(){
            $("#submit-button").click();
        });
    });

    $(document.body).on("change", ".upload-image-button", function () {
        var id = this.id;
        var id_number = id.split("-");
        
        console.log(id);
        
        if ($('#upload-file-' + id_number[2])[0].files && $('#upload-file-' + id_number[2])[0].files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#upload-image-' + id_number[2]).attr('src', e.target.result);
            }
            reader.readAsDataURL($('#upload-file-' + id_number[2])[0].files[0]);
        } else {
            $('#upload-image-' + id_number[2]).attr('src', '');
        }

    });
    
    $(document.body).on("click", ".upload-image-priview", function () {
        var id = this.id;
        var id_number = id.split("-");
        
        console.log(id);
        
        $("#upload-file-"+ id_number[2]).click();

    });
</script>    