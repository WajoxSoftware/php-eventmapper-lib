<?php
namespace wajox\eventmapper;

/**
 * EventTargetInterface interface
 */
interface EventTargetInterface
{
	/**
	 * @param string $type
	 * @param string $id
	 * @param string $params
	 */
	public function __construct($type, $id, $params);

	/**
	 * @return string
	 */
	public function getType();

	/**
	 * @param string $type
	 * @return EventTargetInterface
	 */
	public function setType($type);

	/**
	 * @return string
	 */
	public function getId();

	/**
	 * @param string $id
	 * @return EventTargetInterface
	 */
	public function setId($id);

	/**
	 * @return array
	 */
	public function getParams();

	/**
	 * @param array $params
	 * @return EventTargetInterface
	 */
	public function setParams($params);

    /**
     * \json_encode()
     * @return array
     */
    public function jsonSerialize();
}