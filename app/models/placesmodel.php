<?php


namespace children\MODELS;


use children\LIB\filter;

class placesmodel extends AbstractModel
{

    use filter;

    public static $tableName = 'places';
    public static $primaryKey = 'place_id';

    public static $table_schema = [
        'place_name' => self::DATA_TYPE_STR,
    ];

    protected $place_id, $place_name ;

    public function __construct(string $place_name)
    {
        $this->place_name = trim($this->filterString($place_name));
    }

    public function getPlaceId()
    {
        return $this->place_id;
    }

    public function setPlaceId($place_id)
    {
        $this->place_id = $this->filterInt($place_id);
    }

    public function getPlaceName()
    {
        return $this->place_name;
    }

    public function setPlaceName($place_name)
    {
        $this->place_name = $this->filterString($place_name);
    }





}