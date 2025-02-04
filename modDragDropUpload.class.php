<?php
include_once DOL_DOCUMENT_ROOT . '/core/modules/DolibarrModules.class.php';

class modDragDropUpload extends DolibarrModules
{
    public function __construct($db)
    {
        global $langs;

        $this->db = $db;
        $this->numero = 570000; // Unique module ID
        $this->rights_class = 'dragdropupload';
        $this->family = 'Tools';
        $this->name = 'dragdropupload';
        $this->description = 'Module to upload files via drag and drop.';
        $this->version = '1.0';
        $this->editor_name = "Future House Store";
        $this->const_name = 'MAIN_MODULE_DRAGDROPUPLOAD';
        $this->special = 0;
        $this->picto = 'dragdropupload@dragdropupload'; // Icon

        $this->module_parts = array(
            'hooks' => array('admin')
        );

        $this->config_page_url = array('setup.php@dragdropupload');

        $this->dictionaries = array();
        $this->boxes = array();
        $this->rights = array();
        $this->menu = array();

        $this->menu[] = array(
            'fk_menu' => 'fk_mainmenu=tools',
            'type' => 'top',
            'titre' => 'Drag & Drop Upload',
            'mainmenu' => 'dragdropupload',
            'leftmenu' => '',
            'url' => '/custom/dragdropupload/admin/setup.php',
            'langs' => 'dragdropupload@dragdropupload',
            'position' => 500,
            'enabled' => '1',
            'perms' => '1',
            'target' => '',
            'user' => 2
        );

        $this->rights[0][0] = $this->numero . '01';
        $this->rights[0][1] = 'Upload files via drag and drop';
        $this->rights[0][3] = 1;
        $this->rights[0][4] = 'upload';
    }
}
