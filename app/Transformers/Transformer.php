<?php 

namespace App\Transformer;


abstract class Transformer {

	public function transformCollection(array $items)
	{
		return array_map([$this, 'transform'], $items);	
	}

	public function transform($item);
}