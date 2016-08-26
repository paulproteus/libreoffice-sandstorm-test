<?php
$file_received = false;
if($_FILES['file']['name']) {
    if(!$_FILES['file']['error']) {
        assert(move_uploaded_file(
            $_FILES['file']['tmp_name'],
            '/var/uploaded-file.doc'));
        $file_received = true;
    }
}

if ($file_received) {
    // Convert it to PDF with unoconv, overwriting the previous file.
    // This is subject to race conditions, etc. A real file conversion tool
    // would handle multiple files and/or store them in different places.
    $return_value = -1;
    $lines = array();
    exec("unoconv -f pdf -o /var /var/uploaded-file.doc", $lines, $return_value);
    assert($return_value);
} else {
    http_response_code(400);
    exit();
}

// Finally, send the file to the browser. This is a very silly way of doing it,
// but it will be OK for this demo.
header("Content-Type: application/pdf");
readfile("/var/uploaded-file.pdf");
