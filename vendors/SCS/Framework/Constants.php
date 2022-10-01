<?php

namespace SCS\Framework;

/**
 * Various constants which are available throughout the application.
 *
 * The properties of this class contain constants which will be useful in various
 * places throughout the application.
 *
 * @version 2.0
 * @author Brad Harris <harrisbh@missouri.edu>
 */
class Constants
{

  /**
   * Display name of this application
   * @var string
   */
  public static $AppName = 'ElderTech Visualization Interface';

  /**
   * Email address of person responsible for this application
   * @var string
   */
  public static $AppEmail = 'harrisbh@missouri.edu';

  /**
   * Year this application was first copyrighted
   * @var int
   */
  public static $CopyrightYear = 2013;

  /**
   * Full path to MatLab binary on Linux
   * @var string
   */
  public static $MatLabPathLinux = '/usr/local/bin/';

  /**
   * Full path to MatLab binary on Windows
   * @var string
   */
  public static $MatLabPathWindows = 'C:\Program Files\MATLAB\R2014a\bin\\';

  /**
   * Full path to MatLab binary on current platform
   * @return string
   */
  public static function getMatLabPath ( ) {
    if ( OSFamily::CurrentOS ( ) == OSFamily::WINDOWS ) {
      return self::$MatLabPathWindows;
    } else {
      return self::$MatLabPathLinux;
    }
  }

  /**
   * return the appropriate copyright year or year range for this application
   * @return string
   */
  public static function getCopyrightYearRange ( ) {
    $currentYear = date ( "Y" );
    if ( $currentYear > self::$CopyrightYear ) {
      $copyrightYear = self::$CopyrightYear . ' - ' . $currentYear;
    } else {
      $copyrightYear = self::$CopyrightYear;
    }
    return ( $copyrightYear );
  }

}
