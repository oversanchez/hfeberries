@extends('website.contenido')

@section('styles')
    {!! HTML::style('/cleanzone/lib/jquery.magnific-popup/magnific-popup.css') !!}

    <style>

        .gallery-cont .item {
            width: 20%;
            margin-bottom: 20px;
            padding-right: 10px;
            padding-left: 10px
        }

        .gallery-cont .item.w2 {
            width: 50%
        }

        .gallery-cont .photo {
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.13)
        }

        .gallery-cont .img {
            position: relative
        }

        .gallery-cont .img .over .func {
            margin-top: -80px;
            position: relative;
            top: 50%;
            text-align: center;
            transition: margin-top 200ms ease-in-out
        }

        .gallery-cont .img .over .func a {
            display: inline-block;
            height: 50px;
            margin-right: 2px;
            width: 50px;
            margin-right: 10px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%
        }

        .gallery-cont .img .over .func a:hover {
            background: rgba(255, 255, 255, 0.3)
        }

        .gallery-cont .img .over .func i {
            font-size: 20px;
            color: #fff;
            line-height: 2.4
        }

        .gallery-cont .item .img:hover .over {
            opacity: 1
        }

        .gallery-cont .item .img:hover .over .func {
            margin-top: -25px
        }

        .gallery-cont .item .head {
            padding: 10px 10px;
            background: #fff
        }

        .gallery-cont .item .head h4 {
            margin: 0;
            font-size: 17px
        }

        .gallery-cont .item .head span {
            color: #bdbdbd;
            font-size: 14px
        }

        .gallery-cont .item .head span.active {
            color: #38a8ff
        }

        .gallery-cont .item .head .desc {
            color: #999;
            font-size: 12px
        }

        .gallery-cont .item img {
            width: 100%
        }

        .gallery-cont .item .over {
            top: 0;
            opacity: 0;
            position: absolute;
            height: 100%;
            width: 100%;
            background: rgba(36, 148, 242, 0.8);
            transition: opacity 300ms ease;
            -webkit-transition: opacity 300ms ease
        }

        @media (max-width: 767px) {
            .gallery-cont .item {
                width: 50%
            }

            .gallery-cont .item.w2 {
                width: 100%
            }
        }
    </style>
@endsection

@section('body')
    <div class="post_section" style="background-color: white;padding: 15px 0 35px;margin-top:10px;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-3 post_right pull-left">
                    <div class="post_right_inner">
                        <div class="related_post_sec">
                            <div class="list_block" style="padding:15px 12px 45px 10px">
                                <h3 style="margin-bottom: 0px;">Álbumes</h3>
                                <ul style="display: inline-block;">
                                    @foreach($albums as $key => $album)
                                        <li style="margin-bottom: 2px;padding-bottom: 2px;height: 20px;border:none;">
										    <a class="btn btn-link" href="#" onclick="listarFotos({{$album->id}})">{{$album->nombre}} ({{$album->nro_fotos}})</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!--end related_post_sec-->

                    </div><!--end post right inner-->
                </div>
                <div class="col-xs-12 col-sm-9 post_right pull-left">
                    <div id="dvGaleria" class="gallery-cont">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    {!! HTML::script('/cleanzone/lib/masonry/masonry.pkgd.min.js') !!}
    {!! HTML::script('/cleanzone/lib/jquery.magnific-popup/jquery.magnific-popup.min.js') !!}

    <script>
        $(document).ready(function () {
            $('.gallery-cont').masonry();
        });

        function listarFotos(id) {
            var album_id =  id;
            if(album_id != "") {
                var info = [{
                    "_token": "{{ csrf_token() }}",
                    "album_id": parseInt(album_id)
                }][0];
                $.ajax({
                    url: "/intranet/website/foto/listar",
                    type: "GET",
                    data: info,
                    beforeSend: function () {
                        $("#loading").show();
                    },
                    success: function (data) {
                        var $container = $('.gallery-cont');

                        $container.masonry('destroy');

                        var imagenes = "";
                        $.each(data, function (index, value) {
                            imagenes += '<div class="item">';
                            imagenes += '   <div class="photo">';
                            imagenes += '        <div class="img">';
                            imagenes += '           <img  src="' + value["archivo"] + '">';
                            imagenes += '           <div class="over">';
                            imagenes += '               <div class="func">';
                            imagenes += '                   <a href="' + value["archivo"] + '" class="image-zoom"><i class="fa fa-search"></i></a>';
                            imagenes += '               </div>';
                            imagenes += '           </div>';
                            imagenes += '       </div>';
                            imagenes += '   </div>';
                            imagenes += '</div>';
                        });

                        $container.html(imagenes);

                        $container.masonry();

                        $('img').on('load',function() {
                            $(".gallery-cont").masonry();
                        });

                        $(".image-zoom").magnificPopup({
                            type: "image",
                            mainClass: "mfp-with-zoom",
                            zoom: {
                                enabled: !0, duration: 300, easing: "ease-in-out", opener: function (a) {
                                    var b = $(a).parents("div.img");
                                    return b
                                }
                            }
                        });
                    },
                    error: function (request, status, error) {
                        mostrar_error(request.responseText);
                    },
                    complete: function () {
                        $("#loading").hide();
                    }
                });
            }else{
                $(".gallery-cont").html("");
            }
        }
    </script>
@endsection
