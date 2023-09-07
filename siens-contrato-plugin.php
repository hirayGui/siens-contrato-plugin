<?php

/**
 * Plugin Name: Siens Contrato Plugin
 * Plugin URI:  https://github.com/hiraygui/siens-contrato-plugin
 * Author: Gizo Digital
 * Author URI: 
 * Description: Este plugin permite vendas registradas no Siens possam ser automaticamente buscadas e passadas para um contrato digital
 * Version: 0.1.0
 * License:     GPL-2.0+
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: siens-contrato-plugin
 *
 * @package SiensContratoPlugin
 */

if(!defined('ABSPATH')) {
    die;
}

/**
 * Condição checa se plugin de assinatura digital está ativo
 */
if(!in_array('e-signature/e-signature.php', apply_filters('active_plugins', get_option('active_plugins')))) return;

/**
 * Faz a importação do Composer Autoload uma única vez
 */
if(file_exists(dirname(__FILE__) . '/vendor/autoload.php')){
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

/**
 * Função é chamada quando plugin é ativado
 */
function activate_siens_contrato_plugin(){
    Inc\base\Activate::activate();
}

register_activation_hook(__FILE__, 'activate_siens_contrato_plugin');

/**
 * Função é chamada quando plugin é desativado
 */
function deactivate_siens_contrato_plugin(){
    Inc\base\Deactivate::deactivate();
}

register_deactivation_hook(__FILE__, 'deactivate_siens_contrato_plugin');


if(class_exists('Inc\\Init')){
    Inc\Init::register_services();
}