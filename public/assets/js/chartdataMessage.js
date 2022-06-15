function dataMessage() {
    Chart.plugins.register({
        afterDraw: function(chart) {

            if (chart.data.datasets[0].data.length === 0) {
                // No data is present
                var ctx = chart.chart.ctx;
                var width = chart.chart.width;
                var height = chart.chart.height
                chart.clear();
                ctx.save();
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                ctx.fillStyle = "red";
                ctx.font = "bold 22px 'Helvetica Neue', Helvetica, Arial, sans-serif";
                ctx.fillText('No data to display', width / 2, height / 2);
                ctx.restore();
            }
        }
    });
}