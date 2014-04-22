<?php
//
// copyright 2014-04-21 10:44:19 PM neo code software ltd
//

date_default_timezone_set('UTC');

/*
 * UTILITY FUNCTIONS
 */

function startsWith($haystack, $needle) {
    return $needle === "" || strpos($haystack, $needle) === 0;
}

function endsWith($haystack, $needle) {
    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
}

/*
 * PARAMETERS:
 *    1. Directory to process
 *    2. File Extension to process
 */

if (isset($argv)) {
    $dir = $argv[1];
    if (startsWith($argv[2], ".")) 
       $ext = $argv[2];
    else
       $ext = "." . $argv[2];
}


/*
 *  Open the directory and process each file
 */

if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if (endsWith($file, $ext))
               $files[filemtime($dir . '/' . $file)] = $file;
               //echo "Found file: " . $file;
        }
        closedir($dh);
    }
}


/*
 *  Sort the files into Date Modified order
 */

krsort($files);


/*
 *  Extract the filenames important to the script
 */

$noSel = false;
$lastWk = 0;

foreach($files as $date => $file) {
   $thisWk = date('W', $date);
   $fullName = $dir . '//' . $file;
   if ($thisWk != $lastWk) {
      echo "Keeping Filename: " . $file . " [Date: " . date('Y-m-d h:i:sA', $date) . " Week " . date('W', $date) . "]\n";
      $lastWk = $thisWk;
   } else {
      echo "Deleting Filename: " . $file . " [Date: " . date('Y-m-d h:i:sA', $date) . " Week " . date('W', $date) . "]\n";
      unlink($fullName);
   }
}


?>
