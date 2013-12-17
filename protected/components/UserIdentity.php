<?php
class UserIdentity extends CUserIdentity
{
    public $role;

    public function getRole(){
        return $this->role;
    }

    public static function checkIP($ip){
        $ip_list = array('127.0.0.1');
        return   in_array($ip,$ip_list);
    }

	public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>array('password'=>'demo','role'=>'user'),
			'admin'=>array('password'=>'admin','role'=>'admin'),
		);

		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]['password']!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
            $this->role = $users[$this->username]['role'];
            $this->errorCode = self::ERROR_NONE;
        }


		return !$this->errorCode;
	}
}