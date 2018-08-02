$(document).ready(function () {
    $(".logout").click(function () {
        $.ajax({
            url: 'services/logout.service.php',
            type: 'get',
            success: function (res) {
                location.replace(res);
            }
        });
    });

    var search_by = 1;

    $.ajax({
        url: 'services/main.service.php',
        type: 'post',
        data: {
            action: 1,
            search_by:search_by
        },
        success: function (res) {
            $('#data_table_all').html(res);
        }
    });

        $('#sort_by').change(function () {
            search_by = $(this).val();
            if(search_by == 3){
                $.ajax({
                    url: 'services/main.service.php',
                    type: 'post',
                    data: {
                        action: 3
                    },
                    success: function (res) {
                        
                        $('#data_table_all').html(res);
                    }
                });
            }else{
                $.ajax({
                    url: 'services/main.service.php',
                    type: 'post',
                    data: {
                        action: 1,
                        search_by:search_by
                    },
                    success: function (res) {
                        console.log(res);
                        $('#data_table_all').html(res);
                    }
                });
            }
        });
});