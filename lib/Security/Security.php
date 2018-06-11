<?php
abstract class Security {
	/**
	 * Hash a text with my custom algorithms
	 *
	 * @param      string  $data   Text need to be hash
	 *
	 * @return     string  Hashed text
	 */
	static function hashPassword($data, $hashType=-1) {
		$hashCount=1;
		
		if($hashType < 1 || $hashType > $hashCount) {
			$hashType = $hashCount;
		}

		$hashType = 'hashV'.$hashType;

		return Security::$hashType($data);
	}

	static function hashV1($data) {
		$token = ***REMOVED***;
		$part1 = ***REMOVED***;
		$part2 = ***REMOVED***;
		$part3 = ***REMOVED***;
		$part4 = ***REMOVED***;

		return $part4;
	}
}