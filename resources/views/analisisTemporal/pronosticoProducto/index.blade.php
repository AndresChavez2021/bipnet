@extends('layouts.app-master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="mb-4">Pronóstico de Productos </h1>
                    <!-- <a href="{{ route('pronostico-ventas.create') }}" class="btn btn-secondary">Crear Oportunidad</a>-->
                </div>

                <hr>
                <!-- Formulario de filtro por estado -->
                <form method="GET" action="{{ route('pronostico-productos.index') }}" class="mb-4">
                    @csrf
                    <div class="form-group">
                        <label for="mes">Filtrar por Mes:</label>
                        <select name="mes">
                            <option {{ $fecha == '01' ? 'selected' : null }} value="01">Enero</option>
                            <option {{ $fecha == '02' ? 'selected' : null }} value="02">Febrero</option>
                            <option {{ $fecha == '03' ? 'selected' : null }} value="03">Marzo</option>
                            <option {{ $fecha == '04' ? 'selected' : null }} value="04">Abril</option>
                            <option {{ $fecha == '05' ? 'selected' : null }} value="05">Mayo</option>
                            <option {{ $fecha == '06' ? 'selected' : null }} value="06">Junio</option>
                            <option {{ $fecha == '07' ? 'selected' : null }} value="07">Julio</option>
                            <option {{ $fecha == '08' ? 'selected' : null }} value="08">Agosto</option>
                            <option {{ $fecha == '09' ? 'selected' : null }} value="09">Septiembre</option>
                            <option {{ $fecha == '10' ? 'selected' : null }} value="10">Octubre</option>
                            <option {{ $fecha == '11' ? 'selected' : null }} value="11">Noviembre</option>
                            <option {{ $fecha == '12' ? 'selected' : null }} value="12">Diciembre</option>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-secondary">Filtrar</button>
                </form>
                <hr>
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description">
                        Pronostico de Las ventas en Bipnet.SRL.
                    </p>
                </figure>
            </div>
        </div>
    </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <!-- Agrega la versión en español de Highcharts -->
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/oldie.js"></script>
    <script src="https://rawgit.com/highcharts/highcharts-dist/master/es-modules/masters/highcharts.src.js"></script>
    <script src="https://rawgit.com/highcharts/highcharts-dist/master/es-modules/masters/highcharts.esm.src.js"></script>
    <script src="https://rawgit.com/highcharts/highcharts-dist/master/es-modules/masters/highcharts-3d.src.js"></script>
    <script src="https://rawgit.com/highcharts/highcharts-dist/master/es-modules/masters/highcharts-more.src.js"></script>
    <script src="https://rawgit.com/highcharts/highcharts-dist/master/es-modules/masters/modules/accessibility.src.js">
    </script>

    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <script>
        Highcharts.setOptions({
            lang: {
                months: [
                    'Enero', 'Febrero', 'Marzo', 'Abril',
                    'Mayo', 'Junio', 'Julio', 'Agosto',
                    'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                ],
                weekdays: [
                    'Domingo', 'Lunes', 'Martes', 'Miércoles',
                    'Jueves', 'Viernes', 'Sábado'
                ],
                shortMonths: [
                    'Ene', 'Feb', 'Mar', 'Abr',
                    'May', 'Jun', 'Jul', 'Ago',
                    'Sep', 'Oct', 'Nov', 'Dic'
                ],
                decimalPoint: ',',
                thousandsSep: '.',
                loading: 'Cargando...',
                contextButtonTitle: 'Menú contextual',
                printChart: 'Imprimir gráfico',
                downloadJPEG: 'Descargar imagen JPEG',
                downloadPDF: 'Descargar documento PDF',
                downloadPNG: 'Descargar imagen PNG',
                downloadSVG: 'Descargar imagen SVG',
                downloadCSV: 'Descargar archivo CSV',
                downloadXLS: 'Descargar archivo XLS',
                drillUpText: 'Volver a {series.name}',
                resetZoom: 'Restablecer zoom',
                resetZoomTitle: 'Restablecer nivel de zoom 1:1',
                thousandsSep: ','
            }
        });








        const data = <?= json_encode($data) ?>;
        // const fechas = <?= json_encode($fechaGrafico) ?>;
        /*  const fechas = <?= json_encode($fechaGrafico) ?>.map(fecha => Date.parse(fecha));
         console.log(fechas); */
        const Mes = <?= json_encode($fecha) ?>;
        const fechas = <?= json_encode($fechaGrafico) ?>.map(fecha => Date.parse(fecha + '-01'));
        console.log(fechas);




        const averages = JSON.parse(data.average);
        const range = JSON.parse(data.range);

        Highcharts.chart('container', {
            title: {
                text: 'Productos vendidos en 2024',
                align: 'left'
            },

            subtitle: {
                text: 'Source: ' +
                    '<a href="https://www.bipnet.com.bo"' +
                    'target="_blank">BIPNET</a>',
                align: 'left'
            },

            /*  xAxis: {
                 type: 'datetime',
                 title: {
                     text: 'Fecha'
                 },
                 labels: {
                     formatter: function() {
                         return Highcharts.dateFormat('%d %b %Y', this.value);
                     }
                 }
             }, */
            xAxis: {
                type: 'datetime',
                title: {
                    text: 'Fecha'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.dateFormat('%b %Y', this.value);
                    }
                },
                min: Date.UTC(2024, 0, 1), // Establecer el inicio del intervalo
                max: Date.UTC(2024, 12, 31), // Establecer el final del intervalo
                // Intervalo de un año en milisegundos
            },


            yAxis: {
                title: {
                    text: null
                }
            },

            tooltip: {
                crosshairs: true,
                shared: true,
                valueSuffix: '',
                /* formatter: function() {
                    return (
                        '<span style="font-size: 10px">' +
                        Highcharts.dateFormat('%d %b %Y', this.x) +
                        '</span><br/>' +
                        '<span style="color:' + this.points[0].color + '">\u25CF</span>' +
                        this.points[0].series.name + ': <b>' + this.points[0].y + '</b><br/>' +
                        '<span style="color:' + this.points[1].color + '">\u25CF</span>' +
                        this.points[1].series.name + ': <b>' + this.points[1].point.low + '</b> to <b>' +
                        this.points[1].point.high + '</b>'
                    );
                } */
            },
            plotOptions: {
                series: {
                    pointStart: Date.UTC(2024, <?= $fecha . '-01' ?>, 1),

                    pointIntervalUnit: 'month',
                }
            },
            series: [{
                    name: 'p50',
                    data: averages,
                    zIndex: 1,
                    marker: {
                        fillColor: 'white',
                        lineWidth: 2,
                        lineColor: Highcharts.getOptions().colors[1]
                    }
                },
                {
                    name: 'p10,p90',
                    data: range,
                    type: 'arearange',
                    lineWidth: 0,
                    linkedTo: ':previous',
                    color: Highcharts.getOptions().colors[2],
                    fillOpacity: 0.3,
                    zIndex: 0,
                    marker: {
                        enabled: false
                    }
                }
            ]
        });
    </script>
@endsection
