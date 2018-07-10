$(document).ready(function () {
    $('#other_wt_form').css('display', 'none');
    $('#other_wt').change(function () {
        $("#other_wt_form").toggle("slow", function () {
            if ($('#other_wt_form').css("display") == "none") {
                $('#other_wt_form').removeAttr('required');
            } else {
                $('#other_wt_form').attr("required", "true");
            }
        });
    });
	var req = $('#req').text();
	var received_by = $('#true_received').text();
	if(req === received_by){
		
	}else{
		$('#if_status_renew').hide();
	}

    $('#wt_sample_form').css('display', 'none');


    $('#wt_pd_form').css('display', 'none');

    $('#other_type').css('display', 'none');
    $('#other_type_select').change(function () {
        $("#other_type").toggle("slow", function () {
            if ($('#other_type').css("display") == "none") {
                $('#other_type').removeAttr('required');
            } else {
                $('#other_type').attr("required", "true");
            }
        });
    });

    $(".logout").click(function () {
        $.ajax({
            url: 'services/logout.service.php',
            type: 'get',
            success: function (res) {
                location.replace(res);
            }
        });
    });

    var part_name_get = $('#part_name_get').text().split(',');
    for (var i = 0; i < part_name_get.length; i++) {
        $('#g_partname').append('<input type="text" class="form-control" id="part_name" name="part_name[]" placeholder="ชื่อชิ้นงาน" required readonly value="' + part_name_get[i] + '">');
    }

    var part_id_get = $('#part_id_get').text().split(',');
    for (var i = 0; i < part_id_get.length; i++) {
        $('#g_part_id').append('<input type="text" class="form-control" id="part_id" name="part_id[]" placeholder="หมายเลขชิ้นงาน" required readonly value="' + part_id_get[i] + '">');
    }

    var checkOther_type = $('#other_type_select').is(':checked');
    if (checkOther_type) {
        $('#other_type').css('display', 'block');
    }

    var checkOther_wt = $('#other_wt').is(':checked');
    if (checkOther_type) {
        $('#other_wt_form').css('display', 'block');
    }

    var checkSample_wt = $('#wt_sample_select').is(':checked');
    if (checkSample_wt) {
        $('#wt_sample_form').css('display', 'block');
    }

    var checkpd_wt = $('#wt_pd_select').is(':checked');
    if (checkpd_wt) {
        $('#wt_pd_form').css('display', 'block');
    }

    $('#send_renew').click(function(){
		var message = $('#message-text').val();
		var no_id = $('#no_id').text();
		var req = $('#req').text();
		var received = $('#received').text();
		var due_date_renew = $('#due_date_renew').val();
		var today = new Date().toISOString().slice(0,10);
		if(message == ""){
			swal({
                type: 'error',
                title: 'Wrong!...',
                text: 'Please fill Comment!.'
            });
		}else{
			if(due_date_renew == ""){
					swal({
					type: 'error',
					title: 'Wrong!...',
					text: 'กรุณาเลือกวันที่.'
					})
			}else{
				if(due_date_renew < today){
					swal({
					type: 'error',
					title: 'Wrong!...',
					text: 'เลือกวันที่ให้ถูกต้อง.'
				});
				}else{
					$.ajax({
						url:'services/renew.service.php',
						type:'post',
						data:{message:message,no_id:no_id,req:req,action:1,due_date:due_date_renew,received:received},
						success:function(res){
							var data = $.parseJSON(res);
							if (data.success) {
                                swal({
                                    title: 'Success.',
                                    text: "รอ ผู้ส่ง Approved.",
                                    type: 'success',
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.value) {
                                        window.location = 'index.php';
                                    }
                                });
                            } else {
                                swal({
                                    type: 'error',
                                    title: 'Error...',
                                    text: 'Something Wrong!..'
                                });
                            }
						},
						beforeSend: function () {
                            swal({
                                title: 'Process..',
                                allowOutsideClick: false
                            });
                            swal.showLoading();
                        }
					});
				}
			}
			
			
		}
	});
	
	function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}
});