const thumbnailField = document.getElementById("thumbnail");
const thumbnailPreview = document.getElementById("thumbnail-preview");
const placeholder = thumbnailPreview.src;

let blobUrl = null;

thumbnailField.addEventListener("change", () => {
    if (thumbnailField.files[0]) {
        const file = thumbnailField.files[0];

        blobUrl = URL.createObjectURL(file);

        thumbnailPreview.src = blobUrl;
    } else {
        thumbnailPreview.src = placeholder;
    }
});

// on page unload remove the url object
window.addEventListener("beforeunload", () => {
    if (blobUrl) URL.revokeObjectURL(blobUrl);
});
