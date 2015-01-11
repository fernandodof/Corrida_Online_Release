<link href="{$templateRoot}libs/pickadate.js-3.5.3/lib/compressed/themes/default.css" rel="stylesheet">
<link href="{$templateRoot}libs/pickadate.js-3.5.3/lib/compressed/themes/default.date.css" rel="stylesheet">
<link href="{$templateRoot}libs/bootstrap-3-timepicker-0.2.5/css/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="{$templateRoot}libs/iCheck-1.0.2/skins/square/blue.css" rel="stylesheet">
<link href="{$templateRoot}css/newActivity.css" rel="stylesheet">
<script src="{$templateRoot}libs/pickadate.js-3.5.3/lib/compressed/picker.js"></script>
<script src="{$templateRoot}libs/pickadate.js-3.5.3/lib/compressed/picker.date.js"></script>
<script src="{$templateRoot}libs/bootstrap-3-timepicker-0.2.5/js/bootstrap-timepicker.min.js"></script>
<script src="{$templateRoot}libs/iCheck-1.0.2/icheck.min.js"></script>
<script src="{$templateRoot}libs/pickadate.js-3.5.3/lib/compressed/translations/pt_BR.js" charset="UTF-8"></script>
<script src="{$templateRoot}js/activityFunctions.js"></script>
<script src="{$templateRoot}js/newActivity.js"></script>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Adicionar novas corridas<small></small></h1>

                <div class="panelWraper col-lg-6 col-lg-offset-3 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                    <div class=" panel panel-primary">
                        <div class="panel panel-heading">
                            <h3 class="panel-title">Nova Corrida <i class="fa fa-fw fa-plus-circle"></i></h3>
                        </div>
                        <div class="panel panel-body">

                            <form method="POST" id="newRunForm">

                                <div class="col-md-7">
                                    <div id="sandbox-container" class="form-group">
                                        <div class="form-group-lg input-group date">
                                            <input type="text" id="runDate" name="runDate" placeholder="Data da corrida" class="input-lg form-control"><span class="clendar-icon input-group-addon"><i class="fa fa-fw fa-calendar"></i></span>
                                        </div>
                                    </div>

                                    <div id="time-container" class="form-group">
                                        <small> Tempo hh:mm:ss</small>
                                        <div class="input-group bootstrap-timepicker time">
                                            <input id="time" type="text" name="time" readonly onchange="calculateSpeedPace();" class="input-lg form-control input-group-addon">
                                            <span class="input-group-addon"><i class="fa fa-fw fa-clock-o"></i></span>
                                        </div>
                                    </div>
                                    <label id="lbDistancia">Distância: </label>
                                    <div id="distance-container" class="col-xs-12 row pull-left">
                                        <div class="form-group pull-left form-group-lg">
                                            <input type="text" name="distance" id="distance" onkeyup="calculateSpeedPace();" pattern="[0-9]+([\.|,][0-9]+)?" oninvalid="setCustomValidity('Distancia Invalida')" class="form-control">
                                        </div>
                                    </div>
                                    <div class="pull-left" id="distance-radio-btn">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" checked onclick="calculateSpeedPace();" name="distanceUnit" value="k" /> Km
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" onclick="calculateSpeedPace();" name="distanceUnit" value="m" /> Metros
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg" id="notesGroup">
                                    <textarea name="notes" placeholder="Observações" id="notes" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg pull-right" id="save">Salvar <span id="loader"><img src="{$templateRoot}/images/loader/loginLoader.gif"></span></button>
                            </form>
                            <div id="run-info">
                                <div class="pull-left">
                                    <div class="form-group-lg group">
                                        <label>Velocidade Média</label>
                                        <input type="text" id="avgSpeed" readonly class="form-control">
                                    </div>

                                    <div class="form-group-lg group">
                                        <label>Rítimo</label>
                                        <input type="text" id="avgPace" readonly class="form-control">
                                    </div>
                                </div>
                                {*                                <img src="../images/runer.svg" id="running-icon" class="img-responsive">*}

                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</div>
</body>
</html>