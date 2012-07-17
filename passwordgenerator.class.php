<?php
include_once 'execptions.passwordgenerator.class.php';
/**
 * Class for generating random passwords.
 * A small class for generating random and secure passwords.
 * @author gehaxelt
 * @version 1.0
 */
class PasswordGenerator{
	
	/**
	 * Used to store the password
	 * @var string $password
	 */
	private $password='';
	
	/**
	 * Used to store the characterset of the passwords
	 * @var string charachterset
	 */
	private $characterset='';
	
	/**
	 * Method generating a random password.
	 * @param int $Passwordlength
	 * @param bool $LowerChars
	 * @param bool $UpperChars
	 * @param bool $SpecialChars
	 * @param bool $NumericChars
	 * @throws NotAnIntegerExeception if $Passwordlength is not an valid integer
	 * @throws NotABooleanExeception if $LowerChars, $UpperChars, $SpecialChars, $NumericChars in not a valid boolean
	 * @throws PasswordTooShortExeception if $Passwordlength < 1
	 * @throws NoCharactersetDefined if no characterset was set
	 */
	public function generatePassword($Passwordlength = 12,$LowerChars=true,$UpperChars=false,$SpecialChars=false,$NumericChars=false) {
		/**
		 * Validating the parameters
		 */
		$this->characterset='';
		$this->password='';
		if(!is_int($Passwordlength))
			throw new NotAnIntegerExeception('First parameter $Passwordlength is not an integer');
					
		if(!is_bool($LowerChars))
			throw new NotABooleanExeception('Second parameter $LowerChars is not a boolean');
		
		if(!is_bool($UpperChars))
			throw new NotABooleanExeception('Third parameter $UpperChars is not a boolean');
			
		if(!is_bool($SpecialChars))
			throw new NotABooleanExeception('Fourth parameter $SpecialChars is not a boolean');
			
		if(!is_bool($NumericChars))
			throw new NotABooleanExeception('Fith parameter $NumericChars is not a boolean');
		
		if($Passwordlength<1)
			throw new PasswordTooShortExeception('The password length is too short');
		
		if(!($LowerChars||$UpperChars||$SpecialChars||$NumericChars))
			throw new NoCharactersetDefined('No characterset was defined');
		
		/**
		 * Defining characterset
		 */
		if(true===$LowerChars) 
		{
			for($i=97;$i<122;$i++)
				$this->characterset.=chr($i);
			
		}
		
		if (true===$UpperChars) {
			
			for($i=65;$i<90;$i++)
				$this->characterset.=chr($i);
			
		}

		if (true===$NumericChars) {
			
			for($i=48;$i<57;$i++)
				$this->characterset.=chr($i);
			
		}
		
		if (true===$SpecialChars) {
			
			for($i=33;$i<47;$i++) //First part of special chars
				$this->characterset.=chr($i);
			
			for($i=58;$i<64;$i++) //second part of special chars
				$this->characterset.=chr($i);
			
			for($i=91;$i<96;$i++) //third part of special chars
				$this->characterset.=chr($i);
			
			for($i=123;$i<126;$i++) //fourth part of special chars
				$this->characterset.=chr($i);
		}
		
		/**
		 * Generating password randomly from the characterset
		 */
		for($i=0;$i<$Passwordlength;$i++) {
			$this->password.= $this->characterset[rand(0,strlen($this->characterset)-1)];
		}
		
	}
	
	/**
	 * Gettermethod for the 
	 * @return string
	 */
	public function getPassword() {
		return $this->password;
	}

}
?>