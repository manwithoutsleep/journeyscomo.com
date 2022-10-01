<?php

ob_start ( );

include_once ( 'includes/includes.php' );

$PageTitle   = "Newsletter Archives";
$MenuItem    = "resources";
$Breadcrumbs = '<a href="/">Home</a>' . $BreadcrumbSeparator . '<a href="resources.php">Resources</a>' . $BreadcrumbSeparator . $PageTitle;

function customPageHeader ( ) {?>
  <!-- Include Page-Specific Header Tags Here -->
<?php }

show_header ( $PageTitle, $MenuItem, $Breadcrumbs, true, true );

?>

<section class="newsletter-archives">

  <p>Journeys Newsletters are published on a quarterly basis.  Check through our archives for helpful hints and topics on a variety of topics including coping strategies for stress, relationship skills, and mental and emotional well-being.</p>

  <ul>
    <li><a href="pdf/NewsletterFall2016.pdf"   target="_blank">Fall 2016 Newsletter</a></li>
    <li><a href="pdf/NewsletterSummer2016.pdf" target="_blank">Summer 2016 Newsletter</a></li>
    <li><a href="pdf/NewsletterSpring2016.pdf" target="_blank">Spring 2016 Newsletter</a></li>
    <li><a href="pdf/NewsletterWinter2016.pdf" target="_blank">Winter 2016 Newsletter</a></li>
    <li><a href="pdf/NewsletterFall2015.pdf"   target="_blank">Fall 2015 Newsletter</a></li>
    <li><a href="pdf/NewsletterSummer2015.pdf" target="_blank">Summer 2015 Newsletter</a></li>
    <li><a href="pdf/NewsletterSpring2015.pdf" target="_blank">Spring 2015 Newsletter</a></li>
    <li><a href="pdf/NewsletterWinter2015.pdf" target="_blank">Winter 2015 Newsletter</a></li>
  </ul>

</section>

<?php

show_footer ( );

?>
