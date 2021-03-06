<?php
declare(strict_types = 1);

namespace Epics\Entity;
use Epics\EpicsList;

class TeamList extends EpicsList { 
	
	protected $endpoint = EPICS__API_ENDPOINT . 'teams';
	protected $cacheKey = 'teams';

	public function __construct(bool $init = true) {
		parent::__construct($init, $this->cacheKey);
	}


	public function add(array $item) : Team {
		$item = new Team($item);
		$this->items[] = $item;
		return $item;
	}

	public function cacheRaw() : array {
		$data = parent::cacheRaw();
		return $data['teams'];
	}
}