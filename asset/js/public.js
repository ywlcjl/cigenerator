function navMenuColor() {
    $('.navMenu').mouseover(function() {
        $(this).css('background-color', '#FF9999');
    }).mouseout(function() {
        $(this).css('background-color', '');
    });
}

function subMenuColor() {
    $('.subTopMenuLi').mouseover(function() {
        $(this).css({'background-color': '#FF9999'});
    }).mouseout(function() {
        $(this).css({'background-color': '#000'});
    });
}

function shopNewListColor() {
    $('.shopNewListDiv').mouseover(function() {
        $(this).css({'border-color': '#FF6699', 'border-style': 'solid'});
    }).mouseout(function() {
        $(this).css({'border-color': '#CCCCCC', 'border-style': 'dotted'});
    });
}

function shareNewborderColor() {
    $('.shareNewBody').mouseover(function() {
        $(this).css({'border-color': '#FF6699', 'border-style': 'solid'});
    }).mouseout(function() {
        $(this).css({'border-color': '#CCCCCC', 'border-style': 'dotted'});
    });
}

function isEmail(str) {
    var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((.[a-zA-Z0-9_-]{2,3}){1,2})$/;
    return reg.test(str);
}

//function priceFormat(num) {
//    var result = num;
//    var tempNum = num.toString();
//    var dot = tempNum.indexOf(".");
//    if (dot > -1) {
//        var sp = tempNum.split('.');
//
//        result = sp[0] + "." + sp[1].substr(0, 2);
//    }
//
//    result = parseFloat(result);
//
//    return result;
//}

//function replyComment() {
//    $(".commentReplyLink").click(function() {
//        var commentReplyId = $(this).attr('rel');
//
//        //var inputStr = $('#replyInputDiv').html();
//        var formStr = '<form class="commentForm" name="form' + commentReplyId + '" method="post" action="">';
//        formStr += '<div id="errorMsg_' + commentReplyId + '" class="errorMessage" style="display: none; width:400px; margin: 5px 0px 10px 0px;"></div>';
//        formStr += '<div style="margin-top: 10px;"><textarea name="comment" class="commentText" style="width: 400px;" rows="3"></textarea>';
//        formStr += '<div style="margin-top:5px;"><input type="image" class="commentPost" name="submit" src="/asset/images/submit.png" /></div></div>';
//        formStr += '<input name="replyCommentId" type="hidden" value="' + commentReplyId + '" /></form>';
//
//        var inputDisplay = $(this).parent().parent().find('.dislplyReplyDiv');
//
//        if (inputDisplay.html() == '') {
//            inputDisplay.html(formStr);
//        }
//
//
//        if (inputDisplay.css('display') == 'none') {
//            inputDisplay.css('display', '');
//        } else {
//            inputDisplay.css('display', 'none');
//        }
//
//        return false;
//    });
//}

//function commentForm() {
//    $('.commentForm').live("submit", function() {
//        var comment = $(this).find('.commentText').val();
//        var replyCommentId = $(this).find('input[name=replyCommentId]').val();
//
//        if (!replyCommentId) {
//            replyCommentId = 0;
//        }
//
//        var errorMsgStr = '#errorMsg_' + replyCommentId;
//
//        if (comment == '') {
//            $(errorMsgStr).html('Comment can not empty.');
//            $(errorMsgStr).css('display', '');
//        } else if (comment.length < 10) {
//            $(errorMsgStr).html('Comment can not less 10 char.');
//            $(errorMsgStr).css('display', '');
//        } else if (comment.length > 300) {
//            $(errorMsgStr).html('Comment can not more than 300 char.');
//            $(errorMsgStr).css('display', '');
//        } else {
//            var contentId = $('#id').val();
//            var postUrl = "/comment/ajaxSave";
//
//            $.post(postUrl, {
//                'id': contentId,
//                'comment': comment,
//                'replyCommentId': replyCommentId,
//                'reply': 1
//            }, function(data, textStatus) {
//                var message = data.message;
//                var success = data.success;
//                var url = data.url;
//
//                if (success > 0) {
//                    location.href = url;
//                } else {
//                    $('#errorMsg_' + data.replyId).html(message);
//                    $('#errorMsg_' + data.replyId).css('display', '');
//                }
//            }, "json");
//
//
//        }
//
//        return false;
//    });
//}

function likeShare() {
    $('.likeIcon').mouseover(function() {
        var likeA = $(this).parent().attr('s_liked');

        if (likeA == 0) {
            //未喜欢的状态
            $(this).attr('src', '/asset/images/liking.png');
        }

    }).mouseout(function() {
        var likeA = $(this).parent().attr('s_liked');
        if (likeA == 0) {
            //未喜欢的状态
            $(this).attr('src', '/asset/images/like.png');
        }

    });

    $('.likeIcon').parent().click(function() {
        var isLogin = $('#isLogin').html();
        if (isLogin > 0) {
            var likeA = $(this).className;

            var shareId = $(this).attr('s_id');
            var liked = $(this).attr('s_liked');
            var doLike = liked > 0 ? 0 : 1;  //0取消, 1喜欢

            $.post("/share/like", {
                'shareId': shareId,
                'doLike': doLike
            }, function(data, textStatus) {
                var success = data.success;
                var message = data.message;
                var likeCount = data.likeCount;
                var shareId = data.shareId;
                var liked = data.liked;
                if (success > 0) {
                    if (shareId > 0) {
                        //更新统计
                        $('#likeNum_' + shareId).html(likeCount);

                        //更新是否喜欢的属性
                        $('#share_img_' + shareId).parent().attr('s_liked', liked);

                        //更新图片
                        if (liked > 0) {
                            //已喜欢
                            $('#share_img_' + shareId).attr('src', '/asset/images/liked.png');
                            $('#share_img_' + shareId).parent().attr('title', '取消收藏');
                        } else {
                            //取消已喜欢
                            $('#share_img_' + shareId).attr('src', '/asset/images/like.png');
                            $('#share_img_' + shareId).parent().attr('title', '收藏该商品');
                        }

                    }

                }
            }, "json");
        } else {
            artDialogLogin();
        }
        return false;
    });
}

function artLogin() {
    $("a[s_login='1']").click(function() {
        artDialogLogin();
        return false;
    });
}

function artDialogLogin() {
    $.dialog({
        id: 'ajaxLoginForm',
        title: '登录',
        content: document.getElementById('loginFormDiv'),
        resize: false
    });

    return false;
}

function artDialogMessage(inputMessage, inputTime) {
    inputMessage = '<span class="artMessage">' + inputMessage + '</span>';
    $.dialog({
        title: '消息提示',
        content: inputMessage,
        resize: false,
        time: inputTime
    });
}

function ajaxPostLogin() {
    var artEmail = $('#artEmail').val();
    var artPassword = $('#artPassword').val();

    if (artEmail != '' && artPassword != '') {
        $.post("/user/ajaxSignIn", {
            'email': artEmail,
            'password': artPassword
        }, function(data, textStatus) {
            var success = data.success;
            var message = data.message;
            if (success > 0) {
                $.dialog.list['ajaxLoginForm'].close();
                artDialogMessage('登录成功', 2);
                //var userNavStr = '<a href="/user" class="white">' + data.user.username + '</a>&nbsp;&nbsp;<a href="/user/logout" class="white" >退出</a>';

                var userNavStr = '<span style="margin-right: 5px;">您好, <span style="color: #ff3366;">' + data.username + '</span></span>';
                userNavStr += '<span style="font-family: Arial; margin-right: 5px;">|</span> ';
                userNavStr += '<a href="/share/mylike" class="brown" style="margin-right: 10px;">我的收藏</a>';
                userNavStr += '<a href="/user/edit" class="brown" style="margin-right: 10px;">用户设置</a>';
                userNavStr += '<a href="/user/logout" class="brown" >退出</a>';

                $('#userNav').html(userNavStr);
                $('#isLogin').html('1');
            } else {
                var ajaxLoginFormMessage = $('#ajaxLoginFormMessage');
                ajaxLoginFormMessage.html(message);
            }
        }, "json");
    } else {
        $('#ajaxLoginFormMessage').html('账号和密码不能为空');
    }

    return false;
}

function artLoginHole() {
    $('#artEmail').focus(function() {
        $(this).attr('placeholder', '');
    }).blur(function() {
        if ($(this).val() == '') {
            $(this).attr('placeholder', '用户名/邮箱');
        }
    });
}