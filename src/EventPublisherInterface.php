<?php
namespace wajox\eventmapper;

/**
 * Event publisher interface
 * @see EventPublisherAdapterInterface.php
 * 
 */
interface EventPublisherInterface
{
	/**
	 * Constructor
	 * @param string $adapterClass  publisher adapter full class name
	 * @param array  $adapterParams publisher adapter options
	 */
    public function __construct($adapterClass = null, $adapterParams = []);

    /**
     * get adapter object
     * @return EventPublisherAdapterInterface
     */
    public function getAdapter();

    /**
     * set adapter object
     * @param EventPublisherAdapterInterface $adapter
     */
    public function setAdapter($adapter);
}
