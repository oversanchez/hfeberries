@extends('intranet/principal')

@section('content')
    <div id="pcont" class="container-fluid">
        <div class="page-head">
            <h2 style="display:inline-block;">Secciones</h2>
            <select class="input-lg" id="cmbAnio">
            </select>
            <select class="input-lg " id="cmbTurno" onchange="listar()">
            </select>
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
                                        <th>Nivel</th>
                                        <th>Seccion</th>
                                        <th style="width: 60px;">Vacantes</th>
                                        <th>Tutor</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div id="tp2" class="tab-pane cont">
                                <div class="container">
                                    <form id="frmSeccion" method="post" data-parsley-validate="" data-parsley-excluded="[disabled=disabled]" novalidate="">
                                        <input type="hidden" id="hddCodigo" value="">
                                        <div class="row">
                                            <label for="txtLetra" class="col-md-1 control-label">Letra</label>
                                            <div class="col-md-1">
                                                <input id="txtLetra" type="text" placeholder="Ejem. A,B,C" class="form-control"
                                                       data-parsley-trigger="change" data-parsley-required="true">
                                            </div>
                                            <label for="cmbTipo_Calificacion" class="col-md-1 control-label">Tipo Calificación</label>
                                            <div class="col-md-2">
                                                <select class="form-control" id="cmbTipo_Calificacion" required="">
                                                    <option value="L">LITERAL</option>
                                                    <option value="V">VIGESIMAL</option>
                                                </select>
                                            </div>
                                            <label for="txtVacantes" class="col-md-1 control-label">Vacantes</label>
                                            <div class="col-md-1">
                                                <input id="txtVacantes" type="text" placeholder="Ejem. 30,35" class="form-control"
                                                       data-parsley-trigger="change" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="cmbGrado" class="col-md-1 control-label">Grado</label>
                                            <div class="col-md-4">
                                                <select class="form-control" id="cmbGrado" required="">

                                                </select>
                                            </div>
                                            <label for="chkActivo" class="col-sm-2 control-label">Activo
                                                <input id="chkActivo" class="icheck" type="checkbox" >
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label for="cmbTrabajador" class="col-md-1 control-label">Tutor</label>
                                            <div class="col-md-6">
                                                <select id="cmbTrabajador" style="width: 340px;">
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
            $("#frmSeccion").parsley();
            listarAnios();
            listarTurnos();
            listarGrados();
            $("#cmbTrabajador").select2();
            listarTrabajadores();
        });

        function guardar(){
            var accion = $("#hddCodigo").val() == "" ? true : false;
            if($("#frmSeccion").parsley().validate()){
                if (accion)
                    registrar()
                else
                    modificar()
            }
        }

        function obtenerDatos(){
            var trabajador_id = $("#cmbTrabajador").val();
            var info = [{"_token": "{{ csrf_token() }}",
                "letra": $("#txtLetra").val(),
                "vacantes": parseInt($("#txtVacantes").val()),
                "tipo_calificacion": $("#cmbTipo_Calificacion").val(),
                "anio_lectivo_id": parseInt($("#cmbAnio").val()),
                "turno_id":$("#cmbTurno").val(),
                "trabajador_id": trabajador_id == "" ? null : parseInt(trabajador_id),
                "grado_id": parseInt($("#cmbGrado").val()),
                "activo": $("#chkActivo").is(":checked")}][0];
            return info;
        }

        function registrar() {
            if (confirm("¿Deseas continuar el registro?")) {
                var info = obtenerDatos();
                $.ajax({
                    url: "/intranet/mantenimientos/seccion",
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
                    url: "/intranet/mantenimientos/seccion/" + $("#hddCodigo").val(),
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
                    url: "/intranet/mantenimientos/seccion/" + id,
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
                url: "/intranet/mantenimientos/seccion/" + id,
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    $("#hddCodigo").val(id);
                    $("#txtLetra").val(data["letra"]);
                    $("#txtVacantes").val(data["vacantes"]);
                    $("#cmbGrado").val(data["grado_id"]);
                    $("#cmbTrabajador").val(data["trabajador_id"]).change();
                    $("#cmbTipo_Calificacion").val(data["tipo_calificacion"]);
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
            $("#txtLetra").val("");
            $("#txtVacantes").val("");
            $("#txtVacantes").val("");
            $("#cmbGrado").val("");

            $("#chkActivo").iCheck("check");
            $("#btnGuardar").text("Registrar");
            $('#frmSeccion').parsley().reset();
            $('a[href="#tp1"]').click();
            $('a[href="#tp2"]').text("Registrar");
            listar();
        }

        function listar() {
            var info = [{"_token": "{{ csrf_token() }}",
                "anio_lectivo_id": parseInt($("#cmbAnio").val()),
                "turno_id": $("#cmbTurno").val()}][0];
            $.ajax({
                url: "/intranet/mantenimientos/seccion/listar",
                type: "GET",
                data: info,
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    t.clear().draw();
                    $.each(data,function( index, value ) {
                        var tutor = "";
                        if(value["trabajador_id"] != null)
                             tutor = value["trabajador"]["apellido_paterno"]+" "+value["trabajador"]["apellido_materno"]+" "+value["trabajador"]["nombres"];

                        var nodo = t.row.add([value['grado']['nivel']['nombre'],value['grado']['numero']+' '+value['letra'],
                                value["vacantes"],tutor,
                            grupo_opciones(value['id'])]).draw(false).node();

                        if (value["activo"] == false)
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

        function listarAnios() {
            $.ajax({
                url: "/intranet/mantenimientos/anio_lectivo/*",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    var opciones = "";
                    $.each(data,function( index, value ) {
                        opciones += "<option value='"+value["id"]+"'>"+value["anio"]+"</option>";
                    });
                    $("#cmbAnio").append(opciones);
                },
                error: function (request, status, error) {
                    mostrar_error(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                    listar();
                }
            });
        }

        function listarTurnos() {
            $.ajax({
                url: "/intranet/mantenimientos/turno/*",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    var opciones = "";
                    $.each(data,function( index, value ) {
                        opciones += "<option value='"+value["id"]+"'>"+value["nombre"]+"</option>";
                    });
                    $("#cmbTurno").append(opciones);
                },
                error: function (request, status, error) {
                    mostrar_error(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                    listar();
                }
            });
        }

        function listarGrados() {
            $.ajax({
                url: "/intranet/mantenimientos/grado/listar",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    var opciones = "";
                    opciones = "<option value=''>-----</option>";
                    $.each(data,function( index, value ) {
                        opciones += "<option value='"+value["id"]+"'>"+value["nivel"]["nombre"]+"-"+value["nombre"]+"</option>";
                    });
                    $("#cmbGrado").append(opciones);
                },
                error: function (request, status, error) {
                    mostrar_error(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                    listar();
                }
            });
        }

        function listarTrabajadores() {
            $.ajax({
                url: "/intranet/mantenimientos/trabajador/listar",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    var opciones = "";
                    opciones = "<option value=''>----</option>";
                    $.each(data,function( index, value ) {
                        opciones += "<option value='"+value["id"]+"'>"+value["apellido_paterno"]+" "+value["apellido_materno"]+" "+value["nombres"]+"</option>";
                    });
                    $("#cmbTrabajador").append(opciones);
                },
                error: function (request, status, error) {
                    mostrar_error(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                    listar();
                }
            });
        }
    </script>
@endsection

