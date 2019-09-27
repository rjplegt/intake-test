<?php
declare(strict_types=1);

include_once(__DIR__.'/../services/Database.php');

/**
 * Class Task
 */
class Task{

    /**
     * @var Database
     */
    private $db;

    /**
     * Id of the car.
     * @var int
     */
    private $id;

    /**
     * Id of the car related to the task
     * @var int
     */
    private $car_id;

    /**
     * @var string
     */
    private $task;

    /**
     * @var int
     */
    private $status;

    /**
     * @return Database
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param Database $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getCarId()
    {
        return $this->car_id;
    }

    /**
     * @param int $car_id
     */
    public function setCarId($car_id)
    {
        $this->car_id = $car_id;
    }

    /**
     * @return string
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param string $task
     */
    public function setTask($task)
    {
        $this->task = $task;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Task constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->db = new Database;

        if (!empty($id)) {
            $this->loadTaks($id);
        }
    }

    /**
     * Loads task by id from database;
     * @param $id
     */
    private function loadTaks($id)
    {
        $task = $this->db->getAllRows(sprintf('SELECT * FROM task WHERE id = %d', $id));

        if (count($task) == 1) {
            $this->setId($task[0]['id']);
            $this->setCarId($task[0]['car_id']);
            $this->setTask($task[0]['task']);
            $this->setStatus($task[0]['status']);
        }
    }


}