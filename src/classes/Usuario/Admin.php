<?php

namespace Rifa\Poramor\Usuario;

use Doctrine\ORM\Repository\RepositoryFactory;
use Rifa\Poramor\Helper\EntityManagerFactory;
use Rifa\Poramor\serviceClasses\ServiceClass;
use Exception;

/**
 * @Entity
 */
class Admin extends Usuario
{

    /**
     * @Column(type="string")
     */
    private string $senha;

    public function cadastraAdmin(string $nome, string $email, string $senha):bool
    {
        $this->createUniqueID();
        $this->validaNome($nome);
        $this->validaEmail($email);
        $this->verificaEmail($email);
        $this->validaSenha($senha);

        return true;
    }

    public function logarAdmin(string $email, string $senha) : bool
    {
        $admin = $this->buscaAdmin($email);
        $this->autenticaSenha($admin, $senha);
        return true;
    }

    private function buscaAdmin(string $email) : Admin
    {
        $adminRepository = $this->adminRepository();
        $qtd_result =  $adminRepository->count(["email" => $email]);

        if($qtd_result == 0){
            throw new Exception("Nenhum administrador cadastrado com esse email!");
        }

        return $adminRepository->findOneBy(["email" => $email]);
    }

    private function autenticaSenha(Admin $admin, string $senha)
    {
        if(!password_verify($senha, $admin->getSenha())){
            throw new Exception("Senha incorreta");
        }
    }

    private function verificaEmail(string $email)
    {
        if(count($this->adminRepository()->findBy(["email" => $email])) > 0){
            throw new Exception("Esse email já está cadastrado!");
        }
        return true;
    }

    private function validaSenha(string $senha)
    {
        if(empty($senha)){
            throw new Exception("Senha inválida");
        }

        $this->senha = $senha;
        return true;
    }

    private function adminRepository()
    {
        $adminRepository = EntityManagerFactory::returnEntityManagerFactory()->getRepository(Admin::class);

        return $adminRepository;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }
}


