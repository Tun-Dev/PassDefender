// function save(){
//     var objPeople = [];
//     var firtsName = document.getElementById('firstName').value;
//     var lastName = document.getElementById('lastName').value;
//     var email = document.getElementById('email').value;
//     var security1 = document.getElementById('security1').value;
//     var security2 = document.getElementById('security2').value;
//     var security3 = document.getElementById('security3').value;
//     var security4 = document.getElementById('security4').value;
//     var security5 = document.getElementById('security5').value;
//     var security6 = document.getElementById('security6').value;
//     var User = {
//         FirstName: firtsName,
//         LastName: lastName,
//         Email: email,
//         Security: security1,
//     }
//     objPeople.push(User);
//     console.log(objPeople);
// }





let users = [];

const save = (ev) => {
    ev.preventDefault();
    let user = {
        id: Date.now(),
        firstName: document.getElementById('firstName').value,
        lastName: document.getElementById('lastName').value,
        email: document.getElementById('email').value,
        security: document.getElementById('security1').value,
    } 

    users.push(user);
    document.forms[0].reset();

    console.warn('added' , {users});
    let pre = document.querySelector('#msg pre');
    pre.textContent = '\n' + JSON.stringify(users, '\t', 2)
    
}
document.addEventListener('DOMContentLoaded', ()=>{
    document.getElementById('button').addEventListener('click', save);
})

// const save = () => {
//     const fs = require('fs')

//     const user = {
//         id: Date.now(),
//         firstName: document.getElementById('firstName').value,
//         lastName: document.getElementById('lastName').value,
//         email: document.getElementById('email').value,
//         security: document.getElementById('security1').value,
//     } 
    
//     const jsonString = JSON.stringify(user);
    
//     fs.writeFile('./users.json', jsonString, err =>{
//         if (err){
//             console.log('Error writing file', err)
//         }
//         else{
//             console.log('Successfully wrote file')
//         }
//     })
// }
// document.addEventListener('DOMContentLoaded', ()=>{
//     document.getElementById('button').addEventListener('click', save);
// })