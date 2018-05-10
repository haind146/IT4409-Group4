
<?php
/**
 * Created by PhpStorm.
 * User: Hai Nguyen
 * Date: 3/16/2018
 * Time: 10:23 PM
 */

class Movie extends DatabaseObject
{
    static protected $tableName = 'movie';
    static protected $columns = ['movie_id','name','genre','director','producer','cast','duration','rating','count_rating','release_date','description','poster_url','banner_url','status','ticket_price'];

    public $id;
    public $movie_id;
    public $name;
    public $genre;
    public $director;
    public $producer;
    public $cast;
    public $duration;
    public $rating;
    public $count_rating;
    public $release_date;
    public $description;
    public $ticket_price;
    public $poster_url;
    public $banner_url;
    public $status;


    public function __construct($args = [])
    {

        $this->name = $args['name'] ?? "";
        $this->genre = $args['genre']?? "";
        $this->director = $args['director'] ?? "";
        $this->producer = $args['producer'] ?? "";
        $this->cast = $args['cast'] ?? "";
        $this->duration = $args['duration'] ?? "";
        $this->rating = $args['rating'] ?? "";
        $this->count_rating = $args['count_rating'] ?? 100;
        $this->release_date = $args['release_date'] ?? "";
        $this->description = $args['description'] ?? "";
        $this->poster_url = $args['poster_url'] ?? "";
        $this->banner_url = $args['banner_url'] ?? "";
        $this->status = $args['status'] ?? "";
        $this->ticket_price = $args['ticket_price'] ?? "";

    }

    public static function getNowshowingMovie(){
        $sql = "SELECT * FROM movie WHERE lower(status) = 'Đang chiếu'";
        return static::find_by_sql($sql);
    }
    public static function getCoomingSoonMovie(){
        $sql = "SELECT * FROM movie WHERE lower(status) = 'Sắp chiếu'";
        return static::find_by_sql($sql);
    }
    public static function getMoivesbyName($text){
        $sql ="SElECT * FROM movie WHERE name LIKE '%".$text."%' limit 0,10";
        return static::find_by_sql($sql);
    }

    public function count_schedule(){
        $sql = "SELECT COUNT(*) FROM schedule WHERE movie_id='" . $this->movie_id . "';";
        $result = self::$database->query($sql);
        $row = $result->fetch_array();
        return $row[0];
    }

    public function get_revenue(){
        $sql = 'SELECT SUM(price) FROM schedule, ticket, movie WHERE movie.movie_id ='. $this->movie_id . '  AND schedule.movie_id=movie.movie_id AND ticket.schedule_id = schedule.schedule_id AND ticket.status = 0;';
        $result = self::$database->query($sql);
        $row = $result->fetch_array();
        return $row[0];
    }

    public function setId(){
        $this->id = $this->movie_id;
    }

    public function rate($star){
        $this->rating = ($this->rating*$this->count_rating + $star)/($this->count_rating+1);
        $this->setId();
        $this->save();
    }
}
