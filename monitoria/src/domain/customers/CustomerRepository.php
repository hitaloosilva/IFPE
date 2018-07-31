<?php
namespace IFPE\Monitoria\domain\customers;


use IFPE\Monitoria\domain\utils\DatabaseRepository;

class CustomerRepository extends DatabaseRepository
{

    const table = 'customers';

    private $response;

    public function __construct()
    {
        parent::__construct(self::table);
    }

    /**
     * * Cadastro de Clientes
     */
    public function add()
    {
        if (! empty($_POST['customer'])) {
            $today = date_create('now', new \DateTimeZone('America/Sao_Paulo'));
            $customer = $_POST['customer'];
            $customer['modified'] = $customer['created'] = $today->format("Y-m-d H:i:s");
            save('customers', $customer);
            header('location: index.php');
        }
    }

    /**
     * * Pesquisa Todos os Registros de uma Tabela
     */
    function find_all()
    {
        return $this->find();
    }

    /**
     * Atualizacao/Edicao de Cliente
     */
    function edit()
    {
        $now = date_create('now', new \DateTimeZone('America/Sao_Paulo'));
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (isset($_POST['customer'])) {
                $customer = $_POST['customer'];
                $customer['modified'] = $now->format("Y-m-d H:i:s");
                update('customers', $id, $customer);
                var_dump($_POST);
                header('location: index.php');
            } else {
                $customer = find('customers', $id);
            }
        } else {
            header('location: index.php');
        }
    }

    /**
     * Visualização de um Cliente
     */
    function view($id = null)
    {
        $customer = find($id);
    }

    /**
     * Exclusão de um Cliente
     */
    function delete($id = null)
    {
        $customer = remove($id);
        header('location: index.php');
    }
}

