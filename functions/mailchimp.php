<?php
// API to mailchimp ########################################################
$apiKey = '49c8b70a7d7aaf01cd9b1dcac76e475b-us14';
$listId = '96961aff0a';
$max_subscribers = 150;

// insert subscribers
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    if($email && $name) {

        if (CountSubscribers($apiKey,$listId) < $max_subscribers) {
            if (CheckSubscriber($apiKey, $listId, $email) == 400) {
                //Create mailchimp API url
                $memberId = md5(strtolower($email));
                $dataCenter = substr($apiKey, strpos($apiKey, '-') + 1);
                $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;

                //Member info
                $data = array(
                    'email_address' => $email,
                    'status' => 'subscribed',
                    'merge_fields' => [
                        'FNAME' => $name
                    ]
                );
                $jsonString = json_encode($data);
                // send a HTTP PUT request with curl
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
                curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonString);
                $result = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                $msg = 'See you at the event!';
            } else {
                header('HTTP/1.1 500 Internal Server Error');
                header('Content-Type: application/json; charset=UTF-8');
                $msg = 'You are already on the RSVP list!';
            }
        } else {
            header('HTTP/1.1 500 Internal Server Error');
            header('Content-Type: application/json; charset=UTF-8');
            $msg = 'RSVP is Closed!';
        }
    }
    // echo the message
    echo $msg;

}



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $dataCenter = substr($apiKey, strpos($apiKey, '-') + 1);
        $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId;

        // send a HTTP GET request with curl
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $subscriber_array = json_decode($result);
        $subscriber_count = $subscriber_array->stats->member_count;

        //Collecting the status
        switch ($httpCode) {
            case 200:
                $msg = $subscriber_count;
                break;
            default:
                $msg = 'Oops, please try again.';
                break;
        }

        echo ($msg);
}

// get count subscribers
function CountSubscribers($apiKey,$listId){
    $dataCenter = substr($apiKey, strpos($apiKey, '-') + 1);
    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId;

    // send a HTTP GET request with curl
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);

    $subscriber_array = json_decode($result);
    $subscriber_count = $subscriber_array->stats->member_count;

    return $subscriber_count;
}

// check if  subscriber exist
function CheckSubscriber($apiKey,$listId,$email){
    $memberId = md5($email);
    $dataCenter = substr($apiKey, strpos($apiKey, '-') + 1);
    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId.'/members/'.$memberId;
    $data = array(
            'apikey'        => $apiKey,
            'email_address' => $email
        );
    $jsonString = json_encode($data);
    // send a HTTP PUT request with curl
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonString);
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    $subscriber = json_decode($result);
    return $subscriber->status;
}



// #######################################################################
