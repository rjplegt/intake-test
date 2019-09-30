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
    public function __construct($id = null)
    {
        $this->db = new Database;

        if (!empty($id)) {
            $this->loadTask($id);
        }
    }

    /**
     * Return the car related to the task
     * @return Car/null
     */
    public function getCar() : Car {
        $car = new Car($this->getCarId());

        return $car;
    }

    /**
     * Return the customer related to the task
     * @return Customer/null
     */
    public function getCustomer(Car $car = null) : Customer {
        //if a car isset use that car to to get the customer (giving the car parameter some extra query executions can be prevented)
        //check if the car has an id and is not just an empty object
        //also check if the car id's are the same to prevent retrieving the wrong user
        if(!isset($car) && $car->getId() > 0 && $car->getId() == $this->getCarId()){
            return $car->getCustomerOfCar();
        }

        return $this->getCar()->getCustomerOfCar();
    }


    /**
     * Loads task by id from database;
     * @param $id
     */
    public function loadTask($id)
    {
        $task = $this->db->getAllRows(sprintf('SELECT * FROM task WHERE id = %d', $id));

        if (count($task) == 1) {
            $this->setId($task[0]['id']);
            $this->setCarId($task[0]['car_id']);
            $this->setTask($task[0]['task']);
            $this->setStatus($task[0]['status']);
        }
    }

    /**
     * Create new task and store it in the database
     * @param $car_id
     * @param $task
     * @param $status
     * @return int id of the new the newly created task
     */
    public static function createTask($car_id, $task, $status) : int{
        $taskInstance = new Task();

        //store task
        $taskInstance->getDb()->execQuery(" INSERT INTO `task`(`car_id`, `task`, `status`) VALUES (" . $car_id . ", '" . $task . "', ".$status.")");
        //get id of newly created task
        $taskId = (int)$taskInstance->getDb()->getAllRows('SELECT max(ID) as id From task')[0]['id'];

        return $taskId;
    }


}