<?php $targetFolder = $_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
echo $_SERVER['DOCUMENT_ROOT'];
$linkFolder = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
symlink($targetFolder,$linkFolder);
echo 'Symlink completed';