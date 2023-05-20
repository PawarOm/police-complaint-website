<?php

    $custName = $_POST['custName']; 
    $custPhone = $_POST['custPhone']; 
    $custItems = $_POST['custItems'];  

    if (!empty($custName) || !empty($custPhone) || !empty($custItems) || !empty($Guests) || !empty($Lastname) || !empty(Email) || !empty($ArrivalDate) || !empty($RoomType)) {
        $host = "localhost" ; 
        $dbUsername = "root" ; 
        $dbPassword = "" ; 
        $dbname = "om pawar" ;
        
        $conn = new mysqli($host , $dbUsername , $dbPassword , $dbname) ; 
        if(mysqli_connect_error()){
            die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error()) ; 
        }
        else {
            $INSERT = "INSERT Into OrderTable(custName , custPhone , custItems) values( ? , ? , ?) " ; 
 
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("sss" , $custName , $custPhone , $custItems);  
                $stmt->execute();
                echo "Details Submitted Successfully ! " ;  
       
            $stmt->close() ; 
            $conn->close() ; 
        }
    }
    else{
        echo "Please fill all fields" ; 
        die() ; 
    }

?>