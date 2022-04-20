<?php
 $GLOBALS['connection'] = new mysqli('localhost', 'root', '', 'twds');

function httpPost($url,$params)
{
  $postData = '';
   //create name value pairs seperated by &
   foreach($params as $k => $v) 
   { 
      $postData .= $k . '='.$v.'&'; 
   }
   $postData = rtrim($postData, '&');
 
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
 
}

function dbPut($sql, $debug=false){
	$mysqli =  $GLOBALS['connection'];
 	if (!$mysqli->query($sql)){
            $return['error'] = true;
            if($debug==true){
            $return['debug_data']= "Query Error: (" . $mysqli->errno . ") " . $mysqli->error;
            $return['debug_query']= $sql;
            }
            $mysqli->close();
            return $return;
        }
        else{
             $return['error'] = false;
             $return['status'] = 'success';
             $return['lastInsertId']= $mysqli->insert_id;
            $mysqli->close();
            return  $return;
        }
        
 }
 
 function dbGetAll($sql)
  {
  print_r($sql); exit;
    $mysqli = $GLOBALS['connection'];
    if($result = $mysqli->query($sql)){
        if($result->num_rows){
            while($row = $result->fetch_assoc){

                $data[] =  $row;
                }
                $result->free_result();
            }
        else{
            $data['msg'] = "No records";
        }
    }
    else{
    $data['msg'] =  "ERROR: unable to execute $sql. " .$mysqli->connect_error;
    }
    $mysqli->close();
    return $data;
  }
  
  
 function dbGet($sql)
  {
        // print_r($sql); exit;

    $mysqli =  $GLOBALS['connection'];
    $result = $mysqli->query($sql);
    if($result){
        $i=0;
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc){
                $i++;
                $data =  $row;
                $data['msg'] = 'Match found';
                }
                $result->free_results();
            }
        else{
            $data['msg'] = "No records";
        }
    } 
    else{
    $data['msg'] =  "ERROR: unable to execute $sql. " . $mysqli->connect_error;
    }
    $data['total_matches'] = $i;
    $mysqli->close();
    return $data;
  }
 
function dbRemove($id, $table){

    $mysqli =  $GLOBALS['connection'];
    $sql = "DELETE FROM `".$table."` WHERE `id` = '".$id."'";
	if($result = mysqli_query($mysqli, $sql)){
        $data['status'] =  "success";
        }
        else{
            $data['msg'] =  "ERROR: unable to execute $sql. " . mysqli_error($mysqli);
        }
    
	$mysqli->close();
	
	return $data;
}
function kvToString($array, $mysqli=false){
	$mysqli =  $GLOBALS['connection'];

	$data['keyString'] = '';
	$data['valString'] = '';
	$i=0;
	foreach($array as $key => $value){
		if($i==0){
		$data['keyString'] .=$key; 
		$data['valString'] .="'".mysqli_real_escape_string($mysqli,$value)."'";
		}
		else{
		$data['keyString'] .=','.$key; 
		$data['valString'] .=','."'".mysqli_real_escape_string($mysqli,$value)."'";
		}
		$i++;
  }
  $mysqli->close();
	return $data;
}

function kvToAndString($array){
	
	$data= '';
	$i=0;
	foreach($array as $key => $value){
		if($i==0){
		$data.=$key."='".$value."'";
		}
		else{
      $data .=' AND '.$key."='".$value."'";
		}
		$i++;
	}
	return $data;
}

function storeArray($data, $table) //<-- marked for depriciation
  {
	$kv = kvToString($data);
	$sql ='INSERT INTO '.$table.' ('.'ID,'.$kv['keyString'].') VALUES ('.'NULL,'.$kv['valString'].')';
	$response = dbPut($sql, $table, $debug);
	return $response;
  }
function dbPutArray($data, $table, $debug=false)
  {
	$kv = kvToString($data);
	$sql ='INSERT INTO '.$table.' ('.'ID,'.$kv['keyString'].') VALUES ('.'NULL,'.$kv['valString'].')';
	//print_r($data); exit;
	$response = dbPut($sql, $table, $debug);
	return $response;
  }
  
  
  function update($data, $table, $ukey, $uval){
  	  $kv = kvToString($data);
  	 // $escape_uval = mysqli_real_escape_string($mysqli,$uval);
  	  $sql = "UPDATE ".$table." SET ".$kv['keyString']."=".$kv['valString']." WHERE ".$ukey."='".$uval."'";
  	  
  	  $response = dbPut($sql, $table);
	  return $response;
  }

  function dbGetWhere($table, $array){
    $kvA = kvToAndString($array);
    $sql="SELECT * FROM $table WHERE $kvA";
    $data = dbGetAll($sql);
    return $data;
  }

  function makePointerFromArray($array, $sts){
    $pointerCONFIG['table_name'] = 'case_pointer';
        // $pointer['caseTypeID']	= NULL;
        $pointer['casetypeCode'] = NULL;	
        $pointer['complexCode']	= $array[0]['complexCode'];
        $pointer['complex_id']	= $array[0]['complex_id'];
        $pointer['city_id']	= $array[0]['city_id'];
        $pointer['cityCode']	= $array[0]['cityCode'];
        $pointer['state_id']	= $array[0]['state_id'];
        $pointer['stateCode']	= $array[0]['stateCode'];
        $pointer['caseYear']	= $array[0]['case_year'];
        $pointer['caseStatus']	= $array[0]['case_status'];
            $pointer['STS']	= $sts;
            $pointer['candidate']	= $array[0]['empl_id'];
              $pointer['user'] = $_POST['user'];
          // print_r($pointer); exit;
          $response = dbPutArray($pointer, $pointerCONFIG['table_name'], true);
          //print_r($response); exit;
                    return $response;
    }

    function read($table, $fields){   /// marked for depriceation
      $sql = "SELECT $fields FROM ".$table;
      return dbGetAll($sql);
  }