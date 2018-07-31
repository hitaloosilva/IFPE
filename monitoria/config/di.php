<?php
use function DI\create;
use function DI\get;
use IFPE\Monitoria\domain\customers\CustomerController;
use IFPE\Monitoria\domain\customers\ListCustumerHandler;
use IFPE\Monitoria\domain\customers\CustomerRepository;

return [
    'render' => function () {
        $loader = new \Twig_Loader_Filesystem('../templates/');
        $twig = new \Twig_Environment($loader);
        return $twig;
    },
    'CustomerRepository' => create(CustomerRepository::class)->constructor(),
    CustomerController::class => create(CustomerController::class)->constructor(get('CustomerRepository')),
    'ListCustomers' => create(ListCustumerHandler::class)->constructor(get('render'), get(CustomerController::class)),
    'CustomerFindAll' => create(CustomerController::class)->constructor(get('render'))->method('index'),
    'CustomerAdd' => create(CustomerController::class)->constructor(get('render'))->method('add')
];
