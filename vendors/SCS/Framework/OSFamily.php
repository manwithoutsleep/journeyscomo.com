<?php

namespace SCS\Framework;

/**
 * An enumeration of primary OS families on which PHP might be running.
 *
 * @version 1.0
 * @author harrisbh
 */
abstract class OSFamily extends BasicEnum {


  const LINUX   = 0;
  const MAC     = 1;
  const WINDOWS = 2;


  public static function CurrentOS ( ) {
    switch ( PHP_OS ) {
      case 'WINNT':
        return self::WINDOWS;
        break;
      case 'FreeBSD':
        return self::MAC;
        break;
      default:
        return self::LINUX;
        break;
    }
  }


}
