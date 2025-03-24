// Slug Otomatis
const title = document.querySelector("#maksud");
const tanggal = document.querySelector("#tgl_berangkat");
const slug = document.querySelector("#slug");

title.addEventListener("change", function () {
    fetch(
        "/dashboard/posts/checkSlug?title=" + maksud.value + "-" + tanggal.value
    )
        .then((response) => response.json())
        .then((data) => (slug.value = data.slug));
});
tanggal.addEventListener("change", function () {
    fetch(
        "/dashboard/posts/checkSlug?title=" + maksud.value + "-" + tanggal.value
    )
        .then((response) => response.json())
        .then((data) => (slug.value = data.slug));
});

// Preview Pdf
function isImage(file) {
    const acceptedImageTypes = ["jpg", "jpeg", "png", "gif", "pdf"].includes(
        file.name.split(".").pop().toLowerCase()
    );
    const extension = file.name.split(".").pop().toLowerCase();
    return acceptedImageTypes.includes(extension);
}

// Preview Image
function previewImage() {
    const image = document.querySelector("#foto");
    const imgPreview = document.querySelector(".img-preview");

    imgPreview.style.display = "block";

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function (oFREvent) {
        imgPreview.src = oFREvent.target.result;
    };

    let file = document.getElementById("foto");
    let message = document.getElementById("f-details");

    file.addEventListener("input", () => {
        if (file.files.length) {
            let fileName = file.files[0].name;
            let fileSize = file.files[0].size;
            message.innerHTML =
                `${fileName}`.toLowerCase() +
                "<br>" +
                " (" +
                `${(fileSize / 1024).toFixed(1)}` +
                " kb)";
        } else {
            message.innerHTML = "Please select a file";
        }
    });
}
function printPDF(slug) {
    // Buka jendela baru
    const pdfWindow = window.open("/dashboard/pdf/" + slug);

    // Tunggu hingga jendela baru dimuat
    pdfWindow.onload = function () {
        pdfWindow.print(); // Tampilkan dialog print untuk jendela baru
    };
}

// Fitur Bendahara
function setSelectedKategori(value) {
    document.getElementById("selected_kategori_id").value = value;

    // Set the hidden input for the first component
    document.getElementsByName("inputs[0][kategori_id]")[0].value = value;

    // Enable the component select dropdown for the first row
    const firstComponentSelect = document.getElementsByName(
        "inputs[0][komponen]"
    )[0];
    firstComponentSelect.disabled = false;
    firstComponentSelect.innerHTML = '<option value="">Pilih Komponen</option>'; // Reset options

    // AJAX call to fetch components based on selected category
    fetch(`/get-components/${value}`)
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json();
        })
        .then((data) => {
            // Clear existing component inputs and biaya inputs
            document
                .querySelectorAll('input[name^="inputs"][name$="[biaya]"]')
                .forEach((input) => {
                    input.value = ""; // Reset biaya inputs
                });

            // Clear existing options in the component select dropdowns
            document
                .querySelectorAll('select[name^="inputs"][name$="[komponen]"]')
                .forEach((select) => {
                    select.innerHTML =
                        '<option value="">Pilih Komponen</option>'; // Reset options
                });

            // Populate the component select dropdown for the first row
            data.forEach((component) => {
                const option = document.createElement("option");
                option.value = component.id; // Assuming 'id' is the field in the component
                option.textContent = component.name; // Assuming 'name' is the field in the component
                firstComponentSelect.appendChild(option);
            });
        })
        .catch((error) => {
            console.error("Error fetching components:", error);
        });
}
