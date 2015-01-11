<link href="{$templateRoot}libs/DataTables-1.10.4/bootstrapDatatableTheme/dataTables.bootstrap.css">
<link href="{$templateRoot}libs/DataTables-1.10.4/extensions/Responsive/css/dataTables.responsive.css">
<link href="{$templateRoot}libs/DataTables-1.10.4/extensions/TableTools/css/dataTables.tableTools.min.css">
<link href="{$templateRoot}css/dashboard.css" rel="stylesheet">
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-primary"  data-toggle="collapse" data-target="#summary" id="summaryButton">Resumo <span class="fa fa-fw fa-caret-down"></span></a>
                <div id="summary" class="collapse col-lg-12">
                    <div id="summary-wrapper" class="col-lg-12">
                        <div class="col-lg-4 well well-sm summary-content">
                            <img src="{$templateRoot}images/runer.svg">
                            <h4>Corridas: <small>{$summary['totalRuns']}</small></h4>
                        </div>
                        <div class="col-lg-4 well well-sm summary-content">
                            <img src="{$templateRoot}images/distance.svg">
                            <h4>Distancia: <small>{$summary['totalDistance']}</small></h4>
                        </div>
                        <div class="col-lg-4 well well-sm summary-content">
                            <img src="{$templateRoot}images/chronometer.svg">
                            <h4>Tempo: <small>{$summary['totalTime']}</small></h4>
                        </div>
                    </div>
                </div>

                <h1 class="page-header">Corridas<small></small>
                </h1>
                <div class="table-responsive">
                    <table id="runs" class="display table">
                        <thead>
                            <tr>
                                <th>Data</th> 
                                <th>Distancia</th> 
                                <th>Tempo</th> 
                                <th>Velocidade Média</th> 
                                <th>Rítimo</th> 
                                <th>Opçoes</th> 
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div>
</body>
<script src="{$templateRoot}libs/DataTables-1.10.4/media/js/jquery.dataTables.min.js"></script>
<script src="{$templateRoot}libs/DataTables-1.10.4/extensions/TableTools/js/dataTables.tableToolsModified.js"></script>
<script src="{$templateRoot}libs/DataTables-1.10.4/bootstrapDatatableTheme/dataTables.bootstrap.js"></script>
<script src="{$templateRoot}libs/bootstrap/js/bootstrap-popover.js"></script>
<script src="{$templateRoot}js/dashboard.js"></script>
</html>