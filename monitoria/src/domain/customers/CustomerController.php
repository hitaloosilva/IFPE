<?php
namespace IFPE\Monitoria\domain\customers;


class CustomerController
{

    public $repository = null;


    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * * Cadastro de Clientes
     */
    public function add()
    {
        if (! empty($_POST['customer'])) {
            $today = date_create('now', new \DateTimeZone('America/Sao_Paulo'));
            $this->customer = $_POST['customer'];
            $this->customer['modified'] = $this->customer['created'] = $today->format("Y-m-d H:i:s");
            $this->repository->save('customers', $this->customer);
            header('location: index.php');
        }
    }

    /**
     * * Pesquisa Todos os Registros de uma Tabela
     */
    function findAll()
    {
        return $this->repository->find_all();
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
                $this->customer = $_POST['customer'];
                $this->customer['modified'] = $now->format("Y-m-d H:i:s");
                update('customers', $id, $this->customer);
                var_dump($_POST);
                header('location: index.php');
            } else {
                $this->customer = find('customers', $id);
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
        $this->customer = find('customers', $id);
    }

    /**
     * Exclusão de um Cliente
     */
    function delete($id = null)
    {
        $this->customer = remove('customers', $id);
        header('location: index.php');
    }
}

