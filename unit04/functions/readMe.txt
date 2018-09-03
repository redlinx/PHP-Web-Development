Source: https://stackoverflow.com/questions/15617512/get-json-object-from-url

Get JSON object from URL

-----------------
Given
-----------------
I have a URL that returns a JSON object like this:

{
    "expires_in":5180976,
    "access_token":"AQXzQgKTpTSjs-qiBh30aMgm3_Kb53oIf-VA733BpAogVE5jpz3jujU65WJ1XXSvVm1xr2LslGLLCWTNV5Kd_8J1YUx26axkt1E-vsOdvUAgMFH1VJwtclAXdaxRxk5UtmCWeISB6rx6NtvDt7yohnaarpBJjHWMsWYtpNn6nD87n0syud0"
} 

-----------------
Problem
-----------------
I want to get the access_token value. So how can I retrieve it through PHP?

-----------------
Answer #01
-----------------
$json = file_get_contents('url_here');
$obj = json_decode($json);
echo $obj->access_token;


For this to work, file_get_contents requires that allow_url_fopen is enabled. This can be done at runtime by including:

ini_set("allow_url_fopen", 1);

You can also use curl to get the url. To use curl, you can use the example found here:

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'url_here');
$result = curl_exec($ch);
curl_close($ch);

$obj = json_decode($result);
echo $obj->access_token;

-----------------
Answer #02
-----------------

$url = 'http://.../.../yoururl/...';
$obj = json_decode(file_get_contents($url), true);
echo $obj['access_token'];


