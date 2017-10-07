@extends('intranet/principal')

@section('content')
    <div id="pcont" class="container-fluid">
        <div class="page-head">
            <h2 style="display:inline-block;">Grados Académicos</h2>
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
                                        <th>Numero</th>
                                        <th>Nombre</th>
                                        <th>Grado Anterior</th>
                                        <th>Activo</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div id="tp2" class="tab-pane cont">
                                <div class="container">
                                    <form id="frmGrado" method="post" data-parsley-validate="" data-parsley-excluded="[disabled=disabled]" novalidate="">
                                        <input type="hidden" id="hddCodigo" value="">
                                        <div class="row">
                                            <label for="txtNombre" class="col-md-1 control-label">Nombre</label>
                                            <div class="col-md-4">
                                                <input id="txtNombre" type="text" placeholder="Ejem. TERCER" class="form-control"
                                                       data-parsley-trigger="change" data-parsley-required="true">
                                            </div>
                                            <label for="cmbGradoAnterior" class="col-md-2 control-label">Grado Anterior</label>
                                            <div class="col-md-4">
                                                <select id="cmbGradoAnterior" class="form-control">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="txtNumero" class="col-md-1 control-label">Numero</label>
                                            <div class="col-md-4"><input class="form-control" id="txtNumero" type="text" placeholder="Ejem. 3"
                                                                         data-parsley-trigger="change" data-parsley-required="true"></div>
                                            <label for="cmbNivel" class="col-md-1 control-label">Nivel</label>
                                            <div class="col-md-4">
                                                <select class="form-control" id="cmbNivel" required="">
                                                </select>
                                            </div>
                                            <label for="chkActivo" class="col-sm-2 control-label">Activo
                                                <input id="chkActivo" class="icheck" type="checkbox" >
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
            $("#frmGrado").parsley();
            listarNiveles();
            listar();
        });

        function guardar(){
            var accion = $("#hddCodigo").val() == "" ? true : false;
            if($("#frmGrado").parsley().validate()){
                if (accion)
                    registrar()
                else
                    modificar()
            }
        }

        function obtenerDatos(){
            var info = [{"_token": "{{ csrf_token() }}",
                "nombre": $("#txtNombre").val(),
                "numero": $("#txtNumero").val(),
                "nivel_id": parseInt($("#cmbNivel").val()),
                "grado_anterior_id": $("#cmbGradoAnterior").val() !== "" ? parseInt($("#cmbGradoAnterior").val()) : null,
                "activo": $("#chkActivo").is(":checked")}][0];
            return info;
        }

        function registrar() {
            if (confirm("¿Deseas continuar el registro?")) {
                var info = obtenerDatos();
                $.ajax({
                    url: "/intranet/mantenimientos/grado",
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
                    url: "/intranet/mantenimientos/grado/" + $("#hddCodigo").val(),
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
                    url: "/intranet/mantenimientos/grado/" + id,
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
                url: "/intranet/mantenimientos/grado/" + id,
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    $("#hddCodigo").val(id);
                    $("#txtNombre").val(data["nombre"]);
                    $("#txtNumero").val(data["numero"]);
                    $("#cmbNivel").val(data["nivel_id"]);
                    $("#cmbGradoAnterior").val(data["grado_anterior_id"]);
                    $("#chkActivo").iCheck(data["activo"] == true ? "check" : "uncheck" );
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
            $("#txtNumero").val("");
            $("#cmbNivel").val("");
            $("#cmbGradoAnterior").val("");
            $("#chkActivo").iCheck("uncheck");
            $("#btnGuardar").text("Registrar");
            $('#frmGrado').parsley().reset();
            $('a[href="#tp1"]').click();
            $('a[href="#tp2"]').text("Registrar");
            listar();
        }

        function listar() {
            var info = [{"_token": "{{ csrf_token() }}"}][0];
            $.ajax({
                url: "/intranet/mantenimientos/grado/listar",
                type: "GET",
                data: info,
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    t.clear().draw();
                    var grado_anterior = $("#cmbGradoAnterior");
                    grado_anterior.empty();
                    grado_anterior.append("<option value=''>---</option>");
                    $.each(data,function( index, value ) {
                        //Combo de Grados Anteriores
                        grado_anterior.append("<option value='"+value["id"]+"'>"+value["nivel"]["abreviatura"]+"-"+value["nombre"]+"</option>");
                        //Tabla de datos
                        t.row.add([ value['numero'],value['nivel']['nombre']+"-"+value['nombre'],value["grado_anterior"] == null ? '' : value["grado_anterior"]["nivel"]["abreviatura"]+"-"+value["grado_anterior"]["nombre"],
                            "<input type='checkbox' "+( value['activo'] == true ? "checked" : "")+" disabled>",
                            grupo_opciones(value['id'])]).draw(false);
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

        function listarNiveles() {
            $.ajax({
                url: "/intranet/mantenimientos/nivel/*",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    var opciones = "<option value=''>---</option>";
                    $.each(data,function( index, value ) {
                        opciones += "<option value='"+value["id"]+"'>"+value["nombre"]+"</option>";
                    });
                    $("#cmbNivel").append(opciones);
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

