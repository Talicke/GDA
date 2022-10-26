
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

function selectedOptionDropDown(option){
    elem = document.querySelector(option);
    elem.setAttribute("selected", "");
}

function changeSelecte(select, option){
    let dropDownTriggered = document.querySelector(select);
    let listeOfOptions = document.querySelectorAll(option);
    dropDownTriggered.addEventListener("change", (event)=>{
        let idActivity = event.target.selectedOptions[0].attributes.idactivite.value;
        listeOfOptions.forEach(elem =>{
            if(elem.attributes.selected){
                elem.removeAttribute("selected");
            }
            if(elem.value == idActivity){
                elem.setAttribute("selected","")
            }
        })
    })
}