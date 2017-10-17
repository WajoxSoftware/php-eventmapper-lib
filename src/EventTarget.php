<?php
namespace wajox\eventmapper;

/**
 * EventTarget
 */
class EventTarget implements EventTargetInterface
{
	protected $type;
	protected $id;
	protected $params;

	/**
	 * @param string $type
	 * @param string $id
	 * @param string $params
	 */
	public function __construct($type, $id, $params)
	{
		$this
			->setType($type)
			->setId($id)
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
	 * @return EventTargetInterface
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
	 * @return EventTargetInterface
	 */
	public function setId($id)
	{
		$this->id = $id;

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
	 * @return EventTargetInterface
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
    		'target_type' => (string) $this->getType(),
    		'target_id' => (string) $this->getId(),
    		'params' => $this->getParams(),
    	];
    }
}