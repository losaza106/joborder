$(document).ready(function(){
    if($('#part_name_get').text() == "No"){
        $('#g_partname').append('<input type="text" class="form-control" id="part_name" name="part_name[]" placeholder="ชื่อชิ้นงาน" required value="">');
    }else{
        let part_name_get = $('#part_name_get').text().split(',');
        for (let i = 0; i < part_name_get.length-1; i++) {
            $('#g_partname').append('<input type="text" class="form-control" id="part_name" name="part_name[]" placeholder="ชื่อชิ้นงาน" required readonly value="' + part_name_get[i] + '">');
        }
    }

    if($('#part_id_get').text() == "No"){
        $('#g_part_id').append('<input type="text" class="form-control" id="part_id" name="part_id[]" placeholder="หมายเลขชิ้นงาน" required value="">');
    }else{
        let part_id_get = $('#part_id_get').text().split(',');
        for (let i = 0; i < part_id_get.length-1; i++) {
            $('#g_part_id').append('<input type="text" class="form-control" id="part_id" name="part_id[]" placeholder="หมายเลขชิ้นงาน" required readonly value="' + part_id_get[i] + '">');
        }
    }

    $('#tool_type_other').css('display', 'none');
    $('#wt_6').change(function () {
        $("#tool_type_other").toggle("slow", function () {
            if($('#tool_type_other').css("display") == "none"){
				$('#tool_type_other').removeAttr('required');
			}else{
				$('#tool_type_other').attr("required", "true");
			}
        });
    });

    $('#wt_sample_form').css('display', 'none');
    $('#wt_sample').change(function () {
        $("#wt_sample_form").toggle("slow", function () {
            if($('#wt_sample_form').css("display") == "none"){
				$('#wt_sample_form').removeAttr('required');
			}else{
				$('#wt_sample_form').attr("required", "true");
			}
        });
    });

    $('#wt_pd_form').css('display', 'none');
    $('#wt_production').change(function () {
        $("#wt_pd_form").toggle("slow", function () {
            if($('#wt_pd_form').css("display") == "none"){
				$('#wt_pd_form').removeAttr('required');
			}else{
				$('#wt_pd_form').attr("required", "true");
			}
        });
    });

    $('#wt_other_form').css('display', 'none');
    $('#wt_other').change(function () {
        $("#wt_other_form").toggle("slow", function () {
            if($('#wt_other_form').css("display") == "none"){
				$('#wt_other_form').removeAttr('required');
			}else{
				$('#wt_other_form').attr("required", "true");
			}
        });
    });
});