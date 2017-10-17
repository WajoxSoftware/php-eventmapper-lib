<?php
namespace wajox\eventmapper;

/**
 * EventSourceInterface interface
 */
interface EventSourceInterface
{
	/**
	 * @param string $type
	 * @param string $id
	 * @param string $origin
	 * @param string $params
	 */
	public function __construct($type, $id, $origin, $params);

	/**
	 * @return string
	 */
	public function getType();

	/**
	 * @param string $type
	 * @return EventSourceInterface
	 */
	public function setType($type);

	/**
	 * @return string
	 */
	public function getId();

	/**
	 * @param string $id
	 * @return EventSourceInterface
	 */
	public function setId($id);

	/**
	 * @return string
	 */
	public function getOrigin();

	/**
	 * @param string $origin
	 * @return EventSourceInterface
	 */
	public function setOrigin($origin);

	/**
	 * @return array
	 */
	public function getParams();

	/**
	 * @param array $params
	 * @return EventSourceInterface
	 */
	public function setParams($params);

    /**
     * \json_encode()
     * @return array
     */
    public function jsonSerialize();
}