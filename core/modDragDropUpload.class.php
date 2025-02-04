<?php
include_once DOL_DOCUMENT_ROOT . '/core/modules/DolibarrModules.class.php';

class modDragDropUpload extends DolibarrModules
{
    public function __construct($db)
    {
        global $langs, $conf;

        $this->db = $db;

        // Unique module ID (make sure it doesn't conflict with other modules)
        $this->numero = 570000;

        // Module name and description
        $this->rights_class = 'draganddrop';
        $this->family = 'Tools';
        $this->name = 'Drag & Drop Upload';
        $this->description = 'Module to upload files via drag and drop.';
        $this->version = '1.0.0'; // Ensure the version is correct

        // Module editor and icon
        $this->editor_name = "Future House Store";
        $this->picto = 'draganddrop@draganddrop'; // Icon

        // Module constants
        $this->const_name = 'MAIN_MODULE_DRAGANDDROP';
        $this->special = 0;

        // Required Dolibarr version
        $this->depends = array();
        $this->requiredby = array();
        $this->phpmin = array(7, 0); // Minimum PHP version required
        $this->langfiles = array("draganddrop@draganddrop");

        // Module parts
        $this->module_parts = array(
            'hooks' => array('admin')
        );

        // Configuration page
        $this->config_page_url = array('setup.php@draganddrop');

        // Dictionaries, boxes, and permissions
        $this->dictionaries = array();
        $this->boxes = array();
        $this->rights = array();

        // Define permissions
        $r = 0;
        $this->rights[$r][0] = $this->numero . '01';
        $this->rights[$r][1] = 'Upload files via drag and drop';
        $this->rights[$r][3] = 1; // Granted by default
        $this->rights[$r][4] = 'upload';
        $r++;

        // Menus
        $this->menu = array(
            array(
                'fk_menu' => 'fk_mainmenu=tools',
                'type' => 'top',
                'titre' => 'Drag & Drop Upload',
                'mainmenu' => 'draganddrop',
                'leftmenu' => '',
                'url' => '/custom/draganddrop/admin/setup.php',
                'langs' => 'draganddrop@draganddrop',
                'position' => 500,
                'enabled' => '$conf->draganddrop->enabled', // Ensure this module is enabled
                'perms' => '$user->rights->draganddrop->upload',
                'target' => '',
                'user' => 2
            )
        );
    }
}
