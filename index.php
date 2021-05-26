<?php
require_once("includes/initialize.php");
$content = 'home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
    case '1' :
        $content = 'home.php';
        break;
    case '2' :
        $content = 'profile.php';
        break;
    case '3' :
        $content = 'grades.php';
        break;
    case '5' :
        $content = 'documents.php';
        break;
    case '6' :
        $content = 'viewDocuments.php';
        break;
    case '7' :
        downloadDocument();
        break;

    default :
        $content = 'home.php';
}

function downloadDocument()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $document = new Doc();
        $doc = $document->single_document($id);

        $filepath = 'uploads/' . $doc->DOC_NAME;

        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize('uploads/' . $doc->DOC_NAME));
            readfile('uploads/' . $doc->DOC_NAME);
            redirect('index.php');
            exit;
        }

    }
}

require_once 'theme/templates.php';
?>
