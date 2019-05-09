<?php ?>

    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Blood Pressure
                    <i class="mdi mdi-water-percent float-right"></i>
                </h4>
                <div>
                    <div id="bloodPressureContainer" style="height: 400px"></div>
                    <script>
                        $( document ).ready(function() {
                            var bloodPressureContainer = new CanvasJS.Chart("bloodPressureContainer", {
                                animationEnabled: true,
                                theme: "light2",
                                axisX:{ valueFormatString: "DD MMM" },
                                axisY: { crosshair: { enabled: true }, includeZero: false },
                                toolTip:{ shared:true },
                                legend:{
                                    cursor:"pointer",
                                    verticalAlign: "bottom",
                                },
                                data: [{
                                    type: "line",
                                    showInLegend: true,
                                    name: "Pulse",
                                    markerType: "square",
                                    xValueFormatString: "DD MMM, YYYY",
                                    color: "#80F080",
                                    dataPoints: [
                                        {{$bloodPressures}}
                                    ]
                                }]
                            });
                            bloodPressureContainer.render();
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
