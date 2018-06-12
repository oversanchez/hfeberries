@extends('plantilla')

@section('estilos')
    <style>

    </style>
@endsection

@section('cuerpo')
    <div id="pcont" class="container-fluid">
        <div class="page-head">
            <h2 style="display:inline-block;">Defectos</h2>
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
                                        <th>Nombre</th>
                                        <th>Vigente</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div id="tp2" class="tab-pane cont">
                                <div class="container">
                                    <form id="frmDefecto" method="post" data-parsley-validate="" data-parsley-excluded="[disabled=disabled]" novalidate="">
                                        <input type="hidden" id="hddCodigo" value="">
                                        <div class="row">
                                            <label for="txtNombre" class="col-md-1 control-label">Nombre</label>
                                            <div class="col-md-7"><input id="txtNombre" type="text" placeholder=""
                                                                         class="form-control" data-parsley-trigger="change" data-parsley-required="true"></div>
                                            <label for="chkVigente" class="col-sm-2 control-label">Vigente
                                                <input id="chkVigente" class="icheck" type="checkbox" >
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
            //App.formElements();
            t = $("#tblListado").DataTable();
            listar();
        });
        function guardar(){
            var accion = $("#hddCodigo").val() == "" ? true : false;
            if($("#frmDefecto").parsley().validate()){
                if (accion)
                    registrar()
                else
                    modificar()
            }
        }
        function obtenerDatos(){
            var info = [{"_token": "{{ csrf_token() }}",                
                "nombre": $("#txtNombre").val(),
                "vigente": $("#chkvigente").is(":checked")}][0];
            return info;
        }
        function registrar() {
            if (confirm("¿Deseas continuar el registro?")) {
                var info = obtenerDatos();
                $.ajax({
                    url: "/intranet/mantenimientos/defecto",
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
                        console.log(request.responseText);
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
                    url: "/intranet/mantenimientos/defecto/" + $("#hddCodigo").val(),
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
                        console.log(request.responseText);
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
                    url: "/intranet/mantenimientos/defecto/" + id,
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
                        console.log(request.responseText);
                    },
                    complete: function () {
                        $("#loading").hide();
                    }
                });
            }
        }
        function editar(id) {
            $.ajax({
                url: "/intranet/mantenimientos/defecto/" + id,
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    $("#hddCodigo").val(id);
                    $("#txtNombre").val(data["nombre"]);
                    $("#chkvigente").iCheck(data["vigente"] == true ? "check" : "uncheck" );
                    $("#btnGuardar").text("Guardar");
                    $('a[href="#tp2"]').click();
                    $('a[href="#tp2"]').text("Modificando : "+data["anio"]);
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });
        }
        function cancelar(){
            $("#hddCodigo").val("");
            $("#txtNombre").val("");
            $("#chkvigente").iCheck("uncheck");
            $("#btnGuardar").text("Registrar");
            $('#frmDefecto').parsley().reset();
            $('a[href="#tp1"]').click();
            $('a[href="#tp2"]').text("Registrar");
            listar();
        }
        function listar() {
            $.ajax({
                url: "/intranet/mantenimientos/defecto/*",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    console.log(1);
                    t.clear().draw();
                    $.each(data,function( index, value ) {
                        t.row.add([value['nombre'],
                            "<input type='checkbox' "+( value['vigencia'] == true ? "checked" : "")+" disabled>"]).draw(false);
                    });
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });
        }
    </script>
@endsection
