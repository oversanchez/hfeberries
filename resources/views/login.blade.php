<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <title>Identifícate</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Raleway:300,200,100" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet" type="text/css">
    {!! HTML::style('assets/lib/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! HTML::style('assets/lib/font-awesome/css/font-awesome.min.css') !!}
<!--if lt IE 9script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')-->
    {!! HTML::style('assets/lib/jquery.nanoscroller/css/nanoscroller.css') !!}
    {!! HTML::style('assets/lib/jquery.icheck/skins/square/blue.css') !!}
    {!! HTML::style('assets/css/style.css') !!}
</head>

<body>
<div id="cl-wrapper">
    <div id="pcont" class="container-fluid">
        <div class="cl-mcont">
            <div class="row">
                <div class="col-sm-offset-4 col-sm-4">
                    <div class="block-flat">
                        <div class="header">
                            <h3>Identifícate</h3>
                        </div>
                        <div class="content">
                            <form id="frmLogin" action="#" data-parsley-validate="" novalidate="">
                                <div class="form-group">
                                    <label>Usuario</label>
                                    <input id="txtUsuario" type="text" name="nick" parsley-trigger="change" data-parsley-minlength="5" required="" class="form-control ">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="txtClave" type="password" placeholder="Password" data-parsley-minlength="8" required="" class="form-control">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="icheck" type="checkbox" name="remember"> Recuérdame</label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-rad btn-flat" style="margin-top:10px;width:120px;">Ingresar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{!! HTML::script('assets/lib/jquery/jquery.min.js') !!}
{!! HTML::script('assets/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.js') !!}
{!! HTML::script('assets/js/cleanzone.js') !!}
{!! HTML::script('assets/lib/bootstrap/dist/js/bootstrap.min.js') !!}
{!! HTML::script('assets/lib/jquery.parsley/dist/parsley.min.js') !!}
{!! HTML::script('assets/lib/jquery.parsley/src/extra/dateiso.js') !!}
{!! HTML::script('assets/lib/jquery.icheck/icheck.min.js') !!}

<script type="text/javascript">

    $(document).ready(function () {
        //initialize the javascript
        App.init();


        $("#frmLogin").on('submit',function(e){
            e.preventDefault();
            var usuario = $("#txtUsuario").val();
            var clave = $("#txtClave").val();
            $.ajax({
                url: "/authenticate", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: {"_token": "{{ csrf_token() }}","email" : usuario,"password": clave}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                beforeSend: function() {  // Custom XMLHttpRequest
                    $("#loading").show();
                },
                success: function(data){
                    localStorage.setItem('jwt_token', data["token"]);
                    window.location = "planilla?token="+data["token"];
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
