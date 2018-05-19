@extends('intranet/principal')

@section('css')
    <style>
        #frmTrabajador .row{
            margin-top:4px;
        }
    </style>
@endsection

@section('content')
    <div id="pcont" class="container-fluid">
        <div class="page-head">
            <h2 style="display:inline-block;">Trabajador</h2>
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
                                        <th style='width: 70px;'>Doc.</th>
                                        <th style='width: 90px;'>Ap. Paterno</th>
                                        <th style='width: 90px;'>Ap. Materno</th>
                                        <th style='width: 120px;'>Nombres</th>
                                        <th style='width: 50px;'>Categ.</th>
                                        <th style='width: 100px;'>Nivel Ed.</th>
                                        <th>Especialidad</th>
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
                                    <form id="frmTrabajador" method="post" data-parsley-validate=""
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
                                                    <div class="col-sm-3">
                                                        <input onchange="buscar_numero_documento(this)"
                                                               id="txtPersona_Numero_Documento" class="form-control" type="text"
                                                               data-parsley-trigger="change" data-parsley-length="[8,15]"
                                                               data-parsley-required="true">
                                                    </div>
                                                    <div class="col-sm-2" style="padding: 6px 0px;">
                                                        <label id="persona_mensaje">Teclea ⏎ ENTER </label>
                                                        <div id="persona_loading" style="display:none;">
                                                            <i class="fa fa-spinner fa-spin"></i> <label>Validando</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Apellidos</label>
                                                    <div class="col-sm-4">
                                                        <input id="txtPersona_ApPat" class="form-control" type="text"
                                                               maxlength="50" data-parsley-trigger="change"
                                                               data-parsley-length="[1,50]" data-parsley-required="true">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input id="txtPersona_ApMat" class="form-control" type="text"
                                                               maxlength="50">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Nombres</label>
                                                    <div class="col-sm-8">
                                                        <input id="txtPersona_Nombres" class="form-control" type="text"
                                                               maxlength="50" data-parsley-trigger="change"
                                                               data-parsley-length="[2,50]" data-parsley-required="true">
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
                                                               maxlength="10" data-parsley-trigger="change"
                                                               data-parsley-required="true">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Dirección</label>
                                                    <div class="col-sm-9">
                                                        <input id="txtPersona_Direccion" class="form-control" type="text"
                                                               maxlength="100" data-parsley-trigger="change"
                                                               data-parsley-required="true">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Email</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="email" id="txtPersona_Email"
                                                               placeholder="oliver.sanchez@gmail.com" data-parsley-trigger="change"
                                                               data-parsley-length="[2,100]" data-parsley-required="true">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Telefonos</label>
                                                    <div class="col-sm-5">
                                                        <input class="form-control" type="text" id="txtPersona_Telf_Movil"
                                                               placeholder="Ejem. 987644413" data-parsley-trigger="change"
                                                               data-parsley-length="[9,20]" data-parsley-required="true">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" type="text" id="txtPersona_Telf_Fijo"
                                                               placeholder="Ejem. 074234212">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <label class="col-sm-2">Categoria</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="cmbCategoria_Trabajador" required="">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Nivel Educativo</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="cmbNivel_Educativo" required="">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-sm-2">Especialidad</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" id="cmbEspecialidad" required="">
                                                        </select>
                                                    </div>
                                                    <label class="col-sm-3">
                                                        <input id="chkActivo" class="icheck" type="checkbox"
                                                               checked>Activo</label>
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
            $("#frmTrabajador").parsley();
            listar();
            listarEspecialidades();
            listarCategorias_Trabajador();
            listarNiveles_Educativos();
        });

        function guardar() {
            var accion = $("#hddCodigo").val() == "" ? true : false;
            if ($("#frmTrabajador").parsley().validate()) {
                if (accion)
                    registrar()
                else
                    modificar()
            }
        }

        function obtenerDatos() {
            var info = [{
                "_token": "{{ csrf_token() }}",
                "nombres": $("#txtPersona_Nombres").val(),
                "apellido_paterno": $("#txtPersona_ApPat").val(),
                "apellido_materno": $("#txtPersona_ApMat").val(),
                "tipo_documento": $("#cmbPersona_TipoDoc").val(),
                "numero_documento": $("#txtPersona_Numero_Documento").val(),
                "sexo": $("#cmbPersona_Sexo").val(),
                "fecha_nacimiento": $("#txtPersona_FechaNac").val(),
                "direccion": $("#txtPersona_Direccion").val(),
                "email": $("#txtPersona_Email").val(),
                "telf_fijo": $("#txtPersona_Telf_Fijo").val(),
                "telf_movil": $("#txtPersona_Telf_Movil").val(),
                "nivel_educativo_id": parseInt($("#cmbNivel_Educativo").val()),
                "especialidad_id": parseInt($("#cmbEspecialidad").val()),
                "categoria_trabajador_id": parseInt($("#cmbCategoria_Trabajador").val()),
                "activo": $("#chkActivo").is(":checked")
            }][0];
            return info;
        }

        function registrar() {
            if (confirm("¿Deseas continuar el registro?")) {
                var info = obtenerDatos();
                $.ajax({
                    url: "/intranet/mantenimientos/trabajador",
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
                    url: "/intranet/mantenimientos/trabajador/" + $("#hddCodigo").val(),
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
                    url: "/intranet/mantenimientos/trabajador/" + id,
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
                url: "/intranet/mantenimientos/trabajador/" + id,
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    $("#hddCodigo").val(id);

                    $("#txtPersona_Nombres").val(data["nombres"]);
                    $("#txtPersona_ApPat").val(data["apellido_paterno"]);
                    $("#txtPersona_ApMat").val(data["apellido_materno"]);
                    $("#txtPersona_Numero_Documento").val(data["numero_documento"]);
                    $("#cmbPersona_TipoDoc").val(data["tipo_documento"]);
                    $("#txtPersona_Email").val(data["email"]);
                    $("#txtPersona_FechaNac").val(data["fecha_nacimiento"]);
                    $("#txtPersona_Direccion").val(data["direccion"]);
                    $("#txtPersona_Telf_Movil").val(data["telf_movil"]);
                    $("#txtPersona_Telf_Fijo").val(data["telf_fijo"]);
                    $("#cmbPersona_Sexo").val(data["sexo"]);

                    $("#cmbNivel_Educativo").val(data['nivel_educativo_id']);
                    $("#cmbEspecialidad").val(data['especialidad_id']);
                    $("#cmbCategoria_Trabajador").val(data['categoria_trabajador_id']);
                    $("#txtPersona_Numero_Documento").prop('disabled',true);
                    $("#chkActivo").iCheck(data['activo'] == true ? "check" : "uncheck");
                    $("#btnGuardar").text("Guardar");
                    $('a[href="#tp2"]').click();
                    $('a[href="#tp2"]').text("Modificando : " + data["apellido_paterno"] + ' ' + data['apellido_materno'] + ' ' + data["nombres"]);
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });
        }

        function cancelar() {
            $("#hddCodigo").val("");
            $("#txtPersona_Nombres").val("");
            $("#txtPersona_ApPat").val("");
            $("#txtPersona_ApMat").val("");
            $("#txtPersona_Numero_Documento").val("");
            $("#txtPersona_Email").val("");
            $("#txtPersona_FechaNac").val("");
            $("#txtPersona_Direccion").val("");
            $("#txtPersona_Telf_Movil").val("");
            $("#txtPersona_Telf_Fijo").val("");
            $("#cmbPersona_Sexo").val("M");
            $("#cmbPersona_TipoDoc").val("DN");

            $("#cmbNivel_Educativo").val("");
            $("#cmbEspecialidad").val("");
            $("#cmbCategoria_Trabajador").val("");
            $("#chkActivo").iCheck("check");
            $("#btnGuardar").text("Registrar");
            $("#txtPersona_Numero_Documento").prop('disabled',false);
            $('#frmTrabajador').parsley().reset();
            $('a[href="#tp1"]').click();
            $('a[href="#tp2"]').text("Registrar");
            listar();
        }

        function listar() {
            $.ajax({
                url: "/intranet/mantenimientos/trabajador/listar",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    t.clear().draw();
                    $.each(data, function (index, value) {
                        var nodo = t.row.add([value['numero_documento'],
                            value['apellido_paterno'],
                            value['apellido_materno'],
                            value['nombres'],
                            value['categoria_trabajador']['abreviatura'],
                            value['nivel_educativo']['abreviatura'],
                            value['especialidad']['nombre'],
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

        function buscar_numero_documento(obj) {
            var numero_documento = $(obj).val();
            if(numero_documento.length >=8){
                $.ajax({
                    url: "/intranet/mantenimientos/trabajador/buscar_numero_documento",
                    type: "GET",
                    data: {"numero_documento": numero_documento},
                    beforeSend: function () {
                        $("#persona_mensaje").hide();
                        $("#persona_loading").show();
                    },
                    success: function (data) {
                        if(data.length > 0){
                            notificacion('Validacion','DNI ya registrado','warning');
                            $("#txtPersona_Numero_Documento").val("");
                        }else{
                            notificacion('Validacion','DNI válido','info');
                        }
                    },
                    error: function (request, status, error) {
                        mostrar_error(request.responseText);
                    },
                    complete: function () {
                        $("#persona_loading").hide();
                        $("#persona_mensaje").show();
                    }
                });
            }
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
                    console.log(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });
        }

        function listarCategorias_Trabajador() {
            $.ajax({
                url: "/intranet/mantenimientos/categoria_trabajador/*",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    var opciones = "<option value=''>---</option>";
                    $.each(data, function (index, value) {
                        opciones += "<option value='" + value["id"] + "'>" + value["nombre"] + "</option>";
                    });
                    $("#cmbCategoria_Trabajador").append(opciones);
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
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

    </script>
@endsection

