@extends('intranet/principal')

@section('content')
    <div id="pcont" class="container-fluid">
        <div class="page-head">
            <h2 style="display:inline-block;">Acceso a Fichas de Matricula</h2>
            <select class="form-control input-lg" id="cmbAnio"
                    style="width:140px;display:inline;font-size:20px;"></select>
            <select onchange="listarSecciones()" class="form-control input-lg" id="cmbTurno"
                    style="width:140px;display:inline;font-size:20px;"></select>
            <i id="loading" style="display:none;" class="fa fa-2x fa-spinner fa-spin"></i>
            <button class="btn btn-default pull-right btn-lg" onclick="agregarFicha()">Agregar Ficha</button>
        </div>
        <div class="cl-mcont">
            <div class="row">
                <div class="col-sm-3 col-md-3">
                    <div class="block">
                        <div class="header"><h2 style="font-weight: 500;">Secciones</h2></div>
                        <div class="content no-padding">
                            <ul id="dvSecciones" class="items">

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 col-md-9">
                    <div class="block">
                        <div class="header"><h2 style="font-weight: 500;">Alumnos</h2></div>
                        <div class="content">
                            <table class='table table-bordered dataTable no-footer' id="tblListado">
                                <thead>
                                <tr>
                                    <th>Alumno</th>
                                    <th>Dni</th>
                                    <th>PEM</th>
                                    <th style="width: 300px;">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="modFicha" class="md-modal colored-header primary md-effect-10" style="perspective: none;">
            <div class="md-content">
                <div class="modal-header"><h3>Agregar Acceso a Ficha de Matricula </h3>
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close">×</button>
                </div>
                <div class="modal-body form">
                    <form role="form" id="frmFicha_Matricula" method="post" data-parsley-validate=""
                          data-parsley-excluded="[disabled=disabled]" novalidate="">
                        <input type="hidden" id="hddCodigo" value="">
                        <input type="hidden" id="hddCodigo_Seccion" value="">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">PEM</label>
                            <div class="col-sm-3">
                                <input disabled="true" style="font-weight: 600;font-size: 16px;" type="text" id="txtPem" class="form-control" data-parsley-trigger="change" data-parsley-required="true">
                            </div>
                            <label class="col-sm-3 control-label">Dni del alumno</label>
                            <div class="col-sm-3">
                                <input style="font-weight: 600;font-size: 16px;" type="text" id="txtAlumno_Numero_Documento" class="form-control" data-parsley-trigger="change" data-parsley-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tipo</label>
                            <div class="col-sm-3">
                                <select class="form-control"  style="font-weight: 600;font-size: 16px;" id="cmbTipo_Matricula" data-parsley-trigger="change" data-parsley-required="true">
                                    <option value="N">NUEVO</option>
                                    <option value="P">PROMOVIDO</option>
                                    <option value="R">REINGRESANTE</option>
                                </select>
                            </div>
                            <label class="col-sm-3 control-label">Sección</label>
                            <div class="col-sm-3">
                                <select class="form-control"  style="font-weight: 600;font-size: 16px;" id="cmbSeccion" data-parsley-trigger="change" data-parsley-required="true">
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Paterno</label>
                            <div class="col-sm-10">
                                <input id="txtAlumno_Apellido_Paterno" style="font-weight: 600;font-size: 16px;" type="text" class="form-control" data-parsley-trigger="change" data-parsley-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Materno</label>
                            <div class="col-sm-10">
                                <input id="txtAlumno_Apellido_Materno" style="font-weight: 600;font-size: 16px;" type="text" class="form-control" data-parsley-trigger="change" data-parsley-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombres</label>
                            <div class="col-sm-10">
                                <input id="txtAlumno_Nombres" style="font-weight: 600;font-size: 16px;" type="text" class="form-control" data-parsley-trigger="change" data-parsley-required="true">
                            </div>
                        </div>
                    </form>
                    <a style="  font-weight: 400;font-size: 16px;" class="btn btn-default" onclick="asignar_pem()">Generar PEM</a>
                    <a id="btnGuardar" style="font-weight: 400;font-size: 16px;" class="btn btn-primary pull-right" onclick="guardar()">Registrar</a>
                </div>
            </div>
        </div>
        <div class="md-overlay"></div>
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
            $("#frmFicha_Matricula").parsley();
            //listarFichas();
            listarAnios();
            listarTurnos();
        });

        function agregarFicha(){
            $("#modFicha").niftyModal('show');
            asignar_pem();
            prueba();
        }

        function prueba(){
            $('#cmbSeccion option:eq(1)').prop('selected', true);
            $("#txtAlumno_Apellido_Paterno").val('Sánchez');
            $("#txtAlumno_Apellido_Materno").val('Ascorbe');
            $("#txtAlumno_Nombres").val('Oliver Sánchez');
            $("#txtAlumno_Numero_Documento").val('46041769');
        }

        function asignar_pem() {
            $("#txtPem").val(make_pem());
        }

        function make_pem() {
            var text = "";
            var possible = "A1B2C3DE4F6G5H7I8JKLMNP9QRSTUVWXYZ";

            for (var i = 0; i < 8; i++)
                text += possible.charAt(Math.floor(Math.random() * possible.length));

            return text;
        }

        function listarAnios() {
            $.ajax({
                url: "/intranet/mantenimientos/anio_lectivo/*",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    var opciones = "<option value=''>------</option>";
                    $.each(data, function (index, value) {
                        opciones += "<option value='" + value["id"] + "'>" + value["anio"] + "</option>";
                    });
                    $("#cmbAnio").append(opciones);
                },
                error: function (request, status, error) {
                    mostrar_error(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });
        }

        function listarFichas(seccion_id){
            $("#hddCodigo_Seccion").val(seccion_id);
            var info = [{
                "_token": "{{ csrf_token() }}",
                "seccion_id": parseInt(seccion_id)
            }][0];
            $.ajax({
                url: "/intranet/mantenimientos/ficha_matricula/listar",
                type: "GET",
                data: info,
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    t.clear().draw();
                    $.each(data, function (index, value) {
                        var habilitar_edicion="";
                        if(value["imprimir"])
                            habilitar_edicion="<button onclick=habilitarEdicionFicha("+value['id']+",'"+value['pem']+"','"+value['alumno_numero_documento']+"') class='btn btn-xs'><i class='fa fa-check'></i> Habilitar Edición</button>";

                        t.row.add([value['alumno_apellido_paterno']+' '+value['alumno_apellido_materno']+' '+value['alumno_nombres'],
                            value['alumno_numero_documento'],value['pem'],
                            "<button onclick=buscarFicha("+value['id']+") class='btn btn-xs'><i class='fa fa-search'></i></button>"+
                            "<button onclick=eliminarFicha("+value['id']+") class='btn btn-xs'><i class='fa fa-trash-o'></i></button>"+
                            "<button onclick=editarFicha("+value['id']+") class='btn btn-xs'><i class='fa fa-edit'></i></button>"+
                            "<button onclick=imprimirFicha("+value['id']+") class='btn btn-xs'><i class='fa fa-print'></i></button>"+
                                    habilitar_edicion+
                            "<button onclick=enviarSms_Ficha("+value['id']+") class='btn btn-xs'><i class='fa fa-mobile-phone'></i></button>"
                            , grupo_opciones(value['id'])]).draw(false);
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

        function listarSecciones() {
            var info = [{
                "_token": "{{ csrf_token() }}",
                "anio_lectivo_id": parseInt($("#cmbAnio").val()),
                "turno_id": parseInt($("#cmbTurno").val())
            }][0];
            $.ajax({
                url: "/intranet/mantenimientos/seccion/listar",
                type: "GET",
                data: info,
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    var elementos = "";
                    var opciones = "<option value=''>---------</option>";
                    $.each(data, function (index, value) {
                        var tutor = "";
                        if (value["trabajador_id"] != null)
                            tutor = value["trabajador"]["apellido_paterno"] + " " + value["trabajador"]["apellido_materno"] + " " + value["trabajador"]["nombres"];

                        elementos += "<li onclick='listarFichas("+value["id"]+")' style='cursor:pointer;'><i class='fa fa-file-text'></i>"+value['grado']['nivel']['abreviatura']+'-'+ value['grado']['numero']  + value['letra']+"<small style='color: blue;font-weight: 500;'>Tutor : "+tutor+"</small> </li>";
                        opciones += "<option value='"+value["id"]+"'>"+value['grado']['nivel']['abreviatura']+'-'+ value['grado']['numero']  + value['letra']+"</option>";
                    });
                    $("#cmbSeccion").empty();
                    $("#cmbSeccion").append(opciones);
                    $("#dvSecciones").html(elementos);
                },
                error: function (request, status, error) {
                    mostrar_error(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
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
                    var opciones = "<option value=''>------</option>";
                    $.each(data, function (index, value) {
                        opciones += "<option value='" + value["id"] + "'>" + value["nombre"] + "</option>";
                    });
                    $("#cmbTurno").append(opciones);
                },
                error: function (request, status, error) {
                    mostrar_error(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });
        }

        function guardar() {
            var accion = $("#hddCodigo").val() == "" ? true : false;
            if ($("#frmFicha_Matricula").parsley().validate()) {
                if (accion)
                    registrarFicha()
                else
                    modificarFicha()
            }

        }

        function obtenerDatos() {
            var info = [{
                "_token": "{{ csrf_token() }}",
                "tipo_matricula": $("#cmbTipo_Matricula").val(),
                "alumno_tipo_documento_id": 1, //DNI
                "alumno_numero_documento": $("#txtAlumno_Numero_Documento").val(),
                "alumno_apellido_paterno": $("#txtAlumno_Apellido_Paterno").val(),
                "alumno_apellido_materno": $("#txtAlumno_Apellido_Materno").val(),
                "alumno_nombres": $("#txtAlumno_Nombres").val(),
                "pem": $("#txtPem").val(),
                "seccion_id" : $("#cmbSeccion").val(),
            }][0];
            return info;
        }

        function registrarFicha() {
            if (confirm("¿Deseas continuar el registro?")) {
                var info = obtenerDatos();
                $.ajax({
                    url: "/intranet/mantenimientos/ficha_matricula",
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

        function modificarFicha() {
            if (confirm("¿Deseas continuar la modificación?")) {
                var info = obtenerDatos();
                $.ajax({
                    url: "/intranet/mantenimientos/ficha_matricula/" + $("#hddCodigo").val(),
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

        function habilitarEdicionFicha(id,pem,alumno_numero_documento) {
            if (confirm("¿Deseas habilitar el documento para edición?")) {
                var info = [{"_token": "{{ csrf_token() }}",
                    "id" : id,
                    "pem": pem,
                    "alumno_numero_documento": alumno_numero_documento
                }][0];
                $.ajax({
                    url: "/intranet/mantenimientos/ficha_matricula/habilitar_edicion",
                    type: "GET",
                    data: info,
                    beforeSend: function () {
                        $("#loading").show();
                    },
                    success: function (data) {
                        $("#modMsje").modal('show');
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

        function eliminarFicha(id) {
            if (confirm("¿Deseas eliminar el elemento?")) {
                var info = [{"_token": "{{ csrf_token() }}"}][0];
                $.ajax({
                    url: "/intranet/mantenimientos/ficha_matricula/" + id,
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

        function editarFicha(id) {
            $.ajax({
                url: "/intranet/mantenimientos/ficha_matricula/" + id,
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    $("#hddCodigo").val(id);
                    $("#txtNombre").val(data["nombre"]);
                    $("#btnGuardar").text("Guardar");
                    $('a[href="#tp2"]').click();
                    $('a[href="#tp2"]').text("Modificando : " + data["nombre"]);
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
            listarFichas($("#hddCodigo_Seccion").val());
            $("#hddCodigo").val("");
            $("#cmbTipo_Matricula").val("N");
            $("#txtAlumno_Apellido_Paterno").val("");
            $("#txtAlumno_Apellido_Materno").val("");
            $("#txtAlumno_Nombres").val("");
            $("#txtAlumno_Numero_Documento").val("");
            asignar_pem();
            $("#btnGuardar").text("Registrar");
            $('#frmFicha_Matricula').parsley().reset();
            asignar_pem();

        }
    </script>
@endsection

