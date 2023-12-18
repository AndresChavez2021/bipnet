@extends('layouts.app-master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="mb-4">Pronóstico de Ventas </h1>
                    <!-- <a href="{{ route('pronostico-ventas.create') }}" class="btn btn-secondary">Crear Oportunidad</a>-->
                </div>

                <hr>
                <!-- Formulario de filtro por estado -->
                <form method="GET" action="{{ route('pronostico-ventas.index') }}" class="mb-4">
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


    <script>
        const data = <?= json_encode($data) ?>;

        // Imprimir datos en la consola para verificar


        const averages = JSON.parse(data.average);
        const range = JSON.parse(data.range);
        // const avgs=parseFloat(averages)
        // console.log("average ", averages)

        Highcharts.chart('container', {

            title: {
                text: 'Ventas en 2024',
                align: 'left'
            },

            subtitle: {
                text: 'Source: ' +
                    '<a href="https://www.bipnet.com.bo"' +
                    'target="_blank">BIPNET</a>',
                align: 'left'
            },

            xAxis: {
                type: 'datetime',
                accessibility: {
                    rangeDescription: ''
                }
            },

            yAxis: {
                title: {
                    text: null
                }
            },

            tooltip: {
                crosshairs: true,
                shared: true,
                valueSuffix: '%'
            },

            plotOptions: {
                series: {
                    pointStart: Date.UTC(2024, <?=$fecha?>, 1),
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
            }, {
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
            }]
        });
    </script>
@endsection
