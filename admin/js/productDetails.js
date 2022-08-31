// document.getElementById('trash').addEventListener('click', executeDeleteImage);
document.querySelectorAll('#trash').forEach(trash => trash.addEventListener('click', executeDeleteImage));
document.querySelectorAll('#trash').forEach(trash => trash.addEventListener('mouseover', visibleTrashOnMOuse));

document.querySelectorAll('.product-image').forEach(image => image.addEventListener('mouseover', visibleTrash));
document.querySelectorAll('.product-image').forEach(image => image.addEventListener('mouseout', inVisibleTrash));

function executeDeleteImage(index) {
    
    let trash = index.target;

    let input = trash.querySelector('#imageId');
    let imageId = input.value;
    
    let inputPath = trash.querySelector('#imagePath');
    let path = inputPath.value;

    let productInput = trash.querySelector('#productId');
    let productId = productInput.value;
    if(path.includes("THUMBNAIL")) {

        console.log('THUMBNAIL image');
        return;
    }

    // console.log(imageId); 
    // console.log(path); 

    // AJAX REQUEST TO DELETE AN IMAGE
    xhr = new XMLHttpRequest();

    xhr.open("GET", `../includes/product.handler.php?deleteImage=${imageId}&deleteProduct=${productId}`, true);
    xhr.send();

    xhr.onreadystatechange  = function() {


        if(this.readyState == 4 &&  this.status == 200) {

            location.reload();
        } else {
            
            console.log("REQUEST FAILED");
        }
    }

    // console.log(xhr);
}

function visibleTrash(index) {

    let imageElemente = index.target;

    let trashIcon = imageElemente.nextElementSibling;
    trashIcon.style.opacity = '1';
}

function inVisibleTrash(index) {

    let imageElemente = index.target;

    let trashIcon = imageElemente.nextElementSibling;
    trashIcon.style.opacity =  '0';
}

function visibleTrashOnMOuse(index) {

    let trash = index.target;
    trash.style.opacity = '1';
}