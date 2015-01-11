<link href="{$templateRoot}css/index.css" rel="stylesheet">
<script src="{$templateRoot}js/index.js"></script>
<body>
    <div class="container">
        <div class="row forms">
            <div class="col-md-12">
                <div class="wrap">
                    <p class="form-title">Corridas</p>
                    <form method="POST" class="login" action= "javascript:void(0)">
                        <input type="text" class="loginInfo" id="emailLogin" placeholder="Email ou login"/>
                        <input type="password" class="loginInfo" id="passwordLogin" placeholder="Senha" />
                        <small id="loginErrorMsg" class="help-block">Dados inválidos</small>
                        <button type="submit" data-loading-text="Entrar..." onclick="validateLogin();" id="btnLogin" class="btn btn-success col-xs-12">ENTRAR <img src="{$templateRoot}images/loader/loginLoader.gif" id="loginLoader"></button>
                        <div class="remember-forgot">
                            <div class="row">
                                <div class="btn-group col-xs-12" role="group">
                                    <a class="btn btn-default col-xs-6" id="forgortPass">Esqueci a Senha</a>
                                    <a class="btn btn-default col-xs-6" href="{$templateRoot}pages/subscribe">Cadastrar-se</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="pr-wrap">
                    <div class="pass-reset">
                        <form id="forgotPasswordForm" action="javascript:void(0)">
                            <label>Insira o email cadastrado</label>
                            <div class="form-group">
                                <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                            </div> 
                            <button id="requestRecover" type="submit" class="pass-reset-submit btn btn-success btn-sm btn-block">Recuperar senha<img src="{$templateRoot}images/loader/loginLoader.gif" id="loginLoader1"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="quote" class="col-md-6 visible-lg visible-md">
        <blockquote>
            <p><span class="fa fa-quote-left"></span> {$sentence->getSentence()} <span class="fa fa-quote-right"></span></p>
            <footer>{$sentence->getAuthor()}</footer>
        </blockquote>
    </div>
    <div id="quote1" class="col-md-6 visible-sm visible-xs">
        <blockquote>
            <p><span class="fa fa-quote-left"></span> {$sentence->getSentence()} <span class="fa fa-quote-right"></span></p>
            <footer>{$sentence->getAuthor()}</footer>
        </blockquote>
    </div>
</body>
</html>