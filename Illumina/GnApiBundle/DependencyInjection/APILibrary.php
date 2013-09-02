<?php

namespace Illumina\GnApiBundle\DependencyInjection;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\HttpException;


class APILibrary {

    protected $container;
    protected $key;
    protected $secret;

    public function __construct($container, $key, $secret)
    {
        $this->container = $container;
        $this->secret = $secret;
        $this->key = $key;
    }

    public function generateHash($timestamp, $userToken, $encoding='md5')
    {
        return $this->generateHashString($this->key,$this->secret,$userToken,$timestamp);
    }

    public function generateHashString($key, $secret, $userToken, $timestamp, $encoding='md5')
    {
        if ($encoding = 'sha1') {
            return sha1($key.$userToken.$timestamp.$secret);
        } else {
            return md5($key.$userToken.$timestamp.$secret);
        }
    }

    public function generateSecureParams($userToken,$encoding='md5')
    {
        $timestampResponse = $this->container->get('illumina.gn.retriever')->getTime();

        if ($timestampResponse === null) {
            return false;
        }

        $timestamp = $timestampResponse->timestamp;

        if ($timestamp === null) {
            return false;
        }

        $hash = $this->generateHash($timestamp,$userToken);

        return array('ts' => $timestamp, 'hash' => $hash, 'apikey'=> $this->key, 'token' => $userToken);
    }

}