@extends('layouts.app-master')
@section('content')

    @auth
        <p>Bienvenido {{ auth()->user()->name ?? auth()->user()->email }}, estás autenticado a la página.</p>
    @endauth

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-6" id="pie-container"></div>
            <div class="col-6" id="column-container"></div>
        </div>
        <div class="row">
            <div class="col-12" id="line-container"></div>
        </div>
        <div class="row">
            <div class="col-12" id="pareto-container"></div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>

        //PIE CHART

        //console.log(data);
        Highcharts.chart('pie-container', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Companies'
            },
            tooltip: {
                valueSuffix: '%'
            },
            subtitle: {
                text:
                    'Grafico expresado en %'
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
                    name: 'Percentage',
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
                text: 'Companies, 2022'
            },
            subtitle: {
                align: 'left',
                text: 'Grafico expresado en Millones'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'Companies'
            },
            yAxis: {
                title: {
                    text: 'Profits'
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
                        format: '{point.y:.1f}$us'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}$us</b> of total<br/>'
            },

            series: [
                {
                    name: 'Browsers',
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
                text: 'Venta de productos de los últimos meses.',
                align: 'left'
            },

            yAxis: {
                title: {
                    text: 'Ingresos $us'
                }
            },

            xAxis: {
                accessibility: {
                    rangeDescription: 'Meses'
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
                    pointStart: 2010
                }
            },

            series: [{
                name: 'Installation & Developers',
                data: [43934, 48656, 65165, 81827, 112143, 142383,
                    171533, 165174, 155157, 161454, 154610]
            }, {
                name: 'Manufacturing',
                data: [24916, 37941, 29742, 29851, 32490, 30282,
                    38121, 36885, 33726, 34243, 31050]
            }, {
                name: 'Sales & Distribution',
                data: [11744, 30000, 16005, 19771, 20185, 24377,
                    32147, 30912, 29243, 29213, 25663]
            }, {
                name: 'Operations & Maintenance',
                data: [null, null, null, null, null, null, null,
                    null, 11164, 11218, 10077]
            }, {
                name: 'Other',
                data: [21908, 5548, 8105, 11248, 8989, 11816, 18274,
                    17300, 13053, 11906, 10073]
            }],

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


        Highcharts.chart('pareto-container', {
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: 'Restaurants Complaints'
            },
            tooltip: {
                shared: true
            },
            xAxis: {
                categories: [
                    'Overpriced',
                    'Small portions',
                    'Wait time',
                    'Food is tasteless',
                    'No atmosphere',
                    'Not clean',
                    'Too noisy',
                    'Unfriendly staff'
                ],
                crosshair: true
            },
            yAxis: [{
                title: {
                    text: ''
                }
            }, {
                title: {
                    text: ''
                },
                minPadding: 0,
                maxPadding: 0,
                max: 100,
                min: 0,
                opposite: true,
                labels: {
                    format: '{value}%'
                }
            }],
            series: [{
                type: 'pareto',
                name: 'Pareto',
                yAxis: 1,
                zIndex: 10,
                baseSeries: 1,
                tooltip: {
                    valueDecimals: 2,
                    valueSuffix: '%'
                }
            }, {
                name: 'Complaints',
                type: 'column',
                zIndex: 2,
                data: [755, 222, 151, 86, 72, 51, 36, 10]
            }]
        });

    </script>
@endsection