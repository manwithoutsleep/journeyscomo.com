<?php

ob_start ( );

include_once ( 'includes/includes.php' );

$PageTitle   = "Getting Started";
$MenuItem    = "gettingstarted";
$Breadcrumbs = GetDefaultBreadcrumbs ( $PageTitle, $BreadcrumbSeparator );

function customPageHeader ( ) {?>
  <!-- Include Page-Specific Header Tags Here -->
<?php }

show_header ( $PageTitle, $MenuItem, $Breadcrumbs, true, false );

?>

<section class="gettingstarted">

  <section class="left-sidebar">

    <h2><?php echo $PageTitle ?></h2>

    <div><input type="submit" name="MakeAppointmentCheryl" id="MakeAppointmentCheryl" value="Make An Appointment"       onclick='setAppointmentFields(this.form, "<?php echo $PractitionerIdCheryl   ?>"); this.form.submit();' /></div>
    <div><input type="submit" name="GetFormsClient"        id="GetFormsClient"        value="Client Registration Form"  onclick="this.form.action = '/pdf/JourneysRegistrationClient.pdf'; this.form.target = '_blank';" /></div>
    <div><input type="submit" name="GetFormsCouple"        id="GetFormsCouple"        value="Couples Registration Form" onclick="this.form.action = '/pdf/JourneysRegistrationCouple.pdf'; this.form.target = '_blank';" /></div>
    <img src="images/OfficePhotos.jpg" />
  </section>
  
  <section class="main">
    <h3>Making an appointment</h3>
    <p>At <?php echo $SiteName ?> most of our clients love to use our on-line system to make appointments! Just click on the Appointment buttons throughout our website to set up a client record with us and pick a session time that is convenient for you. Once you have your password, you can access our scheduling system anytime in the day or night and make changes or add new appointments.</p>

    <h3>The First Session & Forms</h3>
    <p>If you are a new client with us, please print out the New Client Registration Form (required) by clicking on the button on the left. Please fill out this form prior to meeting with your counselor in order to better prepare you for your time together. If you are coming in for a Couples Session, please also complete the short couples form (optional). If you don't have a chance to print and fill out the New Client Registration form, we'll take a few minutes at the beginning of your session to get that taken care of.</p>

    <h3>Counseling Fees</h3>
    <p>The fee for an individual, couples, or family session is $95. Each session lasts 50 minutes. The fee for each session will be due and must be paid at the conclusion of each session unless otherwise arranged. Cash, personal checks, credit/debit cards, and health savings cards are acceptable for payment.</p>

    <h3>Cancellations</h3>
    <p>When you schedule an appointment time, that time is specifically reserved for you. If unable to keep an appointment, notification by phone 24 hours before your scheduled time is required. You will be charged the full fee for any missed appointments without 24 hour notice.</p>
  </section>

</section>

<?php

show_footer ( );

?>
