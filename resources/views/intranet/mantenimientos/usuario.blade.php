@extends('intranet/principal')

@section('content')
    <div id="pcont" class="container-fluid">
        <div class="page-head">
            <h2 style="display:inline-block;">Usuarios</h2>
            <i id="loading" style="display:none;" class="fa fa-2x fa-spinner fa-spin"></i>
            <select class="input-lg" id="cmbAnio">
            </select>
            <select class="input-lg" id="cmbTipo" onchange="listar()">
                <option value="">--</option>
                <option value="TR">TRABAJADORES</option>
                <option value="AL">ALUMNOS</option>
                <option value="PA">PADRES</option>
            </select>
            <button class="btn btn-default" onclick="listar()"><i class="fa fa-refresh"></i> Listar</button>
        </div>
        <div class="cl-mcont">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="tab-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tp1" data-toggle="tab">Mantenimientos</a></li>
                            <li><a href="#tp2" data-toggle="tab">Registrar</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tp1" class="tab-pane active cont">
                                <table class='table table-bordered dataTable no-footer' id="tblListado">
                                    <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Apellidos y Nombres</th>
                                        <th style="width: 120px;">Cambio de Clave</th>
                                        <th style="width: 80px;">Activo</th>
                                        <th style="width: 250px;">Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div id="tp2" class="tab-pane cont">
                                <div class="container">
                                    <form id="frmUsuario" method="post" data-parsley-validate="" data-parsley-excluded="[disabled=disabled]" novalidate="">
                                        <input type="hidden" id="hddCodigo" value="">
                                        <input type="hidden" id="hddCodigo_Persona" value="">
                                        <div class="row">
                                            <label for="txtPersona" class="col-md-1 control-label">Persona</label>
                                            <div class="col-md-6">
                                                <input id="txtPersona" type="text" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="txtAlias" class="col-md-1 control-label">Alias</label>
                                            <div class="col-md-6">
                                                <input id="txtAlias" type="text" placeholder="Ejem. Dni, A0001, etc" class="form-control"
                                                       data-parsley-trigger="change" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="txtClave1" class="col-md-1 control-label">Clave</label>
                                            <div class="col-md-4">
                                                <input id="txtClave1" type="password" placeholder="" class="form-control"
                                                       data-parsley-trigger="change" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="txtClave2" class="col-md-1 control-label">Repite</label>
                                            <div class="col-md-4">
                                                <input id="txtClave2" type="password" placeholder="" class="form-control"
                                                       data-parsley-trigger="change" data-parsley-required="true" data-parsley-equalto="#txtClave1">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="chkCambia_Clave" class="col-sm-4 control-label">Cambia la clave cuando inicie sesión
                                                <input id="chkCambia_Clave" class="icheck" type="checkbox" >
                                            </label>
                                            <label for="chkActivo" class="col-sm-4 control-label">Activo
                                                <input id="chkActivo" class="icheck" type="checkbox" >
                                            </label>
                                        </div>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button id="btnGuardar" class="btn btn-primary" onclick="guardar()" disabled>Registrar</button>
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
            $("#frmUsuario").parsley();
            listarAnios();
        });

        function listar(){
            var opcion = $("#cmbTipo").val();
            switch(opcion){
                case "TR": listarTrabajadores(); break;
                case "AL": listarTrabajadores(); break;
                case "PA": listarTrabajadores(); break;
            }
        }

        function listarTrabajadores(){
            var info = [{"_token": "{{ csrf_token() }}"}][0];
            $.ajax({
                url: "/intranet/mantenimientos/trabajador/listar_usuarios",
                type: "GET",
                data: info,
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    t.clear().draw();
                    $.each(data,function( index, value ) {
                        var alias= "";
                        var boton_editar = "<button style='padding: 0px;margin-left: 15px;' class='btn btn-link' onclick='editar("+value["id"]+")'><i class='fa fa-edit'></i>Editar</button>";
                        var boton_eliminar = "";
                        var boton_clave = "";
                        var cambia_clave=false;
                        var activo=false;
                        if(value["user_info_id"] != null){
                            alias = value["user_info"]["user"]["email"];
                            boton_clave = "<button style='padding: 0px;margin-left: 15px;' class='btn btn-link' onclick='cambiar_clave("+value["id"]+")'><i class='fa fa-refresh'></i>Cambiar Clave</button>";
                            boton_eliminar = "<button style='padding: 0px;margin-left: 15px;' class='btn btn-link' onclick='eliminar("+value["user_info_id"]+")'><i class='fa fa-trash'></i>Eliminar</button>";
                            cambia_clave= value["user_info"]['cambia_clave'];
                            activo = value["user_info"]['activo'];
                        }
                        var nodo = t.row.add([alias,value["apellido_paterno"]+" "+value["apellido_materno"]+" "+value["nombres"],
                            "<input type='checkbox' "+( cambia_clave == true ? "checked" : "")+" disabled>",
                            "<input type='checkbox' "+( activo == true ? "checked" : "")+" disabled>",boton_editar+boton_clave+boton_eliminar,
                            ]).draw(false).node();

                        if (activo == false && value["user_info_id"] != null)
                            $(nodo).addClass('danger');
                        else if(activo == true && value["user_info_id"] != null)
                            $(nodo).addClass('success');
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

        function guardar(){
            var accion = $("#hddCodigo").val() == "" ? true : false;
            if($("#frmUsuario").parsley().validate()){
                if (accion)
                    registrar()
                else
                    modificar()
            }
        }

        function obtenerDatos(){
            var info = [{"_token": "{{ csrf_token() }}",
                "persona_id" : $("#hddCodigo_Persona").val(),
                "id" : $("#hddCodigo").val(),
                "tipo" : $("#cmbTipo").val(),
                "alias": $("#txtAlias").val(),
                "clave1": $("#txtClave1").val(),
                "clave2": $("#txtClave2").val(),
                "cambia_clave": $("#chkCambia_Clave").is(":checked"),
                "activo": $("#chkActivo").is(":checked")}][0];
            return info;
        }

        function registrar() {
            if (confirm("¿Deseas continuar el registro?")) {
                var info = obtenerDatos();
                $.ajax({
                    url: "/intranet/mantenimientos/user_info",
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
                    url: "/intranet/mantenimientos/user_info/" + $("#hddCodigo").val(),
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
                    url: "/intranet/mantenimientos/user_info/" + id,
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
            var opcion = $("#cmbTipo").val();
            var url = "";
            switch(opcion){
                case "TR": url="trabajador"; break;
                case "AL": url="alumno"; break;
            }
            $.ajax({
                url: "/intranet/mantenimientos/"+url+"/" + id,
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    var user_info = data["user_info"];
                    $("#hddCodigo_Persona").val(data["id"]);
                    $("#hddCodigo").val(null);
                    $("#txtPersona").val(data["apellido_paterno"]+" "+data["apellido_materno"]+" "+data["nombres"]);
                    $("#btnGuardar").prop('disabled',false);
                    if(user_info != null){
                        $("#hddCodigo").val(data["user_info_id"]);
                        $("#txtAlias").val(user_info["user"]["email"]);
                        $("#chkCambia_Clave").iCheck(user_info["cambia_clave"] == true ? "check" : "uncheck" );
                        $("#chkActivo").iCheck(user_info["activo"] == true ? "check" : "uncheck" );
                        $("#txtClave1").attr('disabled','disabled');
                        $("#txtClave2").attr('disabled','disabled');
                        $('a[href="#tp2"]').text("Modificando : "+data["apellido_paterno"]+" "+data["apellido_materno"]+" "+data["nombres"]);
                    }else{
                        var alias = data["nombres"].substr(0,1)+data["apellido_paterno"];
                        alias = alias.replace(/\s/g, "").toLowerCase();
                        $("#txtAlias").val(alias);
                        $("#chkCambia_Clave").iCheck("uncheck");
                        $("#chkActivo").iCheck("uncheck");
                        $("#txtClave1").prop('disabled',false);
                        $("#txtClave2").prop('disabled',false);
                        $('a[href="#tp2"]').text("Registrar");
                    }
                    $("#btnGuardar").text("Guardar");
                    $('a[href="#tp2"]').click();
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
            $("#hddCodigo_Persona").val("");
            $("#txtPersona").val("");
            $("#txtNombre").val("");
            $("#txtClave1").val("");
            $("#txtClave2").val("");
            $("#txtClave1").prop("disabled",false);
            $("#txtClave2").prop("disabled",false);
            $("#chkCambia_Clave").iCheck("uncheck");
            $("#chkActivo").iCheck("uncheck");
            $("#btnGuardar").text("Registrar");
            $('#frmUsuario').parsley().reset();
            $('a[href="#tp1"]').click();
            $('a[href="#tp2"]').text("Registrar");
            listar();
            $("#btnGuardar").prop("disabled",true);
        }

        function listarAnios() {
            $.ajax({
                url: "/intranet/mantenimientos/anio_lectivo/*",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    var opciones = "<option value=''>---</opcion>";
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
                }
            });
        }
    </script>
@endsection

