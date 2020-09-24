<?
 if(isset($_POST['token'], $_POST['amount'])) {
$args = http_build_query(array(
    'token' => $_POST['token'],
    'amount'  => $_POST['amount']
));

$url = "https://khalti.com/api/v2/payment/verify/";

# Make the call using API.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$headers = ['Authorization: Key test_secret_key_'];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Response
$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
 $obj = json_decode($response);


if ($status_code == 200) {
echo $status_code;
}else{
echo $obj->error_key;
}

curl_close($ch); 
 }
?>
