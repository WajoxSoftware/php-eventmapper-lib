<?php
namespace wajox\eventmapper;

/**
 * EventSource
 */
class EventSource implements EventSourceInterface
{
	protected $type;
	protected $id;
	protected $origin;
	protected $params;

	/**
	 * @param string $type
	 * @param string $id
	 * @param string $origin
	 * @param string $params
	 */
	public function __construct($type, $id, $origin, $params)
	{
		$this
			->setType($type)
			->setId($id)
			->setOrigin($origin)
			->setParams($params);
	}

	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @param string $type
	 * @return EventSourceInterface
	 */
	public function setType($type)
	{
		$this->type = $type;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param string $id
	 * @return EventSourceInterface
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getOrigin()
	{
		return $this->origin;
	}

	/**
	 * @param string $origin
	 * @return EventSourceInterface
	 */
	public function setOrigin($origin)
	{
		$this->origin = $origin;

		return $this;
	}

	/**
	 * @return array
	 */
	public function getParams()
	{
		return $this->params;
	}

	/**
	 * @param array $params
	 * @return EventSourceInterface
	 */
	public function setParams($params)
	{
		$this->params = $params;

		return $this;
	}

    /**
     * \json_encode()
     * @return array
     */
    public function jsonSerialize()
    {
    	return [
    		'source_type' => (string) $this->getType(),
    		'source_id' => (string) $this->getId(),
    		'origin' => (string) $this->getOrigin(),
    		'params' => $this->getParams(),
    	];
    }
}