<?php



function create($con, $table, $data){
   $query = "INSERT INTO `".$table."` ".$data;
   $mysql_query = mysqli_query($con, $query);
   
   if(!$query){
    $data['error_message'] = mysqli_error($con);
    $data['response_code']="400";
   }
   else{
       $data['error_message']= "";
       $data['success_message']="Data Added Sucessfully!";
       $data['response_code']="200";
   }
   return $data;
}



return $data;

}

function update(){ 

}

function delete(){

}

function arrayToMysqlKV($array){
    $key_string = "";
    $value_string = "";
    $count = count($array)-1;
    $i = 0;
    foreach($array as $key=>$value){
        if($i<$count){
            $comma = ",";
        }
        else{
            $comma = "";
        }
        $key_string .="`".$key."`".$comma;
            $value_string .="'".$value."'".$comma;
            $i++;
    }
    $kv_string = "(".$key_string.") VALUES (" .$value_string.");";
    return $kv_string;
}


?>
