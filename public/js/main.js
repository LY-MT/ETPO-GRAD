$(document).pjax('a[target!=_blank]', '#main', {fragment: '#main'});
$("#isLoading").hide(200)
var inst = new mdui.Drawer('#main-drawer');

function submit(){
    let qq = $("#qq").val();
    let name = $("#name").val();
    let subtitle = $("#subtitle").val();
    let image = $("#image").val();
    let content = $("#content").val();
    if(qq == null || qq == ""){
        mdui.alert("QQ号不能为空！");
        return false;
    }else if(name == null || name == ""){
        mdui.alert("你的名字不能为空！");
        return false;
    }else if(subtitle == null || subtitle == ""){
        mdui.alert("副标题不能为空！");
        return false;
    }else if(content == null || content == ""){
        mdui.alert("内容不能为空！");
        return false;
    }
    imageVerification(function (answer){
        let data = {};
        data.qq = qq;
        data.name = name;
        data.subtitle = subtitle;
        data.content = content;
        data.vcode = answer;
        if(image != null && image != ""){
            data.image = image;
        }
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            url: "/submit",
            data: data,
            success: function(rdata) {
                console.log(rdata)
            },
            error: function(data) {
                var json=JSON.parse(data.responseText);
                $.each(json.errors, function(idx, obj) {
                    mdui.snackbar({
                        message: obj[0],
                        position: 'right-top'
                    })
                    return false;
                });
            }
        })
    })
}
function commentSubmit(id){
    let comment = $('#comment').val();
    let name = $('#nickname').val();
    imageVerification(function (answer){
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            url: "/comment",
            data: {'id': id,'comment':comment,'name':name,'vcode':answer},
            error: function(data) {
                var json=JSON.parse(data.responseText);
                $.each(json.errors, function(idx, obj) {
                    mdui.snackbar({
                        message: obj[0],
                        position: 'right-top'
                    })
                    return false;
                });
            }
        })
    })
}
function like(id){
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        url: "/like",
        data: {"id": id},
        success: function(rdata) {
            $("#like").ready(function (){
                $("#like").html(rdata);
            })

        },
        error: function(data) {
            mdui.snackbar({
                message: "请求接口时，出现了一个致命错误！",
                position: 'right-top'
            })
        }
    })
}

/*$('#upload').on("change", "input[type='file']",function (){
    max_size = 5 * 1024 * 1024;
    file = $(this).prop('files')[0];
    ext = $(this).val().substring($(this).val().lastIndexOf(".") + 1).toLowerCase();
    allow_ext = ["jpg", "png", "jpeg"];
    if (allow_ext.indexOf(ext) == -1) {
        mdui.alert("上传失败！不允许的图片格式！本站仅允许jpg、png、jpeg格式的图片！")
        return false
    }
    if (file.size > max_size) {
        mdui.alert("上传失败！图片过大！本站允许上传的最大大小：5MB")
        return false
    }

    imageVerification(function(answer) {
        $('#upload-image').attr("disabled", "disabled")
        $("#isLoading").show(100)
        timestamp = this.timestamp = Date.parse(new Date()) / 1000;
        data = new FormData()
        data.append('file', file)
        data.append('vcode', answer)
        data.append('timestamp', timestamp)
        $.ajax({
            type: 'POST',
            url: "<?php echo $UPLOAD_API ?>",
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            success: function(rdata) {
                $("#isLoading").hide(100)
                $("#image").val(rdata.path)
                $('#upload-image').removeAttr("disabled")
                if (rdata.code == 1) {
                    mdui.snackbar({
                        message: rdata.msg,
                        position: 'right-top',
                    })
                } else {
                    mdui.alert(rdata.msg)
                }
            },
            error: function(data) {
                $("#image").val("")
                $('#upload-image').removeAttr("disabled")
                mdui.snackbar({
                    message: "请求接口[upload]时，出现了一个致命错误！",
                    position: 'right-top'
                })
            }
        })
    })
   console.log('ok')
});
 */
function imageVerification(callback) {
    mdui.dialog({
        title: '请输入图片中的验证码',
        content: '<center><div class="mdui-row"> <div class="mdui-col-xs-7"> <div class="mdui-textfield"> <input class="mdui-textfield-input" id="answer" type="text" placeholder="请输入您的答案" /></div> </div> <div class="mdui-col-xs-3"> <img style="position: relative;top:15px" id="vcode" src="/Captcha" onclick="this.src=\'/Captcha?\' + Math.random()"/> </div> </div></center>',
        modal: true,
        buttons: [{
            text: '取消'
        },
            {
                text: '确认',
                onClick: function(inst) {
                    callback($('#answer').val());
                }
            }
        ]
    });
}
