<?php

require './facebook.php';


$facebook = new Facebook(array(
'appId' =>  '',
'secret' => '',
'cookie' => true,
));

$user_profile = null;

$user = $facebook->getUser();
$loginUrl = $facebook->getLoginUrl(
array(
    'req_perms' => 'email,publish_stream,user_birthday,read_stream'
    ));


//echo $uid . " uid check!";

if($user) 
{


    $user_friends = $facebook->api('/me/friends');
    $user_profile=$facebook->api('/me');
    echo "Welcome ".$user_profile['name'] .":";
        echo " Total friends ".sizeof($user_friends['data'])."<br />";
	//echo "Your Profile Summary.<br />" ;


	//echo "<pre>"; print_r($m); echo "</pre>";

	//echo "<br>Your Friends Summary<br />";


	//echo "<pre>"; print_r($me); echo "</pre>";


        echo "<br /> <b>Friends Montage</b> <br /><br />";

	foreach($user_friends['data'] as $frns)

	{	

        	echo "<img  src=\"https://graph.facebook.com/".$frns['id']."/picture\" title=\"".$frns['name']."\"/>";
	}

}


if (!$user) 
{
   echo "<script type=\"text/javascript\">\ntop.location.href = \"$loginUrl\";\n</script>";
}



?>

<html>
<title>Friends Montage</title>
</html>
