function pushSide() {
    document.querySelector(".insert").classList.toggle("insert-push");
    document.querySelector(".list-students").classList.toggle("list-shrink");
    document.querySelector(".push-btn > i").classList.toggle("btn-rotate");
}

let media = window.matchMedia("(max-width: 991px)");

media.addEventListener("change", (_) => {
    if (media.matches)
        document.querySelector(".push-btn").style.display = "none";
    else document.querySelector(".push-btn").style.display = "block";
});

document.querySelector(".links-btn").onclick = (_) => document.querySelector(".links").classList.toggle("toggle");
