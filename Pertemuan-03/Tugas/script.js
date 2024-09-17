function toggleEkstrakurikuler() {
    var kelas = document.getElementById("kelas").value;
    var ekstrakurikulerSection = document.getElementById("ekstrakurikulerSection");
    
    if (kelas === "XII") {
        ekstrakurikulerSection.classList.add("hidden");
    } else {
        ekstrakurikulerSection.classList.remove("hidden");
    }
}
