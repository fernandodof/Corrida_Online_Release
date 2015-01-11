<link href="{$templateRoot}libs/startbootstrap-sb-admin-1.0.1/css/sb-admin.css" rel="stylesheet">
<link href="{$templateRoot}libs/alertify.js-0.3.11/themes/alertify.core.css" type="text/css" rel="stylesheet">
<link href="{$templateRoot}libs/alertify.js-0.3.11/themes/alertify.default.css" type="text/css" rel="stylesheet">
<link href="{$templateRoot}libs/alertify.js-0.3.11/themes/alertify.bootstrap.css" type="text/css" rel="stylesheet">
<script src="{$templateRoot}libs/alertify.js-0.3.11/lib/alertify.min.js"></script>
<script src="{$templateRoot}js/dashboardMenu.js"></script>
<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard">Corridas</a>
            </div>
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="{$templateRoot}pages/dashboard" class="dropdown-toggle">{$smarty.session.name}</a>
                </li>
            </ul>    
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse" id="navBar">
                <ul class="nav navbar-nav side-nav">
                    <li class='menu-option' id="first-option">
                        <a href="{$templateRoot}pages/dashboard"><i class="fa fa-fw fa-table"></i> Corridas</a>
                    </li>
                    <li class='menu-option' id="second-option">
                        <a href="{$templateRoot}pages/newActivity"><i class="fa fa-fw fa-plus"></i> Nova Corrida</a>
                    </li>
                    <li class='menu-option' id="thrid-option">
                        <a href="{$templateRoot}pages/search"><i class="fa fa-fw fa-search"></i> Pesquisar</a>
                    </li>
                    <li class='menu-option'id="fourth-option" >
                        <a href="{$templateRoot}pages/profile"><i class="fa fa-fw fa-user"></i> Cadastro</a>
                    </li>
                    <li class='menu-option' id="fifth-option">
                        <a href="{$templateRoot}pages/logout"><i class="fa fw fa-power-off red-icon"></i> Sair</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

        </nav>