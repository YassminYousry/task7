<?php 


function  Clean($input){
      
      $value = trim($input);
      $value = htmlspecialchars($value);
      $value = stripcslashes($value);
      return $value;  
    
  } 
 


  function validate($input,$flag,$length = 6){
   
    $status = true;

     switch ($flag) {
         case 1:
             # code...
             if(empty($input)){
                $status = false;
             }
             break;
       
        case 2: 
            if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
                $status = false;
            }
            break;

        case 3: 
                if(!filter_var($input,FILTER_VALIDATE_URL)){
                    $status = false;
                }
                break;   
                
        case 4: 
            if(strlen($input) < $length){
                $status = false;
            }        
            break;
   
        case 5: 
            if(!filter_var($input,FILTER_VALIDATE_INT)){
                $status = false;
            }
            break;

            case 6: 
              if(!ctype_alpha($input)){
                  $status = false;
              }
              break;

     }

     return $status;
  }
  
 
  
  
  
  ?>