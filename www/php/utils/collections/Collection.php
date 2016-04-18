<?php
/**
 * Created by PhpStorm.
 * User: ilay
 * Date: 16.04.2016
 * Time: 14:33
 */

// uses http://www.sitepoint.com/collection-classes-in-php/
class Collection {
	private $items = array();
	private $keys = array();

	public function addItem($obj, $key = null) {
		if ($key == null) {
			$this->items[] = $obj;
		}
		else {
			if (isset($this->items[$key])) {
				throw new KeyHasUseException("Key $key already in use.");
			}
			else {
				$this->items[$key] = $obj;
                $this->addKey($key);
				//array_push($this->keys, $key);
			}
		}
	}

	public function removeItem($key) {
		if (isset($this->items[$key])) {
			unset($this->items[$key]);
			$this->removeKey($key);
        }
		else {
			throw new KeyInvalidException("Invalid key $key.");
		}
	}

	public function getItem($key) {
		if (isset($this->items[$key])) {
			return $this->items[$key];
		}
		else {
			throw new KeyInvalidException("Invalid key $key.");
		}
	}

	public function size() {
		return count($this->items);
	}

	public function keyExists($key) {
		if(isset($this->items[$key])){
			return 1;
		}
		else{
			return 0;
		}
	}

	public function getKeys(){
		return $this->keys;
	}

	public function getIterator(){
		$collectionIterator = new CollectionIterator($this->items, $this->keys);
		return $collectionIterator;
	}

	private function removeKey($keyToRemove){
		$newKeys = array();
		foreach($this->keys as $keyItem){
			if($keyItem!=$keyToRemove){
				array_push($newKeys, $keyItem);
			}
		}
		$this->keys = $newKeys;
	}
    private function addKey($key){
        array_push($this->keys, $key);
    }
}

class KeyHasUseException extends Exception{
	public function __construct($message, $code = 0, Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}
}

class KeyInvalidException extends Exception{

	public function __construct($message, $code = 0, Exception $previous = null) {
		parent::__construct($message, $code, $previous);
	}
}