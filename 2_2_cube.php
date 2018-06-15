<?php

$current = [[1,1,1,1],[2,2,2,2],[3,3,3,3],[4,4,4,4],[5,5,5,5],[6,6,6,6]];

$functionArray = ["turn_Front_Right","turn_Front_Left","turn_Top_Right","turn_Top_Left","turn_Top_Front","turn_Top_Back"];

function turn_Front_Right($curr){
    $temp = $curr ;
    $curr[2][0] = $temp[1][0];   //第3面被第1面的值取代
    $curr[2][3] = $temp[1][3];

    $curr[3][0] = $temp[2][0]; 
    $curr[3][3] = $temp[2][3]; 

    $curr[4][0] = $temp[3][0]; 
    $curr[4][3] = $temp[3][3]; 

    $curr[1][0] = $temp[4][0]; 
    $curr[1][3] = $temp[4][3]; 

    $curr[0][3] = $temp[0][2];   //第1面要逆時針轉
    $curr[0][0] = $temp[0][3]; 
    $curr[0][1] = $temp[0][0]; 
    $curr[0][2] = $temp[0][1]; 
     
    return $curr; 
} 

function turn_Front_Left($curr){
    $curr = turn_Front_Right($curr) ;
    $curr = turn_Front_Right($curr) ;
    $curr = turn_Front_Right($curr) ;    
 
    return $curr; 
} 


function turn_Top_Right($curr){
    $temp = $curr ;
    $curr[2][0] = $temp[0][1];   //第3面被第1面的值取代
    $curr[2][1] = $temp[0][2];

    $curr[5][0] = $temp[2][1]; 
    $curr[5][3] = $temp[2][0]; 

    $curr[4][3] = $temp[5][0]; 
    $curr[4][2] = $temp[5][3]; 

    $curr[0][1] = $temp[4][2]; 
    $curr[0][2] = $temp[4][3]; 

    $curr[1][3] = $temp[1][0];   //第2面要順時針轉
    $curr[1][0] = $temp[1][1]; 
    $curr[1][1] = $temp[1][2]; 
    $curr[1][2] = $temp[1][3]; 
     
    return $curr; 
} 

function turn_Top_Left($curr){
    $curr = turn_Top_Right($curr) ;
    $curr = turn_Top_Right($curr) ;
    $curr = turn_Top_Right($curr) ;    
      
    return $curr; 
} 

function turn_Top_Front($curr){
    $temp = $curr ;
    $curr[0][2] = $temp[3][2];   //第1面被第4面的值取代
    $curr[0][3] = $temp[3][3];

    $curr[1][2] = $temp[0][2]; 
    $curr[1][3] = $temp[0][3]; 

    $curr[5][2] = $temp[1][2]; 
    $curr[5][3] = $temp[1][3]; 

    $curr[3][2] = $temp[5][2]; 
    $curr[3][3] = $temp[5][3]; 

    $curr[2][3] = $temp[2][2];   //第3面要逆時針轉
    $curr[2][0] = $temp[2][3]; 
    $curr[2][1] = $temp[2][0]; 
    $curr[2][2] = $temp[2][1]; 
     
    return $curr; 
} 

function turn_Top_Back($curr){
    $curr = turn_Top_Front($curr) ;
    $curr = turn_Top_Front($curr) ;
    $curr = turn_Top_Front($curr) ;    
        
    return $curr; 
} 

function finishCounts($curr){
    $count = 0;
    for ($i=0; $i <6 ; $i++) {         
        if($curr[$i][0]==$curr[$i][1] and $curr[$i][2]==$curr[$i][3] and $curr[$i][1]==$curr[$i][2]){
            $count++; 
            continue;
        }       
    }
    return $count; 
}

function isFinished($curr){
    if(finishCounts($curr)==6){
        return true;
    }else
        return false;
}

function state($curr){
    print_r($curr); 
    echo "<br>";  
    if(isFinished($curr)){
        echo "true" ;        
    }else{
        echo "false" ;                
    }
    
}

function rotateRun($FuncArray, $curr){   //FuncArray 值從0~5總共6種操作,長度不固定
    $rotateArray = [];
    foreach ($FuncArray as $value) {
        $curr = $GLOBALS['functionArray'][$value]($curr);     //依照function陣列操作輸入的curr
        array_push($rotateArray, $GLOBALS['functionArray'][$value]);    //將操作的rotate名稱存入陣列
        if(isFinished($curr)){
            array_push($rotateArray, "PASS");            
            return $rotateArray;            
        }
    }
    array_push($rotateArray, "NG");            
    return $rotateArray;  

}

function modifyList($list){
    $listLength = count($list);

    $list[$listLength] = end($list)++;
    if($list[$listLength]<5)
        $list[$listLength] = end($list)++;

    if($listLength>10){

    }else{

    }
}

$functionList = [1,2,2,2,2,2,1,1,1];
echo modifyList($functionList);


// $ct= 0;
// do{
//     $ct++;
//     // echo "NO.".$ct."  ";
//     // if(isFinished($current)){
//     //     echo "finish!!<br>" ;        
//     // }else{
//     //     echo "not finished@@<br>" ;                
//     // }
//     $randNumber = rand(0,5);
//     $current = $functionArray[$randNumber]($current);
//     if(isFinished($current))
//         break;
//    // state($current);
// } while(!isFinished($current) and $ct<1000);

// echo $ct;



$tempList = [0];

$result = rotateRun($functionList,$current);

// if(array_pop($result)=="NG")
    
//     else
//     echo "pass";
// print_r($result);

// $flag = 1;
// $ledder = [];
// $currTemp = $current;

// array_push($ledder, 0);

// $ledder[0]

// print_r($ledder);



?>
