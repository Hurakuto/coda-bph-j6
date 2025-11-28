<?php
class Admin extends AbstractUser{

    protected string $role;

    public function __construct(protected string $username, protected string $password){
        $this->role = "ADMIN";
    }

    public function changeMemberRole(Member $member) : void {
        if($member->getRole()==="MEMBER"){
            $member->setRole("PREMIUM_MEMBER");
        }

        else {
            $member->setRole("MEMBER");
        }
    }
}
?>