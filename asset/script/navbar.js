function extendNav(leaveMenu, showMenu, nav, sizeH, sizeL){
    let elemNav = document.querySelector(`${nav}`);
    let elemShow = document.querySelector(`${showMenu}`)
    let elemHide = document.querySelector(`${leaveMenu}`)
    elemShow.addEventListener("mouseenter", function(){
        elemNav.style.height = sizeL;
        elemShow.style.height = "30px";
    })
    elemHide.addEventListener("mouseleave", function(){
        elemNav.style.height = sizeH;
        elemShow.style.height = "22vh";
    })
}