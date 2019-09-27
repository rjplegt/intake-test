<?php
declare(strict_types=1);

include_once(__DIR__.'/../services/Database.php');

/**
 * Class Customer
 */
class Customer{
    /**
     * @var Database
     */
    private $db;

    /**
     * Id of the customer.
     * @var int
     */
    private $id;

    /**
     * First name of hte customer
     * @var string
     */
    private $first_name;

    /**
     * Last name of the customer
     * @var string
     */
    private $last_name;

    /**
     * Age of the customer
     * @var int
     */
    private $age;

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
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * Customer constructor.
     * @param int $id
     */
    public function __construct($id = null)
    {
        $this->db = new Database;

        if (!empty($id)) {
            $this->loadCustomer($id);
        }
    }

    /**
     * Return the amount of cars related to a customer
     * @return int
     */
    public function getCarsCount(): int{
        $query = $this->getDb()->db->query('SELECT COUNT(id) as count FROM car WHERE customer_id = ' . $this->getId());
        $result = $query->fetch();
        return (int)$result['count'];
    }

    /**
     * Loads customer by id from database;
     * @param $id int Customer_id
     */
    public function loadCustomer($id): void
    {
        $customer = $this->db->getAllRows(sprintf('SELECT * FROM customer WHERE id = %d', $id));

        if (count($customer) == 1) {
            $this->setId($customer[0]['id']);
            $this->setFirstName($customer[0]['first_name']);
            $this->setLastName($customer[0]['last_name']);
            $this->setAge($customer[0]['age']);
        }
    }

}