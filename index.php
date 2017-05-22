<?php

echo "Hello World!";

//Testing facebook graph access

//i dont think i need this section

$fb = new Facebook\Facebook([
  'app_id' => '111385752712817',
  'app_secret' => 'b9e480d50582ea442b2308af63a50f15',
  'default_graph_version' => 'v2.2',
  ]);


try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name', '{access-token}');
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();

echo 'Name: ' . $user['name'];
// OR
// echo 'Name: ' . $user->getName();

?>
