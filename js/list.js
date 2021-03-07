//list layout
document.querySelector("#columns").style.width = screen.width*0.9 + "px";
document.querySelectorAll(".drop-menu").forEach(el=>el.style.width = screen.width*0.9 + "px");
let list = document.querySelector("#list");
list.style.width = screen.width*0.9 + "px";
list.style.height = screen.height*0.64 + "px";

//line control
let line = document.querySelectorAll(".line"), lineLen = line.length;
for(let i=0;i<lineLen;i++){
    let data = line[i].querySelectorAll(".data"), dataLen = data.length, sum = 0;
    for(let j=0;j<dataLen;j++){
        sum += Number(data[j].clientWidth);
        (sum >= line[i].clientWidth)? data[j].style.display = 'none':'';
    }
}

//popup run
function popRun(){
    let line = document.querySelectorAll(".line");
    line.forEach(el=>el.onclick = ()=>{
        document.querySelector("#edit").style.display = 'block';
    })    
}

//popup kill
function popKill(){
    document.querySelector(".cancel").onclick = (e)=>{
        e.preventDefault();
        document.querySelector("#edit").style.display = 'none';
    }    
}


popRun();
popKill();