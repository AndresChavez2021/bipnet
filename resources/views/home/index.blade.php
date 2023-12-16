@extends('layouts.app-master')
@section('content')

    @auth
        <p>Bienvenido {{ auth()->user()->name ?? auth()->user()->email }}, estás autenticado a la página.</p>
    @endauth
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.anychart.com/releases/8.11.1/js/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.11.1/js/anychart-pareto.min.js"></script>
    <body>
    {{$cotizaciones}} <br>
    <div class="container">
        <div class="row">
            <h3>Productos más vendidos</h3>
            <div class="col-6" id="pie-container"></div>
            <div class="col-6" id="column-container"></div>
        </div>
        <div class="row">
            <h3>Historial de productos más vendidos</h3>
            <div class="col-12" id="line-container"></div>
        </div>
        <div class="row">
            <h3>Productos más vendidoas (Diagrama de Pareto)</h3>
            <div class="col-12" id="pareto-container" style="height: 600px"></div>
        </div>
        <div class="row">
            <h3>Oportunidades</h3>
            <div class="col-6" id="oportunidad-pie-container"></div>
            <div class="col-6" id="oportunidad-column-container"></div>
        </div>
        <div class="row">
            <h3>Ventas</h3>
            <div class="col-6" id="venta-pie-container"></div>
            <div class="col-6" id="venta-column-container"></div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>

        //PIE CHART
        Highcharts.chart('pie-container', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Distribución de ventas'
            },
            tooltip: {
                valueSuffix: '%'
            },
            subtitle: {
                text:
                    '(Grafico expresado en %)'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: [{
                        enabled: true,
                        distance: 20
                    }, {
                        enabled: true,
                        distance: -40,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '1.2em',
                            textOutline: 'none',
                            opacity: 0.7
                        },
                        filter: {
                            operator: '>',
                            property: 'percentage',
                            value: 10
                        }
                    }]
                }
            },
            series: [
                {
                    name: 'Porcentaje',
                    colorByPoint: true,
                    data: <?=$data?>
                }
            ]
        });


        //COLUMN CHART
        Highcharts.chart('column-container', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'left',
                text: 'Ingreso de ventas'
            },
            subtitle: {
                align: 'left',
                text: '(Moneda en Bolivianos)'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'Productos y servicios'
            },
            yAxis: {
                title: {
                    text: 'Ingreso (Bs.)'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}Bs.'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}$us</b> of total<br/>'
            },

            series: [
                {
                    name: 'Producto',
                    colorByPoint: true,
                    data: <?=$data?>
                }
            ],
        });

        //LINES CHART
        Highcharts.chart('line-container', {

            title: {
                text: 'Historial de ventas',
                align: 'left'
            },

            subtitle: {
                text: '(Venta de productos de los últimos meses.)',
                align: 'left'
            },

            yAxis: {
                title: {
                    text: 'Ingresos (Bs.)'
                }
            },

            xAxis: {
                title: {
                    text: 'Meses (Enero a Diciembre)'
                },
                accessibility: {
                    rangeDescription: 'Range: Enero to December'
                }
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 1
                }
            },

            series: <?=$lines?>,

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });

        anychart.onDocumentReady(function () {
            // add data
            let data = <?=$productos?>;
            // create a pareto chart with the data
            let chart = anychart.pareto(data);
            // set a pareto column series
            let column = chart.getSeriesAt(0);
            // set a pareto line series
            let line = chart.getSeriesAt(1);
            // name the measure axis
            chart.yAxis(0).title("Ingresos (Bs.)");
            // name the cumulative percentage axis
            chart.yAxis(1).title("Porcentaje (%)");
            // add a chart title
            chart.title("Ingresos de ventas");
            // add pointer
            chart.crosshair().enabled(true).xLabel(false);
            // set the pareto line series labels
            line.labels().enabled(true).anchor('right-bottom').format('{%CF}%');
            // set column and line format
            column.tooltip().format("Ingresos: {%Value}Bs");
            line.tooltip().format("Porc. Acumulativo: {%CF}%");
            // set the container element id for the chart
            chart.container("pareto-container");
            // initiate the pareto chart drawing
            chart.draw();
        });

        //PIE CHART
        Highcharts.chart('oportunidad-pie-container', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Distribución'
            },
            tooltip: {
                valueSuffix: '%'
            },
            subtitle: {
                text:
                    '(Grafico expresado en %)'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: [{
                        enabled: true,
                        distance: 20
                    }, {
                        enabled: true,
                        distance: -40,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '1.2em',
                            textOutline: 'none',
                            opacity: 0.7
                        },
                        filter: {
                            operator: '>',
                            property: 'percentage',
                            value: 10
                        }
                    }]
                }
            },
            series: [
                {
                    name: 'Porcentaje',
                    colorByPoint: true,
                    data: <?=$oportunidadEstado?>
                }
            ]
        });


        //COLUMN CHART
        Highcharts.chart('oportunidad-column-container', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'left',
                text: 'Cantidad'
            },
            subtitle: {
                align: 'left',
                text: '(Grafico expresado en número de oportunidades clasificados por estado)'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'Estado de oportunidades'
            },
            yAxis: {
                title: {
                    text: 'Número de oportunidades'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}$us</b> of total<br/>'
            },

            series: [
                {
                    name: 'Oportunidades',
                    colorByPoint: true,
                    data: <?=$oportunidadEstado?>
                }
            ],
        });

        //PIE CHART
        Highcharts.chart('venta-pie-container', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Distribución'
            },
            tooltip: {
                valueSuffix: '%'
            },
            subtitle: {
                text:
                    '(Grafico expresado en %)'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: [{
                        enabled: true,
                        distance: 20
                    }, {
                        enabled: true,
                        distance: -40,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '1.2em',
                            textOutline: 'none',
                            opacity: 0.7
                        },
                        filter: {
                            operator: '>',
                            property: 'percentage',
                            value: 10
                        }
                    }]
                }
            },
            series: [
                {
                    name: 'Porcentaje',
                    colorByPoint: true,
                    data: <?=$ventaEstado?>
                }
            ]
        });


        //COLUMN CHART
        Highcharts.chart('venta-column-container', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'left',
                text: 'Cantidad'
            },
            subtitle: {
                align: 'left',
                text: '(Grafico expresado en número de ventas clasificados por estado)'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'Estado de las ventas'
            },
            yAxis: {
                title: {
                    text: 'Número de ventas'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}$us</b> of total<br/>'
            },

            series: [
                {
                    name: 'Ventas',
                    colorByPoint: true,
                    data: <?=$ventaEstado?>
                }
            ],
        });


    </script>
@endsection
