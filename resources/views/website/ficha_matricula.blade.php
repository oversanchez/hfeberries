@extends('website.contenido')

@section('styles')
    <link rel="stylesheet" href="http://parsleyjs.org/src/parsley.css">
    <style>
        .control-label {
            margin-top: 8px;
        }

        .form-control {
            text-transform: uppercase;
        }

        h2 {
            font-size: 26px;
            border-radius: 10px 0px 10px 0px;
            padding: 0px 5px 8px 10px;
            background-color: #675c26;
            color: white;
        }
    </style>

@endsection
@section('body')
    <div class="post_section" style="background-color: white;padding: 15px 0 35px;margin-top:10px;">
        <div class="container">
            <div class="row">
                <div id="dvFicha" class="col-md-12" style="display:none;">
                    <div class="block-flat"
                         style="background-color: #f1f1f1;margin: 0px 30px 30px 30px;padding: 20px 30px 10px 30px;border: solid thin #d4cdcd;border-radius: 10px;">
                        <div class="header" style="background: transparent;text-align: center;">
                            <img src="/royal/img/matricula_online2.png" alt="" style='width: 70%;'>
                        </div>
                        <div class="content"
                             style="background-color: white;margin-top: 10px;padding: 10px 30px 30px 30px;border-radius: 10px;border: solid thin #e0d8b1;box-shadow: 10px 10px 15px #888888;">
                            <form id="frmFicha" role="form" data-parsley-excluded=":hidden">
                                <div class="row">
                                    <h2>1. Datos del Alumno</h2>
                                    <input type="hidden" id="hddId" value="">
                                    <input type="hidden" id="hddPem" value="">
                                    <hr style="margin-top: 5px;">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Tipo de Documento</label>
                                            <div class="col-sm-4">
                                                <select id="cmbAlumno_Tipo_Documento" class="form-control  input-sm"
                                                        data-parsley-trigger="change" data-parsley-required="true">
                                                </select>
                                            </div>
                                            <label class="col-sm-2 control-label">Nro de Documento</label>
                                            <div class="col-sm-4">
                                                <input maxlength="15" disabled=true type="text" id="txtAlumno_Numero_Documento"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-minlength="8"
                                                       data-parsley-maxlength="15"
                                                       data-parsley-minlength-message="Faltan digitos"
                                                       data-toggle="tooltip" title="Ejem. 46041769">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Apellido Paterno</label>
                                            <div class="col-sm-4">
                                                <input maxlength="40" type="text" id="txtAlumno_Apellido_Paterno"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-minlength="2"
                                                       data-parsley-maxlength="50" data-toggle="tooltip"
                                                       title="Ejem. SÁNCHEZ">
                                            </div>
                                            <label class="col-sm-2 control-label">Apellido Materno</label>
                                            <div class="col-sm-4">
                                                <input maxlength="40" type="text" id="txtAlumno_Apellido_Materno"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-minlength="2"
                                                       data-parsley-maxlength="50" data-toggle="tooltip"
                                                       title="Ejem. ASCORBE">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Nombre completo</label>
                                            <div class="col-sm-10">
                                                <input maxlength="40" type="text" id="txtAlumno_Nombres" class="form-control  input-sm"
                                                       data-parsley-trigger="change" data-parsley-required="true"
                                                       data-parsley-minlength="2" data-parsley-maxlength="50"
                                                       data-toggle="tooltip" title="Ejem. OLIVER ADRIÁN">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Fecha de Nacimiento.</label>
                                            <div class="col-sm-4">
                                                <input type="date" id="txtAlumno_Fecha_Nacimiento"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-minlength="10"
                                                       data-parsley-maxlength="10" data-toggle="tooltip"
                                                       title="Ejem. 26/07/1989">
                                            </div>
                                            <label class="col-sm-2 control-label">Sexo</label>
                                            <div class="col-sm-4">
                                                <select id="cmbAlumno_Sexo" class="form-control  input-sm"
                                                        data-parsley-trigger="change" data-parsley-required="true">
                                                    <option value="M">MASCULINO</option>
                                                    <option value="F">FEMENINO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-sm-3 control-label">Direccion</label>
                                            <div class="col-sm-9">
                                                <input maxlength="70" type="text" id="txtAlumno_Direccion"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-maxlength="200"
                                                       data-toggle="tooltip"
                                                       title="Ejem. AV. AUGUSTO B. LEGUIA 1333 URB. SAN LORENZO">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 control-label">Telefono Casa</label>
                                            <div class="col-sm-4">
                                                <input maxlength="9" type="text" id="txtAlumno_Telf_Fijo"
                                                       class="form-control  input-sm" data-toggle="tooltip"
                                                       title="Ejem. 254276">
                                            </div>
                                            <label class="col-sm-5 control-label"><input id="chkAlumno_Padres_Juntos"
                                                                                         type="checkbox" checked> Padres
                                                viven juntos</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 control-label">Colegio de Procedencia</label>
                                            <div class="col-sm-9">
                                                <input maxlength="50" type="text" id="txtAlumno_Colegio_Procedencia"
                                                       class="form-control  input-sm" data-toggle="tooltip"
                                                       title="Ejem. NUESTRA SEÑORA DEL ROSARIO, DE NO CONTAR CON UNO COMPLETAR CON : --">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 control-label">Selecciona el Apoderado</label>
                                            <div class="col-sm-9" style="margin-top: 15px;">
                                                <label style="cursor:pointer;" class="radio-inline">
                                                    <input style='display: initial;width: 20px;height: 20px;margin-top: 0px;'
                                                           type="radio" value="P" name="rndApoderado" checked> Padre
                                                </label>
                                                <label style="cursor:pointer;" class="radio-inline">
                                                    <input style='display: initial;width: 20px;height: 20px;margin-top: 0px;'
                                                           type="radio" value="M" name="rndApoderado"> Madre
                                                </label>
                                                <label style="cursor:pointer;" class="radio-inline">
                                                    <input style='display: initial;width: 20px;height: 20px;margin-top: 0px;'
                                                           type="radio" value="O" name="rndApoderado"> Otro
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row" style="margin-top: 30px;">
                                    <h2>2. Datos del Padre</h2>
                                    <hr style="margin-top: 5px;">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Tipo de Documento</label>
                                            <div class="col-sm-4">
                                                <select id="cmbPadre_Tipo_Documento" class="form-control  input-sm"
                                                        data-parsley-trigger="change" data-parsley-required="true">

                                                </select>
                                            </div>
                                            <label class="col-sm-2 control-label">Nro de Documento</label>
                                            <div class="col-sm-4">
                                                <input maxlength="15" type="text" id="txtPadre_Numero_Documento"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-minlength="8"
                                                       data-parsley-maxlength="15"
                                                       data-parsley-minlength-message="Faltan digitos"
                                                       data-toggle="tooltip" title="Ejem. 46041769">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Apellido Paterno</label>
                                            <div class="col-sm-4">
                                                <input maxlength="40" type="text" id="txtPadre_Apellido_Paterno"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-minlength="2"
                                                       data-parsley-maxlength="50" data-toggle="tooltip"
                                                       title="Ejem. SÁNCHEZ">
                                            </div>
                                            <label class="col-sm-2 control-label">Apellido Materno</label>
                                            <div class="col-sm-4">
                                                <input maxlength="40" type="text" id="txtPadre_Apellido_Materno"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-minlength="2"
                                                       data-parsley-maxlength="50" data-toggle="tooltip"
                                                       title="Ejem. ASCORBE">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Nombres completos</label>
                                            <div class="col-sm-10">
                                                <input maxlength="40" type="text" id="txtPadre_Nombres" class="form-control  input-sm"
                                                       data-parsley-trigger="change" data-parsley-required="true"
                                                       data-parsley-minlength="2" data-parsley-maxlength="50"
                                                       data-toggle="tooltip" title="Ejem. OLIVER ADRIÁN">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label" data-toggle="tooltip" title="Fecha de Nacimiento">Fecha de Nac.</label>
                                            <div class="col-sm-4">
                                                <input type="date" id="txtPadre_Fecha_Nacimiento"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-minlength="10"
                                                       data-parsley-maxlength="10" data-toggle="tooltip"
                                                       title="Ejem. 26/07/1989">
                                            </div>
                                            <label class="col-sm-2 control-label">Sexo</label>
                                            <div class="col-sm-4">
                                                <select id="cmbPadre_Sexo" class="form-control  input-sm"
                                                        data-parsley-trigger="change" data-parsley-required="true">
                                                    <option value="M">MASCULINO</option>
                                                    <option value="F">FEMENINO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Direccion</label>
                                            <div class="col-sm-10">
                                                <input maxlength="70" type="text" id="txtPadre_Direccion"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-maxlength="200"
                                                       data-toggle="tooltip"
                                                       title="Ejem. AV. AUGUSTO B. LEGUIA 1333 URB. SAN LORENZO">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Correo Electrónico</label>
                                            <div class="col-sm-10">
                                                <input maxlength="50" type="email" id="txtPadre_Email"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-maxlength="100"
                                                       data-toggle="tooltip" title="Ejem. oliver.sanchez.a@gmail.com" style="text-transform: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Celular Personal</label>
                                            <div class="col-sm-4">
                                                <input maxlength="12" type="text" id="txtPadre_Telf_Movil"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-maxlength="9"
                                                       data-toggle="tooltip" title="Ejem. 968644416">
                                            </div>
                                            <label class="col-sm-6 control-label"><input id="chkPadre_Vive_Educando"
                                                                                         type="checkbox" checked> Vive
                                                con el estudiante</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Estado Civil</label>
                                            <div class="col-sm-10">
                                                <select id="cmbPadre_Estado_Civil" class="form-control  input-sm"
                                                        data-parsley-trigger="change" data-parsley-required="true">
                                                    <option value=''>----</option>
                                                    <option value='S'>SOLTERO(A)</option>
                                                    <option value='C'>CASADO(A)</option>
                                                    <option value='V'>VIUDO(A)</option>
                                                    <option value='D'>DIVORCIADO(A)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Nivel Educativo</label>
                                            <div class="col-sm-10">
                                                <select id="cmbPadre_Nivel_Educativo" class="form-control  input-sm"
                                                        data-parsley-trigger="change" data-parsley-required="true">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label" data-toggle="tooltip"
                                                   title="Profesión u Ocupación">Profesión u Ocup.</label>
                                            <div class="col-sm-10">
                                                <input maxlength="50" type="text" id="txtPadre_Ocupacion"
                                                       class="form-control  input-sm" data-toggle="tooltip"
                                                       title="Ejem. PROGRAMADOR">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label" data-toggle="tooltip"
                                                   title="Lugar de Trabajo">Lugar de Trab.</label>
                                            <div class="col-sm-10">
                                                <input maxlength="50" type="text" id="txtPadre_Lugar_Trabajo"
                                                       class="form-control  input-sm">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Cargo</label>
                                            <div class="col-sm-10">
                                                <input maxlength="50" type="text" id="txtPadre_Cargo" class="form-control  input-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 30px;">
                                    <h2>2. Datos del Madre</h2>
                                    <hr style="margin-top: 5px;">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Tipo de Documento</label>
                                            <div class="col-sm-4">
                                                <select id="cmbMadre_Tipo_Documento" class="form-control  input-sm"
                                                        data-parsley-trigger="change" data-parsley-required="true">

                                                </select>
                                            </div>
                                            <label class="col-sm-2 control-label">Nro de Documento</label>
                                            <div class="col-sm-4">
                                                <input maxlength="15" type="text" id="txtMadre_Numero_Documento"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-minlength="8"
                                                       data-parsley-maxlength="15"
                                                       data-parsley-minlength-message="Faltan digitos"
                                                       data-toggle="tooltip" title="Ejem. 46041769">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Apellido Paterno</label>
                                            <div class="col-sm-4">
                                                <input maxlength="40" type="text" id="txtMadre_Apellido_Paterno"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-minlength="2"
                                                       data-parsley-maxlength="50" data-toggle="tooltip"
                                                       title="Ejem. SÁNCHEZ">
                                            </div>
                                            <label class="col-sm-2 control-label">Apellido Materno</label>
                                            <div class="col-sm-4">
                                                <input maxlength="40" type="text" id="txtMadre_Apellido_Materno"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-minlength="2"
                                                       data-parsley-maxlength="50" data-toggle="tooltip"
                                                       title="Ejem. ASCORBE">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Nombres completos</label>
                                            <div class="col-sm-10">
                                                <input maxlength="40" type="text" id="txtMadre_Nombres" class="form-control  input-sm"
                                                       data-parsley-trigger="change" data-parsley-required="true"
                                                       data-parsley-minlength="2" data-parsley-maxlength="50"
                                                       data-toggle="tooltip" title="Ejem. OLIVER ADRIÁN">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label" data-toggle="tooltip" title="Fecha de Nacimiento">Fecha de Nac.</label>
                                            <div class="col-sm-4">
                                                <input type="date" id="txtMadre_Fecha_Nacimiento"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-minlength="10"
                                                       data-parsley-maxlength="10" data-toggle="tooltip"
                                                       title="Ejem. 26/07/1989">
                                            </div>
                                            <label class="col-sm-2 control-label">Sexo</label>
                                            <div class="col-sm-4">
                                                <select id="cmbMadre_Sexo" class="form-control  input-sm"
                                                        data-parsley-trigger="change" data-parsley-required="true">
                                                    <option value="M">MASCULINO</option>
                                                    <option value="F">FEMENINO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Direccion</label>
                                            <div class="col-sm-10">
                                                <input maxlength="70" type="text" id="txtMadre_Direccion"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-maxlength="200"
                                                       data-toggle="tooltip"
                                                       title="Ejem. AV. AUGUSTO B. LEGUIA 1333 URB. SAN LORENZO">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Correo Electrónico</label>
                                            <div class="col-sm-10">
                                                <input maxlength="50" type="email" id="txtMadre_Email"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-maxlength="100"
                                                       data-toggle="tooltip" title="Ejem. oliver.sanchez.a@gmail.com" style="text-transform: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Celular Personal</label>
                                            <div class="col-sm-4">
                                                <input maxlength="12" type="text" id="txtMadre_Telf_Movil"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-maxlength="9"
                                                       data-toggle="tooltip" title="Ejem. 968644416">
                                            </div>
                                            <label class="col-sm-6 control-label"><input id="chkMadre_Vive_Educando"
                                                                                         type="checkbox" checked> Vive
                                                con el estudiante</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Estado Civil</label>
                                            <div class="col-sm-10">
                                                <select id="cmbMadre_Estado_Civil" class="form-control  input-sm"
                                                        data-parsley-trigger="change" data-parsley-required="true">
                                                    <option value=''>----</option>
                                                    <option value='S'>SOLTERO(A)</option>
                                                    <option value='C'>CASADO(A)</option>
                                                    <option value='V'>VIUDO(A)</option>
                                                    <option value='D'>DIVORCIADO(A)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Nivel Educativo</label>
                                            <div class="col-sm-10">
                                                <select id="cmbMadre_Nivel_Educativo" class="form-control  input-sm"
                                                        data-parsley-trigger="change" data-parsley-required="true">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label" data-toggle="tooltip"
                                                   title="Profesión u Ocupación">Profesión u Ocup.</label>
                                            <div class="col-sm-10">
                                                <input maxlength="50" type="text" id="txtMadre_Ocupacion"
                                                       class="form-control  input-sm" data-toggle="tooltip"
                                                       title="Ejem. PROGRAMADOR">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label" data-toggle="tooltip"
                                                   title="Lugar de Trabajo">Lugar de Trab.</label>
                                            <div class="col-sm-10">
                                                <input maxlength="50" type="text" id="txtMadre_Lugar_Trabajo"
                                                       class="form-control  input-sm">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Cargo</label>
                                            <div class="col-sm-10">
                                                <input maxlength="50" type="text" id="txtMadre_Cargo" class="form-control  input-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="dvApoderado" style="margin-top: 30px;display:none;">
                                    <h2>4. Datos del Apoderado</h2>
                                    <hr style="margin-top: 5px;">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Tipo de Documento</label>
                                            <div class="col-sm-4">
                                                <select id="cmbApoderado_Tipo_Documento" class="form-control  input-sm"
                                                        data-parsley-trigger="change" data-parsley-required="true">

                                                </select>
                                            </div>
                                            <label class="col-sm-2 control-label">Nro de Documento</label>
                                            <div class="col-sm-4">
                                                <input maxlength="15" type="text" id="txtApoderado_Numero_Documento"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-minlength="8"
                                                       data-parsley-maxlength="15"
                                                       data-parsley-minlength-message="Faltan digitos"
                                                       data-toggle="tooltip" title="Ejem. 46041769">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Apellido Paterno</label>
                                            <div class="col-sm-4">
                                                <input maxlength="40" type="text" id="txtApoderado_Apellido_Paterno"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-minlength="2"
                                                       data-parsley-maxlength="50" data-toggle="tooltip"
                                                       title="Ejem. SÁNCHEZ">
                                            </div>
                                            <label class="col-sm-2 control-label">Apellido Materno</label>
                                            <div class="col-sm-4">
                                                <input maxlength="40" type="text" id="txtApoderado_Apellido_Materno"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-minlength="2"
                                                       data-parsley-maxlength="50" data-toggle="tooltip"
                                                       title="Ejem. ASCORBE">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Nombres</label>
                                            <div class="col-sm-10">
                                                <input maxlength="40" type="text" id="txtApoderado_Nombres"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-trigger="change" data-parsley-required="true"
                                                       data-parsley-minlength="2" data-parsley-maxlength="50"
                                                       data-toggle="tooltip" title="Ejem. OLIVER ADRIÁN">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Fecha de Nacimiento.</label>
                                            <div class="col-sm-4">
                                                <input type="date" id="txtApoderado_Fecha_Nacimiento"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-minlength="10"
                                                       data-parsley-maxlength="10" data-toggle="tooltip"
                                                       title="Ejem. 26/07/1989">
                                            </div>
                                            <label class="col-sm-2 control-label">Sexo</label>
                                            <div class="col-sm-4">
                                                <select id="cmbApoderado_Sexo" class="form-control  input-sm"
                                                        data-parsley-trigger="change" data-parsley-required="true">
                                                    <option value="M">MASCULINO</option>
                                                    <option value="F">FEMENINO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Direccion</label>
                                            <div class="col-sm-10">
                                                <input maxlength="70" type="text" id="txtApoderado_Direccion"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-maxlength="200"
                                                       data-toggle="tooltip"
                                                       title="Ejem. AV. AUGUSTO B. LEGUIA 1333 URB. SAN LORENZO">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Correo Electrónico</label>
                                            <div class="col-sm-10">
                                                <input maxlength="50" type="email" id="txtApoderado_Email"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-maxlength="100"
                                                       data-toggle="tooltip" title="Ejem. oliver.sanchez.a@gmail.com" style="text-transform: none;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Celular Personal</label>
                                            <div class="col-sm-4">
                                                <input maxlength="12" type="text" id="txtApoderado_Telf_Movil"
                                                       class="form-control  input-sm" data-parsley-trigger="change"
                                                       data-parsley-required="true" data-parsley-maxlength="9"
                                                       data-toggle="tooltip" title="Ejem. 968644416">
                                            </div>
                                            <label class="col-sm-6 control-label"><input id="chkApoderado_Vive_Educando"
                                                                                         type="checkbox" checked> Vive
                                                con el estudiante</label>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Parentesco</label>
                                            <div class="col-sm-4">
                                                <select id="cmbApoderado_Parentesco" class="form-control  input-sm"
                                                        data-parsley-trigger="change" data-parsley-required="true">
                                                </select>
                                            </div>
                                            <label class="col-sm-2 control-label">Estado Civil</label>
                                            <div class="col-sm-4">
                                                <select id="cmbApoderado_Estado_Civil" class="form-control  input-sm"
                                                        data-parsley-trigger="change" data-parsley-required="true">
                                                    <option value=''>----</option>
                                                    <option value='S'>SOLTERO(A)</option>
                                                    <option value='C'>CASADO(A)</option>
                                                    <option value='V'>VIUDO(A)</option>
                                                    <option value='D'>DIVORCIADO(A)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Nivel Educativo</label>
                                            <div class="col-sm-10">
                                                <select id="cmbApoderado_Nivel_Educativo" class="form-control  input-sm"
                                                        data-parsley-trigger="change" data-parsley-required="true">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label" data-toggle="tooltip"
                                                   title="Profesión u Ocupación">Profesión u Ocup.</label>
                                            <div class="col-sm-10">
                                                <input maxlength="50" type="text" id="txtApoderado_Ocupacion"
                                                       class="form-control  input-sm" data-toggle="tooltip"
                                                       title="Ejem. PROGRAMADOR">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label" data-toggle="tooltip"
                                                   title="Lugar de Trabajo">Lugar de Trab.</label>
                                            <div class="col-sm-10">
                                                <input maxlength="50" type="text" id="txtApoderado_Lugar_Trabajo"
                                                       class="form-control  input-sm">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">Cargo</label>
                                            <div class="col-sm-10">
                                                <input maxlength="50" type="text" id="txtApoderado_Cargo" class="form-control  input-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-sm-12" style='text-align:center;margin-top:15px;'>
                                <button onclick="cancelar()" type="button" class="btn btn-default" style="float:right;font-size:18px;"><i class="fa fa-chevron-right"></i> Volver a Login</button>
                                <button onclick="finalizar()" type="button" class="btn btn-success" style="float:right;font-size:18px;" data-toggle="tooltip" data-html="true" title="Haz click para finalizar,<br> Recuerda: después no se podrán volver a editar los datos">Finalizar</button>
                                <button onclick="guardar()" type="button" class="btn btn-primary" style="font-size:18px;" data-toggle="tooltip" title="Haz click para guardar tu avance">Guardar datos</button>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="dvLogin" class="col-md-offset-3 col-md-6">
                    <div class="block-flat"
                         style="margin: 30px;padding: 30px;border:solid 1.4px #ace0f8; border-radius: 15px;background-image: url(/royal/img/sun2.jpg); background-repeat: round;    background-size: cover;box-shadow: 10px 10px 5px #888888;">
                        <div class="header" style="background: transparent;">
                            <img src="/royal/img/persona_ficha.png"
                                 style="width: 100px;height: 107px;margin-top: -73px;">
                            <h2 style="text-align: center;width: 300px;display: inline-block;">INGRESA TUS DATOS PARA
                                EMPEZAR</h2></div>
                        <div class="content" style="margin-top:10px;">
                            <form id="frmLogin" role="form">
                                <div class="form-group">
                                    <label>INGRESA DNI DEL ALUMNO</label>
                                    <input id="txtPersona_Numero_Documento" type="text"
                                           class="form-control" style="font-size: 25px;" data-parsley-trigger="change"
                                           data-parsley-required="true" data-parsley-minlength="8"
                                           data-parsley-maxlength="15" data-parsley-minlength-message="Faltan digitos">
                                </div>
                                <div class="form-group">
                                    <label>INGRESA PEM <code>(Sino posee este codigo, solicitelo en el
                                            colegio)</code></label>
                                    <input id="txtPem" type="text" class="form-control"
                                           style="text-transform: uppercase;font-size: 25px;"
                                           data-parsley-trigger="change"
                                           data-parsley-required="true" data-parsley-minlength-message="Faltan digitos">
                                </div>
                                <button onclick="buscarFicha()" type="button" class="btn btn-primary btn-block"
                                        style="font-size:18px;">CLICK PARA CONTINUAR
                                </button>
                            </form>
                        </div>
                    </div>
                </div><!--end post_left-->

                <div id="dvImprimir" class="col-md-12" style="display:none;">
                    <div class="block-flat" style="background-color: #f1f1f1;margin: 0px 30px 30px 30px;padding: 20px 30px 10px 30px;border: solid thin #d4cdcd;border-radius: 10px;">
                        <div class="header" style="background: transparent;text-align: center;">
                            <div class="row">
                                <div class="col-xs-12">
                                    <h1><img src="/royal/img/persona_ficha.png" style="width: 100px;height: 107px;margin-top: 0px;">
                                        Ahora puedes imprimir tus datos o descargarlos
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="content" style="text-align: center;background-color: white;margin-top: 10px;padding: 10px 30px 30px 30px;border-radius: 10px;border: solid thin #e0d8b1;box-shadow: 10px 10px 15px #888888;">
                            <button onclick="cancelar()" class="btn btn-default btn-lg pull-right"><i class="fa fa-chevron-right"></i><br> Volver a Login</button>
                            <button onclick="imprimir()" class="btn btn-success btn-lg"><i class="fa fa-print"></i><br>Imprimir</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="msg_error"></div>

    <div id="modMsje" tabindex="-1" role="dialog" class="modal fade in" style="display: none;" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <table style="width:100%;">
                            <tr>
                                <td><img src="/royal/img/persona_ficha.png" style="width: 100px;height: 107px;"></td>
                                <td style="text-align: left;">
                                    <h3>Todo Correcto!</h3>
                                    <p style="font-size: 17px;">Los cambios fueron guardados satisfactoriamente!</p>
                                    <button type="button" data-dismiss="modal" class="btn btn-success" style="float: right;">Entendido</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div><!-- /.modal-content-->
        </div>
        <!-- /.modal-dialog-->
    </div>

    <div style="display:none;">
        <div id="dvDocumento">
            <table style='text-align: center;width: 100%;'>
                <tr>
                    <td><img style="margin-top:-10px;" src="data:image/png;base64,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" data-filename="logo - copia.png" style="width: 80px;"></td>
                    <td style="text-align: center;vertical-align: middle;">
                        <h3>INSTITUCION EDUCATIVA "NUESTRA SEÑORA DEL ROSARIO"
                            <br>
                            MATRICULA <?php echo $institucion->anio_ficha; ?>
                        </h3>
                    </td>
                    <td>
                        <img id="barcode" />
                    </td>
                </tr>
            </table>
            <table style='width: 100%;font-size:12px;line-height: 11px;'>
                <tr>
                    <td colspan="4" style="font-weight: 600;font-size:18px;border-bottom: solid thin black;">Datos del estudiante</td>
                </tr>
                <tr>
                    <td style="width: 15%">Nro de Documento</td>
                    <td style="width: 35%"><p id="lblAlumno_Numero_Documento"></p></td>
                    <td style="width: 20%">Fecha de Nacimiento</td>
                    <td style="width: 30%"><p id="lblAlumno_Fecha_Nacimiento"></p></td>
                </tr>
                <tr>
                    <td>Apellidos y Nombres</td>
                    <td><p id="lblAlumno_Nombre_Completo"></p></td>
                    <td>Sexo: </td>
                    <td><p id="lblAlumno_Sexo"></p></td>
                </tr>
                <tr>
                    <td>Dirección</td>
                    <td><p id="lblAlumno_Direccion"></p></td>
                    <td>Telefono Casa: </td>
                    <td><p id="lblAlumno_Telf_Fijo"></p></td>
                </tr>
                <tr>
                    <td>Padres viven juntos: </td>
                    <td><p id="lblAlumno_Padres_Juntos"></p></td>
                    <td>Colegio de Procedencia</td>
                    <td><p id="lblAlumno_Colegio_Procedencia"></p></td>
                </tr>
            </table>
            <table style='width: 100%;font-size:12px;line-height: 11px;margin-top:5px;'>
                <tr>
                    <td colspan="4" style="font-weight: 600;font-size:18px;border-bottom: solid thin black;">Datos del padre</td>
                </tr>
                <tr>
                    <td style="width: 15%">Nro de Documento</td>
                    <td style="width: 35%"><p id="lblPadre_Numero_Documento"></p></td>
                    <td style="width: 20%">Fecha de Nacimiento</td>
                    <td style="width: 30%"><p id="lblPadre_Fecha_Nacimiento"></p></td>
                </tr>
                <tr>
                    <td>Apellidos y Nombres</td>
                    <td><p id="lblPadre_Nombre_Completo"></p></td>
                    <td>Email</td>
                    <td><p id="lblPadre_Email"></p></td>
                </tr>
                <tr>
                    <td>Dirección</td>
                    <td><p id="lblPadre_Direccion"></p></td>
                    <td>Sexo</td>
                    <td><p id="lblPadre_Sexo"></p></td>
                </tr>
                <tr>
                    <td>Profesión</td>
                    <td><p id="lblPadre_Ocupacion"></p></td>
                    <td>Estado Civil</td>
                    <td><p id="lblPadre_Estado_Civil"></p></td>
                </tr>
                <tr>
                    <td>Nivel Educativo</td>
                    <td><p id="lblPadre_Nivel_Educativo"></p></td>
                    <td>Celular</td>
                    <td><p id="lblPadre_Telf_Movil"></p></td>
                </tr>
                <tr>
                    <td>Cargo</td>
                    <td><p id="lblPadre_Cargo"></p></td>
                    <td>Lugar de Trabajo</td>
                    <td><p id="lblPadre_Lugar_Trabajo"></p></td>
                </tr>
                <tr>
                    <td>Vive con el estudiante</td>
                    <td><p id="lblPadre_Vive_Educando"></p></td>
                </tr>
            </table>
            <table style='width: 100%;font-size:12px;line-height: 11px;margin-top:5px;'>
                <tr>
                    <td colspan="4" style="font-weight: 600;font-size:18px;border-bottom: solid thin black;">Datos de la Madre</td>
                </tr>
                <tr>
                    <td style="width: 15%">Nro de Documento</td>
                    <td style="width: 35%"><p id="lblMadre_Numero_Documento"></p></td>
                    <td style="width: 20%">Fecha de Nacimiento</td>
                    <td style="width: 30%"><p id="lblMadre_Fecha_Nacimiento"></p></td>
                </tr>
                <tr>
                    <td>Apellidos y Nombres</td>
                    <td><p id="lblMadre_Nombre_Completo"></p></td>
                    <td>Email</td>
                    <td><p id="lblMadre_Email"></p></td>
                </tr>
                <tr>
                    <td>Dirección</td>
                    <td><p id="lblMadre_Direccion"></p></td>
                    <td>Sexo</td>
                    <td><p id="lblMadre_Sexo"></p></td>
                </tr>
                <tr>
                    <td>Profesión</td>
                    <td><p id="lblMadre_Ocupacion"></p></td>
                    <td>Estado Civil</td>
                    <td><p id="lblMadre_Estado_Civil"></p></td>
                </tr>
                <tr>
                    <td>Nivel Educativo</td>
                    <td><p id="lblMadre_Nivel_Educativo"></p></td>
                    <td>Celular</td>
                    <td><p id="lblMadre_Telf_Movil"></p></td>
                </tr>
                <tr>
                    <td>Cargo</td>
                    <td><p id="lblMadre_Cargo"></p></td>
                    <td>Lugar de Trabajo</td>
                    <td><p id="lblMadre_Lugar_Trabajo"></p></td>
                </tr>
                <tr>
                    <td>Vive con el estudiante</td>
                    <td><p id="lblMadre_Vive_Educando"></p></td>
                </tr>
            </table>
            <table style='width: 100%;font-size:12px;line-height: 11px;margin-top:5px;'>
                <tr>
                    <td colspan="4" style="font-weight: 600;font-size:18px;border-bottom: solid thin black;">Datos del Apoderado</td>
                </tr>
                <tr>
                    <td style="width: 15%">Nro de Documento</td>
                    <td style="width: 35%"><p id="lblApoderado_Numero_Documento"></p></td>
                    <td style="width: 20%">Fecha de Nacimiento</td>
                    <td style="width: 30%"><p id="lblApoderado_Fecha_Nacimiento"></p></td>
                </tr>
                <tr>
                    <td>Apellidos y Nombres</td>
                    <td><p id="lblApoderado_Nombre_Completo"></p></td>
                    <td>Email</td>
                    <td><p id="lblApoderado_Email"></p></td>
                </tr>
                <tr>
                    <td>Dirección</td>
                    <td><p id="lblApoderado_Direccion"></p></td>
                    <td>Sexo</td>
                    <td><p id="lblApoderado_Sexo"></p></td>
                </tr>
                <tr>
                    <td>Profesión</td>
                    <td><p id="lblApoderado_Ocupacion"></p></td>
                    <td>Estado Civil</td>
                    <td><p id="lblApoderado_Estado_Civil"></p></td>
                </tr>
                <tr>
                    <td>Nivel Educativo</td>
                    <td><p id="lblApoderado_Nivel_Educativo"></p></td>
                    <td>Celular</td>
                    <td><p id="lblApoderado_Telf_Movil"></p></td>
                </tr>
                <tr>
                    <td>Cargo</td>
                    <td><p id="lblApoderado_Cargo"></p></td>
                    <td>Lugar de Trabajo</td>
                    <td><p id="lblApoderado_Lugar_Trabajo"></p></td>
                </tr>
                <tr>
                    <td>Parentesco</td>
                    <td><p id="lblApoderado_Parentesco"></p></td>
                    <td>Vive con el estudiante</td>
                    <td><p id="lblApoderado_Vive_Educando"></p></td>
                </tr>
            </table>
            <table style='width: 100%;font-size:13px;line-height: 12px;font-weight: 700;'>
                <tr>
                    <td style="text-align: center;vertical-align: bottom;">
                        <br>* Declaro que la información personal brindada a través de este formulario es fidedigna, y
                        la vez autorizo "Nuestra Señora del Rosario" haga uso de ella según corresponda.
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;height: 80px;vertical-align: bottom;">
                        <h4 id="lblApoderado_Firma" style="margin: 0 auto;border-top:solid thin black;width: 300px;"></h4>
                    </td>
                </tr>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="http://parsleyjs.org/dist/parsley.js"></script>
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.5.8/JsBarcode.all.min.js"></script>


    <script>

        function pad(num, size) {
            var s = "00000" + num;
            return s.substr(s.length-size);
        }

        function llenarDocumento(data){
            JsBarcode("#barcode", pad(parseInt(data["id"])), {
                format: "CODE39",
                fontSize: 16,
                lineColor: "black",
                width:1,
                height:30,
                displayValue: true
            });
            $("#lblAlumno_Numero_Documento").html(data["alumno_tipo_documento"]["abreviatura"]+' - '+data["alumno_numero_documento"]);
            $("#lblAlumno_Nombre_Completo").html(data["alumno_apellido_paterno"]+' '+data["alumno_apellido_materno"]+' '+data["alumno_nombres"]);
            $("#lblAlumno_Fecha_Nacimiento").html(data["alumno_fecha_nacimiento"]);
            if(data["alumno_sexo"] == "M")
                $("#lblAlumno_Sexo").html("MASCULINO");
            else
                $("#lblAlumno_Sexo").html("FEMENINO");
            $("#lblAlumno_Direccion").html(data["alumno_direccion"]);
            $("#lblAlumno_Telf_Fijo").html(data["alumno_telf_fijo"]);

            if(data["alumno_padres_juntos"])
                $("#lblAlumno_Padres_Juntos").html("SI");
            else
                $("#lblAlumno_Padres_Juntos").html("NO");
            $("#lblAlumno_Colegio_Procedencia").html(data["alumno_colegio_procedencia"]);

            //PADRE
            $("#lblPadre_Numero_Documento").html(data["padre_tipo_documento"]["abreviatura"]+' - '+data["padre_numero_documento"]);
            $("#lblPadre_Nombre_Completo").html(data["padre_apellido_paterno"]+' '+data["padre_apellido_materno"]+' '+data["padre_nombres"]);
            $("#lblPadre_Fecha_Nacimiento").html(data["padre_fecha_nacimiento"]);
            if(data["padre_sexo"] == "M")
                $("#lblPadre_Sexo").html("MASCULINO");
            else
                $("#lblPadre_Sexo").html("FEMENINO");
            $("#lblPadre_Direccion").html(data["padre_direccion"]);
            $("#lblPadre_Email").html(data["padre_email"]);
            $("#lblPadre_Telf_Movil").html(data["padre_telf_movil"]);
            if(data["padre_vive_educando"])
                $("#lblPadre_Vive_Educando").html("SI");
            else
                $("#lblPadre_Vive_Educando").html("NO");
            switch(data["padre_estado_civil"]){
                case "S" : $("#lblPadre_Estado_Civil").html("SOLTERO(A)");break;
                case "C" : $("#lblPadre_Estado_Civil").html("CASADO(A)");break;
                case "V" : $("#lblPadre_Estado_Civil").html("VIUDO(A)");break;
                case "D" : $("#lblPadre_Estado_Civil").html("DIVORCIADO(A)");break;
                default: $("#lblPadre_Estado_Civil").html("--");break;
            }
            $("#lblPadre_Nivel_Educativo").html(data["padre_nivel_educativo"]["abreviatura"]);
            $("#lblPadre_Ocupacion").html(data["padre_ocupacion"]);
            $("#lblPadre_Lugar_Trabajo").html(data["padre_lugar_trabajo"]);
            $("#lblPadre_Cargo").html(data["padre_cargo"]);

            //MADRE
            $("#lblMadre_Numero_Documento").html(data["madre_tipo_documento"]["abreviatura"]+' - '+data["madre_numero_documento"]);
            $("#lblMadre_Nombre_Completo").html(data["madre_apellido_paterno"]+' '+data["madre_apellido_materno"]+' '+data["madre_nombres"]);
            $("#lblMadre_Fecha_Nacimiento").html(data["madre_fecha_nacimiento"]);
            if(data["madre_sexo"] == "M")
                $("#lblMadre_Sexo").html("MASCULINO");
            else
                $("#lblMadre_Sexo").html("FEMENINO");
            $("#lblMadre_Direccion").html(data["madre_direccion"]);
            $("#lblMadre_Email").html(data["madre_email"]);
            $("#lblMadre_Telf_Movil").html(data["madre_telf_movil"]);
            if(data["madre_vive_educando"])
                $("#lblMadre_Vive_Educando").html("SI");
            else
                $("#lblMadre_Vive_Educando").html("NO");
            switch(data["madre_estado_civil"]){
                case "S" : $("#lblMadre_Estado_Civil").html("SOLTERO(A)");break;
                case "C" : $("#lblMadre_Estado_Civil").html("CASADO(A)");break;
                case "V" : $("#lblMadre_Estado_Civil").html("VIUDO(A)");break;
                case "D" : $("#lblMadre_Estado_Civil").html("DIVORCIADO(A)");break;
                default: $("#lblMadre_Estado_Civil").html("--");break;
            }
            $("#lblMadre_Nivel_Educativo").html(data["madre_nivel_educativo"]["abreviatura"]);
            $("#lblMadre_Ocupacion").html(data["madre_ocupacion"]);
            $("#lblMadre_Lugar_Trabajo").html(data["madre_lugar_trabajo"]);
            $("#lblMadre_Cargo").html(data["madre_cargo"]);

            if(data["alumno_apoderado"] == "O"){
                //APODERADO
                $("#lblApoderado_Numero_Documento").html(data["apoderado_tipo_documento"]["abreviatura"]+' - '+data["apoderado_numero_documento"]);
                $("#lblApoderado_Nombre_Completo").html(data["apoderado_apellido_paterno"]+' '+data["apoderado_apellido_materno"]+' '+data["apoderado_nombres"]);
                $("#lblApoderado_Fecha_Nacimiento").html(data["apoderado_fecha_nacimiento"]);
                if(data["apoderado_sexo"] == "M")
                    $("#lblApoderado_Sexo").html("MASCULINO");
                else
                    $("#lblApoderado_Sexo").html("FEMENINO");
                $("#lblApoderado_Direccion").html(data["apoderado_direccion"]);
                $("#lblApoderado_Email").html(data["apoderado_email"]);
                $("#lblApoderado_Telf_Movil").html(data["apoderado_telf_movil"]);
                if(data["apoderado_vive_educando"])
                    $("#lblApoderado_Vive_Educando").html("SI");
                else
                    $("#lblApoderado_Vive_Educando").html("NO");
                switch(data["apoderado_estado_civil"]){
                    case "S" : $("#lblApoderado_Estado_Civil").html("SOLTERO(A)");break;
                    case "C" : $("#lblApoderado_Estado_Civil").html("CASADO(A)");break;
                    case "V" : $("#lblApoderado_Estado_Civil").html("VIUDO(A)");break;
                    case "D" : $("#lblApoderado_Estado_Civil").html("DIVORCIADO(A)");break;
                    default: $("#lblApoderado_Estado_Civil").html("--");break;
                }
                $("#lblApoderado_Nivel_Educativo").html(data["apoderado_nivel_educativo"]["abreviatura"]);
                $("#lblApoderado_Ocupacion").html(data["apoderado_ocupacion"]);
                $("#lblApoderado_Lugar_Trabajo").html(data["apoderado_lugar_trabajo"]);
                $("#lblApoderado_Cargo").html(data["apoderado_cargo"]);
                $("#lblApoderado_Parentesco").html(data["apoderado_parentesco"]["nombre"]);
            }


            var apoderado_nombres="";
            var apoderado_doc="";
            switch(data["alumno_apoderado"]){
                case "P":
                    apoderado_doc = data["padre_tipo_documento"]["abreviatura"]+' - '+data["padre_numero_documento"];
                    apoderado_nombres = data["padre_apellido_paterno"]+' '+data["padre_apellido_materno"]+' '+data["padre_nombres"];
                    $("#lblApoderado_Firma").html(apoderado_nombres + "<br>"+apoderado_doc +" (PADRE)");
                    break;
                case "M":
                    apoderado_doc = data["madre_tipo_documento"]["abreviatura"]+' - '+data["madre_numero_documento"];
                    apoderado_nombres = data["madre_apellido_paterno"]+' '+data["madre_apellido_materno"]+' '+data["madre_nombres"];
                    $("#lblApoderado_Firma").html(apoderado_nombres + "<br>"+apoderado_doc +" (MADRE)");
                    break;
                case "O":
                    apoderado_doc = data["apoderado_tipo_documento"]["abreviatura"]+' - '+data["apoderado_numero_documento"];
                    apoderado_nombres = data["apoderado_apellido_paterno"]+' '+data["apoderado_apellido_materno"]+' '+data["apoderado_nombres"];
                    $("#lblApoderado_Firma").html(apoderado_nombres + "<br>"+apoderado_doc +" ("+data["apoderado_parentesco"]["nombre"]+")");
                    break;
                default: break;
            }
        }

        function mostrar_error(html) {
            var pag = $("#msg_error");
            pag.append(html);
            var errores = $(pag).find('.exception_message');
            var errors_title = [];
            var errors_detail = [];
            $.each(errores, function (index, value) {
                errors_title.push($(value).html().split("<br>")[0]);
                errors_detail.push($(value).html().split("<br>")[1]);
            });
            errors_title = $.unique(errors_title);
            $.each(errors_title, function (index, value) {
                console.log(value);
            });
            pag.html("");
            return errors_title;
        }

        $(document).on('ready', function () {
            $('#frmFicha').parsley();
            $('#frmLogin').parsley();
            $('[data-toggle="tooltip"]').tooltip();
            listarTipoDocumento();
            listarNivelEducativo();
            listarParentesco();
            $("input[name='rndApoderado']").on('change', function () {
                var opcion = $(this).val();
                if (opcion == "O") {
                    $("#dvApoderado").show();
                } else {
                    $("#dvApoderado").hide();
                }
            });
        });

        function prueba_login() {
            $("#txtPersona_Numero_Documento").val("46041769");
            $("#txtPem").val("DGAZ8PRL");
        }

        function prueba_ficha() {
            $("#cmbAlumno_Tipo_Documento").val("1");
            $("#txtAlumno_Numero_Documento").val("46041769");
            $("#txtAlumno_Apellido_Paterno").val("SÁNCHEZ");
            $("#txtAlumno_Apellido_Materno").val("ASCORBE");
            $("#txtAlumno_Nombres").val("OLIVER ADRIÁN");
            $("#txtAlumno_Fecha_Nacimiento").val("1989-07-26");
            $("#cmbAlumno_Sexo").val("M");
            $("#txtAlumno_Direccion").val("AV. AUGUSTO B. LEGUIA 1396");
            $("#chkAlumno_Padres_Juntos").prop('checked', true);

            $("#cmbPadre_Tipo_Documento").val("1");
            $("#txtPadre_Numero_Documento").val("11111111");
            $("#txtPadre_Apellido_Paterno").val("SÁNCHEZ");
            $("#txtPadre_Apellido_Materno").val("TEMOCHE");
            $("#txtPadre_Nombres").val("OSWALDO");
            $("#txtPadre_Fecha_Nacimiento").val("1969-07-26");
            $("#cmbPadre_Sexo").val("M");
            $("#txtPadre_Direccion").val("AV. AUGUSTO B. LEGUIA 1396");
            $("#txtPadre_Email").val("papa@gmail.com");
            $("#txtPadre_Telf_Movil").val("96864411");
            $("#chkPadre_Vive_Educando").prop('checked', true);
            $("#cmbPadre_Nivel_Educativo").val("15");
            $("#cmbPadre_Estado_Civil").val("C");

            $("#cmbMadre_Tipo_Documento").val("1");
            $("#txtMadre_Numero_Documento").val("11111111");
            $("#txtMadre_Apellido_Paterno").val("ASCORBE");
            $("#txtMadre_Apellido_Materno").val("ESTELA");
            $("#txtMadre_Nombres").val("JANE");
            $("#txtMadre_Fecha_Nacimiento").val("1969-07-26");
            $("#cmbMadre_Sexo").val("F");
            $("#txtMadre_Direccion").val("AV. AUGUSTO B. LEGUIA 1396");
            $("#txtMadre_Email").val("mama@gmail.com");
            $("#txtMadre_Telf_Movil").val("96864412");
            $("#chkMadre_Vive_Educando").prop('checked', true);
            $("#cmbMadre_Nivel_Educativo").val("1");
            $("#cmbMadre_Estado_Civil").val("C");

            /*
            $("#cmbApoderado_Tipo_Documento").val(data["apoderado_tipo_documento_id"]);
            $("#txtApoderado_Numero_Documento").val(data["apoderado_numero_documento"]);
            $("#txtApoderado_Apellido_Paterno").val(data["apoderado_apellido_paterno"]);
            $("#txtApoderado_Apellido_Materno").val(data["apoderado_apellido_materno"]);
            $("#txtApoderado_Nombres").val(data["apoderado_nombres"]);
            $("#txtApoderado_Fecha_Nacimiento").val(data["apoderado_fecha_nacimiento"]);
            $("#cmbApoderado_Sexo").val(data["apoderado_sexo"]);
            $("#txtApoderado_Direccion").val(data["apoderado_direccion"]);
            $("#txtApoderado_Email").val(data["apoderado_email"]);
            $("#txtApoderado_Telf_Movil").val(data["apoderado_telf_movil"]);
            $("#chkApoderado_Vive_Educando").prop('checked', data["alumno_vive_educando"]);
            $("#txtApoderado_Ocupacion").val(data["apoderado_ocupacion"]);
            $("#cmbApoderado_Nivel_Educativo").val(data["apoderado_nivel_educativo_id"]);
            $("#txtApoderado_Lugar_Trabajo").val(data["apoderado_lugar_trabajo"]);
            $("#txtApoderado_Cargo").val(data["apoderado_cargo"]);
            $("#cmbApoderado_Estado_Civil").val(data["apoderado_estado_civil"]);
             $("#cmbApoderado_Parentesco").val(data["apoderado_parentesco_id"]);
            */
        }

        function cancelar() {
            $("#dvLogin").show();
            $("#dvFicha").hide();
            $("#dvImprimir").hide();

            $("#hddPem").val("");
            $("#txtPem").val("");
            $("#txtPersona_Numero_Documento").val("");
            $("#cmbAlumno_Tipo_Documento").val("");
            $("#txtAlumno_Numero_Documento").val("");
            $("#txtAlumno_Apellido_Paterno").val("");
            $("#txtAlumno_Apellido_Materno").val("");
            $("#txtAlumno_Nombres").val("");
            $("#txtAlumno_Fecha_Nacimiento").val("");
            $("#cmbAlumno_Sexo").val("");
            $("#txtAlumno_Direccion").val("");
            $("#txtAlumno_Telf_Fijo").val("");
            $("#chkAlumno_Padres_Juntos").prop('checked', true);
            $("#txtAlumno_Colegio_Procedencia").val("");

            $("#cmbPadre_Tipo_Documento").val("");
            $("#txtPadre_Numero_Documento").val("");
            $("#txtPadre_Apellido_Paterno").val("");
            $("#txtPadre_Apellido_Materno").val("");
            $("#txtPadre_Nombres").val("");
            $("#txtPadre_Fecha_Nacimiento").val("");
            $("#cmbPadre_Sexo").val("");
            $("#txtPadre_Direccion").val("");
            $("#txtPadre_Email").val("");
            $("#txtPadre_Telf_Movil").val("");
            $("#chkPadre_Vive_Educando").prop('checked', true);
            $("#txtPadre_Ocupacion").val("");
            $("#cmbPadre_Nivel_Educativo").val("");
            $("#txtPadre_Lugar_Trabajo").val("");
            $("#txtPadre_Cargo").val("");
            $("#cmbPadre_Estado_Civil").val("");

            $("#cmbMadre_Tipo_Documento").val("");
            $("#txtMadre_Numero_Documento").val("");
            $("#txtMadre_Apellido_Paterno").val("");
            $("#txtMadre_Apellido_Materno").val("");
            $("#txtMadre_Nombres").val("");
            $("#txtMadre_Fecha_Nacimiento").val("");
            $("#cmbMadre_Sexo").val("");
            $("#txtMadre_Direccion").val("");
            $("#txtMadre_Email").val("");
            $("#txtMadre_Telf_Movil").val("");
            $("#chkMadre_Vive_Educando").prop('checked', true);
            $("#txtMadre_Ocupacion").val("");
            $("#cmbMadre_Nivel_Educativo").val("");
            $("#txtMadre_Lugar_Trabajo").val("");
            $("#txtMadre_Cargo").val("");
            $("#cmbMadre_Estado_Civil").val("");

            $("#cmbApoderado_Tipo_Documento").val("");
            $("#txtApoderado_Numero_Documento").val("");
            $("#txtApoderado_Apellido_Paterno").val("");
            $("#txtApoderado_Apellido_Materno").val("");
            $("#txtApoderado_Nombres").val("");
            $("#txtApoderado_Fecha_Nacimiento").val("");
            $("#cmbApoderado_Sexo").val("");
            $("#txtApoderado_Direccion").val("");
            $("#txtApoderado_Email").val("");
            $("#txtApoderado_Telf_Movil").val("");
            $("#chkApoderado_Vive_Educando").prop('checked', true);
            $("#txtApoderado_Ocupacion").val("");
            $("#cmbApoderado_Nivel_Educativo").val("");
            $("#txtApoderado_Lugar_Trabajo").val("");
            $("#txtApoderado_Cargo").val("");
            $("#cmbApoderado_Estado_Civil").val("");

            $("#cmbApoderado_Parentesco").val("");

        }

        function imprimir() {
            var mywindow = window.open('', 'PRINT', 'height=400,width=600');

            mywindow.document.write('<html><head><title>' + document.title + '</title>');
            mywindow.document.write('</head><body >');
            mywindow.document.write(document.getElementById("dvDocumento").innerHTML);
            mywindow.document.write('</body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/

            mywindow.print();
            mywindow.close();

            return true;
        }

        function obtenerDatos(){
            var trabajador_id = $("#cmbTrabajador").val();
            var info = [{"_token": "{{ csrf_token() }}",
                "pem": $("#hddPem").val(),
                "alumno_tipo_documento_id":  $("#cmbAlumno_Tipo_Documento").val(),
                "alumno_numero_documento": $("#txtAlumno_Numero_Documento").val(),
                "alumno_apellido_paterno": $("#txtAlumno_Apellido_Paterno").val().toUpperCase(),
                "alumno_apellido_materno": $("#txtAlumno_Apellido_Materno").val().toUpperCase(),
                "alumno_nombres": $("#txtAlumno_Nombres").val().toUpperCase(),
                "alumno_fecha_nacimiento": $("#txtAlumno_Fecha_Nacimiento").val(),
                "alumno_sexo": $("#cmbAlumno_Sexo").val(),
                "alumno_direccion": $("#txtAlumno_Direccion").val().toUpperCase(),
                "alumno_telf_fijo": $("#txtAlumno_Telf_Fijo").val().toUpperCase(),
                "alumno_padres_juntos": $("#chkAlumno_Padres_Juntos").is(":checked"),
                "alumno_colegio_procedencia":$("#txtAlumno_Colegio_Procedencia").val().toUpperCase(),
                "alumno_apoderado": $("input[name='rndApoderado']:checked").val(),

                "padre_tipo_documento_id": $("#cmbPadre_Tipo_Documento").val(),
                "padre_numero_documento": $("#txtPadre_Numero_Documento").val(),
                "padre_apellido_paterno": $("#txtPadre_Apellido_Paterno").val().toUpperCase(),
                "padre_apellido_materno": $("#txtPadre_Apellido_Materno").val().toUpperCase(),
                "padre_nombres": $("#txtPadre_Nombres").val().toUpperCase(),
                "padre_fecha_nacimiento": $("#txtPadre_Fecha_Nacimiento").val(),
                "padre_sexo": $("#cmbPadre_Sexo").val(),
                "padre_direccion": $("#txtPadre_Direccion").val().toUpperCase(),
                "padre_email": $("#txtPadre_Email").val(),
                "padre_telf_movil": $("#txtPadre_Telf_Movil").val(),
                "padre_vive_educando": $("#chkPadre_Vive_Educando").is(":checked"),
                "padre_estado_civil": $("#cmbPadre_Estado_Civil").val(),
                "padre_nivel_educativo_id": $("#cmbPadre_Nivel_Educativo").val(),
                "padre_ocupacion": $("#txtPadre_Ocupacion").val().toUpperCase(),
                "padre_lugar_trabajo": $("#txtPadre_Lugar_Trabajo").val().toUpperCase(),
                "padre_cargo": $("#txtPadre_Cargo").val().toUpperCase(),

                "madre_tipo_documento_id": $("#cmbMadre_Tipo_Documento").val(),
                "madre_numero_documento": $("#txtMadre_Numero_Documento").val(),
                "madre_apellido_paterno": $("#txtMadre_Apellido_Paterno").val().toUpperCase(),
                "madre_apellido_materno": $("#txtMadre_Apellido_Materno").val().toUpperCase(),
                "madre_nombres": $("#txtMadre_Nombres").val().toUpperCase(),
                "madre_fecha_nacimiento": $("#txtMadre_Fecha_Nacimiento").val(),
                "madre_sexo": $("#cmbMadre_Sexo").val(),
                "madre_direccion": $("#txtMadre_Direccion").val().toUpperCase(),
                "madre_email": $("#txtMadre_Email").val(),
                "madre_telf_movil": $("#txtMadre_Telf_Movil").val(),
                "madre_vive_educando": $("#chkMadre_Vive_Educando").is(":checked"),
                "madre_estado_civil": $("#cmbMadre_Estado_Civil").val(),
                "madre_nivel_educativo_id": $("#cmbMadre_Nivel_Educativo").val(),
                "madre_ocupacion": $("#txtMadre_Ocupacion").val().toUpperCase(),
                "madre_lugar_trabajo": $("#txtMadre_Lugar_Trabajo").val().toUpperCase(),
                "madre_cargo": $("#txtMadre_Cargo").val().toUpperCase(),

                "apoderado_tipo_documento_id": $("#cmbApoderado_Tipo_Documento").val(),
                "apoderado_numero_documento": $("#txtApoderado_Numero_Documento").val(),
                "apoderado_apellido_paterno": $("#txtApoderado_Apellido_Paterno").val().toUpperCase(),
                "apoderado_apellido_materno": $("#txtApoderado_Apellido_Materno").val().toUpperCase(),
                "apoderado_nombres": $("#txtApoderado_Nombres").val().toUpperCase(),
                "apoderado_fecha_nacimiento": $("#txtApoderado_Fecha_Nacimiento").val(),
                "apoderado_sexo": $("#cmbApoderado_Sexo").val(),
                "apoderado_direccion": $("#txtApoderado_Direccion").val().toUpperCase(),
                "apoderado_email": $("#txtApoderado_Email").val(),
                "apoderado_telf_movil": $("#txtApoderado_Telf_Movil").val(),
                "apoderado_vive_educando": $("#chkApoderado_Vive_Educando").is(":checked"),
                "apoderado_estado_civil": $("#cmbApoderado_Estado_Civil").val(),
                "apoderado_nivel_educativo_id": $("#cmbApoderado_Nivel_Educativo").val(),
                "apoderado_ocupacion": $("#txtApoderado_Ocupacion").val().toUpperCase(),
                "apoderado_lugar_trabajo": $("#txtApoderado_Lugar_Trabajo").val().toUpperCase(),
                "apoderado_cargo": $("#txtApoderado_Cargo").val().toUpperCase(),
                "apoderado_parentesco_id": $("#cmbApoderado_Parentesco").val()

            }][0];
            return info;
        }

        function obtenerDatosFinalizar(){
            var trabajador_id = $("#cmbTrabajador").val();
            var info = [{"_token": "{{ csrf_token() }}",
                "id": parseInt($("#hddId").val()),
                "pem": $("#hddPem").val(),
                "alumno_numero_documento": $("#txtAlumno_Numero_Documento").val()}][0];
            return info;
        }

        function finalizar() {
            if ($("#frmFicha").parsley().validate()) {
                if (confirm("¿Deseas finalizar el ingreso de datos?")) {
                    var info = obtenerDatosFinalizar();
                    $.ajax({
                        url: "/intranet/mantenimientos/ficha_matricula/imprimir",
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
        }

        function guardar() {
            if ($("#frmFicha").parsley().validate()) {
                if (confirm("¿Deseas continuar la modificación?")) {
                    var info = obtenerDatos();
                    $.ajax({
                        url: "/intranet/mantenimientos/ficha_matricula/" + $("#hddId").val(),
                        type: "PUT",
                        data: info,
                        beforeSend: function () {
                            $("#loading").show();
                        },
                        success: function (data) {
                            $("#modMsje").modal('show');
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
        }

        function llenarFicha(data){

            $("#cmbAlumno_Tipo_Documento").val(data["alumno_tipo_documento_id"]);
            $("#txtAlumno_Numero_Documento").val(data["alumno_numero_documento"]);
            $("#txtAlumno_Apellido_Paterno").val(data["alumno_apellido_paterno"]);
            $("#txtAlumno_Apellido_Materno").val(data["alumno_apellido_materno"]);
            $("#txtAlumno_Nombres").val(data["alumno_nombres"]);
            $("#txtAlumno_Fecha_Nacimiento").val(data["alumno_fecha_nacimiento"]);
            $("#cmbAlumno_Sexo").val(data["alumno_sexo"]);
            $("#txtAlumno_Direccion").val(data["alumno_direccion"]);
            $("#txtAlumno_Telf_Fijo").val(data["alumno_telf_fijo"]);
            $("#chkAlumno_Padres_Juntos").prop('checked', data["alumno_padres_juntos"]);
            $("#txtAlumno_Colegio_Procedencia").val(data["alumno_colegio_procedencia"]);
            $("input[name='rndApoderado']").filter('[value='+data["alumno_apoderado"]+']').click();

            $("#cmbPadre_Tipo_Documento").val(data["padre_tipo_documento_id"]);
            $("#txtPadre_Numero_Documento").val(data["padre_numero_documento"]);
            $("#txtPadre_Apellido_Paterno").val(data["padre_apellido_paterno"]);
            $("#txtPadre_Apellido_Materno").val(data["padre_apellido_materno"]);
            $("#txtPadre_Nombres").val(data["padre_nombres"]);
            $("#txtPadre_Fecha_Nacimiento").val(data["padre_fecha_nacimiento"]);
            $("#cmbPadre_Sexo").val(data["padre_sexo"]);
            $("#txtPadre_Direccion").val(data["padre_direccion"]);
            $("#txtPadre_Email").val(data["padre_email"]);
            $("#txtPadre_Telf_Movil").val(data["padre_telf_movil"]);
            $("#chkPadre_Vive_Educando").prop('checked', data["alumno_vive_educando"]);
            $("#txtPadre_Ocupacion").val(data["padre_ocupacion"]);
            $("#cmbPadre_Nivel_Educativo").val(data["padre_nivel_educativo_id"]);
            $("#txtPadre_Lugar_Trabajo").val(data["padre_lugar_trabajo"]);
            $("#txtPadre_Cargo").val(data["padre_cargo"]);
            $("#cmbPadre_Estado_Civil").val(data["padre_estado_civil"]);

            $("#cmbMadre_Tipo_Documento").val(data["madre_tipo_documento_id"]);
            $("#txtMadre_Numero_Documento").val(data["madre_numero_documento"]);
            $("#txtMadre_Apellido_Paterno").val(data["madre_apellido_paterno"]);
            $("#txtMadre_Apellido_Materno").val(data["madre_apellido_materno"]);
            $("#txtMadre_Nombres").val(data["madre_nombres"]);
            $("#txtMadre_Fecha_Nacimiento").val(data["madre_fecha_nacimiento"]);
            $("#cmbMadre_Sexo").val(data["madre_sexo"]);
            $("#txtMadre_Direccion").val(data["madre_direccion"]);
            $("#txtMadre_Email").val(data["madre_email"]);
            $("#txtMadre_Telf_Movil").val(data["madre_telf_movil"]);
            $("#chkMadre_Vive_Educando").prop('checked', data["alumno_vive_educando"]);
            $("#txtMadre_Ocupacion").val(data["madre_ocupacion"]);
            $("#cmbMadre_Nivel_Educativo").val(data["madre_nivel_educativo_id"]);
            $("#txtMadre_Lugar_Trabajo").val(data["madre_lugar_trabajo"]);
            $("#txtMadre_Cargo").val(data["madre_cargo"]);
            $("#cmbMadre_Estado_Civil").val(data["madre_estado_civil"]);

            $("#cmbApoderado_Tipo_Documento").val(data["apoderado_tipo_documento_id"]);
            $("#txtApoderado_Numero_Documento").val(data["apoderado_numero_documento"]);
            $("#txtApoderado_Apellido_Paterno").val(data["apoderado_apellido_paterno"]);
            $("#txtApoderado_Apellido_Materno").val(data["apoderado_apellido_materno"]);
            $("#txtApoderado_Nombres").val(data["apoderado_nombres"]);
            $("#txtApoderado_Fecha_Nacimiento").val(data["apoderado_fecha_nacimiento"]);
            $("#cmbApoderado_Sexo").val(data["apoderado_sexo"]);
            $("#txtApoderado_Direccion").val(data["apoderado_direccion"]);
            $("#txtApoderado_Email").val(data["apoderado_email"]);
            $("#txtApoderado_Telf_Movil").val(data["apoderado_telf_movil"]);
            $("#chkApoderado_Vive_Educando").prop('checked', data["alumno_vive_educando"]);
            $("#txtApoderado_Ocupacion").val(data["apoderado_ocupacion"]);
            $("#cmbApoderado_Nivel_Educativo").val(data["apoderado_nivel_educativo_id"]);
            $("#txtApoderado_Lugar_Trabajo").val(data["apoderado_lugar_trabajo"]);
            $("#txtApoderado_Cargo").val(data["apoderado_cargo"]);
            $("#cmbApoderado_Estado_Civil").val(data["apoderado_estado_civil"]);

            $("#cmbApoderado_Parentesco").val(data["apoderado_parentesco_id"]);
        }



        function buscarFicha() {
            if ($("#frmLogin").parsley().validate()) {
                var info = [{
                    "_token": "{{ csrf_token() }}",
                    "pem": $("#txtPem").val(),
                    "alumno_numero_documento": $("#txtPersona_Numero_Documento").val()
                }][0];
                $.ajax({
                    url: "/intranet/mantenimientos/ficha_matricula/buscar",
                    type: "GET",
                    data: info,
                    beforeSend: function () {
                        $("#loading").show();
                    },
                    success: function (data) {
                        if (data != null && data != "") {
                            data = data[0];
                            if(data["imprimir"] == true){
                                $("#dvLogin").hide();
                                $("#dvFicha").hide();
                                $("#dvImprimir").show();
                                llenarDocumento(data);
                            }else{
                                if (data["tipo_matricula"] == "P") {
                                    $("#cmbAlumno_Tipo_Documento").prop('disabled', true);
                                    $("#cmbAlumno_Numero_Documento").prop('disabled', true);
                                    $("#txtAlumno_Apellido_Paterno").prop('disabled', true);
                                    $("#txtAlumno_Apellido_Materno").prop('disabled', true);
                                    $("#txtAlumno_Nombres").prop('disabled', true);
                                    $("#txtAlumno_Fecha_Nacimiento").prop('disabled', true);
                                    $("#cmbAlumno_Sexo").prop('disabled', true);
                                    $("#txtAlumno_Colegio_Procedencia").prop('disabled', true);

                                    $("#cmbPadre_Tipo_Documento").prop('disabled', true);
                                    $("#cmbPadre_Numero_Documento").prop('disabled', true);
                                    $("#txtPadre_Apellido_Paterno").prop('disabled', true);
                                    $("#txtPadre_Apellido_Materno").prop('disabled', true);
                                    $("#txtPadre_Nombres").prop('disabled', true);
                                    $("#txtPadre_Fecha_Nacimiento").prop('disabled', true);
                                    $("#cmbPadre_Sexo").prop('disabled', true);

                                    $("#cmbMadre_Tipo_Documento").prop('disabled', true);
                                    $("#cmbMadre_Numero_Documento").prop('disabled', true);
                                    $("#txtMadre_Apellido_Paterno").prop('disabled', true);
                                    $("#txtMadre_Apellido_Materno").prop('disabled', true);
                                    $("#txtMadre_Nombres").prop('disabled', true);
                                    $("#txtMadre_Fecha_Nacimiento").prop('disabled', true);
                                    $("#cmbMadre_Sexo").prop('disabled', true);
                                }
                                $("#hddId").val(data["id"]);
                                $("#hddPem").val(data["pem"]);
                                llenarFicha(data);
                                $("#dvLogin").hide();
                                $("#dvFicha").show();
                            }
                        } else {
                            alert('Datos incorrectos');
                        }
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

        function listarNivelEducativo() {
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
                    $("#cmbPadre_Nivel_Educativo").append(opciones);
                    $("#cmbMadre_Nivel_Educativo").append(opciones);
                    $("#cmbApoderado_Nivel_Educativo").append(opciones);
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });

        }

        function listarTipoDocumento() {
            $.ajax({
                url: "/intranet/mantenimientos/tipo_documento/*",
                type: "GET",
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    var opciones = "<option value=''>---</option>";
                    $.each(data, function (index, value) {
                        opciones += "<option value='" + value["id"] + "'>" + value["abreviatura"] + "</option>";
                    });
                    $("#cmbAlumno_Tipo_Documento").append(opciones);
                    $("#cmbPadre_Tipo_Documento").append(opciones);
                    $("#cmbMadre_Tipo_Documento").append(opciones);
                    $("#cmbApoderado_Tipo_Documento").append(opciones);
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                },
                complete: function () {
                    $("#loading").hide();
                }
            });

        }

        function listarParentesco() {
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
                    $("#cmbApoderado_Parentesco").append(opciones);
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

