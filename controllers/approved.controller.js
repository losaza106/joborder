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

    var status = $('#status').text();
    if(status == 1){
        $('#button_approved').hide();
        $('#reject_button').hide();
        $('#button_approved3').hide();
        $('#reject_button3').hide();
    }else if(status == 0){
        $('#button_approved2').hide();
        $('#reject_button2').hide();
        $('#button_approved3').hide();
        $('#reject_button3').hide();
    }else if(status == 4){
        $('#button_approved2').hide();
        $('#reject_button2').hide();
        $('#button_approved').hide();
        $('#reject_button').hide();
    }else if(status == 5){
        $('#if_reject').hide();
    }else if(status == 3){
        $('#if_reject').hide();
    }else if(status == 6){
        $('#if_reject').hide();
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
                location.reload();
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

    $('#btn_reject').click(function () {
        var session_id = $('#session_id').text();
        var message = $('#message-text').val();
        if (message == "") {
            swal({
                type: 'error',
                title: 'Wrong!...',
                text: 'Please fill Comment!.'
            });
        } else {
            swal({
                title: 'Confirm',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes.',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: 'services/reject.service.php',
                        type: 'post',
                        data: {
                            action: 1,
                            session_id: session_id,
                            message: message
                        },
                        success: function (res) {
                            var data = $.parseJSON(res);
                            if (data.success) {
                                swal({
                                    title: 'Success.',
                                    text: "Reject Success.",
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
            })

        }

    });

    $('#button_approved').click(function () {
        var session_id = $('#session_id').text();
        var received = $('#received').text();
        var no_id = $('#no_id').text();
        
        swal({
            title: 'Comfirm?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes.'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: 'services/approved.service.php',
                    type: 'post',
                    data: {
                        action: 1,
                        session_id: session_id,
                        received:received,
                        no_id:no_id
                    },
                    success: function (res) {
                        var data = $.parseJSON(res);
                        if (data.success) {
                            swal({
                                title: 'Success.',
                                text: "Success, รอผู้รับ Approved.",
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
        })
    });

    $('#button_approved2').click(function(){
        var session_id = $('#session_id').text();
        var no_id = $('#no_id').text();
        swal({
            title: 'Comfirm',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes.'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url:'services/approved.service.php',
                    type:'post',
                    data:{action:2,session_id:session_id,no_id:no_id},
                    success:function(res){
                        var data = $.parseJSON(res);
                        if (data.success) {
                            swal({
                                title: 'Success.',
                                text: "Success, รอ Manager ของผู้รับ Approved.",
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
        })
    });

    $('#reject_button2').click(function(){
        var session_id = $('#session_id').text();
        swal({
            title: 'Comfirm Reject?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes.'
        }).then((result) => {
            if (result.value) {
               $.ajax({
                   url:'services/reject.service.php',
                   type:'post',
                   data:{action:2,session_id:session_id},
                   success:function(res){
                    var data = $.parseJSON(res);
                    if (data.success) {
                        swal({
                            title: 'Success.',
                            text: "Reject Success.",
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
        })
    });

    $('#btn_reject2').click(function(){
        var session_id = $('#session_id').text();
        var message = $('#message-text2').val();
        if(message == ""){
            swal({
                type: 'error',
                title: 'Wrong!...',
                text: 'Please fill Comment!.'
            });
        }else{
            swal({
                title: 'Comfirm Reject?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes.'
            }).then((result) => {
                if (result.value) {
                   $.ajax({
                       url:'services/reject.service.php',
                       type:'post',
                       data:{action:3,session_id:session_id,message:message},
                       success:function(res){
                        console.log(res);
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
            })
        }
        
    });

    $('#button_approved3').click(function(){
        var session_id = $('#session_id').text();
        var no_id = $('#no_id').text();
        var req = $('#req').text();
        swal({
            title: 'Comfirm?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes.'
        }).then((result) => {
            if (result.value) {
               $.ajax({
                   url:'services/approved.service.php',
                   type:'post',
                   data:{action:3,session_id:session_id,no_id:no_id,req:req},
                   success:function(res){
                    var data = $.parseJSON(res);
                    if(data.success){
                        swal({
                            title: 'Create Document ID : ' + data.id,
                            text: "Create Document Success.",
                            type: 'success',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value) {
                                window.location = 'index.php';
                            }
                        });
                    }else{
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
        })
    });
});