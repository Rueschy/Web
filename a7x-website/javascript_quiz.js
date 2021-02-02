function buttonCheck()
{
    
var A1 = document.getElementById("frage1_1");
var A2 = document.getElementById("frage2_3");
var A3 = document.getElementById("frage3_2");
var A4 = document.getElementById("frage4_3");
var A5 = document.getElementById("frage5_1");
var counter = 0;

if(A1.checked == true)
{
    counter = counter + 1;
}
    
if(A2.checked == true)
{
    counter = counter + 1;
}

if(A3.checked == true)
{
    counter = counter + 1;
}
    
if(A4.checked == true)
{
    counter = counter + 1;
}
    
if(A5.checked == true)
{
    counter = counter + 1;
}
    
alert("Sie haben von 5 Fragen richtig beantwortet: " + counter)
    
}