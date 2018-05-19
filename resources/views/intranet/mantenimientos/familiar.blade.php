@extends('intranet/principal')

@section('css')
    <style>
        #frmFamiliar .row{
            margin-top:4px;
        }
    </style>
@endsection

@section('content')
    <div id="pcont" class="container-fluid">
        <div class="page-head">
            <h2 style="display:inline-block;">Padres, Madres u Apoderados</h2>
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
                                        <th>Nro Doc.</th>
                                        <th style="width:5px;">G.</th>
                                        <th>Nombre Completo</th>
                                        <th>Ocupacion</th>
                                        <th>Lugar Trab.</th>
                                        <th>Celular</th>
                                        <th style="width:76px;">Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div id="tp2" class="tab-pane cont">
                                <div class="container">
                                    <form id="frmFamiliar" method="post" data-parsley-validate=""
                                          data-parsley-excluded="[disabled=disabled]" novalidate="">
                                        <input type="hidden" id="hddCodigo" value="">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <label class="col-sm-2">Tipo Doc.</label>
                                                    <div class="col-sm-3">
                                                        <select class="form-control" id="cmbPersona_TipoDoc" requerid="">
                                                            <option value="DN">DNI</option>
                                                            <option value="CE">CARNET EXTRANJERÍA</option>
                                                            <option value="PA">PASAPORTE</option>
                                                        </select>
                                                    </div>
                                                    <label class="col-sm-1" style="width: 58px;padding: 5px 0px;">Nro
                                                        Doc.</label>
                                                    <div class="col-sm-4">
                                                        <input id="txtPersona_Numero_Documento" class="form-control" type="text" data-parsley-trigger="change" data-parsley-length="[8,15]" data-parsley-required="true">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Nombre Completo</label>
                                                    <div class="col-sm-10">
                                                        <input id="txtPersona_NombreCompleto" class="form-control" type="text"
                                                               maxlength="200" data-parsley-trigger="change" data-parsley-length="[10,200]" data-parsley-required="true">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Sexo</label>
                                                    <div class="col-sm-3">
                                                        <select class="form-control" id="cmbPersona_Sexo" requerid="">
                                                            <option value="M">MASCULINO</option>
                                                            <option value="F">FEMENINO</option>
                                                        </select>
                                                    </div>
                                                    <label class="col-sm-2">Fecha Nac.</label>
                                                    <div class="col-sm-3">
                                                        <input id="txtPersona_FechaNac" class="form-control date datetime"
                                                               data-min-view="2" data-date-format="dd/mm/yyyy" type="text"
                                                               maxlength="10" >
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Dirección</label>
                                                    <div class="col-sm-9">
                                                        <input id="txtPersona_Direccion" class="form-control" type="text"
                                                               maxlength="150" >
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Email</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="email" id="txtPersona_Email"
                                                               placeholder="oliver.sanchez@gmail.com">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Telefonos</label>
                                                    <div class="col-sm-5">
                                                        <input class="form-control" type="text" id="txtPersona_Telf_Movil"
                                                               placeholder="Ejem. 987644413">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" type="text" id="txtPersona_Telf_Fijo"
                                                               placeholder="Ejem. 074234212">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <label class="col-sm-2">Estado Civil</label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control" id="cmbEstado_Civil">
                                                            <option value="">---</option>
                                                            <option value="SO">SOLTERO(A)</option>
                                                            <option value="CA">CASADO(A)</option>
                                                            <option value="VI">VIUDO(A)</option>
                                                            <option value="DI">DIVORCIADO(A)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Nivel Educativo</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="cmbNivel_Educativo">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Ocupación</label>
                                                    <div class="col-sm-10">
                                                        <input id="txtOcupacion" class="form-control" type="text" maxlength="70" >
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Lugar Trab.</label>
                                                    <div class="col-sm-10">
                                                        <input id="txtLugar_Trabajo" class="form-control" type="text"
                                                               maxlength="100" >
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">
                                                        <input id="chkActivo" class="icheck" type="checkbox" checked>Activo
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="btnGuardar" class="btn btn-primary" onclick="guardar()">Registrar
                                        </button>
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
            $("#frmFamiliar").parsley();
            listarNiveles_Educativos();
            cancelar();
        });

        function guardar() {
            var accion = $("#hddCodigo").val() == "" ? true : false;
            if ($("#frmFamiliar").parsley().validate()) {
                if (accion)
                    registrar()
                else
                    modificar()
            }
        }

        function obtenerDatos() {
            var nivel_educativo_id = $("#cmbNivel_Educativo").val();
            var info = [{
                "_token": "{{ csrf_token() }}",
                "nombre_completo": $("#txtPersona_NombreCompleto").val(),
                "tipo_documento": $("#cmbPersona_TipoDoc").val(),
                "numero_documento": $("#txtPersona_Numero_Documento").val(),
                "sexo": $("#cmbPersona_Sexo").val(),
                "fecha_nacimiento": $("#txtPersona_FechaNac").val(),
                "direccion": $("#txtPersona_Direccion").val(),
                "email": $("#txtPersona_Email").val(),
                "telf_fijo": $("#txtPersona_Telf_Fijo").val(),
                "telf_movil": $("#txtPersona_Telf_Movil").val(),

                "nivel_educativo_id": nivel_educativo_id!= "" ? parseInt(nivel_educativo_id) : "" ,
                "estado_civil": $("#cmbEstado_Civil").val(),
                "ocupacion": $("#txtOcupacion").val(),
                "lugar_trabajo": $("#txtLugar_Trabajo").val(),
                "activo": $("#chkActivo").is(":checked")
            }][0];
            return info;
        }

        function registrar() {
            if (confirm("¿Deseas continuar el registro?")) {
                var info = obtenerDatos();
                $.ajax({
                    url: "/intranet/mantenimientos/familiar",
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
                    url: "/intranet/mantenimientos/familiar/" + $("#hddCodigo").val(),
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
                    url: "/intranet/mantenimientos/familiar/" + id,
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
                url: "/intranet/mantenimientos/familiar/" + id,
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    $("#hddCodigo").val(id);

                    $("#txtPersona_NombreCompleto").val(data["nombre_completo"]);
                    $("#txtPersona_Numero_Documento").val(data["numero_documento"]);
                    $("#cmbPersona_TipoDoc").val(data["tipo_documento"]);
                    $("#txtPersona_Email").val(data["email"]);
                    $("#txtPersona_FechaNac").val(data["fecha_nacimiento"]);
                    $("#txtPersona_Direccion").val(data["direccion"]);
                    $("#txtPersona_Telf_Movil").val(data["telf_movil"]);
                    $("#txtPersona_Telf_Fijo").val(data["telf_fijo"]);
                    $("#cmbPersona_Sexo").val(data["sexo"]);

                    $("#cmbNivel_Educativo").val(data["nivel_educativo_id"]);
                    $("#cmbEstado_Civil").val(data["estado_civil"]);
                    $("#txtOcupacion").val(data["ocupacion"]);
                    $("#txtLugar_Trabajo").val(data["lugar_trabajo"]);

                    $("#chkActivo").iCheck(data['activo'] == true ? "check" : "uncheck");
                    $("#btnGuardar").text("Guardar");
                    $('a[href="#tp2"]').click();
                    $('a[href="#tp2"]').text("Modificando : " + data["nombre_completo"]);
                },
                error: function (request, status, error) {
                    mostrar_error(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });
        }

        function cancelar() {
            $("#hddCodigo").val("");
            $("#txtPersona_NombreCompleto").val("");
            $("#txtPersona_Numero_Documento").val("");
            $("#txtPersona_Email").val("");
            $("#txtPersona_FechaNac").val("");
            $("#txtPersona_Direccion").val("");
            $("#txtPersona_Telf_Movil").val("");
            $("#txtPersona_Telf_Fijo").val("");
            $("#cmbPersona_Sexo").val("M");
            $("#cmbPersona_TipoDoc").val("DN");

            $("#cmbNivel_Educativo").val("");

            $("#chkActivo").iCheck("check");
            $("#btnGuardar").text("Registrar");
            $("#txtPersona_Numero_Documento").prop('disabled',false);
            $('#frmFamiliar').parsley().reset();
            $('a[href="#tp1"]').click();
            $('a[href="#tp2"]').text("Registrar");
            listar();
        }

        function listar() {
            var info = [{"_token": "{{ csrf_token() }}"}][0];
            $.ajax({
                url: "/intranet/mantenimientos/familiar/listar",
                type: "GET",
                data: info,
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    t.clear().draw();
                    $.each(data, function (index, value) {
                        var sexo = value["sexo"]=="M" ? "<i style='color:blue;' class='fa fa-male'></i>" : "<i style='color:red;' class='fa fa-female'></i>";
                        var nodo = t.row.add([value['numero_documento'],
                            sexo,
                            value['nombre_completo'],
                            value['ocupacion'],
                            value['lugar_trabajo'],
                            value['telf_movil'],
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

        function listarAlumnos() {
            $.ajax({
                url: "/intranet/mantenimientos/alumno/*",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    var opciones = "<option value=''>---</option>";
                    $.each(data, function (index, value) {
                        opciones += "<option value='" + value["id"] + "'>" + value["apellido_paterno"]+" "+value["apellido_materno"]+" "+value["nombres"]+ "</option>";
                    });
                    $("#cmbAlumno").append(opciones);
                },
                error: function (request, status, error) {
                    mostrar_error(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });
        }

        function listarNiveles_Educativos() {
            $.ajax({
                url: "/intranet/mantenimientos/nivel_educativo/*",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    var opciones = "<option value=''>---</option>";
                    $.each(data, function (index, value) {
                        opciones += "<option value='" + value["id"] + "'>" + value["descripcion"] + "</option>";
                    });
                    $("#cmbNivel_Educativo").append(opciones);
                },
                error: function (request, status, error) {
                    mostrar_error(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });
        }

        function listarEspecialidades() {
            $.ajax({
                url: "/intranet/mantenimientos/especialidad/*",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    var opciones = "<option value=''>---</option>";
                    $.each(data, function (index, value) {
                        opciones += "<option value='" + value["id"] + "'>" + value["nombre"] + "</option>";
                    });
                    $("#cmbEspecialidad").append(opciones);
                },
                error: function (request, status, error) {
                    mostrar_error(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });
        }

        function listarParentescos() {
            $.ajax({
                url: "/intranet/mantenimientos/parentesco/*",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    var opciones = "<option value=''>---</option>";
                    $.each(data, function (index, value) {
                        opciones += "<option value='" + value["id"] + "'>" + value["nombre"] + "</option>";
                    });
                    $("#cmbParentesco").append(opciones);
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

