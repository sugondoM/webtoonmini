<script>
    $(document).ready(function () {
        var x, i, j, selElmnt, a, b, c;
        /*look for any elements with the class "custom-select":*/
        x = document.getElementsByClassName("custom-select");
        for (i = 0; i < x.length; i++) {
          selElmnt = x[i].getElementsByTagName("select")[0];
          /*for each element, create a new DIV that will act as the selected item:*/
          a = document.createElement("DIV");
          a.setAttribute("class", "select-selected");
          a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
          x[i].appendChild(a);
          /*for each element, create a new DIV that will contain the option list:*/
          b = document.createElement("DIV");
          b.setAttribute("class", "select-items select-hide");
          for (j = 1; j < selElmnt.length; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var i, s, h;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                h = this.parentNode.previousSibling;
                for (i = 0; i < s.length; i++) {
                  if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    break;
                  }
                }
                h.click();
            });
            b.appendChild(c);
          }
          x[i].appendChild(b);
          a.addEventListener("click", function(e) {
              /*when the select box is clicked, close any other select boxes,
              and open/close the current select box:*/
              e.stopPropagation();
              closeAllSelect(this);
              this.nextSibling.classList.toggle("select-hide");
              this.classList.toggle("select-arrow-active");
          });
        }
        
        var file_count = 1;

        $("#add-new-file").click(function () {
            file_count++;
            
            var append_div = '<div class="upload-item" id="upload-item-'+file_count+'">'
                                +'<div class="upload-cancel-button" id="upload-cancel-'+file_count+'">x</div>'                
                                +'<div class="upload-image-container" id="upload-priview-'+file_count+'" >'
                                +'<img class="upload-image-priview"  id="upload-image-'+file_count+'" height="200">'
                                +'</div>'
                                +'<input class="upload-image-button" id="upload-file-'+file_count+'" type="file" name="photo[]">'
                                +'<div class="upload-number-container">'
                                +'<label for="pageNumber[]">Page</label>'
                                +'<input class="upload-page-number" id="upload-number-'+file_count+'" type="text" name="pageNumber[]" value="'+file_count+'">'
                                +'</div></div>';
                
            $("#upload-basket").append(append_div);    
            $("#upload-count-total").val(file_count);
        });
        
        $('.thumbnail-image-container').click(function(){
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
                 $('.thumbnail-image-container p').text('');
            } else {
                $('#thumbnail-image').attr('src', '');
            }
        });
        
        $("#upload-finalize").click(function(){
            $("#submit-button").click();
        });
        
        function closeAllSelect(elmnt) {
          /*a function that will close all select boxes in the document,
          except the current select box:*/
          var x, y, i, arrNo = [];
          x = document.getElementsByClassName("select-items");
          y = document.getElementsByClassName("select-selected");
          for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
              arrNo.push(i)
            } else {
              y[i].classList.remove("select-arrow-active");
            }
          }
          for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
              x[i].classList.add("select-hide");
            }
          }
        }
        /*if the user clicks anywhere outside the select box,
        then close all select boxes:*/
        document.addEventListener("click", closeAllSelect); 
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
    
    $(document.body).on("click", ".upload-image-container", function () {
        var id = this.id;
        var id_number = id.split("-");
        
        console.log(id);
        
        $("#upload-file-"+ id_number[2]).click();

    });
    
    $(document.body).on("click", ".upload-cancel-button", function () {
        var id = this.id;
        var id_number = id.split("-");
        
        console.log(id);
        
        $("#upload-item-"+ id_number[2]).remove();

    });
    
    
</script>    