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
                    type: 'gauge'
                },
              
             
                plotOptions: {
                   column: {
                       pointPadding: 0.2,
                       borderWidth: 0
                   }
               },
               yAxis: {
                 title:{text:\"$this->title\"},
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
