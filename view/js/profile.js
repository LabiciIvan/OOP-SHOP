
document.querySelector('.fa-solid.fa-boxes-packing').addEventListener('click', showOrders)
document.querySelector('.fa-solid.fa-address-card').addEventListener('click', showProfile)

function showOrders() {

    let userId = document.querySelector('.input-orders').value;

    let profileWrapper = document.querySelector('.profile-wrapper');
        profileWrapper.style.display = 'none'; 
        profileWrapper.innerHTML = ""

        let orderWrapper = document.querySelector('.orders-wrapper');
        orderWrapper.style.display = 'flex'; 

        let url = '../includes/profile.handler.php';

        let fromWhere = "orders";
        postAjaxRequest(url, userId, fromWhere);
}

function showProfile() {
    
    let userId =  document.querySelector('.input-profile').value;

    let profileWrapper = document.querySelector('.profile-wrapper');
    profileWrapper.style.display = 'flex'; 


    let orderWrapper = document.querySelector('.orders-wrapper');
    orderWrapper.style.display = 'none'; 

    orderWrapper.innerHTML = "";


    let url = '../includes/profile.handler.php';

    let fromWhere = "profile";
    postAjaxRequest(url, userId, fromWhere);
}

function postAjaxRequest(url, userId, fromWhere) {

    xhr = new XMLHttpRequest();
    
    xhr.open("POST", url, true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    
    xhr.onload  = function() {
        
        
        if(this.status == 200) {
            
            let dataBack = this.responseText;

            profileOrder(dataBack, fromWhere);
            
        } else {
            
            console.log("REQUEST FAILED");
        }
    }

    if(fromWhere == 'profile') {

        xhr.send(`userId=${userId}`);
      

    } else {

        xhr.send(`orders=${userId}`);

    }
    
}

function profileOrder(someData, fromWhere)  {


    jsonData = JSON.parse(someData);
   

    if(fromWhere ==  "profile") {
        
        createViewProfile(jsonData);

    } else if(fromWhere == "orders") {

        createViewOrders(jsonData);
    }

}

function createViewProfile(jsonData) {

    let profileWrapper = document.querySelector('.profile-wrapper');
        profileWrapper.innerHTML = "";


    let profileDiv = document.createElement('div');
        profileDiv.className = 'profile-div'
        
    let inputC = document.createElement('input');
        inputC.type = 'text';
        inputC.className = 'profile-input-country';
        inputC.placeholder = 'Country';
        inputC.value = jsonData.country;


    let inputR = document.createElement('input');
        inputR.type = 'text';
        inputR.className = 'profile-input-region';
        inputR.placeholder = 'Region';
        inputR.value = jsonData.region;


    let inputS = document.createElement('input');
        inputS.type = 'text';
        inputS.className = 'profile-input-street';
        inputS.placeholder = 'Street Name';
        inputS.value = jsonData.street;

    let inputHN = document.createElement('input');
        inputHN.type = 'text';
        inputHN.className = 'profile-input-houseNumber';
        inputHN.placeholder = 'House Number';
        inputHN.value = jsonData.houseNumber;

        
    let inputPN = document.createElement('input');
        inputPN.type = 'text';
        inputPN.className = 'profile-input-phoneNumber';
        inputPN.placeholder = 'Phone Number';
        inputPN.value = jsonData.houseNumber;

    let buttonSubmitProfile = document.createElement('button');
        buttonSubmitProfile.type = 'button';
        buttonSubmitProfile.className = 'profile-submit'
        buttonSubmitProfile.innerHTML += "Save";

    // validatedProfile = jsonData.validated;

    profileDiv.appendChild(inputC);
    profileDiv.appendChild(inputR);
    profileDiv.appendChild(inputS);
    profileDiv.appendChild(inputHN);
    profileDiv.appendChild(inputPN);
    profileDiv.append(buttonSubmitProfile);
    profileWrapper.appendChild(profileDiv);
    // profileWrapper.append(validatedProfile);

    // runOnClickProfileDiv();
}

function createViewOrders(jsonData) {

    console.log(jsonData);

    let table = `<table class="orders-table-history">
                    <tr class="orders-row-header">
                        <th>Date</th>
                        <th>Email</th>
                        <th>Products</th>
                        <th>Total Price</th>
                    </tr>
                </table>`;

    let orderWrapper = document.querySelector('.orders-wrapper');
        orderWrapper.innerHTML = "";
        orderWrapper.innerHTML += table;

    for(let i = 0; i < jsonData.length; ++i) {

        let tableHtml = document.querySelector('.orders-table-history');

        let tableHistory = `  <tr class="orders-row-data">
                                <td>${jsonData[i]['order_date']}</td>
                                <td>${jsonData[i]['user_email']}</td>
                                <td class="products-cell"><div class="products_ordered">${jsonData[i]['products']}</div><i class="fa-solid fa-box-open"></i></td>
                                <td>${jsonData[i]['products_total']} $</td>
                             </tr>`;

            tableHtml.innerHTML += tableHistory;


    }



    document.querySelectorAll('.fa-solid.fa-box-open').forEach(button => button.addEventListener('click', showProducts));
    
}


function showProducts(index) {

    let iconBox = index.target;
    let products = index.target.previousSibling;

    if(products.style.display == 'flex') {
        products.style.display = 'none';
        iconBox.style.color = 'rgb(101, 61, 138)';
        return;
    } else {
        document.querySelectorAll('.products_ordered').forEach(element =>  {
            element.style.display = 'none';
        })
        document.querySelectorAll('.fa-solid.fa-box-open').forEach(element =>  {
            element.style.color = 'rgb(101, 61, 138)';
        })
    }
    
    console.log(index.target + 'heree');
    
    
    products.style.display = "flex";
    iconBox.style.color = 'azure';
    console.log(index.target.previousSibling);
}





let tl = gsap.timeline({defaults: {ease: "power4.inOut", duration: 2}});

    tl.from('.profile-orders', {
        opacity: 0,
        y: -200,
        duration: 1 ,
    }).from('.profile-details', {
        opacity: 0,
        y: -200,
        duration: 1,
    }, "-=0.9")



// let tl2 = gsap.timeline({repeat: 100});

//     tl2.to('.fa-solid.fa-address-card', {

//         color: 'white',
//         duration: 1 ,
//     }, "+= 2").to('.fa-solid.fa-address-card', {
//         color: 'black',
//         duration: 1 ,
//     })




