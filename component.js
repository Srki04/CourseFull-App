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
    editSetup();
    targetStyling();
}

function editSetup(){
    let editbtn = document.getElementsByClassName("edit-btn");
    for(let i = 0; i < editbtn.length; i++){
        editbtn[i].addEventListener("click", function(){
            this.parentNode.style.display = "none";
            var submit = this.parentNode.previousElementSibling;
            submit.style.display = "inline";
        });
    }
    let submitbtns = document.getElementsByClassName("submit-btn");
    for(let i = 0; i < submitbtns.length; i++){
        submitbtns[i].addEventListener("click", function(){
            this.parentNode.style.display = "none";
            var add = this.parentNode.nextElementSibling;
            add.style.display = "block";
        });
    }
}

function targetStyling(){
    let goal = document.getElementById("comp-target");
    let current = document.getElementById("comp-actual");
    let percent = parseFloat(current.innerText) / parseFloat(goal.innerText) * 100;
    if(percent >= 100){
        current.parentNode.style.color = "#00ff66";
    }
    else if(percent >= 90){
        current.parentNode.style.color = "#ffe600";
    }
    else{
        current.parentNode.style.color = "#ff0000";
    }
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