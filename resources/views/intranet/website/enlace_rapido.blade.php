@extends('intranet/principal')

@section('content')
    <div id="pcont" class="container-fluid">
        <div class="page-head">
            <h2 style="display:inline-block;">Enlaces Rápidos : Comunicados, Documentos y Descargas</h2>
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
                                        <th style="width: 79px">Categoría</th>
                                        <th>Nombre</th>
                                        <th>Url</th>
                                        <th style="width: 100px">Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div id="tp2" class="tab-pane cont">
                                <div class="container">
                                    <form id="frmEnlace_Rapido" method="post" data-parsley-validate="" data-parsley-excluded="[disabled=disabled]" novalidate="">
                                        <input type="hidden" id="hddCodigo" value="">
                                        <div class="row">
                                            <label for="txtNombre" class="col-md-1 control-label">Nombre</label>
                                            <div class="col-md-5">
                                                <input id="txtNombre" type="text" class="form-control"
                                                       data-parsley-trigger="change" data-parsley-required="true"></div>
                                        </div>
                                        <div class="row">
                                            <label for="cmbCategoria" class="col-md-1 control-label">Categoría</label>
                                            <div class="col-md-5">
                                                <select id="cmbCategoria" class="form-control" required="">
                                                    <option value="">---</option>
                                                    <option value="CO">COMUNICADO</option>
                                                    <option value="DO">DOCUMENTO</option>
                                                    <option value="DE">DESCARGA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="txtUrl" class="col-md-1 control-label">Url</label>
                                            <div class="col-md-5">
                                                <input id="txtUrl" type="text" class="form-control"
                                                       data-parsley-trigger="change" data-parsley-required="true"></div>
                                        </div>
                                        <div class="row">
                                            <label for="txtOrden" class="col-md-1 control-label">Orden</label>
                                            <div class="col-md-1">
                                                <input id="txtOrden" type="text" class="form-control"
                                                       data-parsley-trigger="change" data-parsley-required="true">
                                            </div>
                                            <label for="cmbColor" class="col-md-1 control-label">Color</label>
                                            <div class="col-md-3">
                                                <select class="form-control" id="cmbColor">
                                                    <option value="">DEFAULT</option>
                                                    <option value="black">NEGRO</option>
                                                    <option value="blue">AZUL</option>
                                                    <option value="red">ROJO</option>
                                                    <option value="green">VERDE</option>
                                                    <option value="chocolate">CHOCOLATE</option>
                                                </select>
                                            </div>
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
            $("#frmEnlace_Rapido").parsley();
            listar();
        });

        function guardar(){
            var accion = $("#hddCodigo").val() == "" ? true : false;
            if($("#frmEnlace_Rapido").parsley().validate()){
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
                "categoria": $("#cmbCategoria").val(),
                "url": $("#txtUrl").val(),
                "color": $("#cmbColor").val(),
                "publico": $("#chkPublico").is(":checked")}][0];
            return info;
        }

        function registrar() {
            if (confirm("¿Deseas continuar el registro?")) {
                var info = obtenerDatos();
                $.ajax({
                    url: "/intranet/website/enlace_rapido",
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
                    url: "/intranet/website/enlace_rapido/" + $("#hddCodigo").val(),
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
                    url: "/intranet/website/enlace_rapido/" + id,
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
                url: "/intranet/website/enlace_rapido/" + id,
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    $("#hddCodigo").val(id);
                    $("#txtOrden").val(data["orden"]);
                    $("#txtNombre").val(data["nombre"]);
                    $("#cmbCategoria").val(data["categoria"]);
                    $("#txtUrl").val(data["url"]);
                    $("#cmbColor").val(data["color"]);
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
            $("#cmbCategoria").val("");
            $("#txtUrl").val("#");
            $("#cmbColor").val("");
            $("#chkPublico").iCheck("check");

            $("#btnGuardar").text("Registrar");
            $('#frmEnlace_Rapido').parsley().reset();
            $('a[href="#tp1"]').click();
            $('a[href="#tp2"]').text("Registrar");
            listar();
        }

        function listar() {
            $.ajax({
                url: "/intranet/website/enlace_rapido/*",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    t.clear().draw();
                    $.each(data,function( index, value ) {
                        var nodo = t.row.add([value['orden'],value['categoria'],
                            value['nombre'],value['url'],
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

