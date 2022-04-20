<?php

namespace App\Services;

use \Exception;
use App\Services\Page;
class Router
{
    /**
     * Массив список всех url на сайте
     */
    private static $list = [];

    /**
     * Метод регистрирует роут для обычной страницы
     * @param string $uri
     * @param string $page_name
     */
    public static function page($uri, $page_name)
    {
        self::$list[] = [
            "uri" => $uri,
            "page" => $page_name
        ];
    }

    /**
     * Метод проверяет текущий url с зарегестрированными
     */
    public static function enable()
    {
        $query = $_GET['q'];
        /**
         * Цикл просмотра зарегистрированных страниц
         */
        try {
            foreach (self::$list as $route) {
                /**
                 * Если текущая страница есть среди зарегистрированных
                 */
                if ($route['uri'] === "/" . $query) {
                    /**
                     * Открытие зарегистрированной страницы
                     */
                    Page::view($route['page']);
                    die();
                }
            }
            self::error('404');
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Метод открывающий страницу ошибки
     * @param int | string $error
     */
    public static function error($error)
    {
        require_once "views/errors/". $error .".php";
    }

    /**
     * Метод перенаправляющий на переданную страницу
     * @param string $uri
     */
    public static function redirect($uri)
    {
        header('Location: ' . $uri);
    }
}