<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Clean Zone</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800" rel="stylesheet"
          type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Raleway:300,200,100" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet" type="text/css">

{!! HTML::style('cleanzone/lib/bootstrap/dist/css/bootstrap.min.css') !!}
{!! HTML::style('cleanzone/lib/font-awesome/css/font-awesome.min.css') !!}
{!! HTML::style('cleanzone/lib/jquery.nanoscroller/css/nanoscroller.css') !!}
{!! HTML::style('cleanzone/css/style.css') !!}
<!--if lt IE 9script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')-->
</head>

<body class="texture">
<div id="cl-wrapper" class="login-container">
    <div class="middle-login">
        <div class="block-flat">
            <div class="header">
                <h3 class="text-center">Intranet Rosarina</h3></div>
            <div>
                <form id="frmLogin" action="login" style="margin-bottom: 0px !important;" class="form-horizontal">
                    <div class="content">
                        <h4 class="title">Identifícate</h4>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="txtUsuario" type="text" placeholder="Usuario" class="form-control" value="mabbott">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group"><span class="input-group-addon"><i
                                                class="fa fa-lock"></i></span>
                                    <input id="txtClave" type="password" placeholder="Clave" class="form-control" value="123">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="foot">
                        <button data-dismiss="modal" class="btn btn-primary">Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-center out-links"><a href="#">© 2013 Your Company</a></div>
    </div>
</div>
{!! HTML::script('cleanzone/lib/jquery/jquery.min.js') !!}
{!! HTML::script('cleanzone/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.js') !!}
{!! HTML::script('cleanzone/js/cleanzone.js') !!}
{!! HTML::script('cleanzone/lib/bootstrap/dist/js/bootstrap.min.js') !!}

<script type="text/javascript">

    $(document).ready(function () {
        //initialize the javascript
        App.init();


        $("#frmLogin").on('submit',function(e){
            e.preventDefault();
            var usuario = $("#txtUsuario").val();
            var clave = $("#txtClave").val();
            $.ajax({
                url: "/intranet/authenticate", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: {"_token": "{{ csrf_token() }}","email" : usuario,"password": clave}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                beforeSend: function() {  // Custom XMLHttpRequest
                    $("#loading").show();
                },
                success: function(data){
                    localStorage.setItem('jwt_token', data["token"]);
                    window.location = "inicio?token="+data["token"];
                },
                complete : function(){
                    $("#loading").hide();
                }
            });
        });
    });
</script>
</body>
</html>
