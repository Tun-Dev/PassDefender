function getUser(){
    const email =  document.getElementById('verify').value;
    const sec1 = document.getElementById('secinput1').value;
    if (email === ""){
        window.alert('please input your email')
    }
    else{
    const url = './users.json';
    fetch(url)
    .then((res) => res.json())
    .then((data)=>{
        for(i=0; i < data.length; i++){
            if (email == data[i].email || sec1 == data[i].Security){
                // window.location.href = "./Questions.html";
                window.alert('Logged in!');
            }

        }
    })
    }
}


// function getQues(){
                
//     const sec1 = document.getElementById('secinput1').value;

//     if(sec1 == data.email.Security[i]){
//         window.alert('Logged in!');
//     }else{
//         window.alert('Not working');
//     }

// }
