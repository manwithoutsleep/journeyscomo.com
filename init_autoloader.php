<?php

// set the default time zone to use.
date_default_timezone_set('UTC');

if ( is_readable ( $_SERVER [ 'DOCUMENT_ROOT' ] . '/vendors/SplClassLoader.php' ) ) {
  include $_SERVER [ 'DOCUMENT_ROOT' ] . '/vendors/SplClassLoader.php';
}

$rootClassPath = $_SERVER [ 'DOCUMENT_ROOT' ] . DIRECTORY_SEPARATOR . 'vendors';

$businessLogicLoader = new SplClassLoader ( 'SCS\BusinessLogic', $rootClassPath );
$dataAccessLoader    = new SplClassLoader ( 'SCS\DataAccess',    $rootClassPath );
$facadeLoader        = new SplClassLoader ( 'SCS\Facade',        $rootClassPath );
$frameworkLoader     = new SplClassLoader ( 'SCS\Framework',     $rootClassPath );
$phpMailer           = new SplClassLoader ( 'PHPMailer',         $rootClassPath );

$businessLogicLoader->register ( );
$dataAccessLoader->register ( );
$facadeLoader->register ( );
$frameworkLoader->register ( );
$phpMailer->register ( );

?>