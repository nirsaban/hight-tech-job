//class that update data
class Profil{
    
   editDom(data){
    if(data['col'] == 'category_id'){
    let select = document.querySelector('.cat');
    select.style.display = 'block';
    }else if(data['col'] == 'about_me'){
        $(editAbout).prop("onclick", null).off("click");
        let parentAbout = document.getElementById('about')
        let pAbout = document.querySelector('.aboutMe');
        let ValpAbout = pAbout.textContent;
        pAbout.style.display='none';
        let inputAbout = document.createElement('TEXTAREA');
        inputAbout.setAttribute('type','text');
        inputAbout.setAttribute('id','inputAbout');
         inputAbout.value = ValpAbout;
         parentAbout.appendChild(inputAbout) 
         inputAbout.addEventListener('focusout',()=>{
          let up = document.querySelector('.updateAbout');
          up.id = 'rotate-scale-up-diag-1'
         })
       
    }else if(data['col'] == 'education'){
        $(editEd).prop("onclick", null).off("click");
        const parentEducation = document.querySelector('.education')
        let plus = document.createElement('button');
        let plusAll = document.createElement('button')
        plus.innerText = '+ '
        plus.classList = 'btn btn-secondary plusEdu col-sm-1'
        plusAll.innerText = 'V'
        plusAll.classList = 'btn btn-success plusEduAll col-xs-1'
        parentEducation.appendChild(plus) 
        parentEducation.appendChild(plusAll) 
        document.querySelector('.plusEdu').addEventListener('click',()=>{
               let inputEducation = document.createElement('input');
               inputEducation.setAttribute('type','text');
               inputEducation.classList = 'educationInput form-control'
               parentEducation.appendChild(inputEducation) 
        })
        const arrEd = []
             document.querySelector('.plusEduAll').addEventListener('click',()=>{
               document.querySelectorAll('.educationInput').forEach(edu =>{
               arrEd.push(edu.value)    
            });

            let jsonValue = JSON.stringify(arrEd);
            let inputHidden = document.createElement('input');
            inputHidden.setAttribute('type','hidden');
            inputHidden.classList = 'inputEdHidden';
            inputHidden.value = jsonValue;
            parentEducation.appendChild(inputHidden)
            plus.disabled = true;
            let up = document.querySelector('.updateEd');
            up.id = 'rotate-scale-up-diag-1'
     })

    }else if(data['col'] == 'my_skills'){
        $(editSk).prop("onclick", null).off("click");
        const parentSkills = document.querySelector('.skills')
        let plus = document.createElement('button');
        let plusAll = document.createElement('button')
        plus.innerText = '+ '
        plus.classList = 'btn btn-secondary plusSk col-sm-1'
        plusAll.innerText = 'V'
        plusAll.classList = 'btn btn-success plusSkAll col-xs-1'
        parentSkills.appendChild(plus) 
        parentSkills.appendChild(plusAll) 
        document.querySelector('.plusSk').addEventListener('click',()=>{
               let inputSkills = document.createElement('input');
               inputSkills.setAttribute('type','text');
               inputSkills.classList = 'skillsInput form-control'
               parentSkills.appendChild(inputSkills) 
        })
        const arrSk = []
             document.querySelector('.plusSkAll').addEventListener('click',()=>{
               document.querySelectorAll('.skillsInput').forEach(skill =>{
                arrSk.push(skill.value)    
            });

            let jsonValue = JSON.stringify(arrSk);
            let inputHidden = document.createElement('input');
            inputHidden.setAttribute('type','hidden');
            inputHidden.classList = 'inputSkHidden';
            inputHidden.value = jsonValue;
            parentSkills.appendChild(inputHidden)
            plus.disabled = true;
            let up = document.querySelector('.updateSk');
            up.id = 'rotate-scale-up-diag-1'
     })  
    }else if(data['col'] == 'links'){
        $(editLi).prop("onclick", null).off("click");
        const parentLinks = document.querySelector('.links')
        let plus = document.createElement('button');
        let plusAll = document.createElement('button')
        plus.innerText = '+ '
        plus.classList = 'btn btn-secondary plusLi col-sm-1'
        plusAll.innerText = 'V'
        plusAll.classList = 'btn btn-success plusLiAll col-xs-1'
        parentLinks.appendChild(plus) 
        parentLinks.appendChild(plusAll) 
        document.querySelector('.plusLi').addEventListener('click',()=>{
               let inputLinks = document.createElement('input');
               inputLinks.setAttribute('type','text');
               inputLinks.classList = 'linkInput form-control'
               parentLinks.appendChild(inputLinks) 
        })
        const arrLi = []
             document.querySelector('.plusLiAll').addEventListener('click',()=>{
               document.querySelectorAll('.linkInput').forEach(link =>{
                arrLi.push(link.value)    
            });

            let jsonValue = JSON.stringify(arrLi);
            let inputHidden = document.createElement('input');
            inputHidden.setAttribute('type','hidden');
            inputHidden.classList = 'inputLiHidden';
            inputHidden.value = jsonValue;
            parentLinks.appendChild(inputHidden)
            plus.disabled = true;
            let up = document.querySelector('.updateLi');
            up.id = 'rotate-scale-up-diag-1'
     })  
    }
   }
   takeValue(data){
      const id = parseInt(data['id'])
      const item = data['col']
       if(data['col'] == 'category_id'){
        let valueF = document.querySelector('.cat').value;
        let value = parseInt(valueF)
        this.update(id,item,value)
       }else if(data['col'] == 'about_me'){
        let value = document.querySelector('#inputAbout').value;
        this.update(id,item,value)
       }else if(data['col'] == 'education'){
        let value = document.querySelector('.inputEdHidden').value;
        this.update(id,item,value)
       }else if(data['col'] == 'my_skills'){
        let value = document.querySelector('.inputSkHidden').value;
        this.update(id,item,value)
       }else if(data['col'] == 'links'){
        let value = document.querySelector('.inputLiHidden').value;
        this.update(id,item,value)
       }
   }

   update(id,item,value){
    //    console.log(id,item,value)
            axios({method:'post',url:'edit-profil.php',
            data:{
                item:item,
                id:id,
                value:value
            }}).then(()=>{
              location.reload();
             });
        
   }
}
//the global object from class
const ob = new Profil();
function edit(data){
    ob.editDom(data);
}
function update(data){

    ob.takeValue(data);
}














function cv(data){
    $("#fileForm").on('submit', function(e){
        e.preventDefault();
        let value = document.getElementById("file-path").files[0].name; 
        axios({method:'post',url:'edit-profil.php',
        data:{
            item:item,
            id:id,
            value:value
        }}).then(({data})=>{
           console.log(data)
         });
        update(data,cv)
     }); 
}