// Fungsi untuk memformat angka sebagai Rupiah
function formatRupiah(angka) {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
        maximumFractionDigits: 0,
    }).format(angka);
}

document.querySelectorAll(".rincian-biaya-button").forEach((button) => {
    button.addEventListener("click", function () {
        const sppdId = this.getAttribute("data-sppd-id");
        const kategori = this.getAttribute("data-kategori");

        fetch(`/api/outcomes/${sppdId}`)
            .then((response) => response.json())
            .then((data) => {
                // Menampilkan kategori
                document.getElementById("kategori").innerText = kategori;

                // Format total biaya sebagai Rupiah
                const totalBiaya = formatRupiah(data.total_expenditure);
                document.getElementById("totalBiaya").innerText = totalBiaya;

                // Mengosongkan daftar komponen sebelumnya
                const komponenList = document.getElementById("komponenList");
                komponenList.innerHTML = "";

                // Menambahkan setiap komponen dan biaya ke dalam daftar
                data.components.forEach((component) => {
                    const componentContainer = document.createElement("div");
                    componentContainer.className =
                        "flex justify-between items-center border-b border-gray-200 py-2";

                    // Menambahkan ikon sebelum nama komponen
                    const icon = document.createElement("span");
                    icon.className = "text-gray-600 mr-2"; // Menambahkan margin kanan
                    icon.innerHTML = '<i class="fas fa-check-circle"></i>'; // Ikon daftar

                    const componentName = document.createElement("span");
                    componentName.className =
                        "font-medium text-gray-700 flex-1"; // Flex-1 untuk mengisi ruang
                    componentName.innerText = component.komponen;

                    const biayaFormatted = formatRupiah(component.biaya);
                    const componentCost = document.createElement("span");
                    componentCost.className =
                        "font-normal text-gray-800 text-right";
                    componentCost.innerText = biayaFormatted;

                    componentContainer.appendChild(icon); // Menambahkan ikon ke container
                    componentContainer.appendChild(componentName);
                    componentContainer.appendChild(componentCost);
                    komponenList.appendChild(componentContainer);
                });

                // Menampilkan modal
                document.getElementById("modal").classList.remove("hidden");
            })
            .catch((error) => console.error("Error fetching data:", error));
    });
});

const fullscreenToggle = document.getElementById("fullscreenToggle");
const modal = document.getElementById("modal");

fullscreenToggle.addEventListener("click", function () {
    if (!document.fullscreenElement) {
        modal.requestFullscreen();
        fullscreenToggle.innerHTML = '<i class="fas fa-compress me-2"></i>';
    } else {
        document.exitFullscreen();
        fullscreenToggle.innerHTML = '<i class="fas fa-expand"></i>';
    }
});

document.getElementById("closeModal").addEventListener("click", function () {
    modal.classList.add("hidden");
    if (document.fullscreenElement) {
        document.exitFullscreen();
        fullscreenToggle.innerHTML = '<i class="fas fa-expand me-2"></i>';
    }
});

document
    .getElementById("fullscreenToggle")
    .addEventListener("click", function () {
        const modalContent = document.getElementById("modalContent");

        if (!document.fullscreenElement) {
            modalContent.requestFullscreen();
            modalContent.classList.remove("w-11/12", "md:w-1/3"); // Hapus kelas ukuran kecil
            modalContent.classList.add("w-full", "h-full"); // Tambahkan kelas ukuran penuh
        } else {
            document.exitFullscreen();
            modalContent.classList.remove("w-full", "h-full"); // Hapus kelas ukuran penuh
            modalContent.classList.add("w-11/12", "md:w-1/3"); // Tambahkan kembali kelas ukuran kecil
        }
    });

document.getElementById("closeModal").addEventListener("click", function () {
    const modalContent = document.getElementById("modalContent");
    if (document.fullscreenElement) {
        document.exitFullscreen(); // Keluar dari mode fullscreen jika sedang aktif
    }
    modalContent.classList.remove("w-full", "h-full"); // Kembalikan ukuran modal ke kecil
    modalContent.classList.add("w-11/12", "md:w-1/3"); // Tambahkan kembali kelas ukuran kecil
    document.getElementById("modal").classList.add("hidden"); // Tutup modal
});

// Tutup modal saat mengklik di luar modal
document.getElementById("modal").addEventListener("click", function (event) {
    if (event.target === this) {
        this.classList.add("hidden");
    }
});
