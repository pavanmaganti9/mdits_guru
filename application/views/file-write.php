<?php

/* $fp = fopen("code-editable.php", "w") or die("Unable to open file!");
$editorCode = $input;
fwrite($fp, $editorCode);
fclose($fp); */

$this->load->helper('file');

$data = '<?php
echo "Hello Pavan!";
?>';
$path = base_url('assets/front/codemirror/code-editable.php');
    if ( ! write_file('assets/front/codemirror/code-editable.php', $data))
    {
           // echo 'Unable to write the file';
    }
    else
    {
            echo 'File written!';
    }
?>