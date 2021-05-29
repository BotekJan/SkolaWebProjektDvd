<?php
class Library {
    public function __construct()
	{
		
	}

    public function arrayForDropdown($array, $key, $value){
        $kategorie = [];

		foreach($array as $row ){
			$kategorie[$row->$key] = $row->$value;
		}

        return $kategorie;
    }
}
?>