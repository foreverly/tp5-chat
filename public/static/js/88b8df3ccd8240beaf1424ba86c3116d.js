function CheckNicknameRex() {
    return $.trim($("#nickName").val()) == "" ? ($("#lblNicknameResult").text("请输入昵称"), $("#lblNicknameResult").css("color", "red"), $("#lblNicknameResult").css("display", "inline"), toregisterpass = !1, !1) : ($("#lblNicknameResult").text(""), $("#lblNicknameResult").css("display", "none"), toregisterpass = !0, !0)
}

function CheckPasswordRex() {
    return $.trim($("#loginPwd").val()) == "" ? ($("#lblPasswordResult").text("请输入密码"), $("#lblPasswordResult").css("color", "red"), $("#lblPasswordResult").css("display", "inline"), toregisterpass = !1, !1) : ($("#lblPasswordResult").text(""), $("#lblPasswordResult").css("display", "none"), toregisterpass = !0, !0)
}

function CheckConfirmPasswordRex() {
    return $.trim($("#ConfirmPassword").val()) != $.trim($("#loginPwd").val()) ? ($("#lblConfirmPasswordResult").text("两次密码输入不一致"), $("#lblConfirmPasswordResult").css("color", "red"), $("#lblConfirmPasswordResult").css("display", "inline"), toregisterpass = !1, !1) : ($("#lblConfirmPasswordResult").text(""), $("#lblConfirmPasswordResult").css("display", "none"), toregisterpass = !0, !0)
}

function CheckEmailRex() {
    return $.trim($("#email").val()) == "" ? ($("#lblEmailResult").text("请输入邮箱"), $("#lblEmailResult").css("color", "red"), $("#lblEmailResult").css("display", "inline"), toregisterpass = !1, !1) : ($("#lblEmailResult").text(""), $("#lblEmailResult").css("display", "none"), toregisterpass = !0, !0)
}

function ClickRemoveChangeCode() {
    var n = $("#imgCode").attr("src");
    $("#imgCode").attr("src", n + "1")
}

var toregisterpass = !0;
$(function () {
    $("#menuDiv").click(function () {
        RunIndex()
    });
    $("#email").change(function () {
        if ($.trim($("#email").val()) == "") $("#lblEmailResult").text("请输入邮箱"), $("#lblEmailResult").css("color", "red"), $("#lblEmailResult").css("display", "inline"), toregisterpass = !1; else {
            var n = {email: $("#Email").val()}, t = Encrypt(JSON.stringify(n));
            $.post("/WuJi/RexEmail", {keyValue: t}, function (n) {
                var t = Decrypt(n);
                t == "0" ? ($("#lblEmailResult").text("邮箱格式错误，请重新输入"), $("#lblEmailResult").css("color", "red"), $("#lblEmailResult").css("display", "inline"), ClickRemoveChangeCode(), $("#vrifyCode").val(""), toregisterpass = !1) : ($("#lblEmailResult").text(""), $("#lblEmailResult").css("display", "none"), toregisterpass = !0)
            })
        }
    });
    $("#vrifyCode").change(function () {
        if ($.trim($("#vrifyCode").val()) == "") $("#lblVrifyCodeResult").text("请输入验证码"), $("#lblVrifyCodeResult").css("color", "red"), $("#lblVrifyCodeResult").css("display", "inline"), toregisterpass = !1; else {
            var n = {vrifyCode: $("#vrifyCode").val()}, t = Encrypt(JSON.stringify(n));
            $.post("/WuJi/RexVrifyCode", {keyValue: t}, function (n) {
                var t = Decrypt(n);
                t == "0" ? ($("#lblVrifyCodeResult").text("请输入验证码"), $("#lblVrifyCodeResult").css("color", "red"), $("#lblVrifyCodeResult").css("display", "inline"), toregisterpass = !1) : t == "-1" ? ($("#lblVrifyCodeResult").text("验证码错误，请重新输入"), $("#lblVrifyCodeResult").css("color", "red"), $("#lblVrifyCodeResult").css("display", "inline"), ClickRemoveChangeCode(), $("#vrifyCode").val(""), toregisterpass = !1) : ($("#lblVrifyCodeResult").text(""), $("#lblVrifyCodeResult").css("display", "none"), toregisterpass = !0)
            })
        }
    });
    $("#nickName").change(function () {
        CheckNicknameRex()
    });
    $("#loginPwd").change(function () {
        CheckPasswordRex();
        CheckConfirmPasswordRex()
    });
    $("#ConfirmPassword").change(function () {
        CheckConfirmPasswordRex()
    });
    $("#btnRegister").click(function () {
        layer.load(2);
        CheckEmailRex();
        CheckNicknameRex();
        CheckPasswordRex();
        CheckConfirmPasswordRex();
        $("#vrifyCode").trigger("change");
        setTimeout(function () {
            if (toregisterpass) {
                var n = Encrypt($("#loginPwd").val()), t = {
                    email: $("#email").val(),
                    nickname: $("#nickName").val(),
                    loginPwd: n,
                    ConfirmPassword: $("#ConfirmPassword").val(),
                    vrifyCode: $("#vrifyCode").val()
                }, i = Encrypt(JSON.stringify(t));
                $.post("/WuJi/RegisterBegin", {keyValue: i}, function (n) {
                    var t = Decrypt(n);
                    t == "0" ? $("#lblMsgResult").text("注册失败,请重新尝试") : t == "-1" ? $("#lblMsgResult").text("验证码错误") : t == "-2" ? $("#lblMsgResult").text("邮箱格式错误，请修改正确的邮箱") : t == "-3" ? $("#lblMsgResult").text("该邮箱已被注册，请重新输入") : t == "1" ? location.href = "/WuJi/Index" : $("#lblMsgResult").text(t);
                    t != "1" && ($("#lblMsgResult").css("color", "red"), $("#lblMsgResult").css("display", "inline"), layer.closeAll("loading"), ClickRemoveChangeCode(), $("#vrifyCode").val(""))
                })
            } else layer.closeAll("loading"), ClickRemoveChangeCode(), $("#vrifyCode").val("")
        }, 1e3)
    })
})