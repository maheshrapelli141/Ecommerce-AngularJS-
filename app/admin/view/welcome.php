<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 7/1/19
 * Time: 5:38 PM
 */
?>
<div class="container custom-container">
    <div class="titlebar">Dashboard</div><br>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="panel panel-primary panel-custom panel-custom-primary">
                <div class="row">
                    <div class="col-lg-4 ">
                        <div class="glyphicon-box glyphicon-primary"><span class="glyphicon glyphicon-user"></span></div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-7">
                        <h4>TOTAL USERS</h4>
                        <h4>3,152</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="panel panel-success panel-custom panel-custom-success">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="glyphicon-box glyphicon-success"><span class="glyphicon glyphicon-globe"></span></div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-7">
                        <h4>TOTAL VISITS</h4>
                        <h4>3,152</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="panel panel-warning panel-custom panel-custom-warning">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="glyphicon-box glyphicon-warning"><span class="glyphicon glyphicon-shopping-cart"></span></div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-7">
                        <h4>TOTAL PURCHASES</h4>
                        <h4>3,152</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Weekly Chart
                    </div>
                    <div class="panel-body">
                        <canvas id="line" class="chart chart-line" chart-data="data"
                                chart-labels="labels" chart-series="series" chart-options="options"
                                chart-dataset-override="datasetOverride" chart-click="onClick">
                        </canvas>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Monthly Chart
                    </div>
                    <div class="panel-body">
                        <canvas id="line" class="chart chart-line" chart-data="data1"
                                chart-labels="labels1" chart-series="series1" chart-options="options1"
                                chart-dataset-override="datasetOverride1" chart-click="onClick1">
                        </canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sales
                        </div>
                        <div class="panel-body">
                            <canvas id="polar-area" class="chart chart-polar-area"
                                    chart-data="data3" chart-labels="labels3" chart-options="options">
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>





   </div>
</div>
