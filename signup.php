<?php

ob_start ( );

include_once ( 'includes/includes.php' );
require_once ( 'includes/class.phpmailer.php' );

$PageTitle   = "Mailing List";
$MenuItem    = "resources";
$Breadcrumbs = '<a href="/">Home</a>' . $BreadcrumbSeparator . '<a href="resources.php">Resources</a>' . $BreadcrumbSeparator . $PageTitle;

function customPageHeader ( ) {?>
  <!-- Include Page-Specific Header Tags Here -->
<?php }

  $Message = '';
  $Success = false;

  if ( !isset ( $_REQUEST [ 'submit' ] ) ) {
    
    $Message = 'Please fill out this form to sign up for the ' . $SiteName . ' email newsletter.';

  } else {

    $Email     = $_REQUEST [ 'Email'     ];
    $FirstName = $_REQUEST [ 'FirstName' ];
    $LastName  = $_REQUEST [ 'LastName'  ];
    $FullName  = $FirstName . ' ' . $LastName;

    $ClientSubject  = 'Welcome to ' . $SiteName;
    $ManagerSubject = 'New Mailing List Signup';

    $ClientMessage   = "Welcome to the " . $SiteName . " email newsletter list.";

    $ManagerMessage  = "<style>table.JourneysSignup { margin: 18px auto; }</style>";
    $ManagerMessage  = "<h1>New " . $SiteShortName . " Mailing List Signup</h1>";
    $ManagerMessage .= "<p>The following person has signed up for the mailing list:</p>";
    $ManagerMessage .= '<table align="center" class="JourneysSignup">';
    $ManagerMessage .= "<tr><td><strong>First Name: </strong><td><td>" . $FirstName . "</td></tr>";
    $ManagerMessage .= "<tr><td><strong>Last Name:  </strong><td><td>" . $LastName  . "</td></tr>";
    $ManagerMessage .= "<tr><td><strong>Email:      </strong><td><td>" . $Email     . "</td></tr>";
    $ManagerMessage .= "</table><br />";
    $ManagerMessage .= "<p>Please add this person to the mailing list.</p>";

    $ClientResult  = SendEmail ( $EmailInfo, $SiteName, $Email,     $FullName, $ClientSubject,  $ClientMessage,  'Client' );
    $ManagerResult = SendEmail ( $EmailInfo, $SiteName, $EmailInfo, $SiteName, $ManagerSubject, $ManagerMessage, 'Owner'  );

    if ( ( strpos ( $ClientResult, 'Succ' ) === false ) || ( strpos ( $ManagerResult, 'Success' ) === false ) ) {
      $Message = 'Sorry, but there was an error processing your request. Please try again. If this error continues, please contact us at <a href="mailto:' . $EmailInfo . '" target="_blank">' . $EmailInfo . '</a>.';
    } else {
      $Success = true;
      $Message = 'Thanks for signing up for our email newsletter. You should receive a confirmation message shortly.';
    }
  }

show_header ( $PageTitle, $MenuItem, $Breadcrumbs, true, true );

?>

<section class="sign-up">

  <div class="message"><?php echo $Message ?></div>

<?php

  if ( !$Success ) {

?>

    <table>
      <tr>
        <th>First Name</th>
        <td><input type="text" name="FirstName" id="FirstName" /></td>
      </tr>
      <tr>
        <th>Last Name</th>
        <td><input type="text" name="LastName" id="LastName" /></td>
      </tr>
      <tr>
        <th>Email</th>
        <td><input type="text" name="Email" id="Email" /></td>
      </tr>
    </table>
    <div class="button"><input type="submit" name="submit" id="submit" value="Sign Up" onclick="this.form.action='signup.php';this.form.target='_top';" /></div>

<?php

  }

?>

</section>

<?php

show_footer ( );

?>
