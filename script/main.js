const navBtn = document.getElementById('nav-btn');
const cancelBtn = document.getElementById('cancel-btn');
const sideNav = document.getElementById('sidenav');
const modal = document.getElementById('modal');

navBtn.addEventListener("click", function(){
    sideNav.classList.add('show');
    modal.classList.add('showModal');
});

cancelBtn.addEventListener('click', function(){
    sideNav.classList.remove('show');
    modal.classList.remove('showModal');
});

window.addEventListener('click', function(event){
    if(event.target === modal){
        sideNav.classList.remove('show');
        modal.classList.remove('showModal');
    }
});

function moveTo(page) {
    if (page == 1) {
        window.location.href = '../static/sign_up.html';
    }
    else if (page == 2) {
        window.location.href = '../static/log_in.html';
    }
    else if (page == 3) {
        window.location.href = 'profile.php';
    }
    else {
        window.location.href = "#";
    }
}

function logout() {
    var logout = confirm('Are you sure you want to log out?');
    if(logout) {
      window.location.href = 'includes/logout.php';
    }
 }