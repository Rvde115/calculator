<?php
session_start();
if(!isset($_SESSION['log']))
{
 $_SESSION['log'] = array() ;
}
/* if(isset($_POST["zend"])){ 
    echo "succes";
    var_dump($_POST); 
}*/
//initialize op define some variables

$number1 = 0; //integer
$number2 = 0; //integer
$operator = ""; //string
$decimals = 0;
$result = 0; //integer
$mile = 1.609344;
//is form sent?
//then get posted values
// 
if(isset($_POST['send'])){
 $number1 = $_POST['number1'];
 $operator = $_POST['operator'];    // selected option
 $decimals = $_POST['decimals'];

 if(isset($_POST['number2'])){
    $number2 = $_POST['number2'];  
 }

 if($number1 != "")
    {
        if($number2 != "")
        {
            if($operator == "add")
            {
                $result = $number1 + $number2;
            }
            if($operator == "subtract")
            {
                $result = $number1 - $number2;
            }
            if($operator == "multiply")
            {
                $result = $number1 * $number2;
            }
            if($operator == "divide")
            {
                if($number2 <= 0)
                {
                    $result = "delen door 0 kan niet";
                    echo $result;
                }
                else
                {
                    $result = $number1 / $number2;
                }
            }
            if($operator == "exponentiation")
            {
                $result = pow($number1 ,$number2); 
            }
        }
       
        if($operator == "sqrt")
        {
            $result = sqrt($number1);
        }

        if( $operator == "Km2Miles")
        {
            $result = $number1 / $mile;  
        }
        if( $operator == "Miles2Km")
        {
            $result = $number1 * $mile;
        }
    }
    $result = round($result, $decimals); 

    array_push($_SESSION['log'] , $result);
    if(count($_SESSION['log']) >5)
    {
     array_shift($_SESSION['log']);
    }
}
?>

<!doctype html>
<html>
    <head>

        <!--character set-->
        <meta charset= "UTF-8">

        <!--website describtion-->
        <meta name = "description"  content= "my first website!">

        <link rel= "stylesheet" type="text/css" href="CSS/stylecalculator.css">

        <title> lesson 4 divs </title>
        
    </head>
    <body>
    <!-- <form method="POST">
     <input type = "number" min = "0" name = "number1" placeholder = "num1">
        <select name = "operator">
            <option value = "add">+</option>
            <option value ="subtract">-</option>
            <option value = "multiply"> * </option>
            <option value = "divide"> / </option>
            <option value = "power"> power </option>
            <option value = "root"> root </option>
            <option value = "miles">km2miles</option>
            <option value = "km">miles2km</option>
        </select>
          <input type = "number" min = "0" name = "number2" placeholder="num2">
          <input type ="submit" name ="send" value ="submit">
         <input type = "reset" name ="reset" value ="reset">
    </form> -->
        <div class="container">
            <div class= "top-part">
                
               <?php
                echo "Result: " . $result;
                ?>

            </div>
            <div class= "bottom-part">
                    <form method = "POST">
                        <ul>
                            <li>
                                <label> number 1</label>
                                <input type = text name = "number1" placeholder = "number 1" id = "number1">
                            </li>
                            <li>
                                <select name = "operator" id = "operator" onchange="disableInput()">
                                    <option value = "add"> +</option>
                                    <option value = "subtract"> -</option>
                                    <option value = "multiply"> * </option>
                                    <option value = "divide"> / </option>
                                    <option value = "power"> power </option>
                                    <option value = "sqrt"> root </option>
                                    <option value = "Km2Miles">km2miles</option>
                                    <option value = "Miles2Km">miles2km</option>
                                    <option value = "exponentiation"> exponent</option>
                                </select>
                            </li>
                            <li>
                            <label> number 2</label>
                            <input type = text name = "number2" placeholder = "number 2" id = "number2">
                            </li>
                            <li>
                            <label id = "rangeValue"> 0 </label>
                            <input type = "range" name = "decimals" value = "0" min = "0" max = "10" id = "range" onchange = "updateRange()">
                            <li> 
                                <input type = "submit" name = "send" value = "calculate" onclick = "checkInput()">
                                <input type = "reset" name = "Reset" value = "Reset" onclick = "clearInput()">
                            </li>
                            <li>

                            <?php
                             
                             for ($x = 0; $x < count($_SESSION['log']); $x++)
                             {
                                echo "Result is : ".$_SESSION['log'][$x]." <br>";
                            } 
                            ?>
                            </li>
                        </ul> 
                    </form>  
             </div>
        </div>
        <script type = "text/javascript" src = "javascript.js"> </script>   
    </body>
</html>