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

?>

