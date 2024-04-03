const arrow=document.getElementById('arrow');
arrow.addEventListener('mouseover',()=>{
    arrow.style.left='260px';
    if(  arrow.style.left='260px'){
    arrow.style.transform='scaleX(-1)';}
    document.getElementById('side-bar').style.width = '250px';
});
document.getElementById('side-bar').addEventListener('mouseleave',()=>{
    arrow.style.left='0px';
    arrow.style.transform='scaleX(1)';
    document.getElementById('side-bar').style.width = '0';
});
