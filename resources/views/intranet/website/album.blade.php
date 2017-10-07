@extends('intranet/principal')

@section('content')
    <div id="pcont" class="container-fluid">
        <div class="page-head">
            <h2 style="display:inline-block;">Galería de Fotos</h2>
            <i id="loading" style="display:none;" class="fa fa-2x fa-spinner fa-spin"></i>
            <select onchange="listarFotos()" class="input-lg" id="cmbAlbum"
                    style="width: 500px;margin-left: 20px;"></select>
            <button class="btn btn-default" onclick="editarAlbum()"><i class="fa fa-edit"></i></button>
            <button class="btn btn-default" onclick="refrescarFotos()"><i class="fa fa-refresh"></i></button>
            <label class="input-lg pull-right"><input id="chkTransparencia" class="icheck" type="checkbox" checked> Convertir a formato (. JPG)</label>
        </div>
        <div class="cl-mcont">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="tab-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a style="font-size:22px;" href="#tp1" data-toggle="tab">Todas las fotos</a></li>
                            <li><a href="#tp2" style="font-size:22px;" data-toggle="tab">Subir fotos</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="tp1" class="tab-pane active cont">
                            <div id="dvGaleria" class="gallery-cont">
                            </div>
                        </div>
                        <div id="tp2" class="tab-pane cont">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12">
                                        {!! Form::open(['route'=> 'foto.store', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
                                        <div class="dz-message"><h2>Suelta tus fotos aquí o Haz click para buscar</h2>
                                        </div>
                                        <div class="dropzone-previews">
                                        </div>
                                        {!! Form::close() !!}
                                        <button style="margin-top:10px;float: right;" type="submit" class="btn btn-link " id="submit"><h3><i style="font-size:28px;" class="fa fa-upload"></i> Subir Fotos</h3></button>
                                        <a class="btn btn-link" style="margin-top:10px;display: inline-block;" href="#" onclick="limpiarBandeja()"><h3><i style="font-size:28px;" class="fa fa-ban"></i> Limpiar bandeja de subida</h3></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="modAlbum" class="md-modal colored-header primary md-effect-10" style="perspective: none;">
            <div class="md-content">
                <div class="modal-header"><h3>Album</h3>
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close">×</button>
                </div>
                <div class="modal-body form">
                    <form id="frmAlbum" method="post" data-parsley-validate=""
                          data-parsley-excluded="[disabled=disabled]" novalidate="">
                        <input id="hddCodigo_Album" type="hidden" value="">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Nombre</label>
                                <input id="txtNombre_Album" type="text" class="form-control"
                                       data-parsley-trigger="change" data-parsley-required="true">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2"><label for="">Fecha</label></div>
                            <div class="form-group col-md-4">
                                <input id="txtFecha_Album" type="date" class="form-control"
                                       data-parsley-trigger="change" data-parsley-required="true">
                            </div>
                            <div class="form-group col-md-3">
                                <label>
                                    <input id="chkPublico_Album" class="icheck" type="checkbox" checked> Público
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="cancelarAlbum()" class="btn btn-default btn-flat"
                            style="float:left;">Nuevo
                    </button>
                    <button id="btnEliminar_Album" type="button" onclick="eliminarAlbum()"
                            class="btn btn-danger btn-flat" style="float:left;">Eliminar
                    </button>

                    <button type="button" onclick="guardarAlbum()" class="btn btn-primary btn-flat">Guardar</button>
                </div>
            </div>
        </div>
        <div id="modFoto" class="md-modal colored-header primary md-effect-10" style="perspective: none;">
            <div class="md-content">
                <div class="modal-header"><h3>Foto </h3>
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close">×</button>
                </div>
                <div class="modal-body form">
                    <input id="txtDescripcion" type="text" class="form-control">
                    <input id="txtArchivo" type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="md-overlay"></div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

        var t;

        $(document).ready(function () {
            //initialize the javascript
            App.init();
            App.formElements();
            listarAlbum();
            $("#frmAlbum").parsley();
            $('.gallery-cont').masonry();

            Dropzone.options.myDropzone = {
                autoProcessQueue: false,
                acceptedFiles: "image/jpeg,image/png,image/gif",
                uploadMultiple: true,
                maxFilezise: 4,
                maxFiles: 10,

                init: function() {
                    var submitBtn = document.querySelector("#submit");
                    myDropzone = this;

                    submitBtn.addEventListener("click", function(e){
                        e.preventDefault();
                        e.stopPropagation();
                        myDropzone.processQueue();
                    });

                    this.on('sending', function(file, xhr, formData){
                        formData.append('album_id', $("#cmbAlbum").val());
                        formData.append('transparencia',$("#chkTransparencia").is(":checked"));
                    });
                    this.on("addedfile", function(file) {
                        //notificacion('Registro', 'Imagen agregada', 'primary');
                    });

                    this.on("complete", function(file) {
                        //myDropzone.removeFile(file);
                    });

                    this.on("success",
                            myDropzone.processQueue.bind(myDropzone)
                    );

                    this.on("error", function(response){
                        mostrar_error(response.xhr.responseText);
                    });
                }
            };
        });

        function limpiarBandeja() {
            Dropzone.forElement("#my-dropzone").removeAllFiles(true);
        }

        function cancelarAlbum() {
            $("#hddCodigo_Album").val("");
            $("#txtNombre_Album").val("");
            $("#txtFecha_Album").val("");
            $("#chkPublico_Album").iCheck('check');
            $("#modAlbum .modal-header h3").text("Nuevo álbum");
            $("#btnEliminar_Album").hide();
        }

        function editarAlbum() {
            var id = $("#cmbAlbum").val();
            if (id == "") {
                cancelarAlbum();
                $("#modAlbum").niftyModal('show');
            } else {
                $("#hddCodigo_Album").val(id);
                $.ajax({
                    url: "/intranet/website/album/" + id,
                    type: "GET",
                    beforeSend: function () {
                        $("#loading").show();
                        $("#btnEliminar_Album").show();
                    },
                    success: function (data) {
                        $("#modAlbum").niftyModal('show');
                        $("#hddCodigo_Album").val(id);
                        $("#txtNombre_Album").val(data["nombre"]);
                        $("#txtFecha_Album").val(data["fecha"]);
                        $("#chkPublico_Album").iCheck(data['publico'] == true ? "check" : "uncheck");
                        $("#modAlbum .modal-header h3").text("Modificando: " + data["nombre"]);
                    },
                    error: function (request, status, error) {
                        mostrar_error(request.responseText);
                    },
                    complete: function () {
                        $("#loading").hide();
                    }
                });

            }
        }

        function listarAlbum() {
            $.ajax({
                url: "/intranet/website/album/*",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    var opciones = "<option value=''>---</option>";
                    $("#cmbAlbum").empty();
                    $.each(data, function (index, value) {
                        opciones += "<option value=" + value["id"] + ">" + value["nombre"] + "</option>";
                    });
                    $("#cmbAlbum").append(opciones);
                },
                error: function (request, status, error) {
                    mostrar_error(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });
        }

        function guardarAlbum() {
            var accion = $("#hddCodigo_Album").val() == "" ? true : false;
            if ($("#frmAlbum").parsley().validate()) {
                if (accion)
                    registrarAlbum()
                else
                    modificarAlbum()
            }
        }

        function obtenerDatosAlbum() {
            var info = [{
                "_token": "{{ csrf_token() }}",
                "nombre": $("#txtNombre_Album").val(),
                "fecha": $("#txtFecha_Album").val(),
                "publico": $("#chkPublico_Album").is(":checked")
            }][0];
            return info;
        }

        function registrarAlbum() {
            if (confirm("¿Deseas continuar el registro?")) {
                var info = obtenerDatosAlbum();
                $.ajax({
                    url: "/intranet/website/album",
                    type: "POST",
                    data: info,
                    beforeSend: function () {
                        $("#loading").show();
                    },
                    success: function (data) {
                        notificacion('Registro', 'Datos registrados correctamente', 'primary');
                        cancelarAlbum();
                        $("#modAlbum").niftyModal('hide');
                        listarAlbum();
                    },
                    error: function (request, status, error) {
                        mostrar_error(request.responseText);
                    },
                    complete: function () {
                        $("#loading").hide();
                    }
                });
            }
        }

        function modificarAlbum() {
            if (confirm("¿Deseas continuar la modificación?")) {
                var info = obtenerDatosAlbum();
                $.ajax({
                    url: "/intranet/website/album/" + $("#hddCodigo_Album").val(),
                    type: "PUT",
                    data: info,
                    beforeSend: function () {
                        $("#loading").show();
                    },
                    success: function (data) {
                        notificacion('Actualización', 'Datos actualizados correctamente', 'success');
                        cancelarAlbum();
                        $("#modAlbum").niftyModal('hide');
                        listarAlbum();
                    },
                    error: function (request, status, error) {
                        mostrar_error(request.responseText);
                    },
                    complete: function () {
                        $("#loading").hide();
                    }
                });
            }
        }

        function eliminarAlbum(id) {
            if (confirm("¿Deseas eliminar el elemento?")) {
                var info = [{"_token": "{{ csrf_token() }}"}][0];
                $.ajax({
                    url: "/intranet/website/album/" + $("#hddCodigo_Album").val(),
                    type: "DELETE",
                    data: info,
                    beforeSend: function () {
                        $("#loading").show();
                    },
                    success: function (data) {
                        notificacion('Eliminación', 'Datos actualizados correctamente', 'warning');
                        cancelarAlbum();
                        $("#modAlbum").niftyModal('hide');
                        listarAlbum();
                    },
                    error: function (request, status, error) {
                        mostrar_error(request.responseText);
                    },
                    complete: function () {
                        $("#loading").hide();
                    }
                });
            }
        }

        function refrescarFotos(){
            $('a[href="#tp1"]').click();
            listarFotos();
        }
        function listarFotos() {
            var album_id =  $("#cmbAlbum").val();
            $("#hddAlbum_Id").val(album_id);
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
                            imagenes += '        <div class="head">';
                            imagenes += '            <span class="pull-right" ><i foto_id='+value["id"]+' style="font-size:20px;cursor:pointer;color:'+(value["favorito"] == true ? "red" : "" )+'" favorito='+value["favorito"]+' nombre="'+value["nombre"]+'" onclick="me_gusta(this)" title="Me gusta" class="fa fa-heart"></i></span>';
                            imagenes += '            <h4 title="'+value["nombre"]+'">' + value["nombre"].substr(0,18) + '</h4>';
                            imagenes += '        </div>';
                            imagenes += '        <div class="img">';
                            imagenes += '           <img  src="' + value["archivo"] + '">';
                            imagenes += '           <div class="over">';
                            imagenes += '               <div class="func">';
                            imagenes += '                   <a href="#" nombre="'+value["nombre"]+'" archivo="'+value["archivo"]+'" onclick="ver_link(this)"><i class="fa fa-link"></i></a>';
                            imagenes += '                   <a href="#" foto_id='+value["id"]+' onclick="eliminarFoto(this)"><i class="fa fa-trash-o"></i></a>';
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

        function obtenerDatosFoto(obj) {
            var info = [{
                "_token": "{{ csrf_token() }}",
                "foto_id": obj.attr("foto_id"),
                "nombre": obj.attr("nombre"),
                "favorito" : !JSON.parse(obj.attr("favorito"))
            }][0];
            return info;
        }

        function me_gusta(obj) {
            var info = obtenerDatosFoto($(obj));
            $.ajax({
                url: "/intranet/website/foto/" + info["foto_id"],
                type: "PUT",
                data: info,
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    notificacion('Actualización', 'Datos actualizados correctamente', 'success');
                    if(info["favorito"])
                        $(obj).css('color','red');
                    else
                        $(obj).css('color','lightgray');
                    $(obj).attr("favorito",info["favorito"]);
                },
                error: function (request, status, error) {
                    mostrar_error(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });
        }

        function ver_link(obj){
            $("#txtDescripcion").val($(obj).attr("nombre"));
            $("#txtArchivo").val($(obj).attr("archivo")).select();
            $("#modFoto").niftyModal('show');
        }

        function eliminarFoto(obj){
            var id = parseInt($(obj).attr("foto_id"));
            if (confirm("¿Deseas eliminar el elemento?")) {
                var info = [{"_token": "{{ csrf_token() }}"}][0];
                $.ajax({
                    url: "/intranet/website/foto/" + id,
                    type: "DELETE",
                    data: info,
                    beforeSend: function () {
                        $("#loading").show();
                    },
                    success: function (data) {
                        notificacion('Eliminación', 'Datos actualizados correctamente', 'warning');
                        $(obj).closest(".item").remove();
                        $(".gallery-cont").masonry();
                    },
                    error: function (request, status, error) {
                        mostrar_error(request.responseText);
                    },
                    complete: function () {
                        $("#loading").hide();
                    }
                });
            }
        }
    </script>
@endsection



