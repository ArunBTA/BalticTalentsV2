<?php

require_once $dir . '/models/DB.php';

use App\Models\DB;

/**
 * Class Radar.
 */
class Radar
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var \DateTime
     */
    public $date;

    /**
     * @var string
     */
    public $number;

    /**
     * @var float
     */
    public $distance;

    /**
     * @var float
     */
    public $time;

    /**
     * @var float
     */
    public $speed;

    /**
     * @var int
     */
    public $driverId;

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return array|Radar[]
     */
    public static function all(int $limit, int $offset)
    {
        $results = DB::connection()->prepare('SELECT * FROM radars ORDER BY `number`, `date` DESC')->fetchAll();

        $radars = [];
        foreach ($results as $result) {
            $radar = new Radar();
            $radar->assignFromDB($result);
            $radars[] = $radar;
        }

        return $radars;
    }

    /**
     * @param array $row
     */
    private function assignFromDB(array $row)
    {
        $this->id = $row['id'];
        $this->date = new \DateTime($row['date']);
        $this->number = $row['number'];
        $this->distance = $row['distance'];
        $this->time = $row['time'];
        $this->speed = round($this->distance / $this->time * 3.6);
        $this->driverId = $row['driver_id'];
    }

    /**
     * @param int $id
     *
     * @return null|Radar
     */
    public static function get(int $id)
    {
        $result = DB::connection()->prepare('SELECT * FROM radars WHERE id = :id');
        $result->bindValue(':id', $id);
        $result->execute();

        $result = $result->fetch();

        if ($result) {

            $radar = new Radar();
            $radar->assignFromDB($result);

            return $radar;
        }

        return null;
    }
}