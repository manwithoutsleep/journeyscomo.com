<?php

ob_start ( );

include_once ( 'includes/includes.php' );

$PageTitle   = "Cheryl Arens";
$MenuItem    = "meetus";
$Breadcrumbs = '<a href="/">Home</a>' . $BreadcrumbSeparator . '<a href="meetus.php">Meet Us</a>' . $BreadcrumbSeparator . $PageTitle;

function customPageHeader ( ) {?>
  <!-- Include Page-Specific Header Tags Here -->
<?php }

show_header ( $PageTitle, $MenuItem, $Breadcrumbs, true, true );

?>

<section class="meet-one">

  <figure>
    <div><img src="images/Cheryl_221x276.jpg" /></div>
    <figcaption>
      Cheryl Arens, M.Ed., LPC<br />
      Licensed Professional Counselor
    </figcaption>
  </figure>

  <div>
    <p>Hi, I'm Cheryl.</p>
    <p>In the counseling journey, I hope to walk alongside and help people as they address a variety of challenges and struggles throughout life. My passion became my profession when I left a career as a Systems Analyst and earned a Master's of Education Degree in Counseling from Stephens College. As a Counselor, I look forward to joining you on your journey because meaningful change and/or healing can make a significant difference in the quality of your life and relationships.</p>
    <p>I offer a safe, compassionate, and confidential environment where we will work together to build on your strengths and give you some new tools to overcome your unique difficulties. Maybe you need a little help moving beyond a bump in the road or you need supports as you are feeling overwhelmed like you're pushing a boulder up a hill. Life difficulties come in all kinds of shapes and sizes.</p>
    <p>My goal is to best match therapy with your unique needs, personality, and life experiences. I use an integrated approach, leaning most heavily into attachment theory and drawing upon tools/techniques from cognitive-behavioral, experiential, structural, narrative, and psychoanalytic schools of thought. Spiritual truths are also a part of the mix as my Christian faith influences who I am as a person and counselor.</p>
    <p>When individuals are part of a couple or family they become part of a system. By understanding and respecting this system, couples and families in therapy can experience meaningful change. I have a heart for helping marriages because of the pain and hopelessness that can develop within a system under stress. Sometimes a little help can make a big difference!</p>

    <p>
      <strong>Educational/Professional</strong>
      <ul>
        <li>M.Ed. in Counseling, Stephens College, Columbia, MO</li>
        <li>B.S. in Information Systems Management, University of Maryland</li>
        <li>Licensed Professional Counselor (LPC)</li>
      </ul>
    </p>

    <p>
      <strong>Member of:</strong>
      <ul>
        <li>American Counseling Association (ACA)</li>
        <li>American Association of Christian Counselors (AACC)</li>
        <li>American Association for Marriage and Family Therapy (AAMFT)</li>
      </ul>
    </p>

    <p>
      Contact me:<br />
      <a href="mailto:cheryl@journeyscomo.com" target="_blank">cheryl@journeyscomo.com</a>
    </p>
    
  </div>

  <div class="clear"></div>

</section>

<?php

show_footer ( );

?>
