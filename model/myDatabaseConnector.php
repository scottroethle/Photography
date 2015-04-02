<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * local:
 * root
 * admin
 * 
 * Database:
 * jkrockformsweb
 * GodRules1
 */

/**
 * Description of myDatabaseConnector
 *
 * @author sroethle
 */


class myDatabaseConnector {

 function getConnection() {
        $servername = "localhost";
        $username = "root";
        $password = "admin";

        // Create connection
        $conn = new mysqli($servername, $username, $password);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
        return $username;
    }
    
    function firstFunction($int, $string){
        return $string;
    }
    //put your code here
    
    function openConnection() {
        $servername = "localhost";
        $username = "root";
        $password = "admin";
        $database = "wisconsinphotography";
        $port = "3306";
        
        // Create connection  
        $connection = mysqli_connect($servername, $username, $password, $database, $port);
        
        // Check connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        
        return $connection;
    }
    
    function closeConnection($connection){
        mysqli_close($connection);
    }
    
            function GetBlogs() {

        $storedProc = "CALL sp_fetch_blog_all()";

        // Create connection  
        $connection = $this->openConnection();
        $result = mysqli_query($connection, $storedProc);

        $this->closeConnection($connection);
        return $result;
    }

    
        function GetImagesByCity($cityName) {

        $storedProc = "CALL sp_fetch_images_city('" . $cityName . "')";

        // Create connection  
        $connection = $this->openConnection();
        $result = mysqli_query($connection, $storedProc);

        $this->closeConnection($connection);
        return $result;
    }
            function GetImagesByStatePark($parkName) {

        $storedProc = "CALL sp_fetch_images_statepark('" . $parkName . "')";

        // Create connection  
        $connection = $this->openConnection();
        $result = mysqli_query($connection, $storedProc);

        $this->closeConnection($connection);
        return $result;
    }
    
    
            function GetImageByID($imageID) {

        $storedProc = "CALL sp_fetch_image_id(" . $imageID . ")";

        // Create connection  
        $connection = $this->openConnection();
        $result = mysqli_query($connection, $storedProc);

        $this->closeConnection($connection);
        return $result;
    }
    
    function GetPersons($applicationID) {

        $storedProc = "CALL sp_person_Fetch(" . $applicationID . ")";

        // Create connection  
        $connection = $this->openConnection();
        $result = mysqli_query($connection, $storedProc);

        $this->closeConnection($connection);
        return $result;
    }
    
     function GetWebUsers($emailAddress, $password) {

        $storedProc = "CALL sp_webuser_Fetch('" . $emailAddress . "','" . $password . "')";

        // Create connection  
        $connection = $this->openConnection();
        $result = mysqli_query($connection, $storedProc);

        $this->closeConnection($connection);
        return $result;
    }   
    
    function GetWebUsersByID($userID) {

        $storedProc = "CALL sp_webuser_FetchByID(" . $userID . ")";

        // Create connection  
        $connection = $this->openConnection();
        $result = mysqli_query($connection, $storedProc);

        $this->closeConnection($connection);
        return $result;
    }   
    
         function GetAllWebUsers() {

        $storedProc = "CALL sp_webuser_FetchAll()";

        // Create connection  
        $connection = $this->openConnection();
        $result = mysqli_query($connection, $storedProc);

        $this->closeConnection($connection);
        return $result;
    }   
    
        function InsertWebUser($emailAddress, $password, $IsNotified) {

        $storedProc = "CALL sp_webuser_INSERT('" . $emailAddress . "','" . $password ."',".$IsNotified. ");";
        //Create connection  
        $connection = $this->openConnection();

        $result = mysqli_query($connection, $storedProc);
        $object = mysqli_fetch_object($result);
        $id = $object->pUserID;
        $this->closeConnection($connection);
        return $id;
    }
    
    function UpdateWebUser($userID, $emailAddress, $password, $IsNotified) {

        $storedProc = "CALL sp_webuser_UPDATE(".$userID.",'" . $emailAddress . "','" . $password ."',".$IsNotified. ");";
        //Create connection  
        $connection = $this->openConnection();

        $result = mysqli_query($connection, $storedProc);
        $this->closeConnection($connection);
        return $result;
    }

    function GetIncomes($personID) {

        $storedProc = "CALL sp_income_Fetch(" . $personID . ")";

        // Create connection  
        $connection = $this->openConnection();
        $result = mysqli_query($connection, $storedProc);

        $this->closeConnection($connection);
        return $result;
    }
    
    
    
    function GetAddresses($personID) {

        $storedProc = "CALL sp_address_Fetch(" . $personID . ")";

        // Create connection  
        $connection = $this->openConnection();
        $result = mysqli_query($connection, $storedProc);

        $this->closeConnection($connection);
        return $result;
    }

    function GetRentalApplication($startDate, $endDate) {
       
        $storedProc = "CALL sp_rentalapplication_Fetch(" . "STR_TO_DATE('" . $startDate . "','%m/%d/%Y')," . "STR_TO_DATE('" . $endDate . "','%m/%d/%Y')".",@p_applicationID,@p_writtenexplanation,@p_esignature,@p_applicationdate,@p_MarketingInfo,@p_ApartmentInfo,@p_NumberAdultOccupants,@p_NumberChildOccupants,@p_moveindate);";

        // Create connection  
        $connection = $this->openConnection();
        $result = mysqli_query($connection, $storedProc);

        $this->closeConnection($connection);
        return $result;
    }

    function GetRentalApplicationByID($applicationID) {
        //$storedProc = "CALL sp_rentalapplication_FetchByID(" . $applicationID .");";
      
        $storedProc = "CALL sp_rentalapplication_FetchByID(" . $applicationID .",@p_writtenexplanation,@p_esignature,@p_applicationdate,@p_MarketingInfo,@p_ApartmentInfo,@p_NumberAdultOccupants,@p_NumberChildOccupants,@p_moveindate);";
        // Create connection  
        $connection = $this->openConnection();
        $result = mysqli_query($connection, $storedProc);
        
        if ($result){
            $result2 = mysqli_query($connection,"SELECT @p_writtenexplanation AS p_writtenexplanation, @p_esignature AS p_esignature, @p_applicationdate AS p_applicationdate,@p_MarketingInfo AS p_MarketingInfo,@p_ApartmentInfo AS p_ApartmentInfo,@p_NumberAdultOccupants AS p_NumberAdultOccupants,@p_NumberChildOccupants AS p_NumberChildOccupants,@p_moveindate AS p_moveindate");
        } else {
            $result2 = FALSE;
        }
        
        $this->closeConnection($connection);
        return $result2;
    }

    function InsertAddress($personID, $streetAddress, $cityName, $state, $zipCode, $isCurrent, $landlordName, $landlordPhone, $rentAmount, $leaseStartDate, $leaseEndDate) {

        $storedProc = "CALL sp_address_Insert(" . $personID . ",'" . $streetAddress . "','" . $cityName . "','" . $state . "'," . $zipCode . "," . $isCurrent.",'".$landlordName."','".$landlordPhone."',".$rentAmount.",STR_TO_DATE('".$leaseStartDate."','%m/%d/%Y')".",STR_TO_DATE('".$leaseEndDate."','%m/%d/%Y')" . ");";
        // Create connection  
         $connection = $this->openConnection();
        $result = mysqli_query($connection, $storedProc);
        $this->closeConnection($connection);
        
        return $result;
    }

    function InsertIncome($personID, $incomeName , $monthlyIncome, $positionName, $supervisorName, $phoneNumber, $startDate) {

        $storedProc = "CALL sp_income_Insert(" . $personID . ",'" . $incomeName . "'," . $monthlyIncome . ",'" . $positionName . "','" . $supervisorName . "','" . $phoneNumber ."',STR_TO_DATE('".$startDate."','%m/%d/%Y'));";
         //Create connection  
        $connection = $this->openConnection();

        $result = mysqli_query($connection, $storedProc);
        $object = mysqli_fetch_object($result);       
        $id = $object->pIncomeID;
        $this->closeConnection($connection);
        return $id;
    }
}
