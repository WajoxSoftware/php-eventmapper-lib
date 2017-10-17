<?php
namespace wajox\eventmapper;

class Event implements EventInterface, \JsonSerializable
{
    const MAX_PARAMS_SIZE = 200;

    protected $target;
    protected $source;
    protected $name;
    protected $userId;
    protected $createdAt;
    protected $params = [];

    public function getTarget()
    {
        return $this->target;
    }

    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    public function buildTarget($targetType, $targetId, $targetParams)
    {
        return $this->setTarget(
            new EventTarget(
                $targetType,
                $targetId,
                $targetParams
            )
        );
    }

    public function getSource()
    {
        return $this->source;
    }

    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    public function buildSource($sourceType, $sourceId, $sourceOrigin, $sourceParams)
    {
        return $this->setSource(
            new EventSource(
                $sourceType,
                $sourceId,
                $sourceOrigin,
                $sourceParams
            )
        );
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($eventName)
    {
        $this->name = $eventName;

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
        foreach ($eventParams as $name => $value) {
            $this->setParam($name, $value);
        }

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
        if (sizeof($this->params) >= self::MAX_PARAMS_SIZE) {
            return $this;
        }

        if (is_array($paramValue)) {
            $this->params[$paramName] = (string) \json_encode($paramValue);
        } else {
            $this->params[$paramName] = (string) $paramValue;
        }
        
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
            "target" => $this->getTarget()->jsonSerialize(),
            "source" => $this->getSource()->jsonSerialize(),
            "event_name" => (string) $this->getName(),
            "user_id" => (string) $this->getUserId(),
            "created_at" => $this->getCreatedAt(),
            "params" => $this->getParams(),
        ];
    }

    public function loadJson($json)
    {
        $decoded = \json_decode($json, true);

        $this
            ->buildTarget(
                $decoded["target"]["target_type"],
                $decoded["target"]["target_id"],
                $decoded["target"]["params"]
            )
            ->buildSource(
                $decoded["source"]["source_type"],
                $decoded["source"]["source_id"],
                $decoded["source"]["origin"],
                $decoded["source"]["params"]
            )
            ->setName($decoded["event_name"])
            ->setUserId($decoded["user_id"])
            ->setCreatedAt($decoded["created_at"])
            ->setParams($decoded["params"]);

        return $this;
    }
}
