window.onload = function init(){
   
let addSkill = document.getElementById('addSkill');
    addSkill.addEventListener('click',()=>{
    let parent = document.querySelector('.skills');
    let input = document.createElement('input')
    input.classList = 'form-control'
    input.setAttribute("type", "text");
    input.setAttribute("class", "skill-data");
    parent.appendChild(input)
})
let addSkills = document.getElementById('addSkills');
addSkills.addEventListener('click',()=>{
const arrSkills = [];
let skills = document.querySelectorAll('.skill-data').forEach((skill)=>{
    arrSkills.push(skill.value);
});
// console.log(arrSkills)
 let toString = arrSkills.toString();
let splitSkills = toString.replace(/,/g,' ');
let parent = document.querySelector('.skills');
let inputHidden = document.createElement('input');
inputHidden.setAttribute("type", "hidden");
inputHidden.setAttribute("name", "skills");
inputHidden.setAttribute("value", `${splitSkills}`);
parent.appendChild(inputHidden);
let addSkill = document.getElementById('addSkill');
addSkill.remove();

})
let foo = document.querySelector('.foo');
foo.addEventListener('click',()=>{
    alert('test')
})
}
function checklogin(){
    if (confirm("to view more please login")) window.location = "login.php";
}
function addLike(id,job_id,table){
    if(table.trim() == 'students_messages'){
        if (confirm("You sure you Want this Job?")) {
            // window.location = `department.php?id=${id}&job_id=${job_id}`;
            axios({method:'get',url:`students.php?id=${id}&job_id=${job_id}&table=${table}`})
            .then(({data})=>{
                console.log(data)
                 disabled(id,job_id)
            });
    } 
    }else{
        if (confirm("You sure you Want this Student?")) {
            axios({method:'get',url:`students.php?id=${id}&job_id=${job_id}&table=${table.trim()}`})
            .then(({data})=>{
                console.log(data)
                 disabled(id,job_id)
            });
    } 
    }
//     if (confirm("You sure you Want this student?")) {
//         // window.location = `department.php?id=${id}&job_id=${job_id}`;
//         axios({method:'get',url:`students.php?id=${id}&job_id=${job_id}`})
//         .then(({data})=>{
//             console.log(data)
//              disabled(id,job_id)
//         });
// }
        // window.location = `department.php?id=${id}&job_id=${job_id}`;
        // disabled(id,job_id)
      
    }
    function disabled(id,job_id){
        let disabledBtn = `Like${id}`;
        let like = document.getElementById(disabledBtn);
        like.disabled = true;
        like.style.color = 'red'
        console.log(like) 
    }
    function sendError(data){
       alert(`The message for  ${data.classList[2]}  has already been sent`)
    }
