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
}