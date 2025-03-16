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
