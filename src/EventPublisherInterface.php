<?php
namespace wajox\eventmapper;

interface EventPublisherInterface
{
    public function __construct($adapterClass = null, $adapterParams = []);
    public function getAdapter();
    public function setAdapter($adapter);
}
