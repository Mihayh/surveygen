<?php 

namespace App\Http\Controllers\Api;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller as Controller;

class ApiController extends Controller {

	/**
	 * API response status code:
	 * The status code that is returned for every Api request
	 *
	 * @var int
	 */
	protected $statusCode = 200;

	/**
	 * Get the request status code
	 *
	 * @return mixed
	 */
	public function getStatusCode() {
		return $this->statusCode;
    }

	/**
	 * Set the request status code
	 *
	 * @param 	mixed 		$statusCode
	 *
	 * @return 	object
	 */
	public function setStatusCode($statusCode) {
		$this->statusCode = $statusCode;

		return $this;
    }

    /**
	 * The API response formatter
	 *
	 * @param 	array 		$data 			the information the will be send back
	 * @param 	boolean 	$success 		the status of the request
	 * @param 	string 		$error 			the error message if any
	 * @param 	array 		$headers 		additional headers
	 *
	 * @return 	string
	 */
	public function respond($data = null, $success = true, $error = null, $headers = []) {
		return response()->json(['success' => $success, 'error' => $error, 'data' => $data], $this->getStatusCode(), $headers);
    }

    /**
	 * Error API response
	 *
	 * @param 	string 		$message 		the error message
	 *
	 * @return 	string
	 */
	public function respondWithError($message) {
		return $this->respond(['error' => $message], false);
    }

	/**
	 * Not Found error API response
	 *
	 * @param 	string 			$message 		the not found error message
	 *
	 * @return 	string
	 */
	public function respondNotFound($message = 'Not Found!') {
        return $this->setStatusCode(404)->respondWithError($message);
    }

	/**
	 * Internal Error API response
	 *
	 * @param 	string 			$message 		the internal server error message
	 *
	 * @return 	string
	 */
	public function respondInternalError($message = 'Internal Error!') {
		return $this->setStatusCode(500)->respondWithError($message);
    }

    /**
	 * Failed Validation error API response
	 * @param 	string 			$message 		the validation error messages
	 *
	 * @return 	string
	 */
	public function respondFailedValidationError($message = 'Parameters failed validation!') {
		return $this->setStatusCode(422)->respondWithError($message);
    }

	/**
	 * Unauthorized API response
	 *
	 * @param 	string 			$message 		the unauthorize error message
	 *
	 * @return 	string
	 */
	public function respondUnauthorizedError($message = 'Unauthorized!') {
		return $this->setStatusCode(401)->respondWithError($message);
    }

	/**
	 * Forbidden API response
	 *
	 * @param 	string 			$message 		the forbidden error message
	 *
	 * @return 	json
	 */
	public function respondForbiddenError($message = 'Forbidden!') {
		return $this->setStatusCode(403)->respondWithError($message);
    }

    /**
	 * Create success API response
	 *
	 * @param 	string 			$message 		the success message
	 *
	 * @return 	string
	 */
	public function respondCreated($message = 'Successfully created!') {
		return $this->setStatusCode(201)->respond(['error' => $message]);
    }

	/**
	 * Pagianted API response
	 *
	 * @param 	Paginator 		$collection
	 * @param 	array 			$data
	 *
	 * @return 	string
	 */
	public function respondWithPagination(Paginator $paginator, $data){
		$data = array_merge($data, [
			'paginator' => [
				'total_count' => $paginator->getTotal(),
				'total_pages' => ceil($paginator->getTotal() / $paginator->getPerPage()),
				'current_page' => $paginator->getCurrentPage(),
				'limit' => $paginator->getPerPage()
			]
		]);

		return $this->respond($data);
    }
}