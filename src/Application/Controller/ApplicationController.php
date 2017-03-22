<?php
namespace Refactor\Application\Controller;

use Refactor\Common\Controller\AbstractRestfulController;


/**
 * Class ApplicationController
 * @package Refactor\Application\Controller
 */
class ApplicationController extends AbstractRestfulController
{

    /**
     * Get a resource
     * @param $id
     * @return array
     */
    public function get($id){
        if
            (($handle = fopen("users.csv", "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                if ($data[0] == $id) {
                    return $data;
                }
            }
        }

        die('Unable to find user');
    }

    /**
     * Get a list of resources
     * @return mixed
     */
    public function getList(){
        $rows = [];
        if
            (
                ($handle = fopen("users.csv", "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $rows[$data[0]] = $data;
            }
        }
        return $rows;
    }
}