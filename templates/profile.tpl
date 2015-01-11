<link href="{$templateRoot}css/profile.css" rel="stylesheet">
<script src="{$templateRoot}libs/jquery.dim-background.js"></script>
<script src="{$templateRoot}js/profile.js"></script>
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cadastro <small></small></h1>
                <div class="col-lg-4 col-lg-offset-4 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <a class="btn btn-default" id="editBtn" onclick="edit();">Editar <span class="fa fa-fw fa-edit"></span></a>
                    <div id="wrapEdit">
                        <form id="editRegistrationForm" method="POST">
                            <h3 class="form-title">Editar Cadastro <span class="fa fa-fa fa-user"></span></h3>
                            <div class="form-group">
                                <input class="form-control editToogle" disabled type="text" id="name" name="name" placeholder="Nome" value="{$runner->getName()}">
                            </div>
                            <div class="form-group">
                                <input class="form-control editToogle" disabled  type="text" id="email" name="email" placeholder="Email" value="{$runner->getEmail()}">
                            </div>
                            <div class="form-group">
                                <input class="form-control editToogle" disabled  type="text" id="login" name="login" placeholder="Login" value="{$runner->getLogin()}">
                            </div>
                            <div class="form-group">
                                <input class="form-control editToogle" disabled  type="password" id="password1" name="password1" placeholder="Senha">
                            </div>
                            <button type="submit" id="btnSave" disabled class="btn btn-block btn-success editToogle">Salvar <img src="{$templateRoot}images/loader/loginLoader.gif" id="loginLoader"></button>
                        </form>
                    </div>
                    <div id="wrapPassword">
                        <form id="changePassword" method="POST">
                            <h3 class="form-title">Editar Senha <span class="fa fa-fw fa-lock"></span></h3>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Senha Atual" id="password1" name="password1">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Nova Senha" id="newPass1" name="newPass1">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirmação da senha" id="newPass2" name="newPass2">
                            </div>
                            <button type="submit" class="btn btn-block btn-success editToogle">Salvar <img src="{$templateRoot}images/loader/loginLoader.gif" id="loginLoader1"></button>
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