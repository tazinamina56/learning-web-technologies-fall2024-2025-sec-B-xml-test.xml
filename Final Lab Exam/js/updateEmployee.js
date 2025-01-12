function validateForm(){
    const employeeId = document.getElementById('employeeId').value;
    const employeeName = document.getElementById('employeeName').value;
    const contactNo=document.getElementById('contactNo').value;
    const userName=document.getElementById('username').value;
    const password=document.getElementById('password').value;
    if (employeeId==="") {
        alert('Invalid employee Id');
        
    }
    if(employeeName===""){
        alert('Invalid employee name!');
        
    }
    if(contactNo===""){
        alert('Invalid contact no!');
        
    }
    if(userName===""){
        alert('Invalid user name!');
        
    }
    if(password===""){
        alert('Invalid password!');
        
    }
    
}