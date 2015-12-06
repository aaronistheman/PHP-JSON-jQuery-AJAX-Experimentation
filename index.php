<?php
session_start();

require_once('twitter/twitteroauth/twitteroauth.php');
require_once('twitter/config.php');

/* Get user access tokens out of the session. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET,
    $_SESSION['request_token'], $_SESSION['request_token_secret']);
// $access_token = $_SESSION['access_token'];
$access_token = $connection->oauth("oauth/access_token",
    array("oauth_verifier" => $_REQUEST['oauth_verifier'],
    'oauth_token'=> $_REQUEST['oauth_token']));
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET,
    $access_token['oauth_token'], $access_token['oauth_token_secret']);
$user = $connection->get('account/verify_credentials');

?>

<html lang="en">
<head>

<meta charset="utf-8" />
<title>Experimenting with PHP and Twitter API</title>

<script
    src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
</script>
<script>
<?php if($_SESSION['status'] == 'verified') { ?>
    var twitter = true;
    var twitterName = "<?php print $user->screen_name; ?>";
<?php } else { ?>
    var twitter = false;
<?php } ?>
</script>

</head>
<body>

<?php if($_SESSION['status'] != 'verified') { ?>
    <a href="./twitter/redirect.php">Login with Twitter</a>
<?php } else { ?>
    <a href="./twitter/clearsessions.php">Logout from Twitter</a>
<?php } ?>

<!-- <a id="tweetScore" target="_blank">tweet</a><br>
<script src="js/testGetJSON.js"></script> -->

</body>
</html>