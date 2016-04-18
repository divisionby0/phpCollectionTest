<?php
include('php/utils/collections/Collection.php');
include('php/utils/collections/CollectionIterator.php');


$collection = new Collection();
$collection->addItem('item_0','0');

echo '<p>total:'.$collection->size().'</p>';

$collectionKeys = $collection->getKeys();

echo '<p>keys total:'.sizeof($collectionKeys).'</p>';

$collection->addItem('item_1','1');
echo '<p>total:'.$collection->size().'</p>';

$collectionKeys = $collection->getKeys();

echo '<p>keys total:'.sizeof($collectionKeys).'</p>';

$collection->addItem('item_2','2');
echo '<p>total:'.$collection->size().'</p>';


$collection->addItem('item_3','3');
$collection->addItem('item_4','4');
$collection->addItem('item_5','5');
echo '<p>total:'.$collection->size().'</p>';

$collectionKeys = $collection->getKeys();

iterateCollection($collection);
//iterateCollection($collection);

echo '<p>------------------------------------------</p>';

echo '<p> key 0 exists: '.$collection->keyExists('0').'</p>';
echo '<p> key 1 exists: '.$collection->keyExists('1').'</p>';
echo '<p> key 2 exists: '.$collection->keyExists('2').'</p>';
echo '<p> key 3 exists: '.$collection->keyExists('3').'</p>';

echo '<p>------------------------------------------</p>';
echo '<p>Removing element with key 1</p>';
$collection->removeItem('1');
echo '<p>total:'.$collection->size().'</p>';

iterateCollection($collection);

echo '<p>------------------------------------------</p>';
echo '<p>Removing element with key 4</p>';
$collection->removeItem('4');
echo '<p>total:'.$collection->size().'</p>';

iterateCollection($collection);

$collectionKeys = $collection->getKeys();

echo '<p> key 0 exists: '.$collection->keyExists('0').'</p>';
echo '<p> key 1 exists: '.$collection->keyExists('1').'</p>';
echo '<p> key 2 exists: '.$collection->keyExists('2').'</p>';
echo '<p> key 3 exists: '.$collection->keyExists('3').'</p>';

$collection->addItem('item_45','45');
$collection->addItem('item_245','_245');
$collection->addItem('item_145','_145');

iterateCollection($collection);

echo '<p>------------------------------------------</p>';
echo '<p>Removing element with key _245</p>';
$collection->removeItem('_245');
echo '<p>total:'.$collection->size().'</p>';

iterateCollection($collection);

echo '<p><font color="red">Must be KeyInvalidException here</font></p>';

// must be exception
$collection->removeItem('item_145fgh');

function iterateCollection($collection){
	$collectionIterator = $collection->getIterator();

	echo '<p><b>iterate collection. Size='.$collectionIterator->size().' keys:'.$collectionIterator->keysSize().'</p>';

	while($collectionIterator->hasNext()){
		$collectionItem = $collectionIterator->next();
		echo '<p>'.$collectionItem.'</p>';
	}
	echo '</b>';
}