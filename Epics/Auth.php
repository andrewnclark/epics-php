<?php 

namespace Epics;
use Symfony\Component\HttpClient\HttpClient;

class Auth {

	public $jwt;
	protected $userId;
	protected $endpoint = EPICS__API_ENDPOINT . 'login?categoryId=1&gameId=1';
	protected $loggedIn;

	public function __construct($username = '', $password = '') {
		$this->loggedIn = false;
		$client = HttpClient::create();
		$response = $client->request('POST', $this->endpoint, [
							'headers' => EPICS__HTTP_HEADERS,
							'json' => [
								'email' => (string)$username,
								'password' => (string)$password
							]
						]);

		if($response->getStatusCode() == 200) {
			$decodedPayload = $response->toArray();	
			if($decodedPayload['success']) {
				$this->loggedIn = true;
				$this->jwt = $decodedPayload['data']['jwt'];
				$this->userId = (int)$decodedPayload['data']['user']['id'];
			}
		}


	}


}