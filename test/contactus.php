<?php

ob_start ( );

include_once ( 'includes/includes.php' );

$PageTitle   = "Contact Us";
$MenuItem    = "contactus";
$Breadcrumbs = GetDefaultBreadcrumbs ( $PageTitle, $BreadcrumbSeparator );

function customPageHeader ( ) {?>
    <!-- Include Page-Specific Header Tags Here -->
    <script type="text/javascript" src="js/geocoding.js"></script>

    <script type="text/javascript">

        var itemUrl = "contactus.php";
        var name    = "Journeys Christian Counseling";
        var mapInfo = "<b>Journeys Christian Counseling</b><br />1900 N Providence Rd., Suite 327<br />Columbia, MO 65202";
        var lat     = "38.972216";
        var lng     = "-92.333134";
        var kmlPath = '';

        function initMap() {
            initialize_gMap ( itemUrl, name, mapInfo, lat, lng, kmlPath );
        }

    </script>

    <script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtgm-_JlVJOgJOTG3o7IRhRS1wnszuPVI&callback=initMap"></script>
<?php }

show_header ( $PageTitle, $MenuItem, $Breadcrumbs, true, false );

?>

<section class="contactus">

    <div class="left-column">

        <h2><?php echo $PageTitle ?></h2>

        <p>Call us with questions! Often we are in session and will not be able to answer the phone, but please leave a message and we will make every effort to return your call in a timely manner.</p>

        <article id="cheryl" class="counselor">
            <img src="images/Cheryl_200x206.jpg" id="Cheryl" width="200" height="206" alt="Cheryl Arens" />
            <h3>Cheryl Arens</h3>
            <p class="phone">(573) 355-0263</p>
            <p class="email"><a href="mailto:Cheryl@journeyscomo.com" target="_blank">Cheryl@journeyscomo.com</a></p>
            <input type="submit" name="MakeAppointmentCheryl" id="MakeAppointmentCheryl" value="Make An Appointment with Cheryl" onclick='setAppointmentFields(this.form, "<?php echo $PractitionerIdCheryl ?>"); this.form.submit();' />
        </article>

        <div class="clear"></div>

    </div>

    <div class="right-column">
        <p>
            I am located in the 3-story Kelly Plaza building, at the corner of Providence and Vandiver
            (1900 N Providence Road), in the suite for Columbia Psychology Healing Center. Enter into
            the building through either of the "office suites" door. (One of these doors is to the
            right of Henry Floyd State Farm Agent and the other door is next to Destiny Point Church.)
            Take the elevator to the third floor and exit turning right. Go to Suite 327/Columbia
            Psychology Healing Center. There is a waiting area right inside the door.
        </p>

        <p>
            <strong><?php echo $SiteName ?></strong><br />
            Columbia Psychology Healing Center<br />
            1900 N. Providence Road, Suite 327<br />
            Columbia, MO  65202<br />
        </p>

        <div class="map-container">
            <div id="map_canvas" class="DivGMap"></div>
            <img src="images/kelly-plaza.jpg" alt="Kelly Plaza" />
        </div>
    </div>

</section>

<?php

show_footer ( );

?>
