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
            (($handle = fopen("../data/users.csv", "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                if ($data[0] == $id) {
                    return [
                        'id' => $data[0],
                        'firstName' => $data[1],
                        'seconD_name' => $data[2]
                    ];
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
                ($handle = fopen("../data/users.csv", "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $rows[] = [
                    'id' => $data[0],
                    'firstName' => $data[1],
                    'seconD_name' => $data[2]
                ];
            }
        }
        return $rows;
    }
}