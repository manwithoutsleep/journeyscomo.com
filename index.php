<?php

ob_start ( );

include_once ( 'includes/includes.php' );

$PageTitle   = $SiteName;
$MenuItem    = '';
$Breadcrumbs = '';


function customPageHeader ( ) {?>
  <!-- Include Page-Specific Header Tags Here -->
<?php }

show_header ( $PageTitle, $MenuItem, $Breadcrumbs, false, false );

?>

<section class="home-page">

  <section class="sidebar">

    <article class="side-text video">
      <div>
        <!-- <input type="submit" name="MakeAppointmentCheryl" id="MakeAppointmentCheryl" value="Click To Make An Appointment" onclick='setAppointmentFields(this.form, "<?php echo $PractitionerIdCheryl ?>"); this.form.submit();' /> -->
        <!-- Start SimplePractice Appointment-Request Widget Embed Code -->
        <a href="https://journeys-christian-counseling.clientsecure.me" class="spwidget-button" data-spwidget-scope-id="f08a52e2-d87e-4fbd-b2b0-9583ed9d9dc8" data-spwidget-scope-uri="journeys-christian-counseling" data-spwidget-application-id="7c72cb9f9a9b913654bb89d6c7b4e71a77911b30192051da35384b4d0c6d505b" data-spwidget-scope-global data-spwidget-autobind>
            Click To Make An Appointment
        </a>
        <!-- End SimplePractice Appointment-Request Widget Embed Code -->
      </div>
      <video controls>
        <source src="videos/JourneysIntroCheryl.mp4"  type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' />
        <source src="videos/JourneysIntroCheryl.webm" type='video/webm; codecs="vp8, vorbis"' />
      </video>
      <h2>Cheryl Arens, M.Ed., LPC</h2>
    </article>

    <article class="side-text side-text">
      <h2>Newletters</h2>
      <a href="newsletter.php"><img src="images/newsletter.jpg" alt="Newsletters" /></a>
      <p><a href="newsletter.php">Check out Journeys' Newsletters!</a></p>
    </article>

  </section>

  <section class="main">

    <article id="rotating-banner" class="rotating-banner">
      <img src="images/rotator/Rotator1.jpg" />
      <img src="images/rotator/Rotator2.jpg" />
      <img src="images/rotator/Rotator3.jpg" />
      <img src="images/rotator/Rotator4.jpg" />
      <img src="images/rotator/Rotator5.jpg" />
      <div class="rotator-overlay">Sometimes you just need<br />a little help along the way.</div>
      <div class="clear"></div>
    </article>

    <div class="clear"></div>

    <article class="main-text">
      <h2>Welcome!</h2>
      <p>At <?php echo $SiteName ?> our goal is to provide a safe and supportive place for individuals, couples, and families to find hope and healing.  You might be looking for extra support and guidance through a challenging situation or are ready to take steps in a new direction.  The first thing we'll do is listen without judgment.  Then, we'll walk alongside of you on your journey.  Together we will create solutions and new possibilities that will help you reach your goals.  We all have a unique path we take through life&hellip; and sometimes we just need a little help along the way.</p>
    </article>

  </section>

</section>

<?php

show_footer ( );

?>
