<?php
require '../main.inc.php';
require_once DOL_DOCUMENT_ROOT . '/core/lib/admin.lib.php';

$langs->load("admin");
$langs->load("dragdropupload@dragdropupload");

if (!$user->rights->dragdropupload->upload) {
    accessforbidden();
}

llxHeader('', $langs->trans("DragDropUpload"));

print '<h1>' . $langs->trans("UploadFiles") . '</h1>';
print '<div id="dropzone" class="dropzone">' . $langs->trans("DropFilesHere") . '</div>';
print '<div id="uploadStatus"></div>';

llxFooter();
$db->close();
?>
