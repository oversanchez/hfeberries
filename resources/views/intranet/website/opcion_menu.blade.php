@extends('intranet/principal')

@section('content')
    <div id="pcont" class="container-fluid">
        <div class="page-head">
            <h2 style="display:inline-block;">Menu de Página web </h2>
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
                                        <th>Orden</th>
                                        <th>Nombre</th>
                                        <th>Opcion Superior</th>
                                        <th>Url</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div id="tp2" class="tab-pane cont">
                                <div class="container">
                                    <form id="frmOpcion_Menu" method="post" data-parsley-validate="" data-parsley-excluded="[disabled=disabled]" novalidate="">
                                        <input type="hidden" id="hddCodigo" value="">
                                        <div class="row">
                                            <label for="txtNombre" class="col-md-1 control-label">Nombre</label>
                                            <div class="col-md-5">
                                                <input id="txtNombre" type="text" placeholder="Inicio" class="form-control"
                                                       data-parsley-trigger="change" data-parsley-required="true">
                                            </div>
                                            <label for="chkPublico" class="col-sm-2 control-label">Público
                                                <input id="chkPublico" class="icheck" type="checkbox" >
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label for="cmbOpcion_Superior" class="col-md-1 control-label">Opción Superior</label>
                                            <div class="col-md-4">
                                                <select id="cmbOpcion_Superior" class="form-control">
                                                </select>
                                            </div>
                                            <label for="txtOrden" class="col-md-1 control-label">Orden</label>
                                            <div class="col-md-1">
                                                <input id="txtOrden" type="text" placeholder="Inicio" class="form-control"
                                                       data-parsley-trigger="change" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="txtUrl" class="col-md-1 control-label">Url</label>
                                            <div class="col-md-3"><input class="form-control" id="txtUrl" type="text" placeholder="/pagina/e423123123"
                                                                         data-parsley-trigger="change" data-parsley-required="true"></div>
                                            <label for="cmbTipo" class="col-md-1 control-label">Tipo</label>
                                            <div class="col-md-2">
                                                <select class="form-control" id="cmbTipo" required="">
                                                    <option value="L">LITERAL</option>
                                                    <option value="B">BOTON</option>
                                                </select>
                                            </div>
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
                            <div id="tp3" class="tab-pane cont">
                                <h2>Typography</h2>
                                <p>This is just an example of content writen by <b>Jeff Hanneman</b>, as you can see it
                                    is a clean design with large</p>
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
            $("#frmOpcion_Menu").parsley();
            listar();
        });

        function guardar(){
            var accion = $("#hddCodigo").val() == "" ? true : false;
            if($("#frmOpcion_Menu").parsley().validate()){
                if (accion)
                    registrar()
                else
                    modificar()
            }
        }

        function obtenerDatos(){
            var info = [{"_token": "{{ csrf_token() }}",
                "orden": $("#txtOrden").val(),
                "nombre": $("#txtNombre").val(),
                "tipo": $("#cmbTipo").val(),
                "url": $("#txtUrl").val(),
                "opcion_superior_id": $("#cmbOpcion_Superior").val() !== "" ? parseInt($("#cmbOpcion_Superior").val()) : null,
                "publico": $("#chkPublico").is(":checked")}][0];
            return info;
        }

        function registrar() {
            if (confirm("¿Deseas continuar el registro?")) {
                var info = obtenerDatos();
                $.ajax({
                    url: "/intranet/website/opcion_menu",
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
                    url: "/intranet/website/opcion_menu/" + $("#hddCodigo").val(),
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
                    url: "/intranet/website/opcion_menu/" + id,
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
                url: "/intranet/website/opcion_menu/" + id,
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    $("#hddCodigo").val(id);
                    $("#txtOrden").val(data["orden"]);
                    $("#txtNombre").val(data["nombre"]);
                    $("#cmbTipo").val(data["tipo"]);
                    $("#txtUrl").val(data["url"]);
                    $("#cmbOpcion_Superior").val(data["opcion_superior_id"]);
                    $("#chkPublico").iCheck(data["publico"] == true ? "check" : "uncheck" );
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
            $("#txtOrden").val("");
            $("#txtNombre").val("");
            $("#cmbTipo").val("L");
            $("#txtUrl").val("");
            $("#cmbOpcion_Superior").val("");
            $("#chkPublico").iCheck("uncheck");
            $("#btnGuardar").text("Registrar");
            $('#frmOpcion_Menu').parsley().reset();
            $('a[href="#tp1"]').click();
            $('a[href="#tp2"]').text("Registrar");
            listar();
        }

        function listar() {
            var info = [{"_token": "{{ csrf_token() }}"}][0];
            $.ajax({
                url: "/intranet/website/opcion_menu/listar",
                type: "GET",
                data: info,
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    t.clear().draw();
                    var opcion_superior = $("#cmbOpcion_Superior");
                    opcion_superior.empty();
                    opcion_superior.append("<option value=''>---</option>");
                    $.each(data,function( index, value ) {
                        //Combo de Opciones Superiores
                        opcion_superior.append("<option value='"+value["id"]+"'>"+value["nombre"]+"</option>");
                        //Tabla de datos
                        var nodo = t.row.add([value['orden'],value['nombre'],value["opcion_superior"] == null ? '' : "/"+value["opcion_superior"]["nombre"],
                            value["url"],
                            grupo_opciones(value['id'])]).draw(false).node();
                        if(value["publico"]==false)
                            $(nodo).addClass('danger');
                    });
                    $("#tblListado th").eq(2).click();
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

