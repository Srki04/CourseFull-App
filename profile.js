//Created by Robert Babaev

function init(){
    document.getElementById("sidebar-btn").addEventListener("click", openNav);
    document.getElementById("navclose").addEventListener("click", closeNav);
    document.getElementById("goalbtn").addEventListener("click", editGoal);
    document.getElementById("goalsubmitbtn").addEventListener("click", confirmGoal);
    document.getElementById("accountdelete").addEventListener("click", deleteAccount);
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
    targetStyling();
    hubViewSetup();
}

function editGoal(){
    document.getElementById("newgoal").style.display="inline";
    document.getElementById("goalsubmitbtn").style.display="inline";
    document.getElementById("goalbtn").style.display="none";
}

function confirmGoal(){
    document.getElementById("newgoal").style.display="none";
    document.getElementById("goalsubmitbtn").style.display="none";
    document.getElementById("goalbtn").style.display="inline";
}

//Styles the Current Mark value to red, green, or yellow, depending on where the user's mark stands against their goal
function targetStyling(){
    let goal = document.getElementById("goalmark");
    let current = document.getElementById("currentmark");
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

function hubViewSetup(){
    let accordion = document.getElementsByClassName("accordion");
    for(let i = 0; i < accordion.length; i++){
        accordion[i].addEventListener("click", function(){
            this.classList.toggle("active");
            this.classList.toggle("border-bottom");
            var panel = this.nextElementSibling;
            if(panel.style.display === "block"){
                panel.style.display = "none";
            }
            else{
                panel.style.display = "block";
            }
        });
    }
}

function deleteAccount(){
    console.log("ACCOUNT DELETED.");
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