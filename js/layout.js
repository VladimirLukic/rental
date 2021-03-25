// layout
document.querySelector("#columns").style.width = screen.width*0.9 + "px";
document.querySelectorAll(".drop-menu").forEach(el=>el.style.width = screen.width*0.9 + "px");
document.querySelector("#list").style.width = screen.width*0.9 + "px";
document.querySelector("#list").style.height = screen.height*0.64 + "px";
let line = document.querySelectorAll(".line");
line.forEach(element => element.style.width = screen.width*0.89 + "px");

//edit-form run
let edit = document.querySelectorAll("input.edit");
line.forEach(el=>el.onclick = ()=>{
    for(let i=0;i<el.children.length;i++){
        edit[i].value = el.children[i].innerHTML;
    }
    (line[0].innerHTML != 'No data')? document.querySelector("#edit").style.display = 'block':'';
})  

//edit-form kill
document.querySelector(".cancel").onclick = (e)=>{
    e.preventDefault();
    document.querySelector("#edit").style.display = 'none';
    document.querySelector("#btn1").style.display = 'block';
    document.querySelector("#btn2").style.display = 'none';
    edit.forEach(el=>el.disabled = true);
}

//edit button
document.querySelector("#change").onclick = (e)=>{
    e.preventDefault();
    document.querySelector("#btn1").style.display = 'none';
    document.querySelector("#btn2").style.display = 'block';
    document.querySelectorAll(".edit").forEach(el=>el.disabled = false);
}

document.querySelector(".add").onclick = ()=>{
    document.querySelector("#edit").style.display = 'block';
    edit.forEach(el=>{el.disabled = false; el.value = "";});
    document.querySelector("#btn1").style.display = 'none';
    document.querySelector("#btn2").style.display = 'block';
    document.querySelector("#rent").style.display = 'none';
}


// message timeout
const msg = document.querySelector("#msg");
setTimeout(()=>{ (msg)? msg.style.display = 'none':""; }, 3000);


// //this extends lines and overflow list
// let line = document.querySelectorAll(".line"), lineLen = line.length;
// for(let i=0;i<lineLen;i++){
//     let data = line[i].querySelectorAll(".data"), dataLen = data.length, sum = 0;
//     for(let j=0;j<dataLen;j++){
//         sum += Number(data[j].clientWidth);
//         (sum >= line[i].clientWidth)? data[j].style.display = 'none':'';
//     }
// }
