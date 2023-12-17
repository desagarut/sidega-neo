<div class="col-md-12">
	<!-- MAP & BOX PANE -->
	<div class="card card-success">
		<div class="card-header with-border">
			<h3 class="card-title">Usia Penduduk</h3>

			<div class="card-tools pull-right">
				<button type="button" class="btn btn-card-tool" data-widget="collapse"><i class="fe fe-minus"></i>
				</button>
				<button type="button" class="btn btn-card-tool" data-widget="remove"><i class="fe fe-times"></i></button>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body no-padding">
			<div class="row">
				<div style="width:30%">
					<canvas id="canvas" height="450" width="450" style="padding-left:20px"></canvas>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.card-body -->
	</div> <!-- /.card -->
</div>


<script>
	var radarChartData = {
		labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
		datasets: [{
				label: "My First dataset",
				fillColor: "rgba(220,220,220,0.2)",
				strokeColor: "rgba(220,220,220,1)",
				pointColor: "rgba(220,220,220,1)",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(220,220,220,1)",
				data: [65, 59, 90, 81, 56, 55, 40]
			},
			{
				label: "My Second dataset",
				fillColor: "rgba(151,187,205,0.2)",
				strokeColor: "rgba(151,187,205,1)",
				pointColor: "rgba(151,187,205,1)",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(151,187,205,1)",
				data: [28, 48, 40, 19, 96, 27, 100]
			}
		]
	};

	window.onload = function() {
		window.myRadar = new Chart(document.getElementById("canvas").getContext("2d")).Radar(radarChartData, {
			responsive: true
		});
	}
</script>