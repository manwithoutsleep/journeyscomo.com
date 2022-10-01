<?php

namespace SCS\Framework;

/**
 * WebUtil short summary.
 *
 * WebUtil description.
 *
 * @version 1.0
 * @author harrisbh
 */
class WebUtil
{


  /**
   * Wrap PHP print_r in <pre>
   * @param  mixed  $value  The variable to display
   */
  public static function print_rf ( $value ) {
    echo '<pre>';
    print_r ( $value );
    echo '</pre>';
  }


  /**
   * Fix a value to be easy to compare to another value
   * @param  mixed   $value         The value to fix
   * @param  boolean $testAsStrings Specify whether to return the string value
   * @param  boolean $caseSensitive Specify whether to return it as lower case
   * @return mixed                  The fixed value
   */
  private static function fixValues ( $value, $testAsStrings = false, $caseSensitive = false ) {
    if ( $testAsStrings ) {
      $value = strval ( $value );
      if ( ! $caseSensitive ) {
        $value = strtolower ( $value );
      }
    }
    return $value;
  }


  /**
   * Specify whether the passed values match and therefore should be flagged as the selected item in an HTML list
   * @param  mixed   $selectedValue  The current value of the variable for this list
   * @param  mixed   $value          The value of this particular list item
   * @param  boolean $testAsStrings  If true, then convert $selectedValue and $value to strings prior to comparing, othewise compare as-is
   * @param  boolean $caseSensitive  If true, compare strings as-is, otherwise convert all strings to lower-case prior to comparing
   * @param  string  $attrName       Either 'selected' or 'checked' depending on the type of HTML list
   * @return string                  The proper text to specify the selected item in an HTML list
   */
  public static function setSelectedItem ( $selectedValue, $value = true, $testAsStrings = false, $caseSensitive = false, $attrName = 'selected' ) {

    $value         = self::fixValues ( $value,         $testAsStrings, $caseSensitive );
    $selectedValue = self::fixValues ( $selectedValue, $testAsStrings, $caseSensitive );

    return ( $value === $selectedValue ? $attrName . '="' . $attrName . '"' : '' );

  }


  /**
   * Specify whether the passed values match and therefore should be flagged as the selected item in an HTML list
   * @param  mixed   $selectedValue  The current value of the variable for this list
   * @param  mixed   $value          The value of this particular list item
   * @param  boolean $testAsStrings  If true, then convert $selectedValue and $value to strings prior to comparing, othewise compare as-is
   * @param  boolean $caseSensitive  If true, compare strings as-is, otherwise convert all strings to lower-case prior to comparing
   * @return string                  The proper text to specify the selected item in an HTML list
   */
  public static function setSelected ( $selectedValue, $value = true, $testAsStrings = false, $caseSensitive = false ) {
    return self::setSelectedItem ( $selectedValue, $value, $testAsStrings, $caseSensitive, 'selected' );
  }


  /**
   * Specify whether the passed values match and therefore should be flagged as the selected item in an HTML list
   * @param  mixed   $selectedValues The current list of values selected for this list
   * @param  mixed   $value          The value of this particular list item
   * @param  boolean $testAsStrings  If true, then convert $selectedValue and $value to strings prior to comparing, othewise compare as-is
   * @param  boolean $caseSensitive  If true, compare strings as-is, otherwise convert all strings to lower-case prior to comparing
   * @return string                  The proper text to specify the selected item in an HTML list
   */
  public static function setMultipleSelected ( $selectedValues, $value = true, $testAsStrings = false, $caseSensitive = false ) {

    $value = self::fixValues ( $value, $testAsStrings, $caseSensitive );

    foreach ( $selectedValues as $selectedValue ) {
      $selectedValue = self::fixValues ( $selectedValue, $testAsStrings, $caseSensitive );
      if ( $value === $selectedValue ) {
        return 'selected="selected"';
      }
    }

    return '';

  }


  /**
   * Specify whether the passed values match and therefore should be flagged as the selected item in an HTML list
   * @param  mixed   $selectedValue  The current value of the variable for this list
   * @param  mixed   $value          The value of this particular list item
   * @param  boolean $testAsStrings  If true, then convert $selectedValue and $value to strings prior to comparing, othewise compare as-is
   * @param  boolean $caseSensitive  If true, compare strings as-is, otherwise convert all strings to lower-case prior to comparing
   * @return string                  The proper text to specify the selected item in an HTML checkbox
   */
  public static function setChecked ( $selectedValue, $value = true, $testAsStrings = false, $caseSensitive = false ) {
    return self::setSelectedItem ( $selectedValue, $value, $testAsStrings, $caseSensitive, 'checked' );
  }


  /**
   * Set the CSS class of an HTML element
   * @param  string $className The class name to set
   * @return string            The properly-formatted CSS class attribute
   */
  public static function setClassAttribute ( $className ) {

    $result = '';

    if ( !empty ( $className ) ) {
      $result = ' class="' . $className . '" ';
    }

    return $result;

  }


  /**
   * Generate an HTML <select> list with all options and possibly one selected
   * @param   string   $listId           id / name of the list for the HTML page
   * @param   string   $selectedValue    The value of the item previously selected
   * @param   string[] $items            All items to appear in the list as an array of value / text pairs
   * @param   boolean  $showSelectOne    Whether to show the -- Select One -- option
   * @param   string   $className        The name of the class to apply to this select list
   * @param   boolean  $useTextAsValue   Whether to use the same value in the value and display fields
   * @param   boolean  $swapTextAndValue Whether to swap the text and value fields in the select list
   * @param   string   $selectOneText    The text to show as the first (default) item in the select list
   * @return  string                     The HTML formatted <select> list
   */
  public static function generateSelectList ( $listId, $selectedValue, $items, $showSelectOne = false, $className = '', $useTextAsValue = false, $swapTextAndValue = false, $selectOneText = ' -- Select One -- ' ) {

    $result = '';

    $result .= '<select name="' . $listId . '" id="' . $listId . '" ' . self::setClassAttribute ( $className ) . ' >';

    if ( $showSelectOne ) {
      $result .= '<option value="0" ' . self::setSelected ( $selectedValue, 0 ) . '>' . $selectOneText . '</option>';
    }

    foreach ( $items as $value => $text ) {
      if ( $useTextAsValue ) {
        $result .= '<option value="' . $text  . '" ' . self::setSelected ( $selectedValue, $text  ) . '>' . $text  . '</option>';
      } elseif ( $swapTextAndValue ) {
        $result .= '<option value="' . $text  . '" ' . self::setSelected ( $selectedValue, $text  ) . '>' . $value . '</option>';
      } else {
        $result .= '<option value="' . $value . '" ' . self::setSelected ( $selectedValue, $value ) . '>' . $text  . '</option>';
      }
    }

    $result .= '</select>';

    return $result;
  }


  /**
   * Generate an HTML <select multiple="multiple"> list with all options and possibly one or more selected
   * @param   string   $listId           id / name of the list for the HTML page
   * @param   string[] $selectedValues   The values of the item previously selected
   * @param   string[] $items            All items to appear in the list as an array of value / text pairs
   * @param   string   $className        The name of the class to apply to this select list
   * @param   boolean  $useTextAsValue   Whether to use the same value in the value and display fields
   * @param   boolean  $swapTextAndValue Whether to swap the text and value fields in the select list
   * @return  string                     The HTML formatted <select> list
   */
  public static function generateMultipleSelectList ( $listId, $selectedValues, $items, $className = '', $useTextAsValue = false, $swapTextAndValue = false ) {

    $result = '';

    $result .= '<select name="' . $listId . '" id="' . $listId . '" multiple="multiple" ' . self::setClassAttribute ( $className ) . ' >';

    foreach ( $items as $value => $text ) {
      if ( $useTextAsValue ) {
        $result .= '<option value="' . $text  . '" ' . self::setMultipleSelected ( $selectedValues, $text,  true ) . '>' . $text  . '</option>';
      } elseif ( $swapTextAndValue ) {
        $result .= '<option value="' . $text  . '" ' . self::setMultipleSelected ( $selectedValues, $text,  true ) . '>' . $value . '</option>';
      } else {
        $result .= '<option value="' . $value . '" ' . self::setMultipleSelected ( $selectedValues, $value, true ) . '>' . $text  . '</option>';
      }
    }

    $result .= '</select>';

    return $result;

  }


  /**
   * Generate an HTML radio button
   * @param   string $id                   id of the element for the HTML page
   * @param   string $name                 name of the element for the HTML page
   * @param   mixed  $selectedValue        The value of the variable associated with this element
   * @param   mixed  $itemValue            Optional value of the element on the HTML page
   * @param   string $radioButtonClassName Optional name of the class to apply to this element
   * @param   string $text                 Optional text to display as a label for this element
   * @param   string $labelClassName       Optional name of the class to apply to this element's label
   * @return  string                       The HTML formatted element
   */
  public static function generateRadioButton ( $id, $name, $selectedValue, $itemValue = true, $radioButtonClassName = null, $text = null, $labelClassName = null ) {
    $result  = '';
    $result .= '<input type="radio" name="' . $name . '" id="' . $id . '" value="' . $itemValue . '" ' . self::setChecked ( $selectedValue, $itemValue ) . ' ' . self::setClassAttribute ( $radioButtonClassName ) . '/>';
    if ( ! empty ( $text ) ) {
      $result .= '&nbsp;<label for="' . $id . '" id="Label' . $id . '" ' . self::setClassAttribute ( $labelClassName ) . '>' . $text . '</label>';
    }
    return $result;
  }


  /**
   * Generate an HTML checkbox
   * @param   string $id                id / name of the element for the HTML page
   * @param   mixed  $selectedValue     The value of the variable associated with this element
   * @param   mixed  $itemValue         Optional value of the element on the HTML page
   * @param   string $checkboxClassName Optional name of the class to apply to this element
   * @param   string $text              Optional text to display as a label for this element
   * @param   string $labelClassName    Optional name of the class to apply to this element's label
   * @return  string                    The HTML formatted element
   */
  public static function generateCheckBox ( $id, $selectedValue, $itemValue = true, $checkboxClassName = null, $text = null, $labelClassName = null ) {
    $result = '<input type="checkbox" name="' . $id . '" id="' . $id . '" value="' . $itemValue . '" ' . self::setChecked ( $selectedValue, $itemValue ) . ' ' . self::setClassAttribute ( $checkboxClassName ) . '/>';
    if ( !empty ( $text ) ) {
      $result .= '&nbsp;<label for="' . $id . '" id="Label' . $id . '" ' . self::setClassAttribute ( $labelClassName ) . '>' . $text . '</label>';
    }
    return $result;
  }


  /**
   * Clear the specified SESSION variable, and if a POST variable of the same name exists, set the SESSION variable to that value.
   * @param   string  $varName  The name of the SESSION variable to reset and the POST variable to retrieve
   * @return  mixed             The value retrieved from the POST variable, or an empty string if it is not found
   */
  public static function resetSessionVariable ( $varName ) {
    $result = '';
    unset ( $_SESSION [ $varName ] );
    if ( isset ( $_POST [ $varName ] ) ) {
      $_SESSION [ $varName ] = $_POST [ $varName ];
      $result                = $_POST [ $varName ];
    }
    return $result;
  }


  /**
   * Get a value from the SESSION
   * @param   string  $varName  The name of the SESSION variable to retrieve
   * @return  mixed             The retrieved value, or an empty string if it is not found
   */
  public static function getSessionValue ( $varName ) {
    if ( isset ( $_SESSION [ $varName ] ) ) {
      $result = $_SESSION [ $varName ];
    } else {
      $result = '';
    }
    return $result;
  }


  /**
   * Get a value from the SESSION
   * @param   string  $varName  The name of the SESSION variable to retrieve
   * @return  mixed             The retrieved value, or an empty string if it is not found
   */
  public static function getServerValue ( $varName ) {
    if ( isset ( $_SERVER [ $varName ] ) ) {
      $result = $_SERVER [ $varName ];
    } else {
      $result = '';
    }
    return $result;
  }


  /**
   * Get a parameter from either POST, GET, or SESSION,
   * or else return the specified default value.
   * @param   string  $paramName     The name of the POST, GET, or SESSION variable
   * @param   mixed   $defaultValue  The value to return if POST, GET, and SESSION are all not set
   * @param   boolean $useSession    If true, check the $_SESSION collection for the value, and store the value in the $_SESSION collection when found
   * @return  mixed                  The retrieved value, or an empty string if it is not found
   */
  public static function getParameter ( $paramName, $defaultValue, $useSession = true ) {

    if     ( isset ( $_POST    [ $paramName ] )                ) { $result = $_POST    [ $paramName ]; }
    elseif ( isset ( $_GET     [ $paramName ] )                ) { $result = $_GET     [ $paramName ]; }
    elseif ( isset ( $_SESSION [ $paramName ] ) && $useSession ) { $result = $_SESSION [ $paramName ]; }
    else                                                         { $result = $defaultValue;            }

    if ( $useSession ) {
      $_SESSION [ $paramName ] = $result;
    }

    return ( $result );

  }


  /**
   * Get a numeric parameter from either POST, GET, or SESSION,
   * or else return the specified default value.
   * @param   string  $paramName    The name of the POST, GET, or SESSION variable
   * @param   int     $defaultValue The value to return if POST, GET, and SESSION are all not set
   * @param   boolean $useSession   If true, check the $_SESSION collection for the value, and store the value in the $_SESSION collection when found
   * @return  int                   The desired value
   */
  public static function getNumeric ( $paramName, $defaultValue = 0, $useSession = true ) {
    $result = self::getParameter ( $paramName, $defaultValue, $useSession );
    if ( !is_numeric ( $result ) ) {
      $result = $defaultValue;
    }
    return ( $result );
  }


  /**
   * Get a boolean parameter from either POST, GET, or SESSION,
   * or else return the specified default value.
   * @param   string  $paramName    The name of the POST, GET, or SESSION variable
   * @param   boolean $defaultValue The value to return if POST, GET, and SESSION are all not set
   * @param   boolean $useSession   If true, check the $_SESSION collection for the value, and store the value in the $_SESSION collection when found
   * @return  boolean               The desired value
   */
  public static function getBoolean ( $paramName, $defaultValue = false, $useSession = true ) {
    $result = self::getParameter ( $paramName, $defaultValue, $useSession );
    if ( !is_bool ( $result ) ) {
      if ( in_array ( strtolower ( $result ), array ( '-1', '1', 'on', 'true', 'yes' ) ) ) {
        $result = true;
      } elseif ( in_array ( strtolower ( $result ), array ( '0', 'off', 'false', 'no' ) ) ) {
        $result = false;
      } else {
        $result = $defaultValue;
      }
    }
    return ( $result );
  }


  /**
   * Get the URL of this site, including the protocol specifier
   * @return string The URL of this site
   */
  public static function getSiteUrl ( ) {

    $result = '';

    if ( !empty ( $_SERVER [ 'HTTPS' ] ) && ( strtolower ( $_SERVER [ 'HTTPS' ] ) === 'on' ) ) {
      $result .= 'https://';
    } else {
      $result .= 'http://';
    }

    $result .= $_SERVER [ 'HTTP_HOST' ];

    return ( $result );

  }


  /**
   * Function to fix up PHP's messing up input containing dots, space, open square bracket, etc.
   * As per http://ca.php.net/manual/en/language.variables.external.php#81080:
   *
   * The full list of field-name characters that PHP converts to _ (underscore) is the following (not just dot):
   *
   *    chr(32) ( ) (space)
   *    chr(46) (.) (dot)
   *    chr(91) ([) (open square bracket)
   *    chr(128) - chr(159) (various)
   *
   * PHP irreversibly modifies field names containing these characters in an attempt to maintain compatibility with the deprecated register_globals feature.
   *
   * @param   string  $source  Either 'POST' or 'GET'
   * @return  array            The unmodified array of input variables
   */
  function getRealInput ( $source ) {
    $pairs = explode ( "&", ( strtoupper ( $source ) == 'POST' ? file_get_contents ( "php://input" ) : $_SERVER [ 'QUERY_STRING' ] ) );
    $vars  = array ( );
    foreach ( $pairs as $pair ) {
      $nv             = explode ( "=", $pair );
      $name           = urldecode ( $nv [ 0 ] );
      $value          = urldecode ( $nv [ 1 ] );
      $vars [ $name ] = $value;
    }
    return $vars;
  }


  /**
   * Function to fix up PHP's messing up input containing dots, space, open square bracket, etc.
   * As per http://ca.php.net/manual/en/language.variables.external.php#81080:
   *
   * The full list of field-name characters that PHP converts to _ (underscore) is the following (not just dot):
   *
   *    chr(32) ( ) (space)
   *    chr(46) (.) (dot)
   *    chr(91) ([) (open square bracket)
   *    chr(128) - chr(159) (various)
   *
   * PHP irreversibly modifies field names containing these characters in an attempt to maintain compatibility with the deprecated register_globals feature.
   *
   * @return array The unmodified array of input variables
   */
  function getRealGET  ( ) { return self::getRealInput ( 'GET'  ); }


  /**
   * Function to fix up PHP's messing up input containing dots, space, open square bracket, etc.
   * As per http://ca.php.net/manual/en/language.variables.external.php#81080:
   *
   * The full list of field-name characters that PHP converts to _ (underscore) is the following (not just dot):
   *
   *    chr(32) ( ) (space)
   *    chr(46) (.) (dot)
   *    chr(91) ([) (open square bracket)
   *    chr(128) - chr(159) (various)
   *
   * PHP irreversibly modifies field names containing these characters in an attempt to maintain compatibility with the deprecated register_globals feature.
   *
   * @return array The unmodified array of input variables
   */
  function getRealPOST ( ) { return self::getRealInput ( 'POST' ); }

}
