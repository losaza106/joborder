$(document).ready(function () {
    let data = [];
    data.tool_tpye = "";
    data.tool_type_other = "";
    data.wt_new = "";
    data.wt_replace = "";
    data.wt_sample = "";
    data.wt_sample_form = "";
    data.wt_other = "";
    data.wt_other_form = "";
    data.wt_modify = "";
    data.wt_repair = "";
    data.wt_production = "";
    data.wt_pd_form = "";
    data.tool_name = "";
    data.part_id = "";
    data.asset_id = "";
    data.part_name = "";
    if($('#part_id_get').text() == "No                    "){
        $('#g_part_id').append('<input type="text" class="form-control" id="part_id" name="part_id[]" placeholder="หมายเลขชิ้นงาน" required value="">');
    }else{
        let part_id_get = $('#part_id_get').text().split(',');
        for (let i = 0; i < part_id_get.length; i++) {
            $('#g_part_id').append('<input type="text" class="form-control" id="part_id" name="part_id[]" placeholder="หมายเลขชิ้นงาน" required readonly value="' + part_id_get[i] + '">');
        }
    }
    

    if($('#part_name_get').text() == "No                    "){
        $('#g_partname').append('<input type="text" class="form-control" id="part_name" name="part_name[]" placeholder="ชื่อชิ้นงาน" required value="">');
    }else{
        let part_name_get = $('#part_name_get').text().split(',');
        for (let i = 0; i < part_name_get.length; i++) {
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

    let Search_by = 0;
    $('#Search_by').change(function () {
        Search_by = $(this).val();

    });

    $("#button_search").click(function(){
        let text_search = $('#text_search').val();
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
                    let data = $.parseJSON(res);

                    if (data.success == false) {
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Not Found MAINPART'
                        });
                    } else {
                        let rows;
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
        let part_id = $('#part_id').val();
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
        let part_name = $('#part_name').val();
        let part_id = $('#part_id').val();
        if (part_id == "" || part_name == "") {
            let d1 = $(this).attr('d1');
            let d2 = $(this).attr('d2');
            let nd = $(this).attr('nd');
            let pid = $(this).attr('PARTID');
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
            let d1 = $(this).attr('d1');
            let d2 = $(this).attr('d2');
            let nd = $(this).attr('nd');
            let pid = $(this).attr('PARTID');
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
        $('#wt_1').attr('checked', false);
        $('#wt_2').attr('checked', false);
        $('#wt_3').attr('checked', false);
        $('#wt_4').attr('checked', false);
        $('#wt_5').attr('checked', false);
        $('#wt_6').attr('checked', false);
        $('#wt_new').attr('checked', false);
        $('#wt_replace').attr('checked', false);
        $('#wt_other').attr('checked', false);
        $('#wt_pd').attr('checked', false);
        $('#wt_modify').attr('checked', false);
        $('#wt_sample').attr('checked', false);
        let tool_type = $(this).attr('tool_type');
        let tool_type_other = $(this).attr('tool_type_other');
        let wt_new = $(this).attr('wt_new');
        let wt_replace = $(this).attr('wt_replace');
        let wt_other = $(this).attr('wt_other');
        let wt_pd = $(this).attr('wt_pd');
        let wt_sample_form = $(this).attr('wt_sample_form');
        let wt_pd_form = $(this).attr('wt_pd_form');
        let other_wt_form = $(this).attr('other_wt_form');
        let wt_modify = $(this).attr('wt_modify');
        let wt_sample = $(this).attr('wt_sample');
        let wt_repair = $(this).attr('wt_repair');
        let tool_name = $(this).attr('tool_name');
        let asset_id = $(this).attr('asset_id');
        let part_name = $(this).attr('part_name');
        let part_id = $(this).attr('part_id');
        let no_id = "REF : "+$(this).attr('no_id');

        $('#g_part_id').empty();

        let part_id_get = part_id.split(',');
        for (let i = 0; i < part_id_get.length; i++) {
            $('#g_part_id').append('<input type="text" class="form-control" id="part_id" name="part_id[]" placeholder="หมายเลขชิ้นงาน" required readonly value="' + part_id_get[i] + '">');
        }

        $('#g_partname').empty();

        let part_name_get = part_name.split(',');
        for (let i = 0; i < part_name_get.length; i++) {
            $('#g_partname').append('<input type="text" class="form-control" id="part_name" name="part_name[]" placeholder="ชื่อชิ้นงาน" required readonly value="' + part_name_get[i] + '">');
        }

        if (wt_new == "Y") {
            $('#wt_new').attr('checked', true);
            data.wt_new = wt_new;
        }
        $('#wt_new').attr('disabled', true);

        if (wt_replace == "Y") {
            data.wt_replace = wt_replace
            $('#wt_replace').attr('checked', true);
        }
        $('#wt_replace').attr('disabled', true);

        if (wt_other == "Y") {
            data.wt_other = wt_other;
            data.wt_other_form = other_wt_form; 
            $('#wt_other_form').val(other_wt_form);
            $('#wt_other').attr('checked', true);
        }
        $('#wt_other').attr('disabled', true);

        if (wt_pd == "Y") {
            data.wt_production = wt_pd;
            data.wt_pd_form = wt_pd_form;
            $('#wt_pd_form').val(wt_pd_form);
            $('#wt_production').attr('checked', true);
        }
        $('#wt_production').attr('disabled', true);

        if (wt_modify == "Y") {
            data.wt_modify = wt_modify;
            $('#wt_modify').attr('checked', true);
        }
        $('#wt_modify').attr('disabled', true);

        if (wt_sample == "Y") {
            data.wt_sample = wt_sample;
            data.wt_sample_form = wt_sample_form;
            $('#wt_sample_form').val(wt_sample_form);
            $('#wt_sample').attr('checked', true);
        }
        $('#wt_sample').attr('disabled', true);

        if (wt_repair == "Y") {
            data.wt_repair = wt_repair;
            $('#wt_repair').attr('checked', true);
        }
        $('#wt_repair').attr('disabled', true);

        $('#sample_text').text(wt_sample_form+" ชิ้น/(Pieces)");
        $('#pd_text').text(wt_pd_form+" ชิ้น/(Pieces)");

        $('#tool_name').val(tool_name);
        $('#tool_name').attr('disabled',true);
        $('#asset_id').val(asset_id);
        $('#asset_id').attr('disabled',true);

        if (tool_type == 1) {
            $('#wt_1').attr('checked', true);
            $('#wt_2').attr('checked', false);
            $('#wt_3').attr('checked', false);
            $('#wt_4').attr('checked', false);
            $('#wt_5').attr('checked', false);
            $('#wt_6').attr('checked', false);
            $('#wt_1').attr('disabled', true);
            $('#wt_2').attr('disabled', true);
            $('#wt_3').attr('disabled', true);
            $('#wt_4').attr('disabled', true);
            $('#wt_5').attr('disabled', true);
            $('#wt_6').attr('disabled', true);
            data.tool_tpye = "1";
        } else if (tool_type == 2) {
            $('#wt_1').attr('checked', false);
            $('#wt_2').attr('checked', true);
            $('#wt_3').attr('checked', false);
            $('#wt_4').attr('checked', false);
            $('#wt_5').attr('checked', false);
            $('#wt_6').attr('checked', false);
            $('#wt_1').attr('disabled', true);
            $('#wt_2').attr('disabled', true);
            $('#wt_3').attr('disabled', true);
            $('#wt_4').attr('disabled', true);
            $('#wt_5').attr('disabled', true);
            $('#wt_6').attr('disabled', true);
            data.tool_tpye = "2";
        } else if (tool_type == 3) {
            $('#wt_1').attr('checked', false);
            $('#wt_2').attr('checked', false);
            $('#wt_3').attr('checked', true);
            $('#wt_4').attr('checked', false);
            $('#wt_5').attr('checked', false);
            $('#wt_6').attr('checked', false);
            $('#wt_1').attr('disabled', true);
            $('#wt_2').attr('disabled', true);
            $('#wt_3').attr('disabled', true);
            $('#wt_4').attr('disabled', true);
            $('#wt_5').attr('disabled', true);
            $('#wt_6').attr('disabled', true);
            data.tool_tpye = "3";
        } else if (tool_type == 4) {
            $('#wt_1').attr('checked', false);
            $('#wt_2').attr('checked', false);
            $('#wt_3').attr('checked', false);
            $('#wt_4').attr('checked', true);
            $('#wt_5').attr('checked', false);
            $('#wt_6').attr('checked', false);
            $('#wt_1').attr('disabled', true);
            $('#wt_2').attr('disabled', true);
            $('#wt_3').attr('disabled', true);
            $('#wt_4').attr('disabled', true);
            $('#wt_5').attr('disabled', true);
            $('#wt_6').attr('disabled', true);
            data.tool_tpye = "4";
        } else if (tool_type == 5) {
            $('#wt_1').attr('checked', false);
            $('#wt_2').attr('checked', false);
            $('#wt_3').attr('checked', false);
            $('#wt_4').attr('checked', false);
            $('#wt_5').attr('checked', true);
            $('#wt_6').attr('checked', false);
            $('#wt_1').attr('disabled', true);
            $('#wt_2').attr('disabled', true);
            $('#wt_3').attr('disabled', true);
            $('#wt_4').attr('disabled', true);
            $('#wt_5').attr('disabled', true);
            $('#wt_6').attr('disabled', true);
            data.tool_tpye = "5";
        } else if (tool_type == 6) {
            $('#wt_1').attr('checked', false);
            $('#wt_2').attr('checked', false);
            $('#wt_3').attr('checked', false);
            $('#wt_4').attr('checked', false);
            $('#wt_5').attr('checked', false);
            $('#wt_6').attr('checked', true);
            $('#wt_1').attr('disabled', true);
            $('#wt_2').attr('disabled', true);
            $('#wt_3').attr('disabled', true);
            $('#wt_4').attr('disabled', true);
            $('#wt_5').attr('disabled', true);
            $('#wt_6').attr('disabled', true);
            data.tool_tpye = "6";
            $('#tool_type_other').val(tool_type_other);
            data.tool_type_other = tool_type_other;
        }
        $('#ref_doc').text(no_id);
        $('#have_ref').text("");
        $('#add_partid').hide();
        $('#btn_search_part').hide();
        $('#exampleModal').modal("hide");
    });

    $('input[name="tool_type"]').each(function(){
        if($(this).is(':checked')){
            if($(this).val() == 6){
                data.tool_type_other = $('#tool_type_other_text').val();
                data.tool_tpye = $(this).val();
            }else{
                data.tool_tpye = $(this).val();
            }
        }
    });

    if($('#wt_new').is(':checked')){
        data.wt_new = $('#wt_new').val();
    }
    if($('#wt_replace').is(':checked')){
        data.wt_replace = $('#wt_replace').val();
    }
    if($('#wt_modify').is(':checked')){
        data.wt_modify = $('#wt_modify').val();
    }
    if($('#wt_repair').is(':checked')){
        data.wt_repair = $('#wt_repair').val();
    }

    if($('#wt_sample').is(':checked')){
        data.wt_sample = $('#wt_sample').val();
        data.wt_sample_form = $('#wt_sample_form').val();
    }

    if($('#wt_production').is(':checked')){
        data.wt_pd = $('#wt_production').val();
        data.wt_pd_form = $('#wt_pd_form').val();
    }

    if($('#wt_other').is(':checked')){
        data.wt_other = $('#wt_other').val();
        data.wt_other_form = $('#wt_other_form').val();
    }

    $('#btn_record').click(function(){
        if(data.tool_tpye == ""){
            swal({
                type: 'error',
                title: 'Oops...',
                text: 'กรุณาเลือก Tool Type ก่อน'
            })
        }else{
            if(data.tool_tpye == 6){
                if($('#tool_type_other').val() == ""){
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'โปรดกรอกช่อง Tool Type Other'
                    })
                }else{
                    data.tool_type_other = $('#tool_type_other').val();
                }
            }else{
                if(data.wt_sample == "Y"){
                    if($('#wt_sample_form').val() == ""){
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'โปรดกรอกช่อง Sample Form'
                        })
                    }else{
                        data.wt_sample_form = $('#wt_sample_form').val();
                    }
                }
            }
        }


        if(data.wt_production == "Y"){
            if($('#wt_pd_form').val() == ""){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'โปรดกรอกช่อง Production Form'
                })
            }else{
                data.wt_pd_form = $('#wt_pd_form').val();
            }
        }
        if(data.wt_other == "Y"){
            if($('#wt_other_form').val() == ""){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'โปรดกรอกช่อง Other Work Type Form'
                })
            }else{
                data.wt_other_form = $('#wt_other_form').val();
            }
        }
        data.tool_name = $('#tool_name').val();
        data.asset_id = $('#asset_id').val();
        $('input[name^="part_id"]').each(function() {
            if($(this).val() == ""){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'โปรดกรอกช่อง PART ID ให้ครบ'
                })
            }else{
                data.part_id += $(this).val()+",";
            }
        });

        $('input[name^="part_name"]').each(function() {
            if($(this).val() == ""){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'โปรดกรอกช่อง PART NAME ให้ครบ'
                })
            }else{
                data.part_name += $(this).val()+",";
            }
        });
        
        console.log(data);
    });

    $('input[name="tool_type"]').on('change', function () {
        $('input[name="tool_type"]').not(this).prop('checked', false);
        data.tool_tpye = $(this).val();
        data.tool_type_other = $('#tool_type_other').text();
        
    });

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

    $('#wt_new').change(function(){
        if($(this).is(':checked')){
            data.wt_new = "Y";
        }
    });

    $('#wt_replace').change(function(){
        if($(this).is(':checked')){
            data.wt_replace = "Y";
        }
    });

    $('#wt_sample').change(function(){
        if($(this).is(':checked')){
            data.wt_sample = "Y";
        }
    });

    $('#wt_other').change(function(){
        if($(this).is(':checked')){
            data.wt_other = "Y";
        }
    });
    
    $('#wt_modify').change(function(){
        if($(this).is(':checked')){
            data.wt_modify = "Y";
        }
    });

    $('#wt_repair').change(function(){
        if($(this).is(':checked')){
            data.wt_repair = "Y";
        }
    });

    $('#wt_production').change(function(){
        if($(this).is(':checked')){
            data.wt_production = "Y";
        }
    });

    
});