document.addEventListener("DOMContentLoaded", () => {
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('.nav-link');
    const menuItem2 = document.querySelectorAll('.dropdown-item');
    const menuItem3 = document.querySelectorAll('.list');
    const menuItem3a = document.querySelectorAll('.list a');
    const menuItem4 = document.querySelectorAll('.list-group-item');
    const menuLength = menuItem.length
    const menuLength2 = menuItem2.length
    const menuLength3 = menuItem3.length
    const menuLength4 = menuItem4.length
    for (let i = 0; i < menuLength; i++) {
        if(menuItem[i].href === currentLocation){
            menuItem[i].classList.toggle("active");
        }
    }
    for (let i = 0; i < menuLength2; i++) {
        if(menuItem2[i].href === currentLocation){
            menuItem2[i].classList.toggle("active");
        }
    }
    for (let i = 0; i < menuLength3; i++) {
        if(menuItem3a[i].href === currentLocation){
            menuItem3[i].classList.toggle("active");
        }
    }
    for (let i = 0; i < menuLength4; i++) {
        if(menuItem4[i].href === currentLocation){
            menuItem4[i].classList.toggle("active");
        } else if (menuItem4[i].getAttribute("data-url") === currentLocation || menuItem4[i].getAttribute("data-url2") === currentLocation || menuItem4[i].getAttribute("data-url3") === currentLocation){
            menuItem4[i].classList.toggle("active");
        }
    }
    if (document.getElementById('flexSwitchCheckDefault')) {
        document.getElementById('flexSwitchCheckDefault').addEventListener("change", () => {
            (document.getElementById('flexSwitchCheckDefault').checked == true) ? va = 1 : va = 0;
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../inc/data/packs/newssubscription.pack.php?checked=" + va);
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.send();
        });
    }
});