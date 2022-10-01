<?php

namespace SCS\Framework;

use ElderTech\DataAccess\ResidentDAO;

/**
 * Header, footer, and other standard content for all pages of the site.
 *
 * PageFrame description.
 *
 * @version 1.0
 * @author harrisbh
 */
class PageFrame
{


  const None         = 'NoSelectedPage';
  const HealthTabId  = 'health';
  const DensityTabId = 'density';
  const GaitTabId    = 'gait';
  const RewindTabId  = 'rewind';
  const AlertsTabId  = 'alerts';
  const AccountTabId = 'account';
  const AdminTabId   = 'admin';
  const SysInfoTabId = 'sysinfo';
  const LogoutTabId  = 'logout';


  private static function buildResidentsSelect ( $resID ) {

    $username      = $_SESSION [ 'username'      ];
    $isSystemAdmin = $_SESSION [ 'isSystemAdmin' ];
    $isVizAdmin    = $_SESSION [ 'isVizAdmin'    ];

    $ResidentIds = ResidentDAO::getIds ( true, false, $isSystemAdmin, $isVizAdmin, $username );

    $residentsSelect = WebUtil::generateSelectList ( 'resid', $resID, $ResidentIds, false );

    return $residentsSelect;

  }


  /**
   * Add the header to the page.
   * This includes the <html> and <body> tags,
   * It also links to common style sheets and scripts.
   * Pages can set their own code to include in the <head> by setting the $headerCode variable.
   *
   * @param string  $title       The title of the page to be displayed in the browser title bar
   * @param string  $headerCode  Any additional code to be included within the <head> tag
   * @param string  $navTab      The navigation tab to be highlighted for this page
   */
  public static function showHeader ( $title, $headerCode, $navTab = self::HealthTabId, $isVizAdmin, $isSystemAdmin, $resid, $endDate ) {

    $ActiveClassName   = 'active';

    $HealthClassName  = '';
    $DensityClassName = '';
    $GaitClassName    = '';
    $RewindClassName  = '';
    $AlertsClassName  = '';
    $AccountClassName = '';
    $AdminClassName   = '';
    $LogoutClassName  = '';

    switch ( $navTab ) {
      case self::HealthTabId  : $HealthClassName  = $ActiveClassName; break;
      case self::DensityTabId : $DensityClassName = $ActiveClassName; break;
      case self::GaitTabId    : $GaitClassName    = $ActiveClassName; break;
      case self::RewindTabId  : $RewindClassName  = $ActiveClassName; break;
      case self::AlertsTabId  : $AlertsClassName  = $ActiveClassName; break;
      case self::AccountTabId : $AccountClassName = $ActiveClassName; break;
      case self::AdminTabId   : $AdminClassName   = $ActiveClassName; break;
      case self::LogoutTabId  : $LogoutClassName  = $ActiveClassName; break;
    }

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?php echo $title ?></title>

    <meta name="author"      content="ElderTech" />
    <meta name="description" content="<?php echo Constants::$AppName ?> Data Management Website" />

    <!-- jQuery UI -->
    <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" />


    <!-- Twitter Bootstrap -->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"       />
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css" />

    <!-- Custom Styles -->
    <link rel="stylesheet" type="text/css" href="/css/styles.css" />

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    <!-- Twitter Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="/favicon.png" />

    <script type="text/javascript">

      jQuery ( function ( ) {

        onLoadSession();

        var enddate   = new Date ( '<?php echo $endDate;   ?>' );
        enddate.setDate   ( enddate.getDate   ( ) + 1 );
        jQuery ( "#endDate"   ).datepicker ( );
        jQuery ( "#endDate"   ).datepicker ( "option", "dateFormat", "yy-mm-dd" );
        jQuery ( "#endDate"   ).datepicker ( "setDate", enddate   );

      } );

      function onLoadSession ( ) {
        try{
          submitAjaxBySession ( );
        } catch ( err ) {
        }
      }

    </script>

    <!-- ****************************************** -->
    <!-- Begin Header Code added by individual page -->

    <?php echo $headerCode ?>

    <!--  End Header Code added by individual page  -->
    <!-- ****************************************** -->

  </head>
  <body role="document">

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--
          <a class="navbar-brand" href="index.php"><?php echo Constants::$AppName ?></a>
          -->
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">

            <li class="<?php echo $HealthClassName  ?>"><a href="health/index.php">Health</a></li>
            <li class="<?php echo $DensityClassName ?>"><a href="health/density22.php">Density</a></li>
            <li class="<?php echo $GaitClassName    ?>"><a href="gait/index2.php">Gait</a></li>

            <?php if ( $isVizAdmin == 1 || $isSystemAdmin == 1 ) { ?>
            <li class="<?php echo $RewindClassName  ?>"><a href="rewind/index.php">Rewind</a></li>
            <?php } ?>

            <li class="<?php echo $AlertsClassName  ?>"><a href="health/alert_list.php">Alerts</a></li>
            <li class="<?php echo $AccountClassName ?>"><a href="manage_my_account.php">Account</a></li>

            <?php if ( $isSystemAdmin == 1 ) { ?>
            <li class="<?php echo $AdminClassName   ?>"><a href="users/displayUsers.php">Admin</a></li>
            <?php } ?>

            <li class="<?php echo $LogoutClassName  ?>"><a href="logout.php">Logout</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container" role="main">

      <form method="post" id="SelectorForm">

        <div>
          <label for="resid">Resident ID:</label>
          <?php echo self::buildResidentsSelect ( $resid ); ?>
        </div>

        <div>
          <label for="endDate">End Date:</label>
          <input type="text" id="endDate" name="endDate" value="<?php echo $endDate ?>" />
        </div>

        <input type="submit" id="ResetResId" name="ResetResId" value="Submit" />

      </form>

<?php

  }


  /**
   * Page footer, can be placed anywhere on page.
   * This does not close the <body> or <html> tags,
   * you must call the PageFrame->closePage() method to do that.
   */
  public static function showFooter ( ) {

?>

    </div><!-- /.container -->

    <footer>
      <img src="img/MUsm.gif" alt="MU logo" />
      &copy; <?php echo Constants::getCopyrightYearRange ( ) ?> Curators of the University of Missouri, DMCA and <a href="http://www.missouri.edu/copyright.htm" target="_blank">other copyright information</a><br />
      <a href="mailto:<?php echo Constants::$AppEmail ?>?subject=<?php echo Constants::$AppName ?> Website">E-mail Webmaster</a>
    </footer>

<?php

  }

  public static function closePage ( ) {

?>
  </body>
</html>
<?php

  }



}
