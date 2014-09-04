<?php
$fileName = './fileinfo.php';
$fileInfo = new SplFileInfo ($fileName);

$fileProps = array ();

$fileProps['path'] = $fileInfo->getPath ();
$fileProps['filename'] = $fileInfo->getFilename ();
$fileProps['getPathname'] = $fileInfo->getPathname ();
$fileProps['getPerms'] = $fileInfo->getPerms ();

$fileProps['getInode'] = $fileInfo->getInode ();
$fileProps['getSize'] = $fileInfo->getSize ();
$fileProps['getOwner'] = $fileInfo->getOwner ();
$fileProps['getGroup'] = $fileInfo->getGroup ();
$fileProps['getAtime'] = $fileInfo->getAtime ();

$fileProps['getMtime'] = $fileInfo->getMtime ();
$fileProps['getCtime'] = $fileInfo->getCtime ();
$fileProps['getType'] = $fileInfo->getType ();
$fileProps['isWritable'] = $fileInfo->isWritable ();

$fileProps['isReadable'] = $fileInfo->isReadable ();
$fileProps['isExecutable'] = $fileInfo->isExecutable();
$fileProps['isFile'] = $fileInfo->isFile ();
$fileProps['isDir'] = $fileInfo->isDir ();
$fileProps['isLink'] = $fileInfo->isLink ();



foreach ($fileProps as $name => $value){
    echo $name.":$value<br>";
}


?>