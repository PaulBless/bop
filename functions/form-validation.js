function validatedesc()
{
    var des = document.forms[0]["firstname"].value; // get the value of filed
    if (des == null || des == "") // check if value is null or blank
    { //if yes = show an error message
        document.getElementById('err-fname').style.visibility = "visible";
        document.getElementById('err-fname').innerHTML = "Firstname can not be blank";
    }
    else
    { //if no = do nothing
        document.getElementById('err-fname').style.visibility = "hidden";
    }
}