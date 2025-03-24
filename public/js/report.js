document.getElementById("add-component").addEventListener("click", function () {
    const table = document.getElementById("table");
    const newRow = table.insertRow(); // Tambahkan baris baru di akhir
    // Ambil kategori yang dipilih
    const kategoriId = document.getElementById("kategori_id").value;

    newRow.innerHTML = `
        <td class="pe-3">
            <select name="inputs[new][komponen]"
                class="komponen-select mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                <option value=""></option>
                <!-- Opsi akan diisi oleh JavaScript setelah kategori dipilih -->
            </select>
            <input type="hidden" name="inputs[new][kategori_id]" value="${kategoriId}">
        </td>
        <td class="pe-3">
            <input type="text" name="inputs[new][biaya]"
                placeholder="Masukkan Biaya"
                class="biaya-input mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
        </td>
        <td>
            <button type="button" class="remove-table-row rounded-md bg-red-600 hover:bg-red-700 px-3 py-2 text-sm font-semibold text-white shadow-sm">Hapus</button>
        </td>
    `;

    // Mengisi dropdown komponen berdasarkan kategori yang dipilih
    fetch(`/get-components/${kategoriId}`)
        .then((response) => response.json())
        .then((data) => {
            const komponenSelect = newRow.querySelector("select");
            komponenSelect.innerHTML = ""; // Kosongkan pilihan sebelumnya

            data.forEach((component) => {
                const option = document.createElement("option");
                option.value = component.name;
                option.textContent = component.name; // Pastikan ini sesuai dengan field yang ada di database
                komponenSelect.appendChild(option);
            });

            // Tambahkan event listener untuk dropdown komponen
            komponenSelect.addEventListener("change", handleComponentChange);
        })
        .catch((error) => console.error("Error fetching components:", error));
});

// Fungsi untuk menangani perubahan pada dropdown komponen
const handleComponentChange = async (event) => {
    const componentId = event.target.value; // Ambil ID dari pilihan
    const biaya = await getBiaya(componentId);

    // Temukan input biaya di baris yang sama dengan dropdown
    const biayaInput = event.target.closest("tr").querySelector(".biaya-input");
    biayaInput.value = biaya; // Perbarui input biaya
};

// Fungsi untuk mendapatkan biaya berdasarkan ID komponen
const getBiaya = async (componentId) => {
    try {
        const response = await fetch(`/get-biaya/${componentId}`);
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        const data = await response.json();
        return data.biaya; // Pastikan ini sesuai dengan field yang ada di respons
    } catch (error) {
        console.error("Error fetching biaya:", error);
        return 0; // Kembalikan 0 atau nilai default jika terjadi kesalahan
    }
};

// Event listener untuk menghapus baris
document.getElementById("table").addEventListener("click", function (e) {
    if (e.target.classList.contains("remove-table-row")) {
        const row = e.target.closest("tr");
        row.parentNode.removeChild(row);
    }
});

// Event listener untuk mengubah kategori
// Event listener untuk mengubah kategori
document.getElementById("kategori_id").addEventListener("change", function () {
    const kategoriId = this.value;

    // Update semua input tersembunyi kategori di dalam tabel
    const hiddenInputs = document.querySelectorAll(
        'input[name^="inputs"][name$="[kategori_id]"]'
    );
    hiddenInputs.forEach((input) => {
        input.value = kategoriId; // Set nilai input tersembunyi sesuai kategori yang dipilih
    });

    // Lakukan permintaan AJAX untuk mendapatkan komponen berdasarkan kategori
    fetch(`/get-components/${kategoriId}`)
        .then((response) => response.json())
        .then((data) => {
            // Update semua dropdown komponen di tabel
            const komponenSelects =
                document.querySelectorAll(".komponen-select");
            komponenSelects.forEach((select) => {
                select.innerHTML = ""; // Kosongkan pilihan sebelumnya

                // Tambahkan opsi baru berdasarkan data yang diterima
                data.forEach((component) => {
                    const option = document.createElement("option");
                    option.value = component.name;
                    option.textContent = component.name; // Pastikan ini sesuai dengan field yang ada di database
                    select.appendChild(option);
                });
            });
        })
        .catch((error) => console.error("Error fetching components:", error));
});

// Alert Hapus
document.querySelectorAll(".remove-table-row").forEach((button) => {
    button.addEventListener("click", function () {
        const row = this.closest("tr"); // Get the closest row
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                row.remove(); // Remove the row from the table
                Swal.fire("Deleted!", "Your file has been deleted.", "success");
            }
        });
    });
});
