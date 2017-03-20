<?php

	$graph = "
    <script type='text/javascript'>
        $(function () {
            var chart = new Highcharts.Chart({
               credits: {
            enabled: false
        },
          chart: {
                    renderTo: \"$this->id\",
                    ";
	if (!$this->responsive) {
		$graph .= $this->width ? "width: $this->width," : '';
		$graph .= $this->height ? "height: $this->height," : '';
	}
	$graph .= "
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: \"$this->title\",
                },
                tooltip: {
                    pointFormat: '{point.y} <b>({point.percentage:.1f}%)</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
		                    enabled: false
		                },
		                showInLegend: true
                    }
                },
                series: [{
                    colorByPoint: true,
                    data: [
                    ";
	$i = 0;
	foreach ($this->values as $dta) {
		$e = $this->labels[$i];
		$v = $dta;
		$graph .= "{name: \"$e\", y: $v},";
		$i++;
	}
	$graph .= "
                    ]
                }]
            });
        });
    </script>
    <div id='$this->id'></div>
";

	return $graph;
