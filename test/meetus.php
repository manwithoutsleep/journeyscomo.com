<?php

ob_start ( );

include_once ( 'includes/includes.php' );

$PageTitle   = "Meet Us";
$MenuItem    = "meetus";
$Breadcrumbs = GetDefaultBreadcrumbs ( $PageTitle, $BreadcrumbSeparator );

function customPageHeader ( ) {?>
  <!-- Include Page-Specific Header Tags Here -->
<?php }

show_header ( $PageTitle, $MenuItem, $Breadcrumbs, true, true );

?>

<section class="meet-us-page">

  <section>
    <div>
      <a href="meetus-Cheryl.php"><img src="images/Cheryl_Head_182x235.jpg" /></a>
      <div>
        <p>Hi, I'm Cheryl.</p>
        <p>
          As a counselor, I hope to walk alongside of people as they address a variety of challenges throughout life. I look forward to joining you on your journey because meaningful change and healing can make a significant difference in the quality of your life and relationships.
        </p>
        <p>
          Cheryl Arens, M.Ed., LPC<br />
          Licensed Professional Counselor
        </p>
        <a href="meetus-Cheryl.php" class="read-more-link">Read More&hellip;</a>
      </div>
    </div>
  </section>

</section>

<?php

show_footer ( );

?>
