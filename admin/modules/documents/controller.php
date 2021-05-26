<?php
require_once("../../../includes/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
    case 'add' :
        doInsert();
        break;

    case 'delete' :
        doDelete();
        break;

    case 'download':
        doDownload();
        break;
}

function doInsert()
{
    if (isset($_POST['savedocument'])) {

        $filename = $_FILES['myfile']['name'];
        $destination = '../../../uploads/' . $filename;
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $file = $_FILES['myfile']['tmp_name'];
        $size = $_FILES['myfile']['size'];
        $coursId = $_POST['cours'];

        if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
            message("You file extension must be .zip, .pdf or .docx!", "error");
            redirect('index.php?view=add');
        } elseif ($_FILES['myfile']['size'] > 1000000) {
            message("File too large!", "error");
            redirect('index.php?view=add');
        } else {
            if (move_uploaded_file($file, $destination)) {
                $document = new Doc();
                $document->DOC_NAME = $filename;
                $document->DOC_SIZE = $size;
                $document->COURSE_ID = $coursId;
                $istrue = $document->create();
                if ($istrue == 1) {
                    message("New document created successfully!", "success");
                    redirect('index.php');
                }
            } else {
                message("Failed to upload file!", "error");
                redirect('index.php?view=add');
            }
        }
    }
}

function doDelete()
{
    @$id = $_POST['selector'];
    $key = count($id);

    for ($i = 0; $i < $key; $i++) {

        $Document = new Doc();
        $Document->delete($id[$i]);
    }
    message("Document(s) Deleted!", "success");
    redirect('index.php');
}

function doDownload()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $document = new Doc();
        $doc = $document->single_document($id);

        $filepath = '../../../uploads/' . $doc->DOC_NAME;

        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize('../../../uploads/' . $doc->DOC_NAME));
            readfile('../../../uploads/' . $doc->DOC_NAME);
            redirect('index.php');
            exit;
        }

    }
}

?>