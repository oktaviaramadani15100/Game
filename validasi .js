function submit(){
   var fullname = document.getElementById("nama").value
   var username = document.getElementById("nama2").value
   var password = document.getElementById("sandi").value
    var nama = document.getElementById("nama")
    var acc = document.getElementById("nama2")
    var acd = document.getElementById ("sandi")

    if (fullname.length < 1 && username.length < 1 && password.length < 1){
        nama.textContent = "username cannot be empty"
        nama2.textContent = "name cannot be empty"
        sandi.textContent = "password cannot be empty"
        nama.style.color ="red"
        nama2.style.color="red"
        sandi.style.color="red"
        nama.style.border="thin solid red"
        acc.style.border="thin solid red"
        acd.style.border="thin solid red"
    }else if(fullname.length < 1 && username.length < 1){
        nama.textContent ="username cannot be empty"
        nama.style.border ="thin solid red"
        nama.style.color ="red"
        nama2.textContent = "name sannot be empty"
        acc.style.border ="thin solid red"
        sandi.style.color ="red" 
    }else if(fullname.length < 1){
        nama.textContent ="username cannot be empty"
        nama.style.border="thin solid red"
        nama.style.color="red"
    }else if(username.length < 1){
        nama2.textContent ="name cannot be empty"
        acc.style.border="thin solid red"
        nama2.style.color="red"
    }else if(password.length < 1){
        sandi.textContent ="password cannot be empty"
        acd.style.border="thin solid red"
        sandi.style.color="red"
    }
}