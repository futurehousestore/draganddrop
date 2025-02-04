<?php
require '../main.inc.php';

if (!$user->rights->dragdropupload->upload) {
    accessforbidden();
}

$upload_path = $conf->global->DRAGDROPUPLOAD_PATH ?: DOL_DATA_ROOT . '/dragdropupload';

if (!is_dir($upload_path)) {
    mkdir($upload_path, 0777, true);
}

foreach ($_FILES['files']['name'] as $key => $filename) {
    $filepath = $upload_path . '/' . basename($filename);
    move_uploaded_file($_FILES['files']['tmp_name'][$key], $filepath);
}

echo json_encode(array('status' => 'success'));
?>
