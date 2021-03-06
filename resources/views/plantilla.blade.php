<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <title>HFE Berries</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800" rel="stylesheet"
          type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Raleway:300,200,100" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet" type="text/css">
    {!! HTML::style('assets/lib/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! HTML::style('assets/lib/font-awesome/css/font-awesome.min.css') !!}
    <!--if lt IE 9script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')-->
    {!! HTML::style('assets/lib/jquery.nanoscroller/css/nanoscroller.css') !!}
    {!! HTML::style('assets/lib/jquery.icheck/skins/square/blue.css') !!}
    {!! HTML::style('assets/lib/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css') !!}
    {!! HTML::style('assets/lib/jquery.datatables/plugins/bootstrap/3/dataTables.bootstrap.css') !!}
    {!! HTML::style('assets/lib/jquery.niftymodals/css/component.css') !!}
    {!! HTML::style('assets/lib/intro.js/introjs.css') !!}
    {!! HTML::style('assets/css/style.css') !!}
    {!! HTML::style('assets/lib/jquery.select2/select2.css') !!}

    {!! HTML::style('assets/lib/jquery.gritter/css/jquery.gritter.css') !!}
    {!! HTML::style('assets/lib/bootstrap.switch/css/bootstrap3/bootstrap-switch.css') !!}
    {!! HTML::style('assets/lib/bootstrap.slider/css/bootstrap-slider.css') !!}

    @yield('estilos')
</head>

<body>

<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle"><span
                        class="fa fa-gear"></span></button>
            <a href="#" class="navbar-brand"><span>HFE Berries</span></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="#" data-modal="modSistemas" class="btn-flat md-trigger"><i class="fa fa-windows"></i> Aplicaciones
                        <span class="badge badge-success" style="position:absolute;top:2px;right:-5px;">{{$sistemas->count()}}</span></a>
                </li>
                @foreach ($opciones_sup as $opcion_sup)
                    <?php $subItems = ""; ?>
                    @foreach ($opciones as $sub_opcion)
                        @if($sub_opcion->opcion_padre_id == $opcion_sup->id)
                            <?php
                                $subItems .= "<li><a href=''>{$sub_opcion->nombre}</a></li>";
                            ?>
                        @endif
                    @endforeach
                    @if($subItems == "")
                        <li><a href="{{$sub_opcion->url}}?token={{ $token }}&sistema_id={{ $sistema_id }}">{{$opcion_sup->nombre}}</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">{{$opcion_sup->nombre}}
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <?php echo $subItems; ?>
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
            <ul class="nav navbar-nav navbar-right user-nav">
                <li class="dropdown profile_menu"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><img
                                alt="Avatar" src="assets/img/avatar2.jpg"><span>Jeff Hanneman</span><b
                                class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Messages</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Sign Out</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right not-nav">
                <li class="button dropdown"><a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle"><i
                                class="fa fa-comments"></i></a>
                    <ul class="dropdown-menu messages">
                        <li>
                            <div class="nano nscroller">
                                <div class="content">
                                    <ul>
                                        <li><a href="#"><img src="assets/img/avatar2.jpg" alt="avatar"><span
                                                        class="date pull-right">13 Sept.</span><span
                                                        class="name">Daniel</span> I'm following you, and I want your
                                                money!</a></li>
                                        <li><a href="#"><img src="assets/img/avatar_50.jpg" alt="avatar"><span
                                                        class="date pull-right">20 Oct.</span><span
                                                        class="name">Adam</span> is now following you</a></li>
                                        <li><a href="#"><img src="assets/img/avatar4_50.jpg" alt="avatar"><span
                                                        class="date pull-right">2 Nov.</span><span
                                                        class="name">Michael</span> is now following you</a></li>
                                        <li><a href="#"><img src="assets/img/avatar3_50.jpg" alt="avatar"><span
                                                        class="date pull-right">2 Nov.</span><span
                                                        class="name">Lucy</span> is now following you</a></li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="foot">
                                <li><a href="#">View all messages </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="button dropdown"><a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle"><i
                                class="fa fa-globe"></i><span class="bubble">2</span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="nano nscroller">
                                <div class="content">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-cloud-upload info"></i><b>Daniel</b> is now
                                                following you <span class="date">2 minutes ago.</span></a></li>
                                        <li><a href="#"><i class="fa fa-male success"></i><b>Michael</b> is now
                                                following you <span class="date">15 minutes ago.</span></a></li>
                                        <li><a href="#"><i class="fa fa-bug warning"></i><b>Mia</b> commented on post
                                                <span class="date">30 minutes ago.</span></a></li>
                                        <li><a href="#"><i class="fa fa-credit-card danger"></i><b>Andrew</b> killed
                                                someone <span class="date">1 hour ago.</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="foot">
                                <li><a href="#">View all activity </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="button"><a href="javascript:;" class="speech-button"><i class="fa fa-microphone"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div id="cl-wrapper">
    @yield('cuerpo')

    <div id="modSistemas" class="md-modal colored-header md-effect-9" style="width: 25%;">
        <div class="md-content">
            <div class="modal-body form">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="inicio?token={{ $token }}" class="btn btn-primary btn-block" style="font-size: 14px;font-weight: 600;">Inicio</a>
                        @foreach ($sistemas as $sistema)
                            <a href="inicio?token={{ $token }}&sistema_id={{ $sistema->id }}" class="btn btn-primary btn-block" style="font-size: 14px;font-weight: 600;"> {{ $sistema->nombre }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="md-overlay"></div>
</div>

{!! HTML::script('assets/lib/jquery/jquery.min.js') !!}
{!! HTML::script('assets/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.js') !!}
{!! HTML::script('assets/js/cleanzone.js') !!}
{!! HTML::script('assets/lib/bootstrap/dist/js/bootstrap.min.js') !!}
{!! HTML::script('assets/lib/jquery.datatables/js/jquery.dataTables.min.js') !!}
{!! HTML::script('assets/lib/jquery.datatables/plugins/bootstrap/3/dataTables.bootstrap.js') !!}
{!! HTML::script('assets/lib/jquery.niftymodals/js/jquery.modalEffects.js') !!}
{!! HTML::script('assets/lib/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js') !!}
{!! HTML::script('assets/lib/jquery.parsley/dist/parsley.min.js') !!}
{!! HTML::script('assets/lib/jquery.parsley/src/extra/dateiso.js') !!}
{!! HTML::script('assets/lib/jquery.icheck/icheck.min.js') !!}
{!! HTML::script('assets/lib/intro.js/intro.js') !!}
{!! HTML::script('assets/lib/editable-table-master/mindmup-editabletable.js') !!}
{!! HTML::script('assets/lib/editable-table-master/numeric-input-example.js') !!}
{!! HTML::script('assets/lib/jquery.select2/select2.min.js') !!}
{!! HTML::script('assets/lib/skycons/skycons.js') !!}
{!! HTML::script('assets/lib/jquery.sparkline/jquery.sparkline.min.js') !!}
{!! HTML::script('assets/lib/jquery.easypiechart/jquery.easypiechart.js') !!}
{!! HTML::script('assets/lib/jquery.flot/jquery.flot.js') !!}
{!! HTML::script('assets/lib/jquery.flot/jquery.flot.pie.js') !!}
{!! HTML::script('assets/lib/jquery.flot/jquery.flot.resize.js') !!}
{!! HTML::script('assets/lib/jquery-ui/jquery-ui.min.js') !!}

<script>
    $(document).ready(function () {
        //initialize the javascript
        App.init();
        App.dashboard();
        $(".md-trigger").modalEffects();
    });
</script>

@yield('scripts')

</body>

</html>