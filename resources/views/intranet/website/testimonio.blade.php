@extends('intranet/principal')

@section('content')
    <div id="pcont" class="container-fluid">
        <div class="page-head">
            <h2 style="display:inline-block;">Testimonios</h2>
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
                                        <th>Nombres</th>
                                        <th>Empresa</th>
                                        <th>Ocupación</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div id="tp2" class="tab-pane cont">
                                <div class="container">
                                    <form id="frmTestimonio" method="post" data-parsley-validate="" data-parsley-excluded="[disabled=disabled]" novalidate="">
                                        <input type="hidden" id="hddCodigo" value="">
                                        <div class="row">
                                            <label class="col-md-1" for="txtNombres">Nombres</label>
                                            <div class="col-md-6"><input type="text" class="form-control" id="txtNombres" placeholder="Nombre completo" data-parsley-trigger="change" data-parsley-required="true"></div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1" for="txtUrl_Foto">Url Foto</label>
                                            <div class="col-md-6"><input type="text" class="form-control" id="txtUrl_Foto" placeholder="Url Foto" data-parsley-trigger="change" data-parsley-required="true"></div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1" for="txtEmpresa">Empresa</label>
                                            <div class="col-md-6"><input type="text" class="form-control" id="txtEmpresa" placeholder="Empresa" data-parsley-trigger="change" data-parsley-required="true"></div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1" for="txtOcupacion">Ocupacion</label>
                                            <div class="col-md-6"><input type="text" class="form-control" id="txtOcupacion" placeholder="Empresa" data-parsley-trigger="change" data-parsley-required="true"></div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-1" for="txtDescripcion">Testimonio</label>
                                            <div class="col-md-6"><textarea rows="4" type="text" class="form-control" id="txtDescripcion" placeholder="Descripcion del evento" data-parsley-trigger="change" data-parsley-required="true"></textarea></div>
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
            $("#frmTestimonio").parsley();
            listar();
        });

        function guardar(){
            var accion = $("#hddCodigo").val() == "" ? true : false;
            if($("#frmTestimonio").parsley().validate()){
                if (accion)
                    registrar()
                else
                    modificar()
            }

        }

        function obtenerDatos(){
            var info = [{"_token": "{{ csrf_token() }}",
                "nombres": $("#txtNombres").val(),
                "url_foto": $("#txtUrl_Foto").val(),
                "empresa": $("#txtEmpresa").val(),
                "ocupacion": $("#txtOcupacion").val(),
                "descripcion": $("#txtDescripcion").val(),
                "publico": $("#chkPublico").is(":checked")}][0];
            return info;
        }

        function registrar() {
            if (confirm("¿Deseas continuar el registro?")) {
                var info = obtenerDatos();
                $.ajax({
                    url: "/intranet/website/testimonio",
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
                    url: "/intranet/website/testimonio/" + $("#hddCodigo").val(),
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
                    url: "/intranet/website/testimonio/" + id,
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
                url: "/intranet/website/testimonio/" + id,
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    $("#hddCodigo").val(id);
                    $("#txtNombres").val(data["nombres"]);
                    $("#txtUrl_Foto").val(data["url_foto"]);
                    $("#txtEmpresa").val(data["empresa"]);
                    $("#txtOcupacion").val(data["ocupacion"]);
                    $("#txtDescripcion").val(data["descripcion"]);
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
            $("#txtNombres").val("");
            $("#txtUrl_Foto").val("");
            $("#txtEmpresa").val("");
            $("#txtOcupacion").val("");
            $("#txtDescripcion").val("");
            $("#chkPublico").iCheck("check");

            $("#btnGuardar").text("Registrar");
            $('#frmTestimonio').parsley().reset();
            $('a[href="#tp1"]').click();
            $('a[href="#tp2"]').text("Registrar");
            listar();
        }

        function listar() {
            $.ajax({
                url: "/intranet/website/testimonio/*",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    t.clear().draw();
                    $.each(data,function( index, value ) {
                        var nodo = t.row.add([
                            value['nombres'],value['empresa'],value['ocupacion'],
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



