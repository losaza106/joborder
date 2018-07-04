$(document).ready(function(){
    $('#other_wt_form').css('display', 'none');
    $('#other_wt').change(function () {
        $("#other_wt_form").toggle("slow", function () {
            if($('#other_wt_form').css("display") == "none"){
				$('#other_wt_form').removeAttr('required');
			}else{
				$('#other_wt_form').attr("required", "true");
			}
        });
    });

    $('#wt_sample_form').css('display', 'none');
    

    $('#wt_pd_form').css('display', 'none');

    $('#other_type').css('display', 'none');
    $('#other_type_select').change(function () {
        $("#other_type").toggle("slow", function () {
            if($('#other_type').css("display") == "none"){
				$('#other_type').removeAttr('required');
			}else{
				$('#other_type').attr("required", "true");
			}
        });
    });

    $(".logout").click(function(){
        $.ajax({
            url:'services/logout.service.php',
            type:'get',
            success:function(res){
                location.reload();
            }
        });
    });

    var part_name_get = $('#part_name_get').text().split(',');
    for(var i = 0;i<part_name_get.length;i++){
        $('#g_partname').append('<input type="text" class="form-control" id="part_name" name="part_name[]" placeholder="ชื่อชิ้นงาน" required readonly value="'+ part_name_get[i] +'">');
    }

    var part_id_get = $('#part_id_get').text().split(',');
    for(var i = 0;i<part_id_get.length;i++){
        $('#g_part_id').append('<input type="text" class="form-control" id="part_id" name="part_id[]" placeholder="หมายเลขชิ้นงาน" required readonly value="'+ part_id_get[i] +'">');
    }

    var checkOther_type = $('#other_type_select').is(':checked');
    if(checkOther_type){
        $('#other_type').css('display', 'block');
    }

    var checkOther_wt = $('#other_wt').is(':checked');
    if(checkOther_type){
        $('#other_wt_form').css('display', 'block');
    }

    var checkSample_wt = $('#wt_sample_select').is(':checked');
    if(checkSample_wt){
        $('#wt_sample_form').css('display', 'block');
    }

    var checkpd_wt = $('#wt_pd_select').is(':checked');
    if(checkpd_wt){
        $('#wt_pd_form').css('display', 'block');
    }
	
	$('#btn_reject').click(function(){
		$.ajax({
			url:'services/reject.service.php',
			post:'post',
			success:function(res){
				console.log(res);
			}
		});
	});
});