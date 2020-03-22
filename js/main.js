window.onload = function init(){
      let check = document.querySelector('.countMessages');
    if(check != null){
    let countId = document.querySelector('.countMessages').value;
    if(countId != null ){
        axios({method:'get',url:`count.php?count=${countId}`})
        .then(({data})=>{
        document.querySelector('.count').innerHTML = data;      
        });
    }
}
    let checkEm = document.querySelector('.countMessagesEm');
    if(checkEm != null){
    let countEmId = document.querySelector('.countMessagesEm').value;
    if(countEmId != null ){
        axios({method:'get',url:`count.php?countEm=${countEmId}`})
        .then(({data})=>{
        document.querySelector('.countEm').innerHTML = data;
           
        });
    }
  
}

    $('.ms').delay(2200).slideUp();
    
    
    
  
   function present(PRESENT){
       console.log(PRESENT)
       let count = []
    for (const [key, value] of Object.entries(PRESENT)) {
        count.push(key)
        let div = document.querySelector(`.${key}`);
        let color = $(div).data("color");
        $(div).css("background", color) 
        div.style.transition = 'background 0.5s ease-in-out'
       }  
      let pre =  document.querySelector('.present').innerHTML = count.length* 14 + '% ' ;  
    //   pre.style.fontSize = " 2rem"
   }
   present(PRESENT)
  
   
  
  


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
  
    function sendEmail(jobEmail,studentEmail,company,name,job_title,emailDepartment,id,emplyer_id){
    let txtStudent =" Hey " + name +  " the company  " + company + " with job - " + job_title +   " want To continue with you please contact me at my email " +  emailDepartment
     let txtJob = " Hey " + company +  " the student  " + name + " intersted in your jobs " + job_title +  " please contact me at my email "  +  emailDepartment;
      let test1 =     prompt("Send email to  " + jobEmail ,txtJob );
      let test2 = prompt("Send email to  " + studentEmail ,txtStudent );
     let arr = [];
     arr.push(txtStudent);
     arr.push(txtJob);
     let jsonArr =   JSON.stringify(arr)
     console.log(jsonArr)
     let txtStudentJs = JSON.stringify(txtStudent)
     let txtJobJs = JSON.stringify(txtJob)
     var params = new URLSearchParams();
      axios({method:'post',url:'messages.php',data:{
        txtStudent:txtStudent,
        txtJob:txtJob,
        id:id,
        user_id:emplyer_id
      }})
            .then(({data})=>{
               alert(data)
            });
    }
    
    function getMessage(id,table){
        axios({method:'get',url:`count.php?getMsg=${id}&from=${table.trim()}`})
        .then(({data})=>{      
            $(".dark_window").fadeIn(500);
           $(".dark_window").css("display", "flex");
             for(i = 0; i < data.length; i++){
                   $(dark_box).append( `<p>${i+1} - ${data[i].messages}</p>` ); 
            }
        //    $(id_h2_dark).html(message)
        //    $(id_p_dark).html(message)          
           $(close_btn_dark).on("click", function () {
            $(".dark_window").fadeOut(800);
            location.reload()
          })
        });  
    }
    function goToprofil(id){
        if (confirm("to view more please fill Your profil")) window.location = "profil.php?id="+id;
    }
 
     
function getProfil(id){
    axios({method:'post',url:'profil.php',
    data:{
        id:id
    }}).then(()=>{
      console.log('yes')
     });
}
function linksWork(link){
   console.log(location.href = link)
}
 