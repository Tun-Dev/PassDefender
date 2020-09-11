function getUser(){
    const email =  document.getElementById('verify').value;
    if (email === ""){
        window.alert('please input your email')
    }
    else{
    const url = './users.json';
    fetch(url)
    .then((res) => res.json())
    .then((data)=>{
        for(i=0; i < data.length; i++){
            if (email == data[i].email){
                console.log(data[i].Security);
            }
            // else{
            //     window.alert("Not registered email!")
            // }
        }
    })
    }
//     else{
//         var mydata = JSON.parse(users);
//         console.log(mydata);
//     }
}

// function verifyUser(){
    
// }