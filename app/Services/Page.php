<?php

namespace App\Services;

/**
 * класс для подключения компонентов страницы
 */
class Page
{
    /**
     * Метод подключает компонент по полученному имени и передает параметры
     * @param string $part_name
     */
    public static function part($part_name, $data = [])
    {
        extract($data);
        require "views/components/" . $part_name . ".php";
    }

    /**
     * Метод подключает страницу по полученному имени и передает параметры
     * @param string $part_name
     */
    public static function view($part_name, $data = [])
    {
        extract($data);
        require_once "views/pages/" . $part_name . ".php";
    }
}