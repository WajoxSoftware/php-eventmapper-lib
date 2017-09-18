<?php
namespace wajox\eventmapper;

/**
 * Publisher
 * @see EventPublisherInterface.php
 */
class EventPublisher implements EventPublisherInterface
{
	protected $adapter;

    public function __construct($adapterClass = '', $adapterParams = [])
    {
    	if ($adapterClass != '') {
    		$this->buildAdapter($adapterClass, $adapterParams);
    	}
    }

    public function getAdapter()
    {
    	return $this->adapter;
    }

    public function setAdapter($adapter)
    {
    	$this->adapter = $adapter;

    	return $this;
    }

    protected function buildAdapter($adapterClass, $adapterParams)
    {
    	$this->adapter = new $adapterClass($adapterParams);

    	return $this;
    }
}
