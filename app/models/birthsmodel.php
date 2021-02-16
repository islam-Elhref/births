<?php


namespace children\MODELS;


use children\LIB\filter;

class birthsmodel extends AbstractModel
{

    use filter;

    public static $tableName = 'births';
    public static $primaryKey = 'child_id';

    public static $table_schema = [
        'name' => self::DATA_TYPE_STR,
        'const' => self::DATA_TYPE_int,
        'dob' => self::DATA_TYPE_STR,
        'created_by' => self::DATA_TYPE_int,
        'phone' => self::DATA_TYPE_STR,
        'born_in' => self::DATA_TYPE_int,
        'address' => self::DATA_TYPE_STR,
    ];

    protected $child_id, $name , $const , $dob , $created_by , $phone , $born_in , $address ;

    public function __construct(string $name , int $const , string $dob , int $created_by , $phone , int $born_in , $address )
    {
        $date_from_user = strtotime($dob);
        $minstrdate =strtotime('2020/1/1');
        $today = time();

        if ($date_from_user > $minstrdate && $date_from_user < $today ){
            $this->dob =date( 'y-m-d' , $date_from_user );
        }else{
            $lang = $_SESSION['lang'];
            if ($lang === 'ar') {
                $this->message[] = 'يجب كتابة تاريخ الميلاد بين 2018 وحتي اليوم';
            } else {
                $this->message[] = 'you must write date of birth between 2018 until today ';
            }
        }
        $this->name = trim($this->filterString($name));
        $this->const =trim( $this->filterInt($const));
        $this->created_by =trim( $this->filterInt($created_by));
        $this->phone =trim( $this->filterInt($phone));
        $this->born_in = trim($this->filterInt($born_in));
        $this->address = trim($this->filterString($address));

    }


    public function getChildId()
    {
        return $this->child_id;
    }


    public function setChildId($child_id)
    {
        $this->child_id = $child_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getConst()
    {
        return $this->const;
    }

    public function setConst($const)
    {
        $this->const = $const;
    }

    public function getDob()
    {
        return $this->dob;
    }

    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    public function getCreatedBy()
    {
        return $this->created_by;
    }

    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;
    }

    public function getBornIn()
    {
        return $this->born_in;
    }

    public function setBornIn($born_in)
    {
        $this->born_in = $born_in;
    }

    public function getPlaceName()
    {
        return $this->place_name;
    }


    public function setPlaceName($place_name)
    {
        $this->place_name = $place_name;
    }

    public function getUsername()
    {
        return $this->username;
    }


    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * @return string
     */
    public function getConstIn()
    {
        return $this->const_in;
    }



}