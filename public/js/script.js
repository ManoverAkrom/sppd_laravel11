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
