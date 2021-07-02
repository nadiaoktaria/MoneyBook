(function ($) {
	//-----------------------------Tampilan Pada Dashboard-----------------------------//
	Circles.create({
		id: "circles-1",
		radius: 45,
		value: 70,
		maxValue: 100,
		width: 7,
		text: 36,
		colors: ["#f1f1f1", "#2BB930"],
		duration: 400,
		wrpClass: "circles-wrp",
		textClass: "circles-text",
		styleWrapper: true,
		styleText: true,
	});

	Circles.create({
		id: "circles-2",
		radius: 45,
		value: 40,
		maxValue: 100,
		width: 7,
		text: 12,
		colors: ["#f1f1f1", "#F25961"],
		duration: 400,
		wrpClass: "circles-wrp",
		textClass: "circles-text",
		styleWrapper: true,
		styleText: true,
	});

	var mytotalIncomeChart = new Chart(totalIncomeChart, {
		type: "bar",
		data: {
			labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
			datasets: [
				{
					label: "Total Income",
					backgroundColor: "#ff9e27",
					borderColor: "rgb(23, 125, 255)",
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				},
			],
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				display: false,
			},
			scales: {
				yAxes: [
					{
						ticks: {
							display: false, //this will remove only the label
						},
						gridLines: {
							drawBorder: false,
							display: false,
						},
					},
				],
				xAxes: [
					{
						gridLines: {
							drawBorder: false,
							display: false,
						},
					},
				],
			},
		},
	});

	var myDoughnutChart = new Chart(doughnutChart, {
		type: "doughnut",
		data: {
			datasets: [
				{
					data: [20, 30],
					backgroundColor: ["#fdaf4b", "#1d7af3"],
				},
			],
			labels: ["Yellow", "Blue"],
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			legend: {
				position: "bottom",
			},
			layout: {
				padding: {
					left: 20,
					right: 20,
					top: 20,
					bottom: 20,
				},
			},
		},
	});
})(jQuery);
