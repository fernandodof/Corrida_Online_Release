<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmailMessages
 *
 * @author Fernando
 */
class EmailMessages {

        public static function recoverPasswordHTML($personName, $link) {
        return "<!DOCTYPE html>
                    <html>
                        <head>
                             <title>Redefinir senha</title>
                                <meta charset='UTF-8'>
                                <meta name='viewport' content='width=device-width', initial-scale=1.0>
                            </head>
                        <body>
                            <div style='text-align: center; margin: 0 auto;'>
                                    <h4 style='margin-top: 40px;
                                                   width: 100%;
                                                   clear: left;
                                                   float: left;'>
                                        Corridas - Redefinir Senha</h4>
                             <h4>Olá <strong>" . $personName . "</strong>, Com este link você poderá redefinir a sua senha (expira em 5 horas): </h4>
                             <a href='". $link. "'>Clique aqui</a>    
                          </div>
                       </body>
                </html>";
    }
    
    public static function recoverPasswordNormal($pesonName, $link) {
        return "Olá " + $pesonName + ", Você pode redefinir a sua senha por este link (expira em 5 horas): " + $link;
    }

}
