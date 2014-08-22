<?php 

class UsersController extends Controller{
	
	protected $userModel;
	
	public function __construct( $userModel, $method ) {
		parent::__construct($method);
		$this->userModel = $userModel;
	}
	
	public function GET( $data = array() ) {
		if( empty($data) ) {
			//Get the users:	
			$users = $this->userModel->getAll();
			//Return a response:	
			return Response::JSON( $users );
		} else {
			if (is_numeric($data[0])) {	
				$user = $this->userModel->get($data[0]);
				return Response::JSON( $user );
			} else {
				return Response::ClientError(400, "Bad input");
			}
		}	
	}	
}