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
                <form method="GET" action="{{ route('oportunidades.index') }}" class="mb-4">
                    @csrf
                    <div class="form-group">
                        <label for="mes">Filtrar por Mes:</label>
                        <select name="mes">
                            <option value="01">Enero</option>
                            <option value="02">Febrero</option>
                            <option value="03">Marzo</option>
                            <option value="04">Abril</option>
                            <option value="05">Mayo</option>
                            <option value="06">Junio</option>
                            <option value="07">Julio</option>
                            <option value="08">Agosto</option>
                            <option value="09">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
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
   
    const average    = JSON.parse(data.average);
    const range = JSON.parse(data.range);
   

    Highcharts.chart('container', {

title: {
    text: 'July temperatures in Nesbyen, 2022',
    align: 'left'
},

subtitle: {
    text: 'Source: ' +
        '<a href="https://www.yr.no/nb/historikk/graf/1-113585/Norge/Viken/Nesbyen/Nesbyen?q=2022-07"' +
        'target="_blank">YR</a>',
    align: 'left'
},

xAxis: {
    type: 'datetime',
    accessibility: {
        rangeDescription: 'Range: Jul 1st 2022 to Jul 31st 2022.'
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
    valueSuffix: '°C'
},

plotOptions: {
    series: {
        pointStart: Date.UTC(2022, 6, 1),
        pointIntervalUnit: 'day'
    }
},

series: [{
    name: 'Temperature',
    data: average,
    zIndex: 1,
    marker: {
        fillColor: 'white',
        lineWidth: 2,
        lineColor: Highcharts.getOptions().colors[0]
    }
}, {
    name: 'Range',
    data: range,
    type: 'arearange',
    lineWidth: 0,
    linkedTo: ':previous',
    color: Highcharts.getOptions().colors[0],
    fillOpacity: 0.3,
    zIndex: 0,
    marker: {
        enabled: false
    }
}]
});

    </script>

@endsection
