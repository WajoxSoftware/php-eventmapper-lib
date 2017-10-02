<?php
namespace wajox\eventmapper\publishers;

use wajox\eventmapper\EventPublisherAdapterInterface;

/**
 * Http JSON event publisheradapter
 * @see ../EventPublisherAdapterInterface.php
 */
class HttpEventPublisher implements EventPublisherAdapterInterface
{
    protected $options;

    /**
     * constructor
     * @param array $options "url" and "token" are required options
     * e.g.
     * 	[
     * 		"url" => "http://0.0.0.0:5000/create",
     * 		"token" => "super-token",
     *   ]
     */
    public function __construct($options = [])
    {
        $this->setOptions($options);
    }

    /**
     * publishe event
     * @see ../EventPublisherAdapterInterface.php
     * @param  string $routingKey [description]
     * @param  EventInterface $event
     * @return bool
     */
    public function publish($routingKey, $event)
    {
        return $this->sendRequest($routingKey, $event);
    }

    /**
     * get option by key name
     * @param  string $key
     * @return mixed
     */
    protected function getOption($key)
    {
        if (isset($this->options[$key])) {
            return $this->options[$key];
        }

        throw new \Exception('Can not find option with key ' . $key);
    }

    /**
     * set adapter options
     * @param array $options
     */
    protected function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * get http client
     * @return \GuzzleHttp\Client
     */
    protected function getHttpClient()
    {
        return new \GuzzleHttp\Client();
    }

    /**
     * send http request
     * @param  string $rKey
     * @param  wajox\eventmapper\EventIterface $event
     * @return bool
     */
    protected function sendRequest($rKey, $event)
    {
        $resp = $this->getHttpClient()->request(
            'POST',
            $this->buildRequestUrl($rKey),
            [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => \json_encode($event),
            ]
        );

        return $resp->getStatusCode() == 200;
    }

    /**
     * build http request url
     * @param  string $rKey
     * @return string
     */
    protected function buildRequestUrl($rKey)
    {
        return $this->getOption('url')
            . '/' . $rKey . '/events'
            . '?token=' . $this->getOption('token');
    }
}
