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
    static protected $columns = ['movie_id','name','genre','director','cast','duration','release_date','description','poster_url','banner_url'];

    public $movie_id;
    public $name;
    public $genre;
    public $director;
    public $cast;
    public $duration;
    public $release_date;
    public $description;
    public $poster_url;
    public $banner_url;




}