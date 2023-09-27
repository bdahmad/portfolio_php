<?php

   $host = "localhost";
   $username = "root";
   $password = "";
   $database = "portfolio_php";

   $con = mysqli_connect($host,$username,$password,$database);

   if(!$con){
      echo "Database connection failed.";
   }