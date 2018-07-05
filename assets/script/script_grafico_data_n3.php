<script type="text/javascript">
$(function () {
    var chart = new Highcharts.Chart({
        chart: {
            type: 'areaspline',
             renderTo: 'grafico'
        },
        title: {
            text: 'Pedidos Por dia'
        },

        xAxis: {
            categories: <?= $series_data1;?>,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Monto'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Monto',
            data: <?= $series_data2;?>

        }]
    });
});

/*$(function () {
    var chart = new Highcharts.Chart({
        chart: {
            type: 'column',
             renderTo: 'grafico2'
        },
        title: {
            text: 'Pedidos por Cliente'
        },

        xAxis: {
            categories: <?= $series_data3;?>,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Total',
            data: <?= $series_data4;?>

        }]
    });
});
$(function () {
    var chart = new Highcharts.Chart({
        chart: {
            type: 'column',
             renderTo: 'grafico3'
        },
        title: {
            text: 'Inventario'
        },

        xAxis: {
            categories: <?= $series_data5;?>,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Cantidad',
            data: <?= $series_data6;?>

        }]
    });
});

*/
</script>