//menu bar for responsive mode
let navbar = document.querySelector('.header .flex .navbar');


document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
};


window.onscroll = () => {
    navbar.classList.remove('active');
};

//Validate the LogIn of the user
function validateLogIn(){
    var email = document.getElementById("email").value;
    var pass = document.getElementById("pass").value;   
    if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
        alert("Invalid email address");
        return false;
    }
    if(pass==""){
        alert("Fill the password please!");
        return false;
    }
    if(pass.length<8){
        alert("Password must be minimum 8 characters long");
        return false;
    }
    if(pass.length>16){
        alert("Password must be maximum 16 characters long");
        return false;
    }
    return true;
}

//Validate the Registration of a users
function validateRegister(){
    var name = document.getElementById("name").value;
    var email2 = document.getElementById("email2").value;
    var pass2 = document.getElementById("pass2").value;
    var confirm = document.getElementById("passconfirm").value;

    if(name == " "){
        alert("Enter your name!");
        return false;
    }
    if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email2)){
        alert("Invalid email address");
        return false;
    }
    if(pass2==""){
        alert("Fill the password please!");
        return false;
    }
    if(pass2.length<8){
        alert("Password must be minimum 8 characters long");
        return false;
    }
    if(pass2.length>16){
        alert("Password must be maximum 16 characters long");
        return false;
    }
    if(confirm != pass2){
        alert("Confirm your password correctly!");
        return false;
    }
    return true;
}


//validate the proccess of posting a job
function validatePostJob(){
    var name2 = document.getElementById("name2").value;
    var email3 = document.getElementById("email3").value;
    var jobttl = document.getElementById("jobttl").value;
    var place = document.getElementById("place").value;

    if(name2 == " "){
        alert("Enter your name!");
        return false;
    }
    if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email3)){
        alert("Invalid email address");
        return false;
    }    
    if(jobttl == ""){
        alert("Enter the Job Title!");
        return false;
    }
    if(place =="null"){
        alert("Enter the location of the job!");
        return false;
    }
    return true;

}

//Validate Contact Form

function validateContact(){
    var contactname = document.getElementById("contactname").value;
    var contactemail = document.getElementById("contactemail").value;
    var contactnumber = document.getElementById("contactnumber").value;
    var contactmessage = document.getElementById("contactmessage").value;

    if(contactname == ""){
        alert("Enter your name,please");
        return false;
    }
    if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(contactemail)){
        alert("Invalid email address");
        return false;
    }
    if(contactnumber>999999999){
        alert("Invalid phone number");
        return false;
    }
    if(contactmessage ==""){
        alert("Enter yout message ,please");
        return false;
    }
    if(contactmessage.length >1000){
        alert("You can not write more than 10000 words in this form.Plesae give us a phone call!");
        return false;
    }
    return true;
}