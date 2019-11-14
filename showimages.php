<?php
$getid = isset($_GET['i'])?$_GET['i']:'';
$result  = array();
$ds          = DIRECTORY_SEPARATOR; 
$storeFolder = 'upload';
$files = scandir($storeFolder);                 //1
if ( false!==$files ) {
    foreach ( $files as $file ) {
      if ( '.'!=$file && '..'!=$file) {       //2
        $filter = explode("_",$file);
        if ($filter[1]==$getid."file.jpg") {
          $convert = implode("_",$filter);
          $obj['name'] = $convert;
          $obj['size'] = filesize($storeFolder.$ds.$convert);
          $obj['path'] = $storeFolder.$ds.$convert;
          $result[] = $obj;
        }
      }
    }
  }
header('Content-type: text/json');              //3
header('Content-type: application/json');
echo json_encode($result);
?>