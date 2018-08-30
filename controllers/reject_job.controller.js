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

    $('#wt_sample_form').css('display', 'none');
    $('#wt_sample_select').change(function () {
        $("#wt_sample_form").toggle("slow", function () {
            // Animation complete.
        });
    });

    $('#wt_pd_form').css('display', 'none');
    $('#wt_pd_select').change(function () {
        $("#wt_pd_form").toggle("slow", function () {
            // Animation complete.
        });
    });

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
	var session_id = $('#session_id').text();
	var no_id = $('#no_id').text();
	$("#send_next").click(function(){
		$.ajax({
			url:'services/reject.service.php',
			type:'post',
			data:{session_id:session_id,action:5,no_id:no_id},
			success:function(res){
				swal({
                    title: 'Success.',
                    text: "DOCUMENT ID : "+ res,
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php';
                    }
                });
			},
			beforeSend: function() {
                swal({
                    title: 'Process..',
                    allowOutsideClick: false
                });
                swal.showLoading();
            }
		});
	});

    var part_name_get = $('#part_name_get').text().split(',');
    for (var i = 0; i < part_name_get.length; i++) {
        $('#g_partname').append('<input type="text" class="form-control" id="part_name" name="part_name[]" placeholder="ชื่อชิ้นงาน" required value="' + part_name_get[i] + '">');
    }

    var part_id_get = $('#part_id_get').text().split(',');
    for (var i = 0; i < part_id_get.length; i++) {
        $('#g_part_id').append('<input type="text" class="form-control" id="part_id" name="part_id[]" placeholder="หมายเลขชิ้นงาน" required value="' + part_id_get[i] + '">');
    }

    $('#add_job').on('submit',function(e){
        e.preventDefault();
        $.ajaxSetup({
            cache: false,
            contentType: false,
            processData: false
        });
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: 'services/update.service.php',
            type: 'post',
            data: formData,
            success: function (res) {
                swal({
                    title: 'Success.',
                    text: "Save Sucess.",
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        location.reload();
                    }
                });
            }
        });
    });

    $('#add_partid').click(function () {
        var part_id = $('#part_id').val();
        if(part_id == ""){
            $.ajax({
                url: 'services/nextID.service.php',
                type: 'post',
                success: function (res) {
                    $('#part_id').val(res);
                }
            });
        }else{
            $.ajax({
                url: 'services/nextID.service.php',
                type: 'post',
                success: function (res) {
                    $('#add_part_id').after('<input type="text" class="form-control" id="part_id" name="part_id[]" placeholder="หมายเลขชิ้นงาน" value="' + res + '" required>');
                    $('#add_part_name').after('<input type="text" class="form-control" id="part_name" name="part_name[]" placeholder="ชื่อชิ้นงาน" required>');
                }
            });
        }
        
    });
    var Search_by = 0;
    $('#Search_by').change(function () {
        Search_by = $(this).val();

    });
    $('#button_search').click(function () {
        var text_search = $('#text_search').val();
        if (text_search == "") {
            swal({
                type: 'error',
                title: 'Oops...',
                text: 'Please fill out this field.'
            });
        } else {
            $.ajax({
                url: 'services/excel.service.php',
                type: 'post',
                data: {
                    text_search: text_search,
                    Search_by: Search_by
                },
                success: function (res) {
                    var data = $.parseJSON(res);

                    if (data.success == false) {
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Not Found MAINPART'
                        });
                    } else {
                        var rows;
                        $.each(data, function (key, MAINPART) {
                            if (MAINPART.PARTID == "") {
                                var PARTIDNAJA = "1";
                            } else {
                                var PARTIDNAJA = MAINPART.PARTID;
                            }
                            rows +=
                                "<tr>" +
                                "<td>" + MAINPART.PARTID + "</td>" +
                                "<td>" + MAINPART.D1 + "</td>" +
                                "<td><button class='btn btn-success' type='button' id='selectdd' D1='" + MAINPART.D1 + "' D2='" + MAINPART.D2 + "' ND='" + MAINPART.ND + "' PARTID='" + PARTIDNAJA + "'><i class='fa fa-check' aria-hidden='true'></i></button></td>" +
                                "</tr>";
                        });
                        $("tbody#MIANPART").html(rows);
                        $('#loading').removeClass('fa fa-circle-o-notch fa-spin').addClass('fa fa-search');
                    }
                },
                beforeSend: function() {
                    $('#loading').removeClass('fa fa-search').addClass('fa fa-circle-o-notch fa-spin');
                }
            });
        }

    });

    $("body").on("click", "#selectdd", function (e) {
        var part_name = $('#part_name').val();
        var part_id = $('#part_id').val();
        if (part_id == "" || part_name == "") {
            var d1 = $(this).attr('d1');
            var d2 = $(this).attr('d2');
            var nd = $(this).attr('nd');
            var pid = $(this).attr('PARTID');
            if (pid == "1") {
                $.ajax({
                    url: 'services/nextID.service.php',
                    type: 'post',
                    success: function (res) {
                        $('#part_name').val(d1);
                        $('#part_id').val(res);
                        $('#exampleModal').modal("hide");
                    }
                });
            } else {
                $('#part_name').val(d1);
                $('#part_id').val(pid);

                $('#exampleModal').modal("hide");
            }

        } else {
            var d1 = $(this).attr('d1');
            var d2 = $(this).attr('d2');
            var nd = $(this).attr('nd');
            var pid = $(this).attr('PARTID');
            if (pid == "1") {
                $.ajax({
                    url: 'services/nextID.service.php',
                    type: 'post',
                    success: function (res) {
                        $('#add_part_id').after('<input type="text" class="form-control" name="part_id[]" placeholder="หมายเลขชิ้นงาน" value="' + res + '">');
                        $('#add_part_name').after('<input type="text" class="form-control" name="part_name[]" placeholder="ชื่อชิ้นงาน" value="' + d1 + '">');
                        $('#exampleModal').modal("hide");
                    }
                });

            } else {
                $('#add_part_id').after('<input type="text" class="form-control" name="part_id[]" placeholder="หมายเลขชิ้นงาน" value="' + pid + '">');
                $('#add_part_name').after('<input type="text" class="form-control" name="part_name[]" placeholder="ชื่อชิ้นงาน" value="' + d1 + '">');
                $('#exampleModal').modal("hide");

            }

        }

    });

    $('#btn_addfile_attachedfile').click(function () {
        $(this).before('<input type="file" class="form-control" name="attachedfile[]">');
    });

    var requiredCheckboxes = $('input[name="tool_type"]');
    if (requiredCheckboxes.is(':checked')) {
        requiredCheckboxes.removeAttr('required');
    } else {
        requiredCheckboxes.attr('required', 'required');
    }

    $('input[name="tool_type"]').on('change', function () {
        $('input[name="tool_type"]').not(this).prop('checked', false);

    });

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

    $('.delete_doc').click(function() {
        var id_pic = $(this).attr('id_cus');
        
        swal({
            title: 'Are you sure?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: 'services/file.service.php',
                    type: 'post',
                    data: { id_pic: id_pic, session_id: session_id },
                    success: function(res) {
                        var data = $.parseJSON(res);
                        if (data.success) {
                            swal({
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                type: 'success',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                        } else {
                            swal({
                                type: 'error',
                                title: 'Something went wrong!...'
                            })
                        }
                    }
                });
            }
        })
    });
});