@extends('intranet/principal')

@section('content')
    <div id="pcont" class="container-fluid">
        <div class="page-head">
            <h2 style="display:inline-block;">Sliders (800 x 300)</h2>
            <i id="loading" style="display:none;" class="fa fa-2x fa-spinner fa-spin"></i>
        </div>
        <div class="cl-mcont">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="tab-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tp1" data-toggle="tab">Listado</a></li>
                            <li><a href="#tp2" data-toggle="tab">Registrar</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tp1" class="tab-pane active cont">
                                <table class='table table-bordered dataTable no-footer' id="tblListado">
                                    <thead>
                                    <tr>
                                        <th style="width: 79px">Orden</th>
                                        <th>Nombre</th>
                                        <th>Url Foto</th>
                                        <th style="width: 100px">Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div id="tp2" class="tab-pane cont">
                                <div class="container">
                                    <form id="frmSlider" method="post" data-parsley-validate="" data-parsley-excluded="[disabled=disabled]" novalidate="">
                                        <input type="hidden" id="hddCodigo" value="">
                                        <div class="row">
                                            <label for="txtOrden" class="col-md-1 control-label">Orden</label>
                                            <div class="col-md-1">
                                                <input id="txtOrden" type="text" class="form-control"
                                                       data-parsley-trigger="change" data-parsley-required="true"></div>
                                            <label for="txtNombre" class="col-md-1 control-label">Nombre</label>
                                            <div class="col-md-5">
                                                <input id="txtNombre" type="text" class="form-control"
                                                       data-parsley-trigger="change" data-parsley-required="true"></div>
                                        </div>
                                        <div class="row">
                                            <label for="txtUrl_Foto" class="col-md-1 control-label">Url Foto</label>
                                            <div class="col-md-5">
                                                <input id="txtUrl_Foto" type="text" class="form-control"
                                                       data-parsley-trigger="change" data-parsley-required="true"></div>
                                        </div>
                                        <div class="row">
                                            <label for="txtUrl_Vinculo" class="col-md-1 control-label">Url Vinculo</label>
                                            <div class="col-md-5">
                                                <input id="txtUrl_Vinculo" type="text" class="form-control" placeholder="https://www.google.com.pe"
                                                       data-parsley-trigger="change" data-parsley-required="true"></div>
                                        </div>
                                        <div class="row">
                                            <label for="txtNombre_Vinculo" class="col-md-1 control-label">Nombre Vinculo</label>
                                            <div class="col-md-5">
                                                <input id="txtNombre_Vinculo" type="text" class="form-control"></div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2">
                                                <input id="chkPublico" class="icheck" type="checkbox" checked> Público
                                            </label>
                                        </div>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="btnGuardar" class="btn btn-primary" onclick="guardar()">Registrar</button>
                                        <button class="btn btn-default" onclick="cancelar()">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

        var t;
        $(document).ready(function () {
            //initialize the javascript
            App.init();
            App.formElements();
            t = $("#tblListado").DataTable();
            $("#frmSlider").parsley();
            listar();
        });

        function guardar(){
            var accion = $("#hddCodigo").val() == "" ? true : false;
            if($("#frmSlider").parsley().validate()){
                if (accion)
                    registrar()
                else
                    modificar()
            }

        }

        function obtenerDatos(){
            var info = [{"_token": "{{ csrf_token() }}",
                "orden": parseInt($("#txtOrden").val()),
                "nombre": $("#txtNombre").val(),
                "url_foto": $("#txtUrl_Foto").val(),
                "url_vinculo": $("#txtUrl_Vinculo").val(),
                "nombre_vinculo": $("#txtNombre_Vinculo").val(),
                "publico": $("#chkPublico").is(":checked")}][0];
            return info;
        }

        function registrar() {
            if (confirm("¿Deseas continuar el registro?")) {
                var info = obtenerDatos();
                $.ajax({
                    url: "/intranet/website/slider",
                    type: "POST",
                    data: info,
                    beforeSend: function () {
                        $("#loading").show();
                    },
                    success: function (data) {
                        notificacion('Registro', 'Datos registrados correctamente', 'primary');
                        cancelar();
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

        function modificar() {
            if (confirm("¿Deseas continuar la modificación?")) {
                var info = obtenerDatos();
                $.ajax({
                    url: "/intranet/website/slider/" + $("#hddCodigo").val(),
                    type: "PUT",
                    data: info,
                    beforeSend: function () {
                        $("#loading").show();
                    },
                    success: function (data) {
                        notificacion('Actualización', 'Datos actualizados correctamente', 'success');
                        cancelar();
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

        function eliminar(id) {
            if (confirm("¿Deseas eliminar el elemento?")) {
                var info = [{"_token": "{{ csrf_token() }}"}][0];
                $.ajax({
                    url: "/intranet/website/slider/" + id,
                    type: "DELETE",
                    data: info,
                    beforeSend: function () {
                        $("#loading").show();
                    },
                    success: function (data) {
                        notificacion('Eliminación', 'Datos actualizados correctamente', 'warning');
                        cancelar();
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

        function editar(id) {
            $.ajax({
                url: "/intranet/website/slider/" + id,
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    $("#hddCodigo").val(id);
                    $("#txtOrden").val(data["orden"]);
                    $("#txtNombre").val(data["nombre"]);
                    $("#txtUrl_Foto").val(data["url_foto"]);
                    $("#txtUrl_Vinculo").val(data["url_vinculo"]);
                    $("#txtNombre_Vinculo").val(data["nombre_vinculo"]);
                    $("#chkPublico").iCheck(data['publico'] == true ? "check" : "uncheck");
                    $("#btnGuardar").text("Guardar");
                    $('a[href="#tp2"]').click();
                    $('a[href="#tp2"]').text("Modificando : "+data["nombre"]);
                },
                error: function (request, status, error) {
                    mostrar_error(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });
        }

        function cancelar(){
            $("#hddCodigo").val("");
            $("#txtOrden").val(0);
            $("#txtNombre").val("");
            $("#txtUrl_Foto").val("#");
            $("#txtUrl_Vinculo").val("#");
            $("#txtNombre_Vinculo").val("");
            $("#chkPublico").iCheck("check");

            $("#btnGuardar").text("Registrar");
            $('#frmSlider').parsley().reset();
            $('a[href="#tp1"]').click();
            $('a[href="#tp2"]').text("Registrar");
            listar();
        }

        function listar() {
            $.ajax({
                url: "/intranet/website/slider/*",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    t.clear().draw();
                    $.each(data,function( index, value ) {
                        var nodo = t.row.add([value['orden'],value['nombre'],
                            value['url_foto'],
                            grupo_opciones(value['id'])]).draw(false).node();
                        if(value["publico"]==false)
                            $(nodo).addClass('danger');
                    });
                    $("#tblListado th").eq(0).click();
                },
                error: function (request, status, error) {
                    mostrar_error(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });
        }
    </script>
@endsection


