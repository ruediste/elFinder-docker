<?php

error_reporting(0); // Set E_ALL for debuging
require './autoload.php';
// Documentation for connector options:
// https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options
$opts = array(
  // 'debug' => true,
  'roots' => array(
    // Items volume
    array(
      'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
      'path'          => '/data/',                 // path to files (REQUIRED)
      'URL'           => dirname($_SERVER['PHP_SELF']) . '/../files/', // URL to files (REQUIRED)
      'trashHash'     => 't1_Lw',                     // elFinder's hash of trash folder
      //'uploadDeny'    => array('all'),                // All Mimetypes not allowed to upload
      //'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
      'uploadAllow'   => array('all'),  // allow upload everything
      'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
    ),

    // Trash volume
    array(
      'id'            => '1',
      'driver'        => 'Trash',
      'path'          => '/data/.trash/',
      'tmbURL'        => dirname($_SERVER['PHP_SELF']) . '/data/.trash/.tmb/',
      //'uploadDeny'    => array('all'),                // Recomend the same settings as the original volume that uses the trash
      'uploadAllow'   => array('all'),// Same as above
      'uploadOrder'   => array('deny', 'allow'),      // Same as above
    )
  )
);

// run elFinder
(new elFinderConnector(new elFinder($opts))) -> run();
