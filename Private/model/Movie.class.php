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
    static protected $columns = ['movie_id','name','genre','director','cast','duration','rating','count_rating','release_date','description','poster_url','banner_url'];

    public $movie_id;
    public $name;
    public $genre;
    public $director;
    public $cast;
    public $duration;
    public $rating;
    public $count_rating;
    public $release_date;
    public $description;
    public $poster_url;
    public $banner_url;

    public function __construct($args = [])
    {
        $this->name = $args['name'];
        $this->genre = $args['genre'];
        $this->director = $args['direction'];
        $this->cast = $args['cast'];
        $this->duration = $args['duration'];
        $this->rating = $args['rating'];
        $this->count_rating = 100;
        $this->release_date = $args['release_date'];
        $this->description = $args['description'];
        $this->poster_url = $args['poster_url'];
        $this->banner_url = $args['banner_url'];
    }


}