<?php

class Google_connect {

    private $google_config;

    public function __construct() {
        $ci = & get_instance();
        $ci->config->load('google', TRUE);
        $ci->load->helper('url');
        $this->google_config = $ci->config->item('google_config', 'google');
    }

    public function getAuthorizationUrl($redirect_path, $state_string = "", $scope = "profile email") {
        $redirect_uri = base_url($redirect_path);
        $client_id = $this->google_config["client_id"];
        $url = "https://accounts.google.com/o/oauth2/auth?client_id=" . $client_id . "&redirect_uri=" . $redirect_uri . "&scope=" . $scope . "&response_type=code&state=$state_string";
        return $url;
    }

    public function getAccessToken($redirect_path, $code, $state_string = "") {
        $redirect_uri = base_url($redirect_path);
        $fields = array(
            'grant_type' => 'authorization_code',
            'code' => $code,
            'client_id' => urlencode($this->google_config["client_id"]),
            'client_secret' => urlencode($this->google_config["client_secret"]),
            'redirect_uri' => urlencode($redirect_uri),
        );

        $post = '';
        foreach ($fields as $key => $value) {
            $post .= $key . '=' . $value . '&';
        }
        $post = rtrim($post, '&');

        $result = $this->curl("https://accounts.google.com/o/oauth2/token?state=$state_string", $post);

        $token = json_decode($result);
        return $token;
    }

    public function fetch_profile($access_token) {
        $url = 'https://www.googleapis.com/plus/v1/people/me?access_token=' . $access_token;
        $xmlresponse = $this->curl($url);
        return json_decode($xmlresponse, true);
    }
    
    public function fetch_app_profile($access_token) {
        $url = 'https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=' . $access_token;
        $xmlresponse = $this->curl($url);
        return json_decode($xmlresponse, true);
    }

    public function fetch_contacts($access_token) {
        $url = 'https://www.google.com/m8/feeds/contacts/default/full?max-results=1000&alt=json&v=3.0&oauth_token=' . $access_token;
        $xmlresponse = $this->curl($url);
        return json_decode($xmlresponse, true);
    }

    private function curl($url, $post = "") {
        $curl = curl_init();
        $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
        curl_setopt($curl, CURLOPT_URL, $url);    //The URL to fetch. This can also be set when initializing a session with curl_init().
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE); //TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);    //The number of seconds to wait while trying to connect.
        if ($post != "") {
            curl_setopt($curl, CURLOPT_POST, 5);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
        }
        curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);  //The contents of the "User-Agent: " header to be used in a HTTP request.
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);   //To follow any "Location: " header that the server sends as part of the HTTP header.
        curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE);  //To automatically set the Referer: field in requests where it follows a Location: redirect.
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);    //The maximum number of seconds to allow cURL functions to execute.
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);  //To stop cURL from verifying the peer's certificate.

        $contents = curl_exec($curl);
        curl_close($curl);
        return $contents;
    }
}

?>