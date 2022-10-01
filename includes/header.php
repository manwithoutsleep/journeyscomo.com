<?php

function show_header ( $PageTitle, $MenuItem = '', $Breadcrumbs = '', $ShowBreadcrumbs = true, $ShowTitle = true ) {
  
  global $SiteName, $SiteShortName, $AppointmentLink;
  
  $HeaderTitle = '';
  
  if (isset ( $PageTitle ) && $PageTitle != $SiteName && $PageTitle != $SiteShortName ) {
    $HeaderTitle = $PageTitle . " | " . $SiteName;
  } else {
    $PageTitle = $SiteName;
    $HeaderTitle = $PageTitle;
  }

  ob_end_clean ( );

?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>

    <title><?php echo $HeaderTitle ?></title>

    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans' />
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' />
    <link rel='stylesheet' type='text/css' href='css/main.css' />

    <script type="text/javascript" src="/js/welcome.js"></script>
    <script type="text/javascript">
      function setAppointmentFields(form, practitionerId) {
        this.document.getElementById('practitioner').value = practitionerId;
        form.action = '<?php echo $AppointmentLink ?>';
        form.target = "_top";
      }
    </script>
    <script src="https://widget-cdn.simplepractice.com/assets/integration-1.0.js"></script>


    <?php if ( function_exists ( 'customPageHeader' ) ) {
      customPageHeader ( );
    } ?>

  </head>
  <body id="index" class="home">
    <form id="form1">

      <input type="hidden" id="practitioner" name="practitioner" value="11321" />

      <header id="banner" class="body">
        <hgroup>
          <h1><a href="/"><?php echo $SiteName ?></a></h1>
          <div class="address">
            <?php echo $SiteName ?><br />
            1900 N Providence Rd., Suite 327, Columbia, MO  65202<br />
            <span class="small-header-text">Located in the offices of Columbia Psychology Healing Center, LLC</span><br />
            (573) 355-0263
          </h2>
          <div class="clear"></div>
        </hgroup>
        <nav>
          <ul>
            <li><a href="meetus.php" <?php         if ( $MenuItem == 'meetus'         ) echo 'class="current"';?>>Meet Us</a></li>
            <li><a href="ourservices.php" <?php    if ( $MenuItem == 'ourservices'    ) echo 'class="current"';?>>Our Services</a></li>
            <li><a href="faq.php" <?php            if ( $MenuItem == 'faq'            ) echo 'class="current"';?>>FAQ</a></li>
            <li><a href="gettingstarted.php" <?php if ( $MenuItem == 'gettingstarted' ) echo 'class="current"';?>>Getting Started</a></li>
            <li><a href="resources.php" <?php      if ( $MenuItem == 'resources'      ) echo 'class="current"';?>>Resources</a></li>
            <li><a href="contactus.php" <?php      if ( $MenuItem == 'contactus'      ) echo 'class="current"';?>>Contact Us</a></li>
          </ul>
        </nav>
      </header>

      <section id="content" class="body">

<?php if ( ( $ShowBreadcrumbs === true ) && ( $Breadcrumbs != '' ) ) { ?>

        <div class="breadcrumbs"><?php echo $Breadcrumbs ?></div>

<?php }

      if ( $ShowTitle === true ) { ?>
        
        <h2><?php echo $PageTitle ?></h2>

<?php } ?>
      
<?php

}

?>
