let arrow = document.querySelectorAll(".arrow");
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".work-header .fa-bars");
let btnLogOut = document.querySelector(".profile-details .fa-sign-in-alt");
let inputValue = document.querySelector(".profile-details input").value;

for (var i = 0; i < arrow.length; i++)
{
    arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
        arrowParent.classList.toggle("showMenu");
    });
}

sidebarBtn.addEventListener("click", (e) => {
    sidebar.classList.toggle("close");
});

btnLogOut.addEventListener("click", (e) => {
    modalOpen("Cerrar sesión", "Para confirmar de clic en 'Continuar', en caso contrario de clic en 'Cancelar'.", true , "Cancelar", true, "Continuar");
    modalBtnContinue.addEventListener("click", (e) => {
        window.location = inputValue;
    });
});
