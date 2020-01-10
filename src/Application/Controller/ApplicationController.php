<?php
namespace Refactor\Application\Controller;

use Refactor\Common\Controller\RestfulControllerInterface;


/**
 * Class ApplicationController
 * @package Refactor\Application\Controller
 */
class ApplicationController implements RestfulControllerInterface
{
    private $rows;
    private $fileSource;

    public function __construct()
    {
        $this->rows       = array();
        $this->fileSource = '../data/users.csv';
    }

    /**
     * Get a list of resources
     *
     * @param $params
     * @return array
     */
    public function get($params = array())
    {
        $found = false;

        if (($handle = fopen($this->fileSource, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $this->rows[] = array(
                    'id'          => $data[0],
                    'firstName'   => $data[1],
                    'secondName'  => $data[2]
                );

                if (isset($params['id'])) {
                    if ($data[0] == $params['id']) {
                        $this->rows = array_pop($this->rows);
                        $found = true;

                        break;
                    }
                }
            }

            if (isset($params['id']) && $found === false) {
                die('Unable to find user');
            }
        }

        return $this->rows;
    }
}