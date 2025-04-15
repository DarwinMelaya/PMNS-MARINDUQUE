<script>
    Highcharts.chart('trainingMF', {
        chart: {
            type: 'column'
        },
        title: {
            align: 'left',
            text: 'Training Participants'
        },
        subtitle: {
            align: 'left',
            text: 'Click the columns to view male and female.'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total Male and Female participants'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: ' +
                '<b>{point.y:.2f}</b> of total<br/>'
        },

        series: [{
            name: 'Participants',
            colorByPoint: true,
            data: [{
                    name: 'DOST-Assisted Firm',
                    y: <?= $dost_assist_firm_male + $dost_assist_firm_female ?>,
                    drilldown: 'DOST-Assisted Firm'
                },
                {
                    name: 'Non DOST-Assisted Firm',
                    y: <?= $nondost_assist_firm_male + $nondost_assist_firm_female ?>,
                    drilldown: 'Non DOST-Assisted Firm'
                },
                {
                    name: 'Cooperatives',
                    y: <?= $cooperative_male + $cooperative_female ?>,
                    drilldown: 'Cooperatives'
                },
                {
                    name: 'Startup',
                    y: <?= $startup_male + $startup_female ?>,
                    drilldown: 'Startup'
                },
                {
                    name: 'Individuals',
                    y: <?= $individual_male + $individual_female ?>,
                    drilldown: 'Individuals'
                },
                {
                    name: 'Academe',
                    y: <?= $academe_male + $academe_female ?>,
                    drilldown: 'Academe'
                },
                {
                    name: 'Government',
                    y: <?= $government_male + $government_female ?>,
                    drilldown: 'Government'
                }
            ]
        }],
        drilldown: {
            breadcrumbs: {
                position: {
                    align: 'right'
                }
            },
            series: [{
                    name: 'DOST-Assisted Firm',
                    id: 'DOST-Assisted Firm',
                    data: [
                        [
                            'Male',
                            <?= $dost_assist_firm_male ?>
                        ],
                        [
                            'Female',
                            <?= $dost_assist_firm_female ?>
                        ]
                    ]
                },
                {
                    name: 'Non DOST-Assisted Firm',
                    id: 'Non DOST-Assisted Firm',
                    data: [
                        [
                            'Male',
                            <?= $nondost_assist_firm_male ?>
                        ],
                        [
                            'Female',
                            <?= $nondost_assist_firm_female ?>
                        ]
                    ]
                },
                {
                    name: 'Cooperative',
                    id: 'Cooperative',
                    data: [
                        [
                            'Male',
                            <?= $cooperative_male ?>
                        ],
                        [
                            'Female',
                            <?= $cooperative_female ?>
                        ]
                    ]
                },
                {
                    name: 'Startup',
                    id: 'Startup',
                    data: [
                        [
                            'Male',
                            <?= $startup_male ?>
                        ],
                        [
                            'Female',
                            <?= $startup_male ?>
                        ]
                    ]
                },
                {
                    name: 'Individuals',
                    id: 'Individuals',
                    data: [
                        [
                            'Male',
                            <?= $individual_male ?>
                        ],
                        [
                            'Female',
                            <?= $individual_female ?>
                        ]
                    ]
                },
                {
                    name: 'Academe',
                    id: 'Academe',
                    data: [
                        [
                            'Male',
                            <?= $academe_male ?>
                        ],
                        [
                            'Female',
                            <?= $academe_female ?>
                        ]
                    ]
                },
                {
                    name: 'Government',
                    id: 'Government',
                    data: [
                        [
                            'Male',
                            <?= $government_male ?>
                        ],
                        [
                            'Female',
                            <?= $government_female ?>
                        ]
                    ]
                }
            ]
        }
    });
</script>