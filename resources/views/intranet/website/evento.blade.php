@extends('intranet/principal')

@section('content')
    <div id="pcont" class="container-fluid">
        <div class="page-head">
            <h2 style="display:inline-block;">Eventos</h2>
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
                                        <th style='width:90px;'>Fecha</th>
                                        <th>Nombre</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div id="tp2" class="tab-pane cont">
                                <div class="container">
                                    <form id="frmEvento" method="post" data-parsley-validate="" data-parsley-excluded="[disabled=disabled]" novalidate="">
                                        <input type="hidden" id="hddCodigo" value="">
                                        <div class="row">
                                            <label class="col-md-1" for="txtNombre">Nombre</label>
                                            <div class="col-md-4"><input type="text" class="form-control" id="txtNombre" placeholder="Nombre del evento" data-parsley-trigger="change" data-parsley-required="true"></div>
                                            <label class="col-md-1" for="txtHora">Hora</label>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" id="txtHora" placeholder="Hora" data-parsley-trigger="change" data-parsley-required="true">
                                            </div>
                                            <label class="col-md-1" for="txtFecha">Fecha</label>
                                            <div class="col-md-2">
                                                <input id="txtFecha" class="form-control date datetime"
                                                       data-min-view="2" data-date-format="dd/mm/yyyy" type="text"
                                                       maxlength="10" data-parsley-trigger="change"
                                                       data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1" for="txtDescripcion">Descripcion</label>
                                            <div class="col-md-6"><input type="text" class="form-control" id="txtDescripcion" placeholder="Descripcion del evento" data-parsley-trigger="change" data-parsley-required="true"></div>
                                            <label class="col-md-1" for="txtLugar">Lugar</label>
                                            <div class="col-md-4"><input type="text" class="form-control" id="txtLugar" placeholder="Lugar del evento" data-parsley-trigger="change" data-parsley-required="true"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div id="dvContenido" ></div>
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
            $("#frmEvento").parsley();
            $("#dvContenido").summernote({height: 200});
            listar();
        });

        function guardar(){
            var accion = $("#hddCodigo").val() == "" ? true : false;
            if($("#frmEvento").parsley().validate()){
                if (accion)
                    registrar()
                else
                    modificar()
            }

        }

        function obtenerDatos(){
            var info = [{"_token": "{{ csrf_token() }}",
                "nombre": $("#txtNombre").val(),
                "descripcion": $("#txtDescripcion").val(),
                "contenido": $("#dvContenido").summernote('code'),
                "lugar": $("#txtLugar").val(),
                "hora": $("#txtHora").val(),
                "fecha": $("#txtFecha").val(),
                "publico": $("#chkPublico").is(":checked")}][0];
            return info;
        }

        function registrar() {
            if (confirm("¿Deseas continuar el registro?")) {
                var info = obtenerDatos();
                $.ajax({
                    url: "/intranet/website/evento",
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
                    url: "/intranet/website/evento/" + $("#hddCodigo").val(),
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
                    url: "/intranet/website/evento/" + id,
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
                url: "/intranet/website/evento/" + id,
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    $("#hddCodigo").val(id);
                    $("#txtNombre").val(data["nombre"]);
                    $("#txtDescripcion").val(data["descripcion"]);
                    $("#dvContenido").summernote('code',data["contenido"]);
                    $("#txtFecha").val(data["fecha"]);
                    $("#txtLugar").val(data["lugar"]);
                    $("#txtHora").val(data["hora"]);
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
            $("#txtNombre").val("");
            $("#txtDescripcion").val("");
            $("#dvContenido").summernote('reset');
            $("#txtFecha").val("");
            $("#txtLugar").val("");
            $("#txtHora").val("");
            $("#chkPublico").iCheck("check");

            $("#btnGuardar").text("Registrar");
            $('#frmEvento').parsley().reset();
            $('a[href="#tp1"]').click();
            $('a[href="#tp2"]').text("Registrar");
            listar();
        }

        function listar() {
            $.ajax({
                url: "/intranet/website/evento/*",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    t.clear().draw();
                    $.each(data,function( index, value ) {
                        var nodo = t.row.add([
                            value['fecha'],value['nombre'],
                            grupo_opciones(value['id'])]).draw(false).node();
                        if(value["publico"]==false)
                            $(nodo).addClass('danger');
                    });
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

