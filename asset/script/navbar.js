console.log('hello');

let menuSupClose = `<button type="submit" class="onglet-up onglet1" id="Mcompte">menu compte</button>`

let menuSupOpen =`
    <button type="submit" class="onglet-up onglet1">Compte</button>
    <button type="submit" class="onglet-up onglet2">Activités</button>
    <button type="submit" class="onglet-up onglet3">Projets</button>`

let opened = false


let elemt = document.querySelector(".navbar-sup-collapse");
console.log(elemt);

elemt.innerHTML = menuSupClose;

elemt.addEventListener("mouseover", function(event) {
    if(event){
        elemt.innerHTML = menuSupOpen;
        // opened = true
    }else if (!event){
        elemt.innerHTML = menuSupClose;
        // opened = false
    }
    
})