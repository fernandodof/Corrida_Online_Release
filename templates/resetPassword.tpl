<link href="{$templateRoot}css/resetPassword.css" rel="stylesheet">
<script src="{$templateRoot}js/resetPassword.js" rel="stylesheet"></script>
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <input type="hidden" value="{$code}" id="code">
                <h1 class="page-header text-center">Corridas <small></small></h1>
                <div class="col-lg-4 col-lg-offset-4 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div id="wrapPassword">
                        <form id="resetPasswordForm" method="POST" action="javascript:void(0)">
                            <h3 class="form-title">Redefina sua senha abaixo <span class="fa fa-fw fa-lock"></span></h3>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Senha" id="password1" name="password1">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirmação da senha" id="password2" name="password2">
                            </div>
                            <button type="submit" id="resetPass" class="btn btn-block btn-success editToogle">Redefinir <img src="{$templateRoot}images/loader/loginLoader.gif" id="loginLoader"></button>
                        </form>
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
</html>