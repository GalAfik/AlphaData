<?php

header('Content-Type: application/json');

// Report all PHP errors
error_reporting(-1);

require_once('twitter_proxy.php');

// Twitter OAuth Config options
$oauth_access_token = '2789400909-G93OkuDFBJjt58XIlLBfeqwA5bwpmyAIOPZ5HhL';
$oauth_access_token_secret = 'ToPwwK3MxvUWno2jd7LC3PRVXlTA6jY9AcHZ5wcurNVJs';
$consumer_key = 'oX02veTTdaEUgwNtyP2Bm73aV';
$consumer_secret = 'geI2pHMR604aJjqjLYVyEGtgrjCdIcixelZkDyMxEX4Ethm9w5';
$user_id = '2789400909';
$screen_name = 'afikdesigns';
$count = 5;

$twitter_url = 'statuses/user_timeline.json';
$twitter_url .= '?user_id=' . $user_id;
$twitter_url .= '&screen_name=' . $screen_name;
$twitter_url .= '&count=' . $count;

// Create a Twitter Proxy object from our twitter_proxy.php class
$twitter_proxy = new TwitterProxy(
	$oauth_access_token,			// 'Access token' on https://apps.twitter.com
	$oauth_access_token_secret,		// 'Access token secret' on https://apps.twitter.com
	$consumer_key,					// 'API key' on https://apps.twitter.com
	$consumer_secret,				// 'API secret' on https://apps.twitter.com
	$user_id,						// User id (http://gettwitterid.com/)
	$screen_name,					// Twitter handle
	$count							// The number of tweets to pull out
);

// Invoke the get method to retrieve results via a cURL request
$tweets = $twitter_proxy->get($twitter_url);

echo $tweets;

?>