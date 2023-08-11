<?php

function getWebhookData($reqBody) {
  // Get the timestamp of the webhook event.
  $timestamp = time();

  // Get the type of the webhook event.
  $type = $reqBody['type'];

  // Get the data of the webhook event.
  $data = $reqBody['data'];

  // Return the webhook data as an object.
  return (object) array(
    'timestamp' => $timestamp,
    'type' => $type,
    'data' => $data,
  );
}

function hook() {

  $ch = curl_init('http://hooks.wearpanda.com/lister.php');

   $ch = curl_init();

  // Set the URL of the webhook.
  curl_setopt($ch, CURLOPT_URL, $webhookUrl);

  // Set the method to POST.
  curl_setopt($ch, CURLOPT_POST, 1);

  // Set the content type to application/json.
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

  // Set the body of the request to the webhook data.
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($reqBody));

  // Execute the cURL request.
  curl_exec($ch);

  // Check for errors.
  if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
  }

  // Close the cURL handle.
  curl_close($ch);
  
}

?>

