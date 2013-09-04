<?php

namespace Illumina\GnApiBundle\DependencyInjection;



class ContentRetrieverService {

    protected $siteBase;
    protected $container;

    public function __construct($container,$baseUrl)
    {
        $this->container = $container;
        $this->siteBase = $baseUrl;
    }

    protected function sendRequest($url, $params = NULL, $method = 'GET')
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");

        curl_setopt($curl, CURLOPT_HTTPHEADER,array (
            'Accept: application/json'
        ));

        if ($method == 'POST') {
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        } else {
            if ($params) {
                $url .= (strstr('?',$url))?'&':'?';
                $url .= http_build_query($params);
            }
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, false);
            curl_setopt($curl, CURLOPT_HTTPGET, true);
        }

        $curl_response = curl_exec($curl);
        curl_close($curl);

        $formattedResponse = json_decode($curl_response);

        return $formattedResponse;
    }

    public function buildUserUrl($requestPage)
    {
        $baseUrl = $this->siteBase.'/api/users/'.$requestPage;
        return $baseUrl;
    }

    public function getUserInfo($userToken)
    {
        $url = $this->buildUserUrl('info');

        return $this->sendRequest($url,$this->container->get('illumina.gn.api')->generateSecureParams($userToken));
    }

    public function getTime()
    {
        $url = $this->siteBase.'/api/time';

        return $this->sendRequest($url);
    }
}
