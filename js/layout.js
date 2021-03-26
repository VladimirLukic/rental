// layout
document.querySelector("#columns").style.width = screen.width*0.9 + "px";
document.querySelectorAll(".drop-menu").forEach(el=>el.style.width = screen.width*0.9 + "px");
document.querySelector("#list").style.width = screen.width*0.9 + "px";
document.querySelector("#list").style.height = screen.height*0.64 + "px";
let line = document.querySelectorAll(".line");
line.forEach(element => element.style.width = screen.width*0.89 + "px");
let edit = document.querySelectorAll("input.edit");

//edit-form run
line.forEach(el=>el.onclick = ()=>{
    for(let i=0;i<el.children.length;i++){
        edit[i].value = el.children[i].innerHTML;
    }
    (line[0].innerHTML != 'No data')? document.querySelector("#edit").style.display = 'block':'';
})  

//edit-form kill
document.querySelector(".cancel").onclick = (e)=>{
    e.preventDefault();
    edit.forEach(el=>el.disabled = true);
    document.querySelector("#edit").style.display = 'none';
    document.querySelector("#btn1").style.display = 'block';
    document.querySelector("#btn2").style.display = 'none';
}

//edit button
document.querySelector("#change").onclick = (e)=>{
    e.preventDefault();
    document.querySelector("#btn1").style.display = 'none';
    document.querySelector("#btn2").style.display = 'block';
    document.querySelectorAll(".edit").forEach(el=>el.disabled = false);
}

//add
document.querySelector(".add").onclick = ()=>{
    document.querySelector("#edit").style.display = 'block';
    edit.forEach(el=>{el.disabled = false; el.value = " ";});
    document.querySelector("#btn1").style.display = 'none';
    document.querySelector("#btn2").style.display = 'block';
    (document.querySelector("#rent"))? document.querySelector("#rent").style.display = 'none':"";
    document.querySelector("form").action = document.querySelector("#send").value;
}

//delete
document.querySelector("#del").onclick = (e)=>{
    document.querySelector("form").action = document.querySelector("#del").value;
}

//dodati eventove za rent

// message timeout
const msg = document.querySelector("#msg");
setTimeout(()=>{ (msg)? msg.style.display = 'none':""; }, 5000);


// //this extends lines and overflow list
// let line = document.querySelectorAll(".line"), lineLen = line.length;
// for(let i=0;i<lineLen;i++){
//     let data = line[i].querySelectorAll(".data"), dataLen = data.length, sum = 0;
//     for(let j=0;j<dataLen;j++){
//         sum += Number(data[j].clientWidth);
//         (sum >= line[i].clientWidth)? data[j].style.display = 'none':'';
//     }
// }
