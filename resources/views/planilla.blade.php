@extends('plantilla')

@section('estilos')
    <style>
        .rotate {
            position: absolute;
            -webkit-transform: rotate(-59deg);
            -moz-transform: rotate(-59deg);
            -ms-transform: rotate(-59deg);
            -o-transform: rotate(-59deg);
            transform: rotate(-59deg);
            -webkit-transform-origin: 0 0;
            -moz-transform-origin: 0 0;
            -ms-transform-origin: 0 0;
            -o-transform-origin: 0 0;
            transform-origin: 0 0;
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
            border-bottom: solid thin #ded0d0;
            height: 46px;
            margin-left: 5px;
            margin-top: -14px;
            background-color: white;
            border-top-right-radius: 34px;
            z-index: 3;
        }

        .rotate span {
            font-size: 13px;
            width: 120px;
            font-weight: 700;
            z-index: 1;
            margin-top: 10px;
        }

        .th-concepto {
            width: 14px;
            border-style: hidden;
            padding: 0px;
            font-size: 12px;
        }

        .table>tbody>tr>td {
            padding: 2px 3px;
        }

        .table>tbody>tr>td {
            padding: 2px 3px;
        }

        .center {
            text-align: right;
            max-width: 10px;
            white-space: nowrap;
        }

        .table thead th span {
            font-size: 13px;
        }
    </style>
@endsection

@section('cuerpo')
    <div id="pcont" class="container-fluid">
        <div class="page-head">
            <h2 style="display: inline-block;margin-right: 15px;"><i class="fa fa-wrench" style="font-size:24px;"></i> Administra tus planillas</h2>
            <div class="pull-right" style="margin-top: -10px;">
                <h3 style="display: inline-block;margin-right: 15px;">Período</h3>
                <select id="cmbPeriodo" class="select2" style="margin-top:-5px;font-size: 18px;width:220px;display: inline-block;">
                    <option>C - Mayo 2017</option>
                    <option>O - Febrero</option>
                    <option>O - Enero 2017</option>
                    <option>G - Diciembre 2016</option>
                </select>
                <button class="btn btn-default btn-flat" data-toggle="tooltip" title="Mostrar planilla del periodo seleccionado"><i class="fa fa-search"></i></button>
                <button data-modal="modPlanilla" class="btn btn-default btn-flat md-trigger" data-toggle="tooltip" title="Registrar una nueva planilla"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div class="cl-mcont" style="padding: 8px 30px 30px 10px;">
            <div class="block-flat">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table" id="dvPlanilla">
                            <table class="table table-bordered" id="tblPlanilla" style="line-height: 16px;">
                                <thead>
                                <tr>
                                    <th style='max-width:400px;min-width:250px;width:auto;padding:5px 0px 5px 10px;border-right: 1px solid #dadada;'><i class="fa fa-user"></i> Empleado
                                        <input placeholder="Buscar.." style='margin-left: 4px;width: 90px;border-radius: 17px;margin-top: -2px;height: 26px;' type="text"
                                               class="form-control input-sm" id="txtFiltrar">
                                    </th>
                                    <th class='th-concepto'>
                                        <div class='rotate'>
                                            <span>REM. BAS.</span>
                                        </div>
                                    </th>
                                    <th class='th-concepto'>
                                        <div class='rotate'>
                                            <span>REM. BAS.</span>
                                        </div>
                                    </th>
                                    <th class='th-concepto'>
                                        <div class='rotate'>
                                            <span>REM. BAS.</span>
                                        </div>
                                    </th>
                                    <th class='th-concepto'>
                                        <div class='rotate'>
                                            <span>REM. BAS.</span>
                                        </div>
                                    </th>
                                    <th class='th-concepto'>
                                        <div class='rotate'>
                                            <span>REM. BAS.</span>
                                        </div>
                                    </th>
                                    <th class='th-concepto'>
                                        <div class='rotate'>
                                            <span>REM. BAS.</span>
                                        </div>
                                    </th>
                                    <th class='th-concepto'>
                                        <div class='rotate'>
                                            <span>REM. BAS.</span>
                                        </div>
                                    </th>
                                    <th class='th-concepto'>
                                        <div class='rotate'>
                                            <span>ASIG. FAM.</span>
                                        </div>
                                    </th>
                                    <th class='th-concepto'>
                                        <div class='rotate'>
                                            <span>ONP</span>
                                        </div>
                                    </th>
                                    <th class='th-concepto'>
                                        <div class='rotate'>
                                            <span>TELEFONO RPM</span>
                                        </div>
                                    </th>
                                    <th class='th-concepto'>
                                        <div class='rotate'>
                                            <span>COMEDOR</span>
                                        </div>
                                    </th>
                                    <th class='th-concepto' style='background-color:lightgoldenrodyellow'>
                                        <div class='rotate' style='background-color:lightgoldenrodyellow'>
                                            <span><a data-modal="modConcepto" class="md-trigger" id="lnkDescuento" href="#" onclick='' >AGREGAR</a></span>
                                        </div>
                                    </th>
                                    <th class='th-concepto' style='background-color: #8a2b6c;'>
                                        <img style='height: 47px;padding: 0px;float: right;position: fixed;margin-top: -41px;margin-left: 11px;z-index: 1;' src="assets\img\credit_card_terminal.jpg">
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="odd gradeX">
                                    <td>AQUILES DEJO ANACLETO TEOFILO</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 30</td>
                                    <td class="center"> 10</td>
                                    <td class="center"> 5</td>
                                    <td class="center">2</td>
                                    <td class="center">-1</td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>AQUILES DEJO ANACLETO TEOFILO</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 30</td>
                                    <td class="center"> 10</td>
                                    <td class="center"> 5</td>
                                    <td class="center">2</td>
                                    <td class="center">-1</td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td>AQUILES DEJO ANACLETO TEOFILO</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 50</td>
                                    <td class="center"> 30</td>
                                    <td class="center"> 10</td>
                                    <td class="center"> 5</td>
                                    <td class="center">2</td>
                                    <td class="center">-1</td>
                                </tr>
                                </tbody>
                                <tfoot style='background-color:aliceblue;font-weight: 700;'>
                                <tr>
                                    <th><a class='md-trigger' data-modal='modEmpleado' href='#'>Agregar un nuevo empleado</a></th>
                                    <th class="center"> 50</th>
                                    <th class="center"> 50</th>
                                    <th class="center"> 50</th>
                                    <th class="center"> 50</th>
                                    <th class="center"> 50</th>
                                    <th class="center"> 50</th>
                                    <th class="center"> 50</th>
                                    <th class="center"> 50</th>
                                    <th class="center"> 30</th>
                                    <th class="center"> 10</th>
                                    <th class="center"> 5</th>
                                    <th class="center">2</th>
                                    <th class="center">-1</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modConcepto" class="md-modal colored-header custom-width">
        <div class="md-content">
            <div class="modal-header">
                <h3>Agrega un concepto a tu planilla</h3><button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close">×</button></div>
            <div class="modal-body form">
                <div class="row">
                    <div class="col-sm-12">
                        <select class='select2' style='width:100%;' id='cmbDescuento'>
                            <option value=''>--- Seleccione para agregar un concepto ---</option>
                            <optgroup label='INGRESOS'>
                                <option value='9'>BONIFICACIÓN</option>
                                <option value='10'>CANASTA</option>
                            </optgroup>
                            <optgroup label='DESCUENTOS'>
                                <option style='color:red;' value='11'>PRESTAMO BCP</option>
                                <option style='color:red;' value='12'>TELEFONO RPM</option>
                                <option style='color:red;' value='13'>COMEDOR</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" data-dismiss="modal" class="btn btn-success pull-left">Crear un nuevo concepto</button>
                        <button onclick='aplicarDescuento()' type="button" data-dismiss="modal" class="btn btn-primary md-close">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modPlanilla" class="md-modal colored-header md-effect-9" style='width:600px;'>
        <div class="md-content">
            <div class="modal-header">
                <h3>Crear una planilla</h3><button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close">×</button></div>
            <div class="modal-body form">
                <div class="row">
                    <label class="col-sm-3 control-label">Tipo</label>
                    <div class="col-sm-9">
                        <label class="radio-inline" style="padding-left: 0px;"><input name="rndTipo" class="icheck" type="radio" value="O" checked/> ORDINARIA</label>
                        <label class="radio-inline"><input name="rndTipo" class="icheck" type="radio" value="C" /> CTS</label>
                        <label class="radio-inline"><input name="rndTipo" class="icheck" type="radio" value="G"/> GRATIFICACION</label>
                    </div>
                </div>
                <div class="row">
                    <label for="cmbMes" class="col-sm-3 control-label">Año y Mes</label>
                    <div class="col-sm-2" style="padding-right: 5px;">
                        <input id="txtAnio" type="text" class="form-control">
                    </div>
                    <div class="col-sm-3" style="padding-right: 0px;padding-left: 0px;">
                        <select id="cmbMes" class="form-control">
                            <option value="1">Enero</option><option value="2">Febrero</option><option value="3">Marzo</option>
                            <option value="4">Abril</option><option value="5">Mayo</option><option value="6">Junio</option>
                            <option value="7">Julio</option><option value="8">Agosto</option><option value="9">Setiembre</option>
                            <option value="10">Octubre</option><option value="11">Noviembre</option><option value="12">Diciembre</option>
                        </select>
                    </div>
                    <button id="btnSugerirFechas" class="btn btn-default" onclick="sugerirFechas()"><i class="fa fa-question-circle "></i> Sugerir fechas</button>
                </div>
                <div class="row">
                    <label for="txtInicio" class="col-sm-3 control-label">Fecha de inicio</label>
                    <div class="col-md-4">
                        <input id="txtInicio" type="text" value="" data-min-view="2" data-date-format="dd/mm/yyyy" class="form-control date datetime">
                    </div>
                </div>
                <div class="row">
                    <label for="txtFin" class="col-sm-3 control-label">Fecha de fin</label>
                    <div class="col-md-4">
                        <input id="txtFin" type="text" value="" data-min-view="2" data-date-format="dd/mm/yyyy" class="form-control date datetime">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-9">
                        <div class="alert alert-info" style="padding:5px;margin-bottom: 0px;text-align: left;">
                            <i class="fa fa-info-circle sign"></i>
                            <strong>Nota!</strong> You have 3 new messages in your inbox.
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="button" data-dismiss="modal" class="btn btn-primary btn-block btn-flat md-close" style="width: 100px;">Crear</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modEmpleado" class="md-modal colored-header md-effect-9">
        <div class="md-content">
            <div class="modal-header">
                <h3>Agregar un nuevo empleado</h3><button type="button" data-dismiss="modal" aria-hidden="true" class="close md-close">×</button>
            </div>
            <div class="modal-body form">
                <div class="block-flat" style="border-top: 1px solid #e2e2e2;margin-bottom: 13px;">
                    <div class="header">
                        <h3>Datos personales básicos</h3>
                    </div>
                    <div class="content">
                        <div class="row">
                            <label class="col-sm-3 control-label">Documento</label>
                            <div class="col-md-4" style="padding-left:0px;padding-right:0px;">
                                <select class='form-control' name="" id="cmbTipoDocumento">
                                    <option value="">---</option>
                                    <option value="01">DNI</option>
                                    <option value="09">CARNÉ SOLIC REFUGIO</option>
                                </select>
                            </div>
                            <div class="col-md-4" style="padding-left:0px;">
                                <input placeholder="Nro de Documento" id="txtNro_Documento" type="text" value="" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <label for="txtApellido_Paterno" class="col-sm-3 control-label">Apellidos</label>
                            <div class="col-md-4" style="padding-left:0px;padding-right: 0px;">
                                <input placeholder="Paterno" id="txtApellido_Paterno" type="text" value="" class="form-control">
                            </div>
                            <div class="col-md-4" style="padding-left:0px;">
                                <input placeholder="Materno" id="txtApellido_Materno" type="text" value="" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 control-label">Nombres</label>
                            <div class="col-md-4" style="padding-left:0px;padding-right: 0px;">
                                <input placeholder="Nombre completo" id="txtNombres" type="text" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-flat" style="border-top: 1px solid #e2e2e2;margin-bottom: 13px;">
                    <div class="header">
                        <h3>Datos laborales y sociales</h3>
                    </div>
                    <div class="content">
                        <div class="row">
                            <label for="txtInicio" class="col-sm-3 control-label">Fechas de Contrato</label>
                            <div class="col-md-4" style="padding-left:0px;padding-right: 0px;">
                                <input id="txtInicio" type="text" value="" data-min-view="2" data-date-format="dd/mm/yyyy" class="form-control date datetime">
                            </div>
                            <div class="col-md-4" style="padding-left:0px;padding-right: 0px;">
                                <input id="txtFin" type="text" value="" data-min-view="2" data-date-format="dd/mm/yyyy" class="form-control date datetime">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 control-label">Regimen Pensionario</label>
                            <div class="col-md-4" style="padding-left:0px;padding-right: 0px;">
                                <select id="cmbRegimenPensionario" class="form-control">
                                    <option value="">---</option>
                                    <option value="1">ONP</option>
                                    <option value="2">HABITAT</option>
                                    <option value="3">PRIMA</option>
                                </select>
                            </div>
                            <div class="col-md-4" style="padding-left:0px;padding-right: 0px;">
                                <select id="cmbTipoComision" class="form-control">
                                    <option value="">-- Tipo de comisión --</option>
                                    <option value="1">MIXTA</option>
                                    <option value="2">FLUJO</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 control-label">Regimen de Salud</label>
                            <div class="col-md-4" style="padding-left:0px;padding-right: 0px;">
                                <select id="cmbRegimenSalud" class="form-control">
                                    <option value="">---</option>
                                    <option value="00">ESSALUD </option>
                                    <option value="01">ESSALUD y EPS</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-9">
                        <div class="alert alert-info" style="padding:5px;margin-bottom: 0px;text-align: left;">
                            <i class="fa fa-info-circle sign"></i>
                            <strong>Nota!</strong> Los datos solicitados son los básicos para agregar.
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button style='font-size:14px;' type="button" data-dismiss="modal" class="btn btn-primary btn-block btn-flat md-close">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            //initialize the javascript
            App.init();

            $(".select2").select2();
            $(".md-trigger").modalEffects();

            inicializarDataTable();

            $(document).keyup(function (e) {
                if (e.keyCode == 113) {
                    $("#txtFiltrar").eq(0).focus();
                    $("#txtFiltrar").eq(0).select();
                }
            });

            $("#txtFiltrar").keyup(function (e) {
                if (e.keyCode == 13 || e.keyCode == 40) {
                    $("#tblPlanilla tr:first-child td:last-child").focus();
                    $("#tblPlanilla tr:first-child td:last-child").click();
                }
            });

            $("[data-toggle='tooltip']").tooltip();
            $("input").iCheck({
                checkboxClass: "icheckbox_square-blue checkbox",
                radioClass: "iradio_square-blue"
            });
            $(".datetime").datetimepicker();

            var hoy = new Date();
            var mes = "0" + (hoy.getMonth() + 1);
            $("#txtAnio").val(hoy.getFullYear());
            $("#cmbMes").val(mes.slice(-2)).prop("selected", true);

            introJs().setOption("showBullets", !1).start();

            $('#txtFiltrar').on('keyup click', function () {
                filtrar();
            });

        });



        function inicializarDataTable() {
            var $table = $("#tblPlanilla");

            $table.dataTable({
                bAutoWidth: false,
                aLengthMenu: [
                    [-1, 10, 25],
                    ["Todos", 10, 25]
                ],
                columnDefs: [{
                    orderable: false,
                    targets: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                }],
                iDisplayLength: 10,
                "fnDrawCallback": function () {

                    $table.editableTableWidget({
                        editor: $('<input>'),
                        preventColumns: [1]
                    }).numericInputExample();
                }
            });

            $("#tblPlanilla_filter").hide()

        }

        function configurarMeses(meses) {
            $("#cmbMes").empty();
            $.each(meses, function (key, value) {
                $('#cmbMes')
                    .append($('<option>', {
                        value: key
                    })
                        .text(value));
            });
        }

        function deshabilitarFechas(tipo) {
            var estado = false;
            if (tipo != "O")
                estado = true;
            $("#txtInicio").prop('disabled', estado);
            $("#txtFin").prop('disabled', estado);
            $("#btnSugerirFechas").prop('disabled', estado);
        }


        function filtrar() {
            $('#tblPlanilla').DataTable().search($('#txtFiltrar').val()).draw();
        }

        $('input[type=radio][name=rndTipo]').on('ifChecked', function (event) {
            var tipo = this.value;
            var meses;
            switch (tipo) {
                case "O":
                    meses = {
                        "1": "Enero",
                        "2": "Febrero",
                        "3": "Marzo",
                        "4": "Abril",
                        "5": "Mayo",
                        "6": "Junio",
                        "7": "Julio",
                        "8": "Agosto",
                        "9": "Setiembre",
                        "10": "Octubre",
                        "11": "Noviembre",
                        "12": "Diciembre"
                    };
                    break;
                case "C":
                    meses = {
                        "5": "Mayo",
                        "11": "Noviembre"
                    };
                    break;
                case "G":
                    meses = {
                        "7": "Julio",
                        "12": "Diciembre"
                    };
                    break;
            }
            configurarMeses(meses);
            deshabilitarFechas(tipo);
            $("#txtInicio").val("");
            $("#txtFin").val("");
        });


        function sugerirFechas() {
            var tipo = $('input[name=rndTipo]:checked').val();
            if (tipo == "O") {
                var anio = $("#txtAnio").val();
                var mes = "0" + $("#cmbMes option:selected").val();
                var inicio = "01/" + mes.slice(-2) + "/" + anio;
                var fin = new Date(anio, parseInt(mes), 0);
                $("#txtInicio").val(inicio);
                $("#txtFin").val(formato_fecha(fin));
            }
        }

        function formato_fecha(fecha) {
            return ("0" + fecha.getDate()).slice(-2) + "/" + ("0" + (fecha.getMonth() + 1)).slice(-2) + "/" + fecha.getFullYear()
        }

        function aplicarDescuento() {
            var obj = $("#cmbDescuento");
            if ($(obj).val() !== "") {
                var descuento = $("#cmbDescuento option:selected").text();
                $("#lnkDescuento").text(descuento);
            } else {
                $("#lnkDescuento").text("AGREGAR");
            }
            $("#txtFiltrar").focus();
            $("#txtFiltrar").select();
        }

        $('#tblPlanilla td').on('change', function (evt, newValue) {
            // do something with the new cell value
            if (isNumeric(newValue)) {
                var valor = parseFloat(newValue);
                var celda = $(this);
                celda.attr('editado', 1);
                celda.css('font-weight', '700');
                celda.css('background-color', 'lightgoldenrodyellow');
                var col = $(this).parent().children().index(celda);
                var fil = $(this).parent().parent().children().index(celda.parent());
                $("#tblPlanilla").DataTable().cell(fil, col).data(valor);
            } else {
                return false;
            }
        });

        function isNumeric(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        }
    </script>
@endsection

