<?php 

/**
 * @package SiensContratoPlugin
 */

 namespace Inc\pages;

 use \Inc\base\BaseController;

 class Admin extends BaseController{

    /**
     * Declarando qual função irá ser responsável pela página de configurações
     */
    public function register(){
        add_action('admin_menu', array($this, 'add_admin_pages'));
    }

    /**
     * Função adiciona página de configurações para o plugin
     */
    public function add_admin_pages(){
        //ordem dos parâmetros: Nome da página | Nome da página no menu lateral | Nível de permissão | slug | Função | Ícone no menu | Posição no menu
        add_menu_page( __('Siens Contrato Plugin', 'siens-contrato-plugin'), __('Siens Contrato', 'siens-contrato-plugin'), 'manage_options', 'siens_contrato_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
    }

    /**
     * função chama template da página de configuração
     */
    public function admin_index(){
        require_once $this->plugin_path . 'templates/admin.php';
    }
 }