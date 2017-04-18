/**
 * Created by root on 4/7/17.
 */
$(function () {
    showCart();

    ordersShow();
    function ordersShow() {
        $.ajax({
            type:'post',
            url :'myOrders',
            success:function (msg) {
                $("#myOrder").html(msg);
            }
        });
    }

    setInterval(function () {
        ordersShow();
    },8000);
    $("#btnOrder").on('click', function () {
        var order_name=$("#order_name").val();
        var order_email=$("#order_email").val();
        var order_phone=$("#order_phone").val();
        $.ajax({
            type: 'post',
            url :'confirmOrder',
            data : {order_name:order_name, order_email:order_email, order_phone:order_phone},
            success:function (msg) {
             $("#orderInfo").html(msg);
             if(msg==="<li class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> Your ordered have been successed.</li>"){
                 setInterval(function () {
                     window.location.reload("cartDetail");
                 },2000);
             }
            }
        });
    });
    
    
    function showCart() {
        $.ajax({
            type:'post',
            url: 'showCart',
            success:function (msg) {
                $("#cartInfo").html(msg);
            }
        });
    }

    $("body").delegate('#btnATC', 'click', function () {
        var id=$(this).attr('idd');
        $.ajax({
             type:'post',
            url: 'addToCart',
            data : {id:id},
            success:function (msg) {
                $(".info").html(msg);
                showCart();
            }
        });
    });

    $("#btnSaveCat").on('click', function () {
        var cat_name=$("#cat_name").val();
        $.ajax({
            type : 'post',
            url : '../../product/new_cat.php',
            data: {cat_name:cat_name},
            success:function (msg) {
                $("#productInfo").html(msg);
            }
        });
    });

    $("#btnSaveProduct").on('click', function () {
        var cat_id=$("#cat_id").val();
        var p_name=$("#p_name").val();
        var p_detail=$("#p_detail").val();
        var p_price=$("#p_price").val();
        $.ajax({
            type:'post',
            url: '../../product/new_product.php',
            data: {cat_id:cat_id,p_name:p_name, p_detail:p_detail, p_price:p_price},
            success:function (msg) {
               $("#productInfo").html(msg);
            }
        });
    });


    $("#btnLogout").on('click', function () {
        $.ajax({
            type:'post',
            url: '../../pre_config/logout.php',
            success:function (msg) {
                $("#infoMsg").html(msg);
                if(msg==="logoutSuccessed"){
                    window.location.replace("/login");
                }
            }
        });
    });

    $("#btnSignin").on('click', function () {
        var userName=$("#userName").val();
        var password=$("#password").val();
        $.ajax({
            type: 'post',
            url: '../../pre_config/signin.php',
            data: {userName:userName, password:password},
            success:function (msg) {
                $("#infoMsg").html(msg);
                if(msg==="<li class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> Authorized Success.</li>"){
                 setInterval(function () {
                     window.location.replace("/dashboard");
                 },2000);
                }
            }
        });
    });

    $("#btnReg").on('click', function () {
        var userName=$("#userName").val();
        var email=$("#email").val();
        var password=$("#password").val();
        var passwordConfirm=$("#passwordConfirm").val();

        $.ajax({
            type: 'post',
            url : '../../pre_config/signup.php',
            data: {userName:userName, email:email, password:password, passwordConfirm:passwordConfirm},
            success:function (msg) {
                $("#infoMsg").html(msg);
                if(msg==="<li class='alert alert-success'><span class='glyphicon glyphicon-ok-circle'></span> Your account have been successfully created.</li>"){
                    setInterval(function () {
                        window.location.replace("/login");
                    },3000);
                }

            }
        });

    });
});