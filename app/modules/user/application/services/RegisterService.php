<?php


namespace Fiverr\Modules\User\Services;

use Fiverr\Modules\User\InMemory\UserRepository;

class RegisterService{

    private $repository;

    public function __construct(UserRepository $repository){
        $this->repository = $repository;
    }

    public function execute($nickname, $email ,$password, $security){
        try{
            $this->repository->SignUp($nickname, $email, $password, $security);
        }catch (\Exception $exception){
            throw new \Exception();
        }
    }

}


?>