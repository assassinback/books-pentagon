<?php
    $file= $_COOKIE['viewpdf'];
    header('Content-type:application/pdf');
    header('Content-Disposition:attachment;filename="'.basename($file).'"');
    header('Content-Transfer-Encoding:binary');
    header('Accept-Ranges:bytes');
    @readfile($file);
?>