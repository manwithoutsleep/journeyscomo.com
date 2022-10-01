<?php

namespace SCS\Framework;

/**
 * A collection of utilities for PHP console apps.
 *
 * This class contains a collections of static methods which can be
 * helpful in various console applications.
 *
 * @version 2.0
 * @author Brad Harris <harrisbh@missouri.edu>
 */
class ConsoleUtil
{


  /**
   * Display a prompt and wait for the user to press Enter on the keyboard.
   *
   * @param string $userPrompt The prompt to display
   */
  public static function ContinueOnEnter ( $userPrompt ) {
    if ( PHP_OS == 'WINNT' ) {
      echo $userPrompt;
      $Line = stream_get_line ( STDIN, 1024, PHP_EOL );
    } else {
      $Line = readline ( $userPrompt );
    }
  }


  /**
   * Display on standard output a label and the associated value followed by a line feed.
   *
   * @param string $label The label to display before the colon
   * @param string $value The value to display after the colon
   */
  public static function writeln ( $label, $value ) {
    echo ( $label . ": " );
    print_r ( $value );
    echo ( "\n" );
  }


  /**
   * Prepares a copyright statement for display,
   *                         including the year or range of validity.
   *
   * @uses   Constants::getCopyrightYearRange
   *
   * @return $string The requested copyright statement
   */
  public static function getCopyrightStatement ( ) {
    return "Copyright " . Constants::getCopyrightYearRange ( ) . " Curators of the University of Missouri";
  }


  /**
   * Displays introductory text about the app on the screen
   *
   * @uses   Constants - various properties and methods
   *
   * @return string The desired introductory text
   */
  public static function getAppIntro ( ) {
    $Result  = '';
    $Result .= "\n";
    $Result .= "=======================================================\n";
    $Result .= Constants::$AppName  . "\n";
    $Result .= Constants::$AppEmail . "\n";
    $Result .= ConsoleUtil::getCopyrightStatement ( ) . "\n";
    $Result .= "Process started " . date ( 'Y-m-d g:i:s A' ) . "\n";
    $Result .= "=======================================================\n\n";
    return $Result;
  }


  /**
   * Quote a string value appropriately for use in SQL queries
   *
   * @param   string   $value  The string to quote for inclusion in SQL queries
   *
   * @return  string           The SQL-quoted string
   */
  public static function sqlStr ( $value ) {
    $Result = "'" . str_replace ( "'", "''", $value ) . "'";
    return $Result;
  }


  /**
   * Calls a MatLab script
   * This method changes into the directory specified by the $scriptPath parameter
   * so that the local context within the MatLab script is correct. It restores
   * the current directory to its previous state after execution completes.
   *
   * @param  string  $scriptPath       File system path to the MatLab script
   * @param  string  $matLabCmdString  The actual command string to execute the script
   */
  public static function callMatLabScript ( $scriptPath, $matLabCmdString ) {

    self::writeMessageToLog ( $scriptPath, "Calling " . $matLabCmdString );

    unset ( $Output    );
    unset ( $ReturnVar );

    $CurrentPath = getcwd ( );

    chdir ( $scriptPath );
    exec ( $matLabCmdString, $Output, $ReturnVar );
    chdir ( $CurrentPath );

  }


  /**
   * Clear the log file for new data

   * * @param  string  $dataPath  Path to the log file
   */
  public static function resetLog ( $logPath ) {
    $Filename = $logPath . DIRECTORY_SEPARATOR . "status.log";
    file_put_contents ( $Filename, date ( 'Y-m-d H:i:s' ) . "Log File Reset\n" );
  }


  /**
   * Write a message to the log file
   *
   * @param  string  $dataPath  Path to the log file
   * @param  string  $message   The message to write. Line feed will be automatically appended.
   *
   * @uses   Constants::getCopyrightYearRange
   */
  public static function writeMessageToLog ( $logPath, $message ) {
    $Filename = $logPath . DIRECTORY_SEPARATOR . "status.log";
    file_put_contents ( $Filename, date ( 'Y-m-d H:i:s' ) . " " . $message . "\n", FILE_APPEND | LOCK_EX );
  }


  /**
   * Get the OS family on which this script is running.
   * @return ISLINUX or ISWINDOWS
   */
  public function GetOS ( ) {
    switch ( php_uname ( 's' ) ) {
      case '':
        return ISLINUX;
        break;
      case '':
        return ISWINDOWS;
        break;
      default:
        return ISWINDOWS;
        break;
    }
  }


  /**
   * Return human-readable text based on a boolean value
   * @param  boolean  $value      The boolean value to test
   * @param  String   $trueText   The text to return if $value evaluates to TRUE
   * @param  String   $falseText  The text to return if $value evaluates to FALSE
   * @return String               The human-readable text
   */
  public static function BooleanToText ( $value, $trueText = "True", $falseText = "False" ) {
    $result = ( $value ? $trueText : $falseText );
    return $result;
  }


}
