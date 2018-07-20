$(document).ready(function () {

    if($('#part_id_get').text() == "No                    "){
        $('#g_part_id').append('<input type="text" class="form-control" id="part_id" name="part_id[]" placeholder="หมายเลขชิ้นงาน" required value="">');
    }else{
        let part_id_get = $('#part_id_get').text().split(',');
        for (var i = 0; i < part_id_get.length; i++) {
            $('#g_part_id').append('<input type="text" class="form-control" id="part_id" name="part_id[]" placeholder="หมายเลขชิ้นงาน" required readonly value="' + part_id_get[i] + '">');
        }
    }
    

    if($('#part_name_get').text() == "No                    "){
        $('#g_partname').append('<input type="text" class="form-control" id="part_name" name="part_name[]" placeholder="ชื่อชิ้นงาน" required value="">');
    }else{
        var part_name_get = $('#part_name_get').text().split(',');
        for (var i = 0; i < part_name_get.length; i++) {
            $('#g_partname').append('<input type="text" class="form-control" id="part_name" name="part_name[]" placeholder="ชื่อชิ้นงาน" required readonly value="' + part_name_get[i] + '">');
        }
    }

    $.ajax({
        url: 'services/main.service.php',
        type: 'post',
        data: {
            action: 2
        },
        success: function (res) {
            $('#data_table').html(res);
        }
    });

    var Search_by = 0;
    $('#Search_by').change(function () {
        Search_by = $(this).val();

    });

    $("#button_search").click(function(){
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

    $('#add_partid').click(function(){
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
                    $('#g_part_id').after('<input type="text" class="form-control" id="part_id" name="part_id[]" placeholder="หมายเลขชิ้นงาน" value="' + res + '">');
                    $('#g_partname').after('<input type="text" class="form-control" id="part_name" name="part_name[]" placeholder="ชื่อชิ้นงาน">');
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
                        $('#exampleModal1').modal("hide");
                    }
                });
            } else {
                $('#part_name').val(d1);
                $('#part_id').val(pid);

                $('#exampleModal1').modal("hide");
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
                        $('#g_part_id').after('<input type="text" class="form-control" name="part_id[]" placeholder="หมายเลขชิ้นงาน" value="' + res + '">');
                        $('#g_part_name').after('<input type="text" class="form-control" name="part_name[]" placeholder="ชื่อชิ้นงาน" value="' + d1 + '">');
                        $('#exampleModal1').modal("hide");
                    }
                });

            } else {
                $('#g_part_id').after('<input type="text" class="form-control" name="part_id[]" placeholder="หมายเลขชิ้นงาน" value="' + pid + '">');
                $('#g_partname').after('<input type="text" class="form-control" name="part_name[]" placeholder="ชื่อชิ้นงาน" value="' + d1 + '">');
                $('#exampleModal1').modal("hide");

            }

        }

    });

    $("body").on("click", "#selectjob", function (e) {
        var tool_type = $(this).attr('tool_type');
        var tool_type_other = $(this).attr('tool_type_other');
        var wt_new = $(this).attr('wt_new');
        var wt_replace = $(this).attr('wt_replace');
        var wt_other = $(this).attr('wt_other');
        var wt_pd = $(this).attr('wt_pd');
        var wt_sample_form = $(this).attr('wt_sample_form');
        var wt_pd_form = $(this).attr('wt_pd_form');
        var other_wt_form = $(this).attr('other_wt_form');
        var wt_modify = $(this).attr('wt_modify');
        var wt_sample = $(this).attr('wt_sample');
        var wt_repair = $(this).attr('wt_repair');
        var tool_name = $(this).attr('tool_name');
        var asset_id = $(this).attr('asset_id');
        var part_name = $(this).attr('part_name');
        var part_id = $(this).attr('part_id');

        $('#g_part_id').empty();

        var part_id_get = part_id.split(',');
        for (var i = 0; i < part_id_get.length; i++) {
            $('#g_part_id').append('<input type="text" class="form-control" id="part_id" name="part_id[]" placeholder="หมายเลขชิ้นงาน" required readonly value="' + part_id_get[i] + '">');
        }

        $('#g_partname').empty();

        var part_name_get = part_name.split(',');
        for (var i = 0; i < part_name_get.length; i++) {
            $('#g_partname').append('<input type="text" class="form-control" id="part_name" name="part_name[]" placeholder="ชื่อชิ้นงาน" required readonly value="' + part_name_get[i] + '">');
        }

        if (wt_new == "Y") {
            $('#wt_new').attr('checked', true);
        }

        if (wt_replace == "Y") {
            $('#wt_replace').attr('checked', true);
        }

        if (wt_other == "Y") {
            $('#wt_other').attr('checked', true);
        }

        if (wt_pd == "Y") {
            $('#wt_pd').attr('checked', true);
        }

        if (wt_modify == "Y") {
            $('#wt_modify').attr('checked', true);
        }

        if (wt_sample == "Y") {
            $('#wt_sample').attr('checked', true);
        }

        if (wt_repair == "Y") {
            $('#wt_repair').attr('checked', true);
        }

        $('#tool_name').val(tool_name);
        $('#asset_id').val(asset_id);

        if (tool_type == 1) {
            $('#wt_1').attr('checked', true);
            $('#wt_2').attr('checked', false);
            $('#wt_3').attr('checked', false);
            $('#wt_4').attr('checked', false);
            $('#wt_5').attr('checked', false);
            $('#wt_6').attr('checked', false);
        } else if (tool_type == 2) {
            $('#wt_1').attr('checked', false);
            $('#wt_2').attr('checked', true);
            $('#wt_3').attr('checked', false);
            $('#wt_4').attr('checked', false);
            $('#wt_5').attr('checked', false);
            $('#wt_6').attr('checked', false);
        } else if (tool_type == 3) {
            $('#wt_1').attr('checked', false);
            $('#wt_2').attr('checked', false);
            $('#wt_3').attr('checked', true);
            $('#wt_4').attr('checked', false);
            $('#wt_5').attr('checked', false);
            $('#wt_6').attr('checked', false);
        } else if (tool_type == 4) {
            $('#wt_1').attr('checked', false);
            $('#wt_2').attr('checked', false);
            $('#wt_3').attr('checked', false);
            $('#wt_4').attr('checked', true);
            $('#wt_5').attr('checked', false);
            $('#wt_6').attr('checked', false);
        } else if (tool_type == 5) {
            $('#wt_1').attr('checked', false);
            $('#wt_2').attr('checked', false);
            $('#wt_3').attr('checked', false);
            $('#wt_4').attr('checked', false);
            $('#wt_5').attr('checked', true);
            $('#wt_6').attr('checked', false);
        } else if (tool_type == 6) {
            $('#wt_1').attr('checked', false);
            $('#wt_2').attr('checked', false);
            $('#wt_3').attr('checked', false);
            $('#wt_4').attr('checked', false);
            $('#wt_5').attr('checked', false);
            $('#wt_6').attr('checked', true);
        }
    });
});