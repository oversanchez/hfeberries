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
            <h2 style="display:inline-block;">Control de Reuniones</h2>
            <i id="loading" style="display:none;" class="fa fa-2x fa-spinner fa-spin"></i>

            <input id="txtFecha" class="input-lg form-control date datetime"
                   data-min-view="2" data-date-format="dd/mm/yyyy" type="text"
                   maxlength="10" style="width: 150px;display:inline;font-size:20px;margin-left:20px;">
            <button class="btn btn-default pull-right" style="margin-top:7px;" onclick="descargar()">Descargar</button>
            <button class="btn btn-default pull-right" style="margin-top:7px;" onclick="listar()">Actualizar lista</button>
        </div>
        <div class="cl-mcont" style="margin-top: 7px;">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <table class='table table-bordered dataTable no-footer' id="tblListado">
                        <thead>
                        <tr>
                            <th style="width: 80px;">Seccion</th>
                            <th>Alumno</th>
                            <th>Apoderado</th>
                            <th style="width: 80px;">DNI</th>
                            <th style="width: 100px;">Marca</th>
                            <th style="width: 80px;">Acción</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
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
            t = $('#tblListado').DataTable({"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]]});
            listar();
        });

        function listar() {
            var info = [{"_token": "{{ csrf_token() }}"}][0];
            $.ajax({
                url: "/intranet/procesos/control_reunion/listar",
                type: "GET",
                data: info,
                beforeSend: function () {
                    $("#loading").show();
                },
                success: function (data) {
                    t.clear().draw();
                    $.each(data,function( index, value ) {
                        var boton = '<button id="'+value["id"]+'" class="btn btn-danger btn-sm" onclick="marcar(this)">Marcar</button>';
                        t.row.add([value['ref_seccion'],
                            value['ref_alumno'],
                            value['nombre_completo'],
                            value['numero_documento'],
                            value['marcacion'] == null ? "<div style='display:none'; id='"+value["id"]+"'></div>" : value['marcacion'] + "<div style='display:none'; id='"+value["id"]+"'></div>",
                            value['marcacion'] == null ? boton : ""
                            ]).draw(false);
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

        function marcar(obj) {
            var id = $(obj).attr("id");
            var info = [{"_token": "{{ csrf_token() }}"}][0];
            if (confirm("¿Deseas continuar la modificación?")) {
                $.ajax({
                    url: "/intranet/procesos/control_reunion/" + id,
                    type: "PUT",
                    data: info,
                    beforeSend: function () {
                        $("#loading").show();
                    },
                    success: function (data) {
                        notificacion('Marcación realizada', 'Registro satisfactorio', 'success');
                        $("#"+id).parent().html(new Date().toLocaleString());
                        $(obj).remove();
                        $("input[type=search]").eq(0).select();
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

        function descargar() {
            exportToExcel("tblListado", "Reporte de Control de Reuniones");
        }
    </script>
@endsection

