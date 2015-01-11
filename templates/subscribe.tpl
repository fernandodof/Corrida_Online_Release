<link href="{$templateRoot}css/subscribe.css" rel="stylesheet">
<script src="{$templateRoot}js/subscribe.js"></script>
<body>
    <p class="form-title">Cadastro</p>
    <div id="wrapSubscribe">
        <form id="registrationForm" method="POST" class="subscribe container col-lg-4 col-lg-offset-4 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <div class="form-group">
                <input class="form-control" type="text" id="name" name="name" placeholder="Nome" />
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="login" name="login" placeholder="Login">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" id="password1" name="password1" placeholder="Senha">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" id="password2" name="password2" placeholder="Confirmação de senha">
            </div>
            <button id="btnSbuscribe" class="btn btn-block btn-success">Cadastrar-se <img src="../images/loader/loginLoader.gif" id="loginLoader"></button>
            <a href="../pages/index" class="pull-left" id="goToIndex">Página Inicial</a>
        </form>
    </div>
</body>
</html>
