<?php
/*
 * Notice:
 * This application was developed by the Center for Eldercare and Rehabilitation
 * Technology (CERT), a center of the University of Missouri-Columbia College of
 * Electrical and Computer Engineering. Do not copy, share, or distribute this
 * application or its underlying code or technology without explicit written
 * approval from CERT and the University of Missouri.
 * (c) 2016 Center for Eldercare and Rehabilitation Technology
 */

namespace SCS\Framework;

/**
 * Library - A Library of functions helpful to many applications
 *
 * This library contains various methods that could be used to help writing applications.
 *
 * @version 1.0
 * @author Brad Harris <harrisbh@missouri.edu>
 */
class Library {

  /**
   * Get info about a variable
   * @param  mixed  $mixed The variable for which to get info
   * @return string        Info about the passed variable
   */
  public static function var_dump_ret ( $mixed = null ) {
    ob_start ( );
    var_dump ( $mixed );
    $content = ob_get_contents ( );
    ob_end_clean ( );
    return '<pre>' . $content . '</pre>';
  }

  /**
   * SafeCBool - Convert the given value to a boolean without throwing errors for any input.
   *             Guarantee the returned value is a non-null boolean.
   *
   * @param  mixed   $value The value to be converted to boolean
   *
   * @return boolean TRUE if given value is commonly seen as a true value, FALSE otherwise
   */
  public static function SafeCBool ( $value ) {

    $result = FALSE;

        if ( $value === TRUE                          ) : $result = TRUE;
    elseif ( is_numeric ( $value ) && ( $value <> 0 ) ) : $result = TRUE;
    elseif ( strtoupper ( $value ) == 'ON'            ) : $result = TRUE;
    elseif ( strtoupper ( $value ) == 'TRUE'          ) : $result = TRUE;
    elseif ( strtoupper ( $value ) == 'YES'           ) : $result = TRUE;
    endif;

    return $result;

  }

  /**
   * SafeCInt - Convert the given value to an integer without throwing errors for any input.
   *            Guarantee the returned value is a non-null integer.
   *
   * @param  mixed $value The value to be converted to integer
   *
   * @return int          The integer value if the value can be automatically converted to integer,
   *                      zero otherwise.
   */
  public static function SafeCInt ( $value ) {
    $result = 0;
    if ( $value && is_numeric ( trim ( $value ) ) ) {
      $result = intval ( trim ( $value ) );
    }
    return $result;
  }

  /**
   * SafeCFloat - Convert the given value to a floating point value without throwing errors for any input.
   *              Guarantee the returned value is a non-null floating point value.
   *
   * @param  mixed $value The value to be converted to integer
   *
   * @return float        The floating point value if the value can be automatically converted to floating point,
   *                      zero otherwise.
   */
  public static function SafeCFloat ( $value ) {
    $result = 0.0;
    if ( $value && is_numeric ( trim ( $value ) ) ) {
      $result = floatval ( trim ( $value ) );
    }
    return $result;
  }

  /**
   * SafeCDate - Convert the given value to a datetime without throwing errors for any input.
   *             Guarantee the returned value is a non-null datetime.
   *
   * @param   mixed     $value         The value to be converted to datetime
   * @param   String    $format        The format string for the datetime value
   * @param  \DateTime  $defaultValue  The default value in case the passed value cannot be converted to a datetime value
   *
   * @return \DateTime                 The datetime value if the value can be automatically converted to datetime, default otherwise.
   */
  public static function SafeCDate ( $value, $format = null, $defaultValue = null, $timeZone = null ) {

    // Define missing parameters
    if ( !isset ( $format       ) ) { $format       = 'Y-m-d';                     }
    if ( !isset ( $defaultValue ) ) { $defaultValue = new \DateTime ( '@0');       }
    if ( !isset ( $timeZone     ) ) { $timeZone     = new \DateTimeZone ( 'GMT' ); }

    if ( $value instanceof \DateTime ) {
      $result = $value;
    } else if ( is_numeric ( trim ( $value ) ) ) {
      $result = new \DateTime ( '@' . $value );
    } else {
      $result = \DateTime::createFromFormat ( $format, $value, $timeZone );
    }

    if ( ! ( $result instanceof \DateTime ) ) {
      $result = $defaultValue;
    }

    return $result;

  }

  /**
   * Validate the passed string as to whether it is a valid date in the specified format
   * @param   string  $date    The string to test
   * @param   string  $format  The desired format of the date
   * @return  bool             true if the passed string is a valid date in the correct format, false otherwise
   */
  public static function validateDate ( $date, $format = 'Y-m-d' ) {
    $d = \DateTime::createFromFormat ( $format, $date );
    return $d && $d->format ( $format ) == $date;
  }

  /**
   * Format a DateTime value as a date and time string for use in a MySQL statement
   * @param  \DateTime $value The value to be formatted
   * @return string           The value in MySQL string format
   */
  public static function dateTimeStringSQL ( $value ) {
    $result = '';
    if ( $value instanceof \DateTime ) {
      $result = $value->format ( 'Y-m-d H:i:s' );
    }
    return $result;
  }

  /**
   * Format a DateTime value as a date string for use in a MySQL statement
   * @param  \DateTime $value The value to be formatted
   * @return string           The value in MySQL string format
   */
  public static function dateStringSQL ( $value ) {
    $result = '';
    if ( $value instanceof \DateTime ) {
      $result = $value->format ( 'Y-m-d' );
    }
    return $result;
  }

  /**
   * Format a DateTime value as a time string for use in a MySQL statement
   * @param  \DateTime $value The value to be formatted
   * @return string           The value in MySQL string format
   */
  public static function timeStringSQL ( $value ) {
    $result = '';
    if ( $value instanceof \DateTime ) {
      $result = $value->format ( 'H:i:s' );
    }
    return $result;
  }

  /**
   * Format a DateTime value as a date and time string for display in a readable English format
   * @param  \DateTime $value The value to be formatted
   * @return string           The value in MySQL string format
   */
  public static function dateTimeStringEnglish ( $value ) {
    $result = '';
    if ( $value instanceof \DateTime ) {
      $result = $value->format ( 'n/j/Y g:i:s A' );
    }
    return $result;
  }

  /**
   * Format a DateTime value as a date string for display in a readable English format
   * @param  \DateTime $value The value to be formatted
   * @return string           The value in MySQL string format
   */
  public static function dateStringEnglish ( $value ) {
    $result = '';
    if ( $value instanceof \DateTime ) {
      $result = $value->format ( 'n/j/Y' );
    }
    return $result;
  }

  /**
   * Format a DateTime value as a time string for display in a readable English format
   * @param  \DateTime $value The value to be formatted
   * @return string           The value in MySQL string format
   */
  public static function timeStringEnglish ( $value ) {
    $result = '';
    if ( $value instanceof \DateTime ) {
      $result = $value->format ( 'g:i:s A' );
    }
    return $result;
  }

  /**
   * Generate a random character string of the specified length
   * @param   int     $length   length of the desired random string
   * @param   string  $charset  (Optional) The complete list of valid characters, defaults to upper and lower case letters and numbers
   * @return  string            The random character string of the specified length
   */
  public static function generateRandomString ( $length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789' ) {
    $result = '';
    $count = strlen ( $charset ) - 1;
    while ( $length-- ) {
      $result .= $charset [ mt_rand ( 0, $count ) ];
    }
    return $result;
  }

  /**
   * Build a SQL WHERE clause from the array of items passed.
   * @param  string[] $items The items to be built into a where clause
   * @return string          The WHERE clause
   */
  public static function buildWhereClause ( $items ) {
    $result = '';
    if ( ( null !== $items ) && ( 0 < count ( $items ) ) ) {
      $Prefix = ' WHERE ';
      $Separator = ' AND ';
      foreach ( $items as $item ) {
        $result .= $item . $Separator;
      }
      if ( $result !== '' ) {
        $result = $Prefix . substr ( $result, 0, -4 );
      }
    }
    return $result;
  }

  /**
   * Quote all HTML entities in POST array
   * @param  String[] $postArray The POST array as received on script init
   * @return String[]            The cleaned POST array
   */
  public static function CleanPostValues ( $postArray ) {
    foreach ( $postArray as $key => $value ) {
      if ( is_array ( $value ) ) {
        foreach ( $value as $k => $v ) {
          $postArray [ $key ] [ $k ] = htmlentities ( $v, ENT_QUOTES );
        }
      } else {
        $postArray [ $key ] = htmlentities ( $value, ENT_QUOTES );
      }
    }
    return $postArray;
  }

  /**
   * Test the validity of the passed email address
   * @param  string   $email  Email address to test for validity
   * @return boolean          True if the passed email address fits the standard email address format, false otherwise
   */
  public static function ValidateEmailAddress ( $email ) {
   $regex = '/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-z]{2,3})$/';
    if ( preg_match ( $regex, $email ) ) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Modify the given file system path to use the separator character
   * appropriate for the OS on which the code is running.
   * @param  string $path      The given file system path
   * @param  string $separator The desired separator character, or null to use the default for the current OS
   * @return string            The same path with all / and \ characters replaced by the proper separator character
   */
  public static function FixPath ( $path, $separator = null ) {
    $result = '';
    if ( !empty ( $path ) ) {
      if ( empty ( $separator ) ) {
        $separator = DIRECTORY_SEPARATOR;
      }
      $result = str_replace ( '\\', $separator, str_replace ( '/', $separator, $path ) );
    }
    return $result;
  }

  /**
   * Return HTML <ul> element with all strings from the given array
   * @param  String[] $array     Array of strings to be displayed
   * @param  String   $className Class name for the <ul> element
   * @return String              The given array of strings in an HTML <ul> element
   */
  public static function StringArrayToUL ( $array, $className = null ) {

    $result = '';

    if ( !empty ( $array ) ) {
      if ( empty ( $className ) ) {
        $result .= '<ul>';
      } else {
        $result .= '<ul class="' . $className . '">';
      }
      foreach ( $array as $value ) {
        $result .= '<li>' . $value . '</li>';
      }
      $result .= '</ul>';
    }

    return $result;

  }

}
