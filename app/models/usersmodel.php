<?php
namespace children\MODELS;

use children\LIB\filter;

class UsersModel extends AbstractModel {

    use filter;


    protected static $tableName = 'users';
    protected static $primaryKey = 'user_id';

    protected $user_id , $username , $password , $phone , $group_id , $work_in  ,$place_name ;

    protected static $table_schema= [
        'username'              => self::DATA_TYPE_STR,
        'password'              => self::DATA_TYPE_STR,
        'phone'              => self::DATA_TYPE_STR,
        'group_id'              => self::DATA_TYPE_int,
        'work_in'               => self::DATA_TYPE_STR,
    ];

    public function __construct($username , $password , $phone , $work_in , $group_id  )
    {
        $this->username = trim($this->filterString($username));
        $this->password = trim($this->filterString($password));
        $this->phone = trim($this->filterInt($phone));
        $this->work_in = trim($this->filterInt($work_in));
        $this->group_id = trim($this->filterInt($group_id));
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getGroupId()
    {
        return $this->group_id;
    }

    public function getGroupName()
    {
        if ($this->group_id == 1){
            if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar' ){
                return 'مدير';
            }else{
                return 'admin';
            }
        }else{
            if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar' ){
                return 'عضو';
            }else{
                return 'members';
            }
        }
    }

    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
    }

    public function getWorkIn()
    {
        return $this->work_in;
    }

    public function setWorkIn($work_in)
    {
        $this->work_in = $work_in;
    }


    public function getPlaceName()
    {
        return $this->place_name;
    }



}