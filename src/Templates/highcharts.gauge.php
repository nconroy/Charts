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
                    type: 'solidgauge'
                },
                    pane: {
            center: ['50%', '85%'],
            size: '140%',
            startAngle: -90,
            endAngle: 90,
            background: {
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
                innerRadius: '60%',
                outerRadius: '100%',
                shape: 'arc'
            }
        },
                title:{text:\"$this->title\"},
                plotOptions: {
                   solidgauge: {
		                dataLabels: {
		                    y: 5,
		                    borderWidth: 0,
		                    useHTML: true
		                }
		            }
               },
               
               yAxis: {
                 title:{text:\"$this->element_label\"},
                 min:$this->min,
                 max:$this->max,
                    crosshair: true
                },
                series: [{
                    name: \"$this->element_label\",
                    data: [
                    ";
	foreach ($this->values as $dta) {
		$graph .= "$dta,";
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
