$(document).ready(function(){
    
    $('#login-form').submit(function(e){
        e.preventDefault();
        var data = $('#login-form').serialize();
        var uid = $("#username").val(); // รับ username
        var pwd = $("#password").val(); // รับ password
        if (uid == "") { // เช็คว่า user ว่างมั้ย
            // ถ้าว่าง Alert Error
            swal({
                type: 'error',
                title: 'Error...',
                text: 'Please fill out username fill.'
            })
            $("#username").focus();
        }else if(pwd == ''){
            // ถ้าว่าง Alert Error
            swal({
                type: 'error',
                title: 'Error...',
                text: 'Please fill out password fill.'
            })
            $("#password").focus();
        }else{
            $.ajax({
                url:'services/login.service.php',
                type:'POST',
                data:data,
                success:function(res){
                    var data = $.parseJSON(res);
                    if (data.success) { // ถ้าสำเร็จ ส่งไป SET SESSION
                        window.location = 'index.php';
                    } else { // ถ้าไม่ Alert แจ้งเตือน
                        swal({
                            type: 'error',
                            title: 'Error...',
                            text: data.message
                        });
						$(".log-btn").removeClass('fa-circle-o-notch fa-spin');
                    }
                    
                },
                beforeSend: function() { // ก่อนส่งให้ Preload ..
                    $(".log-btn").addClass('fa-circle-o-notch fa-spin');
                }
            });
        }
        
        
    });
});