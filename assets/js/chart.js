$(document).ready(function() {

	// Bar Chart
	
	Morris.Bar({
		element: 'bar-charts',
		data: [
			{ y: '2006', a: 100, b: 90 },
			{ y: '2007', a: 75,  b: 65 },
			{ y: '2008', a: 50,  b: 40 },
			{ y: '2009', a: 75,  b: 65 },
			{ y: '2010', a: 50,  b: 40 },
			{ y: '2011', a: 75,  b: 65 },
			{ y: '2012', a: 100, b: 90 }
		],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Total Income', 'Total Outcome'],
		lineColors: ['#ff9b44','#fc6075'],
		lineWidth: '3px',
		barColors: ['#ff9b44','#fc6075'],
		resize: true,
		redraw: true
	});
	
	// Line Chart
	
	Morris.Line({
		element: 'line-charts',
		data: [
			{ y: '2006', a: 50, b: 90 },
			{ y: '2007', a: 75,  b: 65 },
			{ y: '2008', a: 50,  b: 40 },
			{ y: '2009', a: 75,  b: 65 },
			{ y: '2010', a: 50,  b: 40 },
			{ y: '2011', a: 75,  b: 65 },
			{ y: '2012', a: 100, b: 50 }
		],
		xkey: 'y',
		ykeys: ['a', 'b'],
		labels: ['Total Sales', 'Total Revenue'],
		lineColors: ['#ff9b44','#fc6075'],
		lineWidth: '3px',
		resize: true,
		redraw: true
	});
		
});

$(document).ready(function() {

	// Bar Chart for Yearly Data
	
	Morris.Bar({
		element: 'bar-chart-year',
		data: <?php echo json_encode($year_data); ?>,
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Total Visitors'],
		barColors: ['#ff9b44'],
		resize: true,
		redraw: true
	});
	
	// Bar Chart for Monthly Data
	
	Morris.Bar({
		element: 'bar-chart-month',
		data: <?php echo json_encode($month_data); ?>,
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Total Visitors'],
		barColors: ['#ff9b44'],
		resize: true,
		redraw: true
	});
	
	// Bar Chart for Weekly Data
	
	Morris.Bar({
		element: 'bar-chart-week',
		data: <?php echo json_encode($week_data); ?>,
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Total Visitors'],
		barColors: ['#ff9b44'],
		resize: true,
		redraw: true
	});
		
});
