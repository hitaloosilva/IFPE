<?php
namespace IFPE\Monitoria\domain\customers;

use Zend\Diactoros\Response;

class ListCustumerHandler
{
    private $render;
    
    private $controller;

    public function __construct($render, CustomerController $controller)
    {
        $this->render = $render;
        $this->controller = $controller;
    }

    public function __invoke()
    {
        $customer = null;
        $customers = $this->controller->findAll();
        $response = new Response();
        $response = $response->withHeader('Content-Type', 'text/html');
        $response->getBody()->write($this->render->render('/customers/index.html', [
            'customers' => $customers,
            'customer' => $customer
        ]));
        return $response;
    }
    
    
}

