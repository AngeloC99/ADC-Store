<?php


interface FBase
{
    public static function exist(string $key);

    public static function delete(string $key);

    public static function load(string $key);

    public static function store($obj);

    public static function update($obj);

}