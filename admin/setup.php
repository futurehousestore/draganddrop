<?php
require '../../main.inc.php';
require_once DOL_DOCUMENT_ROOT . '/core/lib/admin.lib.php';
require_once '../lib/dragdropupload.lib.php';

$langs->load("admin");
$langs->load("dragdropupload@dragdropupload");

if (!$user->admin) {
    accessforbidden();
}

$action = GETPOST('action', 'aZ09');

if ($action == 'setpath') {
    $upload_path = GETPOST('upload_path', 'alpha');
    if (dolibarr_set_const($db, 'DRAGDROPUPLOAD_PATH', $upload_path, 'chaine', 0, '', $conf->entity)) {
        setEventMessages($langs->trans("SetupSaved"), null, 'mesgs');
    } else {
        setEventMessages($langs->trans("Error"), null, 'errors');
    }
}

$upload_path = $conf->global->DRAGDROPUPLOAD_PATH;

llxHeader('', $langs->trans("DragDropUploadSetup"));

$linkback = '<a href="' . DOL_URL_ROOT . '/admin/modules.php">' . $langs->trans("BackToModuleList") . '</a>';
print load_fiche_titre($langs->trans("DragDropUploadSetup"), $linkback, 'title_setup');

print '<form method="POST" action="' . $_SERVER['PHP_SELF'] . '">';
print '<input type="hidden" name="token" value="' . newToken() . '">';
print '<input type="hidden" name="action" value="setpath">';

print '<table class="noborder" width="100%">';
print '<tr class="liste_titre">';
print '<th>' . $langs->trans("Parameter") . '</th>';
print '<th>' . $langs->trans("Value") . '</th>';
print '</tr>';

print '<tr class="oddeven">';
print '<td>' . $langs->trans("UploadPath") . '</td>';
print '<td><input type="text" name="upload_path" value="' . dol_escape_htmltag($upload_path) . '"></td>';
print '</tr>';

print '</table>';

print '<div class="center">';
print '<input type="submit" class="button" value="' . $langs->trans("Save") . '">';
print '</div>';

print '</form>';

llxFooter();
$db->close();
?>
