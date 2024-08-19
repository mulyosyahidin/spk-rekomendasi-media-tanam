<?php

if (!function_exists('activeClass')) {
    /**
     * Return active class if current route is equal to given route
     *
     * @param array|string $routes
     * @param string $class
     * @param array $queries
     * @return string
     */
    function activeClass(array|string $routes = [], string $class = 'active', array $queries = []): string
    {
        if (is_string($routes)) {
            $routes = [$routes];
        }

        foreach ($routes as $key => $value) {
            if (request()->routeIs($value)) {
                // If current route is equal to given route, return active class
                return $class;
            }
        }

        if (count($queries) > 0) {
            foreach ($queries as $key => $value) {
                if (request()->query($key) == $value) {
                    return $class;
                }
            }
        }

        return '';
    }
}
