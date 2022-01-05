let links = document.querySelectorAll(".container nav ul li a");
let map;

/* ====== EFECTO SMOOTH SCROLL ===== */
links.forEach((link) => {
    link.addEventListener('click', function(e){
        e.preventDefault();
        const href = this.getAttribute("href");
        const offsetTop = document.querySelector(href).offsetTop;

        scroll({
            top: offsetTop,
            behavior: "smooth"
        });
    })
});

/* ====== AGREGAR GOOGLE MAP ===== */
function initMap(){
    const latLon = {
        lat: 25.871447,
        lng: -97.501456
    };

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 16,
        center: latLon
    });

    new google.maps.Marker({
        position: latLon,
        map,
        title: 'Instalaciones DISH Matamoros'
    });
}