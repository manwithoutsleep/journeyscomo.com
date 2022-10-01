<?php

ob_start ( );

include_once ( 'includes/includes.php' );

$PageTitle   = "Resources";
$MenuItem    = "resources";
$Breadcrumbs = GetDefaultBreadcrumbs ( $PageTitle, $BreadcrumbSeparator );

function customPageHeader ( ) {?>
  <!-- Include Page-Specific Header Tags Here -->
<?php }

show_header ( $PageTitle, $MenuItem, $Breadcrumbs, true, true );

?>

<section class="resources">

  <div class="left-column">

    <img src="images/Help.png" />

    <div class="box">

      <h3>Crisis Contacts</h3>

      <div class="contact">
        <p class="contact-single-left">SUICIDE HOTLINE</p>
        <p class="contact-single-right">1-800-SUICIDE</p>
      </div>

      <div class="contact">
        <p class="contact-single-left">Sexual Assault Hotline</p>
        <p class="contact-single-right">1-800-656-HOPE</p>
      </div>
    
      <p>For immediate help dial 911 or visit the nearest Hospital Emergency Room</p>

    </div>
  
  </div>

  <div class="center-column">

    <div class="box">
      <h3>Quick Self-Assessments</h3>
      <hr />
      <p>
        <a href="pdf/Am I addicted.pdf" target="_blank">Am I addicted?</a><br />
        <a href="pdf/Am I depressed.pdf" target="_blank">Am I depressed?</a><br />
        <a href="pdf/Eating disorder.pdf" target="_blank">Do I have an eating disorder?</a>
      </p>
    </div>

    <div class="box">
      <h3><?php echo $SiteShortName ?> Newsletter</h3>
      <hr />
      <p>
        You can access our current <?php echo $SiteShortName ?> newsletter as well as some past editions. We hope that
        the articles written by <?php echo $SiteName ?> staff will be helpful to you. We would love
        to send you our quarterly newsletter through email if you wish to sign up.
      </p>
      <p>
        <a href="newsletter.php"><?php echo $SiteShortName ?> Newsletter Archives</a><br />
        <a href="signup.php">Join Our Mailing List</a>
      </p>
    </div>

  </div>

  <div class="right-column">

    <img src="images/Book.png" />

    <div class="box">
      <h3>Good Reads</h3>
      <p>Recommended Books on Life Issues</p>
      <p>
        <a href="pdf/GR Eating Disorders.pdf" target="_blank">Eating Disorders</a><br />
        <a href="pdf/GR Parenting.pdf" target="_blank">Parenting</a><br />
        <a href="pdf/GR Marriage.pdf" target="_blank">Marriage & Relationships</a><br />
        <a href="pdf/GR Addiction.pdf" target="_blank">Addiction</a><br />
        <a href="pdf/GR Spiritual.pdf" target="_blank">Spiritual</a>
      </p>
    </div>

  </div>

</section>

<?php

show_footer ( );

?>
