<?php


namespace MYMVC\MODELS;


use MYMVC\LIB\filter;

class EmployeeModel extends AbstractModel
{
    use filter;
    protected static $tableName = 'employee';
    protected static $primaryKey = 'id';

    protected $id , $name ,$age ,$address ,$salary , $tax ;


    protected static $table_schema = [
        'name' => self::DATA_TYPE_STR,
        'age' => self::DATA_TYPE_int,
        'address' => self::DATA_TYPE_STR,
        'salary' => self::DATA_TYPE_float ,
        'tax' => self::DATA_TYPE_float,
    ];


    public function __construct( $name, $age, $address, $salary, $tax)
    {
        $this->name = $this->filterString($name);
        $this->age = $this->filterInt($age);
        $this->address = $this->filterString($address);
        $this->salary = $this->filterFloat($salary);
        $this->tax = $this->filterFloat($tax);
    }


    public function getId()
    {
        return $this->id;
    }


    public function getName()
    {
        return $this->name;
    }


    public function getAge()
    {
        return $this->age;
    }


    public function getAddress()
    {
        return $this->address;
    }


    public function getSalary()
    {
        return $this->salary;
    }


    public function getTax()
    {
        return $this->tax;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function setTax($tax)
    {
        $this->tax = $tax;
    }




}