$(document).ready(function(){
    var part_id_get = $('#part_id_get').text().split(',');
    for (var i = 0; i < part_id_get.length; i++) {
        $('#g_part_id').append('<input type="text" class="form-control" id="part_id" name="part_id[]" placeholder="หมายเลขชิ้นงาน" required readonly value="' + part_id_get[i] + '">');
    }

    var part_name_get = $('#part_name_get').text().split(',');
    for (var i = 0; i < part_name_get.length; i++) {
        $('#g_partname').append('<input type="text" class="form-control" id="part_name" name="part_name[]" placeholder="ชื่อชิ้นงาน" required readonly value="' + part_name_get[i] + '">');
    }
});