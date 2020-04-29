<?php

namespace Fiverr\Modules\User\InMemory;

use Fiverr\Modules\User\Repository\IUserRepository;
use Fiverr\Modules\User\Models\Users;

class UserRepository implements IUserRepository {
    
    public function SignUp($nickname , $email, $password, $security){
        
        $user = new Users();
    
        $user->nickname = $nickname;
        $user->email = $email;

        // Store the password hashed
        $user->password = $security->hash($password);

        $user->save();
    }

    public function Login($email , $password, $controller){
        $user = Users::findFirstByEmail($email);
  
        if($user){
            if($controller->security->checkHash($password, $user->password)){
                $sessions = $controller->getDI()->getShared("session");
                $sessions->set("user_id", $user->id);
                return $user;
            } 
        }else{
            $controller->security->hash(rand());
        }
        return null;
    }
}


?>