<?php


// Auto-discover the photos, thumbnails and description files
$photoData = [];
$numGal = 0;

// open the photos folder
$fp = opendir("photos");
while( false !== ( $DIR = readdir($fp) ) ) {
 
  // read any directory that isn't . or ..
  if (($DIR !== (".")) && ($DIR !== (".."))) {

  	// get the description.txt file contents
    $photoData[$numGal]["description"] = 
      file_get_contents("photos/" . $DIR . "/description.txt");

	// gallery directory
    $photoData[$numGal]["directory"] = $DIR;
	  
    // open the gallery folder, get the photo names and sort them
    $fpdir = opendir("photos/" . $DIR);
    while ($file = readdir($fpdir)) {
      if (($file !== (".")) && ($file !== ("..")) && 
      	  ($file !== "thumbs") && ($file !== "description.txt")) {
        $photoData[$numGal]["photos"][] = $file;        
      }
    }
    sort($photoData[$numGal]["photos"]);
  }

  $numGal++;
}

$TLP['photo'] = $photo;
$TLP['tlp'] = array("allphotos"=>0);

switch($_REQUEST['act']){
  case 'more':
    $TLP['tlp']["allphotos"] = 0;
    $TLP['tlp'] +=["id"=>$_REQUEST["id"]];
    break;
  case 'enlarge':
    $TLP['tlp']["allphotos"] = 2;
    $TLP['tlp']["allphotos"] = $_REQUEST["id"];
    $TLP['tlp'] +=["enlargeid"=>$_REQUEST["enlargeid"]];
    break;
  default:
    $TPL['tpl']["allphotos"] = 1;
}

include 'app.view.php';

?>

<!-- Let's look at the contents of $photoData...  -->
<pre><?php print_r($photoData); ?></pre>



