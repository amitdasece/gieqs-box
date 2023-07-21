<?php
/*
 * Author: David Tate  - www.gieqs.com
 *
 * Create Date: 8-11-2020
 *
 * DJT 2019
 *
 * License: LGPL
 *
 */
require_once 'DataBaseMysqlPDO.class.php';

Class programme {

	private $id; //int(11)
	private $date; //date
	private $title; //varchar(200)
	private $subtitle; //varchar(400)
	private $description; //varchar(800)
	private $url_vimeo; //varchar(250)
	private $url_slido; //varchar(300)
	private $url_zoom; //varchar(300)
	private $connection;

	public function __construct(){
		$this->connection = new DataBaseMysqlPDO();
	}

    /**
     * New object to the class. Don�t forget to save this new object "as new" by using the function $class->Save_Active_Row_as_New();
     *
     */
	public function New_programme($date,$title,$subtitle,$description,$url_vimeo,$url_slido,$url_zoom){
		$this->date = $date;
		$this->title = $title;
		$this->subtitle = $subtitle;
		$this->description = $description;
		$this->url_vimeo = $url_vimeo;
		$this->url_slido = $url_slido;
		$this->url_zoom = $url_zoom;
	}

    /**
     * Load one row into var_class. To use the vars use for exemple echo $class->getVar_name;
     *
     * @param key_table_type $key_row
     *
     */
	public function Load_from_key($key_row){
		$result = $this->connection->RunQuery("Select * from programme where id = \"$key_row\" ");
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->id = $row["id"];
			$this->date = $row["date"];
			$this->title = $row["title"];
			$this->subtitle = $row["subtitle"];
			$this->description = $row["description"];
			$this->url_vimeo = $row["url_vimeo"];
			$this->url_slido = $row["url_slido"];
			$this->url_zoom = $row["url_zoom"];
		}
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Load_records_limit_json($y, $x=0){
$q = "Select * from `programme` LIMIT " . $x . ", " . $y;
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["date"] = $row["date"];
			$rowReturn[$x]["title"] = $row["title"];
			$rowReturn[$x]["subtitle"] = $row["subtitle"];
			$rowReturn[$x]["description"] = $row["description"];
			$rowReturn[$x]["url_vimeo"] = $row["url_vimeo"];
			$rowReturn[$x]["url_slido"] = $row["url_slido"];
			$rowReturn[$x]["url_zoom"] = $row["url_zoom"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    /**
 * Load specified number of rows and output to JSON. To use the vars use for exemple echo $class->getVar_name;
 *
 * @param key_table_type $key_row
 *
 */
	public function Return_row($key){
$q = "Select * from `programme` WHERE `id` = $key";
		$result = $this->connection->RunQuery($q);
							$rowReturn = array();
						$x = 0;
						$nRows = $result->rowCount();
						if ($nRows > 0){

					while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$rowReturn[$x]["id"] = $row["id"];
			$rowReturn[$x]["date"] = $row["date"];
			$rowReturn[$x]["title"] = $row["title"];
			$rowReturn[$x]["subtitle"] = $row["subtitle"];
			$rowReturn[$x]["description"] = $row["description"];
			$rowReturn[$x]["url_vimeo"] = $row["url_vimeo"];
			$rowReturn[$x]["url_slido"] = $row["url_slido"];
			$rowReturn[$x]["url_zoom"] = $row["url_zoom"];
		$x++;		}return json_encode($rowReturn);}

			else{return FALSE;
			}
			
	}
    

        public function Load_records_limit_json_datatables($y, $x = 0)
            {
            $q = "Select * from `programme` LIMIT $x, $y";
            $result = $this->connection->RunQuery($q);
            $rowReturn = array();
            $x = 0;
            $nRows = $result->rowCount();
            if ($nRows > 0) {

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $rowReturn['data'][] = array_map('utf8_encode', $row);
                }
            
                return json_encode($rowReturn);

            } else {
                

                //RETURN AN EMPTY ARRAY RATHER THAN AN ERROR
                $rowReturn['data'] = [];
                
                return json_encode($rowReturn);
            }

        }

    /**
     * Checks if the specified record exists
     *
     * @param key_table_type $key_row
     *
     */
	public function matchRecord($key_row){
		$result = $this->connection->RunQuery("Select * from `programme` where `id` = '$key_row' ");
		$nRows = $result->rowCount();
			if ($nRows == 1){
				return TRUE;
			}else{
				return FALSE;
			}
	}

    /**
		* Return the number of rows
		*/
	public function numberOfRows(){
		return $this->connection->TotalOfRows('programme');
	}

    /**
		* Insert statement using PDO
		*/
 public function prepareStatementPDO (){ 
 //need to only update those which are set 
 $ov = get_object_vars($this); 
if ($ov['connection'] != ''){
			unset($ov['connection']);
		} 
if ($ov['id'] != ''){
			unset($ov['id']);
		} 
$ovMod = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '`' . $key . '`';

				$ovMod[$key] = $value;
			}

			}
$ovMod2 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '' . $key . '';

				$ovMod2[$key] = $value;
			}

		} 
$ovMod3 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = ':' . $key;

				$ovMod3[$key] = $value;
			}

		} 
foreach ($ovMod as $key => $value) {

            $value = addslashes($value);
			$value = "'$value'";
			$updates[] = "$value";

		} 
$implodeArray = implode(', ', $updates); 
//get number of terms in update
					//need only the keys first

					$keys = implode(", ", array_keys($ovMod));
					$keys2 = implode(", ", array_keys($ovMod3));
			
//get number of keys

				$numberOfTerms = count($ovMod);
		
//echo $numberOfTerms;

		$termsToInsert = ''; 
$x=0;

		foreach ($ovMod as $key=>$value){

			$termsToInsert .= ( $x !== ($numberOfTerms -1) ) ? "? ," : " ?";

			$x++;

		} 
$q = "INSERT INTO `programme` ($keys) VALUES ($keys2)";
		
 $stmt = $this->connection->prepare($q); 
$stmt->execute($ovMod3); 
return $this->connection->conn->lastInsertId(); 
	}

    /**
		* Update statement using PDO
		*/
 public function prepareStatementPDOUpdate (){ 
 //need to only update those which are set 
 $ov = get_object_vars($this); 
if ($ov['connection'] != ''){
			unset($ov['connection']);
		} 
if ($ov['id'] != ''){
			unset($ov['id']);
		} 
if ($ov['updated'] != ''){
			unset($ov['updated']);
		} 
$ovMod = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '`' . $key . '`';

				$ovMod[$key] = $value;
			}

			}
$ovMod2 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = '' . $key . '';

				$ovMod2[$key] = $value;
			}

		} 
$ovMod3 = array(); 
foreach ($ov as $key=>$value){

			if ($value != ''){

				$key = ':' . $key;

				$ovMod3[$key] = $value;
			}

		} 
foreach ($ovMod as $key => $value) {

            $value = addslashes($value);
			$value = "'$value'";
			$updates[] = "$key=$value";

		} 
$implodeArray = implode(', ', $updates); 
//get number of terms in update
					//need only the keys first

					$keys = implode(", ", array_keys($ovMod));
					$keys2 = implode(", ", array_keys($ovMod3));
			
//get number of keys

				$numberOfTerms = count($ovMod);
		
//echo $numberOfTerms;

		$termsToInsert = ''; 
$x=0;

		foreach ($ovMod as $key=>$value){

			$termsToInsert .= ( $x !== ($numberOfTerms -1) ) ? "? ," : " ?";

			$x++;

		} 
$q = "UPDATE `programme` SET $implodeArray WHERE `id` = '$this->id'";

		
 $stmt = $this->connection->RunQuery($q); 
 return $stmt->rowCount(); 
	}


    /**
     * Delete the row by using the key as arg
     *
     * @param key_table_type $key_row
     *
     */
	public function Delete_row_from_key($key_row){
		$result = $this->connection->RunQuery("DELETE FROM `programme` WHERE `id` = $key_row");
		return $result->rowCount();
	}

    /**
     * Returns array of keys order by $column -> name of column $order -> desc or acs
     *
     * @param string $column
     * @param string $order
     */
	public function GetKeysOrderBy($column, $order){
		$keys = array(); $i = 0;
		$result = $this->connection->RunQuery("SELECT id from programme order by $column $order");
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$keys[$i] = $row["id"];
				$i++;
			}
	return $keys;
	}

	/**
	 * @return id - int(11)
	 */
	public function getid(){
		return $this->id;
	}

	/**
	 * @return date - date
	 */
	public function getdate(){
		return $this->date;
	}

	/**
	 * @return title - varchar(200)
	 */
	public function gettitle(){
		return $this->title;
	}

	/**
	 * @return subtitle - varchar(400)
	 */
	public function getsubtitle(){
		return $this->subtitle;
	}

	/**
	 * @return description - varchar(800)
	 */
	public function getdescription(){
		return $this->description;
	}

	/**
	 * @return url_vimeo - varchar(250)
	 */
	public function geturl_vimeo(){
		return $this->url_vimeo;
	}

	/**
	 * @return url_slido - varchar(300)
	 */
	public function geturl_slido(){
		return $this->url_slido;
	}

	/**
	 * @return url_zoom - varchar(300)
	 */
	public function geturl_zoom(){
		return $this->url_zoom;
	}

	/**
	 * @param Type: int(11)
	 */
	public function setid($id){
		$this->id = $id;
	}

	/**
	 * @param Type: date
	 */
	public function setdate($date){
		$this->date = $date;
	}

	/**
	 * @param Type: varchar(200)
	 */
	public function settitle($title){
		$this->title = $title;
	}

	/**
	 * @param Type: varchar(400)
	 */
	public function setsubtitle($subtitle){
		$this->subtitle = $subtitle;
	}

	/**
	 * @param Type: varchar(800)
	 */
	public function setdescription($description){
		$this->description = $description;
	}

	/**
	 * @param Type: varchar(250)
	 */
	public function seturl_vimeo($url_vimeo){
		$this->url_vimeo = $url_vimeo;
	}

	/**
	 * @param Type: varchar(300)
	 */
	public function seturl_slido($url_slido){
		$this->url_slido = $url_slido;
	}

	/**
	 * @param Type: varchar(300)
	 */
	public function seturl_zoom($url_zoom){
		$this->url_zoom = $url_zoom;
	}

    /**
     * Close mysql connection
     */
	public function endprogramme(){
		$this->connection->CloseMysql();
	}

}