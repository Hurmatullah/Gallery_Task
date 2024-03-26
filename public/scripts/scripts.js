function showPreview(imageId) {
    var imageSrc = document.getElementById("img" + imageId).src;
    var previewImage = document.getElementById("preview-image");
    previewImage.src = imageSrc;
    document.getElementById("image-preview").style.display = "block";
}

function closePreview() {
    document.getElementById("image-preview").style.display = "none";
}

function previewOriginal(originalImageId) {
    var imageSrc = document
        .getElementById("oimg" + originalImageId)
        .getAttribute("data-src");
    var previewImage = document.getElementById("preview-originalImage");
    previewImage.src = imageSrc;
    document.getElementById("originalImage-preview").style.display = "block";
}

function closeOriginalImagePreview() {
    document.getElementById("originalImage-preview").style.display = "none";
}

function toggleDropdown() {
    var dropdown = document.getElementById("dropdown");
    dropdown.classList.toggle("hidden");
}
