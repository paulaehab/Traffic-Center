function checkid()
{
    var idno;
    idno=document.getElementById("empid").value;
    if(idno==="123")
        
      { 
          window.open("employee/index.html");
      }
    else if(idno==="456")
        
      { 
          window.open("judge/index.html");
      }
    
    else if(idno==="789")
        
      { 
          window.open("engineer/index.html");
      }
    else if(idno==="101")
        
      { 
          window.open("officer/index.html");
         
      }
}