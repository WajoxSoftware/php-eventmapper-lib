<?php
namespace wajox\eventmapper;

class Event implements EventInterface, \JsonSerializable
{
    protected $name;
    protected $target;
    protected $userId;
    protected $createdAt;
    protected $params = [];

    public function getName()
    {
        return $this->name;
    }

    public function setName($eventName)
    {
        $this->name = $eventName;

        return $this;
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function setTarget($eventTarget)
    {
        $this->target = $eventTarget;

        return $this;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($eventUserId)
    {
        $this->userId = $eventUserId;

        return $this;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function setParams($eventParams)
    {
        $this->params = $eventParams;

        return $this;
    }

    public function getParam($paramName)
    {
        if (isset($this->params[$paramName])) {
            return $this->params[$paramName];
        }

        return null;
    }

    public function setParam($paramName, $paramValue)
    {
        $this->params[$paramName] = $paramValue;

        return $this;
    }

    public function removeParam($paramName)
    {
        if (isset($this->params[$paramName])) {
            unset($this->params[$paramName]);
        }
        
        return $this;
    }

    public function jsonSerialize()
    {
        return [
            "EventName" => (string) $this->getName(),
            "EventTarget" => (string) $this->getTarget(),
            "UserId" => (string) $this->getUserId(),
            "CreatedAt" => $this->getCreatedAt(),
            "Params" => $this->getParams(),
        ];
    }

    public function loadJson($json)
    {
        $decoded = \json_decode($json, true);

        $this
            ->setName($decoded["EventName"])
            ->setTarget($decoded["EventTarget"])
            ->setUserId($decoded["UserId"])
            ->setCreatedAt($decoded["CreatedAt"])
            ->setParams($decoded["Params"]);

        return $this;
    }
}
