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
}
