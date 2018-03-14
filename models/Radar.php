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
    private $id;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $number;

    /**
     * @var float
     */
    private $distance;

    /**
     * @var float
     */
    private $time;

    /**
     * @var float
     */
    private $speed;

    /**
     * @var int
     */
    private $driverId;

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return array|Radar[]
     */
    public static function all(int $limit = 5, int $offset = 0)
    {
        $results = DB::connection()->query('SELECT * FROM radars ORDER BY `number`, `date` DESC')->fetchAll();

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

    /**
     * @param int $id
     */
    public static function remove(int $id)
    {
        //TODO: sukurkite remove algoritma.
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId(int $id = null): Radar
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     *
     * @return $this
     */
    public function setDate(DateTime $date = null): Radar
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     *
     * @return $this
     */
    public function setNumber(string $number = null): Radar
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return float
     */
    public function getDistance(): float
    {
        return $this->distance;
    }

    /**
     * @param float $distance
     *
     * @return $this
     */
    public function setDistance(float $distance = null): Radar
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * @return float
     */
    public function getTime(): float
    {
        return $this->time;
    }

    /**
     * @param float $time
     *
     * @return $this
     */
    public function setTime(float $time = null): Radar
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return float
     */
    public function getSpeed(): float
    {
        return $this->speed;
    }

    /**
     * @param float $speed
     *
     * @return $this
     */
    public function setSpeed(float $speed = null): Radar
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * @return int
     */
    public function getDriverId(): int
    {
        return $this->driverId;
    }

    /**
     * @param int $driverId
     *
     * @return $this
     */
    public function setDriverId(int $driverId = null): Radar
    {
        $this->driverId = $driverId;

        return $this;
    }
}
