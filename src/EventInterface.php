<?php
namespace wajox\eventmapper;

/**
 * Event interface
 */
interface EventInterface
{
    /**
     * getevent name
     * @return string
     */
    public function getName();

    /**
     * set event name
     * @param string $eventName
     * @return EventInterface
     */
    public function setName($eventName);

    /**
     * get event target
     * @return string
     */
    public function getTarget();

    /**
     * set event target
     * @param string $eventTarget
     * @return EventInterface
     */
    public function setTarget($eventTarget);

    /**
     * get event authors user id
     * @return string
     */
    public function getUserId();

    /**
     * set event user id
     * @param string $eventUserId
     * @return EventInterface
     */
    public function setUserId($eventUserId);

    /**
     * get event created timestamp
     * @return int
     */
    public function getCreatedAt();

    /**
     * set event created timestamp
     * @param int $createdAt
     * @return  EventInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * get event params
     * @return array
     */
    public function getParams();

    /**
     * set event params
     * @param array $eventParams
     * @return  EventInterface
     */
    public function setParams($eventParams);

    /**
     * get parma by name
     * @param  string $paramName
     * @return string
     */
    public function getParam($paramName);

    /**
     * set param with name $paramName with value $paramValue
     * @param string $paramName
     * @param string $paramValue
     * @return  EventInterface
     */
    public function setParam($paramName, $paramValue);

    /**
     * remove param with name $paramName
     * @param  string $paramName
     * @return EventInterface
     */
    public function removeParam($paramName);

    /**
     * \json_encode()
     * @return array
     */
    public function jsonSerialize();

    /**
     * load event form json-encoded string
     * @param  string $json
     * @return EventInterface
     **/
    public function loadJson($json);
}
