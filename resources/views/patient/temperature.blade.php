<?php ?>
<div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                Temperature
                <i class="mdi mdi-temperature-celsius float-right"></i>
            </h4>
            <div>
                <div id="tempContainer" style="height: 400px"></div>
                <script>
                    $( document ).ready(function() {
                        var tempContainer = new CanvasJS.Chart("tempContainer", {
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
                                color: "#F08080",
                                dataPoints: [
                                    {{$temperatures}}
                                ]
                            }]
                        });
                        tempContainer.render();
                    });
                </script>
            </div>
        </div>
        </div>
    </div>
