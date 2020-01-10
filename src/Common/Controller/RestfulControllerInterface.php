<?php
namespace Refactor\Common\Controller;

/**
 * Interface RestfulControllerInterface
 * @package Refactor\Common\Controller
 */
interface RestfulControllerInterface
{
    /**
     * Get a resource
     * @param $id
     * @return array
     */
    public function get($id);
}