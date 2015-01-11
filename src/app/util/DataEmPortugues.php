<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataEmPortugues
 *
 * @author Fernando
 */
setlocale(LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese');

date_default_timezone_set('America/Fortaleza');

class DataEmPortugues {
    public static function dataCampleta($timestamp){
        return strftime('%A, %d de %B de %Y', $timestamp);
    }
}
