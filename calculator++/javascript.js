// console.log("hello there");
// var range = document.getElementById("range").value; 
// document.getElementById("range").value = 9;
// console.log(range);
// .setAttribute('disabled', 'disabled')
// .removeAttribute('disabled')
// window.confirm("tekst")
var rangeValue = document.getElementById("rangeValue");  
function updateRange()
{
 var range = document.getElementById("range").value;
 console.log(range);
 rangeValue.innerHTML = range;
}
function disableInput() 
{
    var nope  = document.getElementById("operator").value;
    var number2 = document.getElementById("number2");
    if(nope == "sqrt" || nope == "Km2Miles" || nope == "Miles2Km")
    {
    //  number2.setAttribute("disabled", "disabled");
     number2.disabled = true;
    }
    else
    {
        number2.disabled = false;
    }
}
function checkInput()
{
    var number1 = document.getElementById("number1").value;
    var number2 = document.getElementById("number2").value;
    var nope  = document.getElementById("operator").value;
    var errorMessage = ""
    if(number1 == "")
    {
        errorMessage += " input 1 empty";
    }
    
    if(number2 == "" && nope != "sqrt" )
    {
        errorMessage += " input 2 empty";
    }
    if( number1 == "" || number2 == "" )
    {
        if(nope != "sqrt" && nope != "Miles2Km" && nope != "Km2Miles")
        {
            window.alert(errorMessage);
        }
        
    }
}
function clearInput()
{
    rangeValue.innerHTML = "0";
}
// if(nope) == "sqrt")
// {
//  number2.disabled = true;
// }