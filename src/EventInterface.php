<?php
namespace wajox\eventmapper;

interface EventInterface
{
    public function getName();
    public function setName($eventName);
    public function getTarget();
    public function setTarget($eventTarget);
    public function getUserId();
    public function setUserId($eventUserId);
    public function getCreatedAt();
    public function setCreatedAt($createdAt);
    public function getParams();
    public function setParams($eventParams);
    public function getParam($paramName);
    public function setParam($paramName, $paramValue);
    public function removeParam($paramName);
    public function jsonSerialize();
    public function loadJson($json);
}
