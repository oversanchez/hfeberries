@extends('website.contenido')

@section('body')
    <div class="post_section" style="background-color: white;padding: 15px 0 35px;margin-top:10px;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="post_left_section post_left_border" style="border-right:none;">
                        <div class="post single_post" style="border-bottom: none;">
                            <h1 style="margin-bottom: 17px;border-bottom: 1px solid #dce4ea;">{{$pagina_web->nombre}}</h1>
                            <!--end post thumb-->
                            <div class="post_desc" style="text-align: justify;">
                                {!! $pagina_web->contenido  !!}
                            </div><!--end post desc-->
                        </div><!--end post-->
                    </div><!--end post left section-->
                </div><!--end post_left-->
            </div>
        </div>
    </div>
@endsection