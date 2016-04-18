<?php

class CollectionIterator {
	private $collection;
	private $collectionKeys;
	private $counter = -1;

	public function __construct($collection, $collectionKeys){
		$this->collection = $collection;
		$this->collectionKeys = $collectionKeys;
	}

	public function hasNext(){
		$nextIndex = $this->counter+1;

		if($nextIndex < sizeof($this->collectionKeys)){
			return true;
		}
		else{
			return false;
		}
	}

	public function next(){
		$this->counter = $this->counter+1;
		$key = $this->collectionKeys[$this->counter];
		$item = $this->collection[$key];
		return $item;
	}

	public function size(){
		return count($this->collection);
	}

	public function keysSize(){
		return count($this->collectionKeys);
	}
} 