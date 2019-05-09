<?php ?>
<div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                Pulse
                <i class="mdi mdi-heart-pulse float-right"></i>
            </h4>
            <div>
                <div id="pulseContainer" style="height: 400px"></div>
        <script>
            $( document ).ready(function() {
                var pulseContainer = new CanvasJS.Chart("pulseContainer", {
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
                        color: "#3F00FF",
                        dataPoints: [
                            {{$pulses}}
                        ]
                    }]
                });
                pulseContainer.render();
            });
        </script>
            </div>
        </div>
        </div>
    </div>
