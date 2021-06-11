
<?php


//CONNECTING TO THE DATABASE
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "spark_bank"; 
    
    $conn = new mysqli($servername, $username, $password, $dbname); 
    //IF CONNECTION IS NOT SUCCESSSFUL
    if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
    } 
?>
<!--HTML CODE STARTS -->
<html>
<head> 
    <title>Transaction Page</title>
    <style>
    body {
               padding-top: 60px;
               font-size:25px;
               text-align: center;
               background: #f5fce3;
               background: -webkit-linear-gradient(to right, #f5fce3, #e1e6d6 );
               background: linear-gradient(to right, #f5fce3,#e1e6d6 );
        }
    form{
        color:white;
        background: #91c1c9;
        background: -webkit-linear-gradient(to bottom,  #91c1c9, #5e9da8 );
        background: linear-gradient(to bottom, #91c1c9, #3a5f66);
        max-width: 500px;
        margin: 50px auto;
        padding: 30px 20px;    
        box-shadow: 2px 10px 10px rgba(5, 5, 0, 0.7);
    }
    #form-control {
            text-align: left;
            margin-bottom: 25px;
        }
 #form-control label {
            display: block;
            margin-bottom: 10px;
        }
#form-control input
        {
            border: 1px solid #777;
            border-radius: 2px;
            font-family: inherit;
            padding: 10px;
            display: block;
            width: 95%;
        }
        button {
            background-color:#006666;
            border: 1px solid #777;
            border-radius: 2px;
            font-family: inherit;
            font-size: 21px;
            display: block;
            width: 95%;
            margin-top: 50px;
            margin-bottom: 20px;
        }
 
    </style>   
    <script type="text/javascript">
    
        if(window.history.replaceState){
            
            window.history.replaceState(null, null, window.location.href); 
        }
       
    </script>
      
     
</head>
<body>
<!-- INCLUDING NAVBAR-->
<?php include('navbar.php'); ?>
<!-- Creating Form to collect information related to do transaction-->
    
    <!-- Form's action attribute points to this page only-->
    <!-- Note: To redirect page to samee php write "php echo $_SERVER['PHP_SELF'];" in action attribute-->
    <form id="myForm" action="ResultPage.php"  onsubmit="return validateForm()" method="post">
    <h1>Transfer Money</h1>
    <div id="form-control">  
    <label id="payer-label">Payer Account No</label><br>
    <input type="number" id="accno" name="payerID" placeholder="Payer Account No" min=100 required><br>
    </div>
	<div id="form-control">  
    <label id="name-label">Payee Account No</label><br>
    <input type="number" id="pyno" name="payeeID" placeholder="Payee Account No" min=100 required><br>
    </div>
	<div id="form-control">  
    <label id="name-label">Amount (in Rupees)</label><br>
    <input type="number" id="rs" name="amount" placeholder="Enter your amount" min=1 required><br>
    </div>
    <input type= "hidden" name= "form_submitted" value="1">
	<button type="submit" id="submit">PROCEED</button>
    </form>
</div>
 <!-- FORM / TABLE ENDS HERE WITH DIV TAG-->
 <script>
 
 function validateForm() {
            var x = document.forms["myForm"]["payerID"].value;
            var y = document.forms["myForm"]["payeeID"].value;
            var z = document.forms["myForm"]["amount"].value;
            var regex=/^[0-9]+$/;

            
            if (x == "" || y=="" || z=="") {
                alert("Fill it!!");
                return false;
            }

            //var num = z>0?1:-1;
            if((Math.sign(z)==-1)||(Math.sign(z)==-0)||z==0){
                alert("Enter a valid amount to do transaction");
                return false;
            }
            if(isNaN(z)|| !x.match(regex)|| !y.match(regex) ||!z.match(regex)){
                alert("Enter correct input!");
                return false;
            }
            
           // var data = <?php //echo json_encode("42", JSON_HEX_TAG); ?>;
        }
            
 </script>
</body>
</html>
