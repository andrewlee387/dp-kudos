<?php

session_start();

// Safely parses the login string.
function safeParseLogin() {
	if( $_SESSION['login']  != '' ) {
		if (isset($_REQUEST['login'])) {
			$login = $_REQUEST['login'];
		} else {
			$login = $_SESSION['login'];
		}
	} else {
		$pos = strpos($_SERVER['REMOTE_USER'], '@');
		if ($pos)  {
			$login = substr($_SERVER['REMOTE_USER'], 0, $pos);
		} else {
			$login = $_SERVER['REMOTE_USER'];
		}
		$_SESSION['login'] = $login;
		$_SESSION['dayspring'] = 'T';
	}
	return $login;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

    <title> <?php bloginfo("name"); ?> </title>

    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto%20Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CNoto%20Serif%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7COpen%20Sans%3A300%7COpen%20Sans%3A400%7COpen%20Sans%3A700%7CLato%3A300%7CLato%3A400%7CLato%3A700&amp;display=swap">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <?php /* If this is a category archive */ if (is_category()) { ?>
        <link rel="alternate" type="application/rss+xml" title="<?php single_cat_title(''); ?> ATOM Feed" href="<?php echo $_SERVER['REQUEST_URI']; ?>/feed/atom" />
    <?php  } else { ?>
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> ATOM Feed" href="<?php bloginfo('atom_url'); ?>" />
    <?php  } ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <style type="text/css" media="screen, projection, print">
        /* You are here style */
        #header li#blog a, #header li#blog a:visited {
          color:#9d421f;
          font-weight:bold;
          text-decoration:none;
        }
        #footer li#blog a, #footer li#blog a:visited {
          color:#9d421f;
          text-decoration:none;
        }
    </style>

    <?php wp_head(); ?>
</head>
<body>
<div id="page">

<div id="header">
    <div class="logo">
        <a href="/blog/"><img src="<?php bloginfo('template_directory'); ?>/images/logo.svg" alt="Dayspring Logo" title="Dayspring Logo"></a>
    </div>
    <div class="nav-wrap">
        <ul>
            <li id="kudos"><a href="https://dayspring-kudos.herokuapp.com/login?username=<?php echo safeParseLogin(); ?>&password=dtpartners">Kudos</a></li>
            <li id="sales"><a href="https://drive.google.com/drive/u/0/folders/0B-t7ksMWmJcvbl9GSVppS1hrbFk">Sales</a></li>
            <li id="assets"><a href="http://intranet.dayspring.office:8080/assettrack">Assets</a></li>
            <li id="defects"><a href="/timesheetPHP/task/task_sum.php">WebTrack</a></li>
            <li id="timesheet"><a href="/timesheetPHP/project/project.php">Timesheet</a></li>
            <li id="flexsched"><a href="//scheduler.dayspringpartners.com/">Scheduler</a></li>
            <li id="GDrive"><a href="https://drive.google.com/">GDrive</a></li>
            <li id="home"><a href="/blog/">Home</a></li>
        </ul>
    </div>
</div>