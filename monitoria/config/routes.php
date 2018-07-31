<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    $r->get('/Ovo', 'HelloDifferent');
    $r->get('/customers', 'ListCustomers');
    $r->get('/customers/add', 'CustomerAdd');
};
