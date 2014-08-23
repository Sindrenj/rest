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
				if( empty( $user ) ) {
					return Response::ClientError(404, "No resource with the id: " . $data[0] . " exists.");
				}
				return Response::JSON( $user );
			} else {
				return Response::ClientError(400, "Bad input");
			}
		}	
	}
	
	public function POST() {
		$data = file_get_contents('php://input');
		if( !is_null( $data ) OR $data != "") {
			//Decode the data to a php-array:
			$json = json_decode($data);
			
			if ( !empty( $json ) ) {
				//$this->model->save();
				return Response::ServerSuccess(201, "The resource were created.");
			}
		}
		return Response::ClientError(400, "No data supplied.");		
	}	
}