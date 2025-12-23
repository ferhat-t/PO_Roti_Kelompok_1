document.addEventListener("DOMContentLoaded", function () {
    console.log("✅ script.js LOADED");

    const toggle = document.getElementById("userToggle");
    const dropdown = document.getElementById("userDropdown");

    console.log("toggle:", toggle);
    console.log("dropdown:", dropdown);

    if (!toggle || !dropdown) {
        console.log("❌ ELEMENT DROPDOWN TIDAK DITEMUKAN");
        return;
    }

    toggle.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();

        dropdown.classList.toggle("show");
        console.log("👆 username diklik");
    });

    document.addEventListener("click", function () {
        dropdown.classList.remove("show");
    });
});
