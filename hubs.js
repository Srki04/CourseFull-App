//Created by Robert Babaev

function init(){
    document.getElementById("sidebar-btn").addEventListener("click", openNav);
    document.getElementById("navclose").addEventListener("click", closeNav);
    document.getElementById("user").addEventListener("click", openUserMenu);
    document.getElementById("logout").addEventListener("click", logout);
    window.addEventListener("click", function(event){
        if(!event.target.matches('.user-btn')){
            let dropdowns = document.getElementsByClassName("dropdown-content");
            for(let i=0; i < dropdowns.length; i++){
                let openDropdown = dropdowns[i];
                if(openDropdown.classList.contains('show')){
                    openDropdown.classList.remove('show');
                }
            }
        }
    });
    hubViewSetup();
    componentAddSetup();
    courseAddSetup();
    hubAddSetup();
}

function hubViewSetup(){
    let accordion = document.getElementsByClassName("accordion-btn");
    for(let i = 0; i < accordion.length; i++){
        accordion[i].addEventListener("click", function(){
            this.classList.toggle("active");
            this.classList.toggle("border-bottom");
            var panel = this.parentNode.nextElementSibling;
            if(panel.style.display === "block"){
                panel.style.display = "none";
            }
            else{
                panel.style.display = "block";
            }
        });
    }
}

function componentAddSetup(){
    addSetup("add-component","compname-submit-btn");
}

function addSetup(item1, item2){
    let addbtn = document.getElementsByClassName(item1);
    for(let i = 0; i < addbtn.length; i++){
        addbtn[i].addEventListener("click", function(){
            this.style.display = "none";
            var submit = this.previousElementSibling;
            submit.style.display = "inline";
        });
    }
    let submitbtns = document.getElementsByClassName(item2);
    for(let i = 0; i < submitbtns.length; i++){
        submitbtns[i].addEventListener("click", function(){
            this.parentNode.style.display = "none";
            var add = this.parentNode.nextElementSibling;
            add.style.display = "block";
        });
    }
}

function courseAddSetup(){
    addSetup("add-course","coursename-submit-btn");
}

function hubAddSetup(){
    addSetup("add-hub","hubname-submit-btn");
}

function openNav(){
    document.getElementById("sidenav").style.width = "250px";
}

function closeNav(){
    document.getElementById("sidenav").style.width = "0";
}

function openUserMenu(){
    document.getElementById("userdropdown").classList.toggle("show");
}

function logout(){
    console.log("Logged out!");
}