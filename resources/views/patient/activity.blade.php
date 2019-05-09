<?php ?>

    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Activity
                    <i class="mdi mdi-run float-right"></i>
                </h4>
                <div>
                    <div id="actContainer" style="height: 400px"></div>
                    <script>
                        $( document ).ready(function() {
                            var actContainer = new CanvasJS.Chart("actContainer", {
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
                                    name: "Activity Score",
                                    markerType: "square",
                                    xValueFormatString: "DD MMM, YYYY",
                                    color: "#80F080",
                                    dataPoints: [
                                        {{$activities_2}}
                                    ]
                                }]
                            });
                            actContainer.render();
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
