$(document).ready(function(){
    $(".logout").click(function(){
        $.ajax({
            url:'services/logout.service.php',
            type:'get',
            success:function(res){
                location.reload();
            }
        });
    });
});