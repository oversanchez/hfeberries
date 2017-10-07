@extends('website.contenido')

@section('body')
    <div class="row">
        <div class="col-sm-7">
            <div class="banner carousel slide" id="recommended-item-carousel" data-ride="carousel">
                <div class="slides carousel-inner">
                    @foreach($sliders as $key => $slider)
                        <?php
                        $active = "";
                        if($key == 0)
                            $active = " active";
                        ?>
                        <div class="item {{$active}}">
                            <img src="{{ $slider->url_foto }}" alt=""/>
                            <div class="banner_caption">
                                <div class="container" style="max-width: 700px;">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="caption_inner animated fadeInUp">
                                                <h3 style="padding: 3px 0px 5px 10px;color:white;display:inline;">{{ $slider->nombre }}</h3>
                                                @if ($slider->descripcion != "")
                                                    <p>{{$slider->descripcion}}</p>
                                                @endif
                                                @if ($slider->url_vinculo !== "" && $slider->url_vinculo !== "#")
                                                    <a style='display:inline;float:right;' target='_blank'
                                                       href='{{$slider->url_vinculo}}'>{{$slider->nombre_vinculo}}</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end container-->
                            </div>  <!--end banner_caption-->
                        </div>
                    @endforeach
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel"
                   data-slide="prev">
                    <img src="royal/img/home/slider/prev.png">
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel"
                   data-slide="next">
                    <img src="royal/img/home/slider/next.png">
                </a>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="tab-container" style="margin:10px 0px 0px 0px;">
                <ul class="nav nav-tabs" role="tablist">
                    <li title="Comunicados" role="presentation" class="active">
                        <a href="#comunicados" aria-controls="comunicados" role="tab" data-toggle="tab"><i class="fa fa-volume-up"></i>
                            <div class="hidden-xs" style="display: inline;"> Comunicados</div>
                        </a>
                    </li>
                    <li title="Documentos" role="presentation">
                        <a href="#cartas" aria-controls="cartas" role="tab" data-toggle="tab"><i class="fa fa-file"></i>
                            <div class="hidden-xs" style="display: inline;"> Documentos</div>
                        </a>
                    </li>
                    <li title="Descargas" role="presentation">
                        <a href="#descargas" aria-controls="descargas" role="tab" data-toggle="tab"><i class="fa fa-download"></i>
                            <div class="hidden-xs" style="display: inline;"> Descargas</div>
                        </a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content" style="background: white;height:192px;padding:10px;border:solid thin lightgray;">
                    <div role="tabpanel" class="tab-pane active" id="comunicados" style="width:100%;height:178px;background:url('/royal/img/comunicado_transparente.png') no-repeat right" >
                        @foreach($comunicados as $key => $comunicado)
                            <div class="row"><div class="col-sm-12"><a href="{{$comunicado->url}}" style="color:{{$comunicado->color}}"><i class="fa fa-bell-o"></i> {{$comunicado->nombre}}</a></div></div>
                        @endforeach
                    </div>
                    <div role="tabpanel" class="tab-pane" id="cartas" style="width:100%;height:178px;background:url('/royal/img/documentos_transparente.png') no-repeat right" >
                        @foreach($documentos as $key => $documento)
                            <div class="row"><div class="col-sm-12"><a href="{{$documento->url}}"  style="color:{{$documento->color}}"><i class="fa fa-file-archive-o"></i> {{$documento->nombre}}</a></div></div>
                        @endforeach
                    </div>
                    <div role="tabpanel" class="tab-pane" id="descargas" style="width:100%;height:178px;background:url('/royal/img/download_transparente.png') no-repeat right">
                        @foreach($descargas as $key => $descarga)
                            <div class="row"><div class="col-sm-12"><a href="{{$descarga->url}}"  style="color:{{$descarga->color}}"><i class="fa fa-download"></i> {{$descarga->nombre}}</a></div></div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="mainContent clearfix">
        <div class="container">
            <div class="row clearfix" style="padding-bottom: 10px;">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-sm-5 col-xs-12" >
                            <div class="row">
                                <div class="col-sm-12">
                                    <div style="border: 1px solid #DCE4EA;border-top: 3px solid #0060b1;padding:0px 10px 10px 10px;    ">
                                        <div class="related_post_sec single_post">
                                            <h3 style="margin: 5px 0px 0px 0px;height: 33px;background-color: #0060b1;color: white;font-size: 20px;width: 100%;padding: 4px 0px 0px 10px;"><img src="royal/img/school.png" style="height: 35px;margin-top: -10px;padding-right: 13px;">Bienvenida</h3>
                                        </div>
                                        <div class="row" style="padding-top: 10px;">
                                            <div class="col-lg-12 col-md-12 col-xs-12 videoLeft">
                                                <iframe src="https://player.vimeo.com/video/216732031?title=0&byline=0&portrait=0" height="200" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <!-- videoLeft -->
                                            <div class="col-lg-12 col-md-12 col-xs-12 videoRight">
                                                <p>{{$institucion->bienvenida_texto}}</p>
                                                <a href="{{$institucion->bienvenida_url}}" class="btn btn-block learnBtn">Leer más</a>
                                            </div>
                                            <!-- videoRight -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7 col-xs-12">
                            <div class="related_post_sec single_post" style="border: 1px solid #DCE4EA;border-top: 3px solid #d4be12;height: 395px;padding-bottom: 60px;padding-right: 4px;">
                                <h3 style="margin: 5px 10px 0px 10px;height: 33px;background-color: #d4be12;color: white;font-size: 20px;width: auto;padding: 4px 0px 0px 10px;"><img src="royal/img/noticias2.png" style="height: 35px;margin-top: -6px;padding-right: 13px;">Noticias</h3>
                                <div id="noticias" class="nano">
                                    <div class="overthrow nano-content">
                                        <ul>
                                            @foreach($noticias as $key => $noticia)
                                                <li title="{{$noticia->nombre}}">
                                        <span class="rel_thumb">
                                                <a href="noticias/{{$noticia->id}}/ver" ><img src="{{$noticia->url_foto}}"
                                                                                              alt=""></a>
                                        </span>
                                                    <!--end rel_thumb-->
                                                    <div class="rel_right">
                                                        <h4><a href="noticias/{{$noticia->id}}/ver">{{str_limit($noticia->nombre,57)}}</a></h4>
                                                        <div class="meta">
                                                            <span class="date">Fecha: <a href="#">{{$noticia->fecha}}</a></span>
                                                        </div>
                                                        <p>{{str_limit($noticia->descripcion,140)}}</p>
                                                    </div>
                                                    <!--end rel right-->
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div style="border: 1px solid #DCE4EA;border-top: 3px solid #d4be12;height: 192px;padding-bottom: 60px;padding-right: 4px;margin-top: 10px;">
                                <h3 style="text-transform: uppercase;margin: 5px 10px 0px 10px;height: 33px;background-color: #d4be12;color: white;font-size: 20px;width: auto;padding: 4px 0px 0px 10px;"><img src="/royal/img/photo.png" style="height: 41px;margin-top: -10px;padding-right: 6px;">FOTOS DESTACADAS<a href="galeria" style="color:white;display:inline;float:right;margin-top: 2px;margin-right: 10px;font-size:20px;"><img src="/royal/img/galeria.png" style="height: 35px;margin-top: -7px;"> IR A GALERÍA</a></h3>
                                <div class="photo_gallery custom" style="padding: 10px 10px 0px 10px;">
                                    <ul class="gallery popup-gallery">
                                        @foreach($fotos as $key => $foto)
                                            <li style="text-align: center;">
                                                <a href="{{$foto->archivo}}" title="{{$foto->nombre}}">
                                                    <img style="height: 120px;width: auto;" src="{{$foto->archivo}}" alt="{{$foto->nombre}}">
                                                    <div class="overlay">
                                              <span class="zoom">
                                                <i class="fa fa-search"></i>
                                              </span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div style="border: 1px solid #DCE4EA;border-top: 3px solid #0060b1;height: 201px;padding-bottom: 60px;padding-right: 4px;margin-top: 10px;">
                                <h3 style="text-transform: uppercase;margin: 5px 10px 0px 10px;height: 33px;background-color: #0060b1;color: white;font-size: 20px;width: auto;padding: 4px 0px 0px 10px;"><img src="/royal/img/video.png" style="height: 32px;margin-top: -10px;padding-right: 6px;">VIDEOS
                                    <a href="videos" style="color:white;display:inline;float:right;margin-top: 2px;margin-right: 10px;font-size:20px;"> VER TODO <img src="/royal/img/youtube_ico.png" style="height: 35px;margin-top: -7px;"></a></h3>
                                <div class="photo_gallery custom" style="height: 150px;padding: 10px 10px 0px 10px;">
                                    <div class="nano">
                                        <div class="overthrow nano-content">
                                            <ul class="gallery popup-gallery">
                                                <div class="row">
                                                    @foreach($videos as $key => $video)
                                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                                            {!! $video->frame !!}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col-sm-8 col-xs-12 -->
                <div class="col-sm-3 col-xs-12">
                    @if($institucion->mostrar_ficha == true)
                        <div class="row" onclick="javascript:location.href='ficha_matricula'">
                            <div class="col-xs-12">
                                <div style="cursor:pointer;width: 263px;height: 90px;background-color: black;border-radius: 11px;margin-bottom: 10px;">
                                    <table>
                                        <tr>
                                            <td><img src="/royal/img/persona_ficha.png" style="height: 100px;width: 120px;margin-top: -8px;margin-left: 10px;"></td>
                                            <td style="color:white;font-weight: 500;font-size:30px;text-align: center;">Ficha de Matrícula<h4 style="font-size: 29px;color:red;">{!! $institucion->anio_ficha !!}</h4></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                        @if($institucion->mostrar_tramite == true)
                            <div class="row" onclick="javascript:location.href='consulta_tramite'" style="margin-bottom: 8px;">
                                <div class="col-xs-12">
                                    <img style="cursor:pointer;" class='img-reponsive' src="/royal/img/tramite_documentario.png">
                                </div>
                            </div>
                        @endif
                    <div class="formArea clearfix">
                        <div class="formTitle">
                            <img src="/royal/img/hay_tarea.png">
                            <h5>Selecciona tu sección</h5>
                        </div>
                        <!-- formTitle -->
                        <form action="#" method="post">
                            <div class="selectBox clearfix" style="margin-bottom: 0px;">
                                <select class="form-control" style="width: 83%;display: inline-block;">
                                    <option value="0">SECUNDARIA - 1A</option>
                                    <option value="1">SECUNDARIA - 2A</option>
                                    <option value="2">SECUNDARIA - 2B</option>
                                </select>
                                <button type="submit" class="btn btn-default commonBtn" style="width: 15%;margin-top: -4px;"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <img class="img-responsive" src="/royal/img/playstore.png" style="cursor:pointer;">
                    <!-- formArea -->
                    <?php
                        $altura_eventos=0;
                        if($institucion->mostrar_ficha)
                            $altura_eventos +=105;
                        if($institucion->mostrar_tramite)
                            $altura_eventos +=100;
                    ?>
                    <div class="list_block related_post_sec" style="height: {{ (526-$altura_eventos) }}px;margin: 10px 0 5px;padding:15px 5px 5px 5px;">
                        <div class="upcoming_events" style="height:{{ (453-$altura_eventos) }}px;">
                            <h3 style="margin:-10px 0px 5px 0px;height: 33px;background-color: #d4be12;color: white;font-size: 20px;width: 100%;padding: 4px 0px 0px 10px;"><img src="/royal/img/eventos4.png" style="height: 30px;margin-top: -4px;padding-right: 13px;">Eventos</h3>
                            <div id="eventos" class="nano">
                                <div class="overthrow nano-content">
                                    <ul>
                                        @foreach($eventos as $evento)
                                            <li class="related_post_sec single_post" title="{{$evento->nombre}}">
                                                <span class="date-wrapper">
                                                <span class="date"><span>{{date("d", strtotime($evento->fecha))}}</span>{{date("M", strtotime($evento->fecha))}}</span>
                                                </span>
                                                <div class="rel_right">
                                                    <h4><a href="/eventos/{{$evento->id}}/ver">{{$evento->nombre}}</a></h4>
                                                    <div class="meta">
                                                        <span class="place"><i class="fa fa-map-marker"></i>{{$evento->lugar}}</span>
                                                        <span class="event-time"><i class="fa fa-clock-o"></i>{{$evento->hora}}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end list_block -->
                </div>
                <!-- col-sm-4 col-xs-12 -->
            </div>
            <!-- row clearfix -->
        </div>
        <!-- container -->
    </div>
    <!-- count -->
    <div class="testimonial-section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <section class="testimonials" style="padding:0px 10px 0px 10px;">
                        <h3>TESTIMONIOS</h3>
                        <div class="carousel-controls">
                            <a class="prev" href="#testimonials-carousel" data-slide="prev"><i class="fa fa-caret-left"></i></a>
                            <a class="next" href="#testimonials-carousel" data-slide="next"><i class="fa fa-caret-right"></i></a>
                        </div><!--//carousel-controls-->
                        <div class="section-content" style="margin-top:20px;">
                            <div id="testimonials-carousel" class="testimonials-carousel carousel slide">
                                <div class="carousel-inner">
                                    @foreach($testimonios as $key => $testimonio)
                                        <?php
                                        $active = "";
                                        if($key == 0)
                                            $active = " active";
                                        ?>
                                        <div class="item {{$active}}">
                                            <div class="row">
                                                <div class="col-md-9 col-xs-9">
                                                    <blockquote class="quote" style="padding:10px 0px 10px 15px;text-align: justify;">
                                                        <p><i class="fa fa-quote-left"></i>{{str_limit($testimonio->descripcion,260)}}</p>
                                                    </blockquote>
                                                </div>
                                                <div class="col-md-3 col-xs-3">
                                                    <img style="height: 115px;margin-bottom: 2px;" class="img-circle" src="{{$testimonio->url_foto}}" alt="">
                                                    <p style="text-align: center;"><span class="name">{{$testimonio->nombres}}</span>
                                                        <br><span style="color:blue;font-weight: 800;" class="title">{{$testimonio->empresa}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div><!--//carousel-inner-->
                            </div><!--//testimonials-carousel-->
                        </div><!--//section-content-->
                    </section>
                    <!-- testimonial -->
                </div>
                <!-- col-xs-12 -->
                <div class="col-xs-12 col-sm-6 hidden-xs">
                    <div class="features">
                        <h3>¿Por qué nosotros?</h3>
                        <ul>
                            <li><i class="fa fa-check-circle-o"></i>{{$institucion->porque_nosotros_1}}</li>
                            <li><i class="fa fa-check-circle-o"></i>{{$institucion->porque_nosotros_2}}</li>
                            <li><i class="fa fa-check-circle-o"></i>{{$institucion->porque_nosotros_3}}</li>
                            <li><i class="fa fa-check-circle-o"></i>{{$institucion->porque_nosotros_4}}</li>
                        </ul>
                    </div>
                </div>
                <!-- col-xs-12 -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- testimonial-section -->
@endsection

@section('scripts')


    @foreach($emergentes as $key => $emergente)
        <!-- Modal -->
        <?php
            $tipo = $emergente->tipo == "L" ? "modal-lg" : "";
        ?>
        <div class="modal fade" id="myModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog {{$tipo}}" role="document" style="padding-right: 20px;">
                @if($emergente->tipo!=="I")
                    <div class="modal-content" style="padding:0px;margin-top: {{10*$key}}%;margin-left: {{6*$key}}%">
                @else
                    <div class="modal-content" style="margin-top: {{10*$key}}%;margin-left: {{4*$key}}%">
                @endif

                @if($emergente->tipo!=="I")
                    <div class="modal-header" style="border-bottom:none;text-align: center;padding-top: 12px;padding-bottom: 4px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: fixed;top: 0;margin-right: -20px;margin-top: -20px;opacity: initial;">
                            <img src="/royal/img/close_red.png" style="float:right;width: 40px;"/>
                        </button>
                        <h4 class="modal-title" id="myModalLabel" style="margin-left: 37px;">{{$emergente->nombre}}</h4>
                    </div>
                @endif
                @if($emergente->tipo=="I")
                    <div class="modal-body" style="padding: 0px;">
                @else
                    <div class="modal-body" style="padding-top: 5px;">
                @endif
                @if($emergente->tipo=="I")
                    <a href="{{$emergente->url}}"><img onclick="" src="{!! $emergente->url_foto !!}" style="max-height: 590px;width: 100%;"></a>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: fixed;top: 0;right: 0;margin-top: -20px;margin-right: 0px;opacity: initial;">
                        <img src="/royal/img/close_red.png" style="float:right;width: 40px;"/>
                    </button>
                @else
                    <div class="formArea" style="background:url('/royal/img/logo_transparente.png') no-repeat center;min-height: 250px;">
                        {!! $emergente->contenido !!}
                    </div>
                    @if($emergente->url != "" && $emergente->url != "#")
                        <div style="text-align: center;">
                            <a href="{{$emergente->url}}" class="btn btn-danger">Ver más</a>
                        </div>
                    @endif
                @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        $(document).on('ready',function(){
            setTimeout(function(){
                @foreach($emergentes as $key => $emergente)
                 $("#myModal{{$key}}").modal('show');
                @endforeach
            }, 2000);
        });
    </script>
@endsection

