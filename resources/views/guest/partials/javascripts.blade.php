<script>
    $(document).ready(function () {
        $(".thumb-container").click(function() {
            console.log("cumi-cumi");
            var id = this.id;
            var id_number = id.split("-");
            
            $('html, body').animate({
                scrollTop: $("#pages-container-"+id_number[2]).offset().top
            }, 2000);
        });
        
        $(".burger-menu").click(function(){
            if($(this).hasClass('active')){
               $(this).removeClass('active');
               $('.header').css('display','none');
            }else{
               $(this).addClass('active');
               $('.header').css('display','block');
            }
        });
    });


    
</script>    
