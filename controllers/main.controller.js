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
	
	$.ajax({
            url:'services/main.service.php',
            type:'post',
			data:{action:1},
            success:function(res){
                //var data = $.parseJSON(res);
                console.log(res);
                $('#data_table').html(res);
            }
        });
});