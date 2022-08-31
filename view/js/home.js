
let tl = gsap.timeline({defaults: {ease: "power4.inOut", duration: 2}});

tl.to('.one-left', {
    'clip-path':'polygon(0% 100%, 100% 100%, 100% 0%, 0% 0%);',
    opacity: 1,
    y: 0,
    duration: 1 
}).to('.notify-client', {
    opacity: 1,
    y: 0,
    duration: 1,
}, "-=0.8").to('.button-submit', {
    opacity: 1,
    y: 0,
    duration: 1,
}, "-=1").to('.column-one', {
    opacity: 1,
    height: '50%',
    duration: 1,
},"-=0.8").to('.column-two', {
    opacity: 1,
    height: '50%',
    duration: 1,
},"-=0.8").to('.column-three', {
    opacity: 1,
    height: '50%',
    duration: 1,
},"-=0.8").to('.column-four', {
    opacity: 1,
    height: '50%',
    duration: 1,
},"-=0.8").from('.row-three', {
    opacity: 0,
    duration: 1,
},"-=0.8");

document.querySelector('.button-submit').addEventListener('click', subscribeUserToNewsLetter);

function subscribeUserToNewsLetter() {

    let inputFieldFromHTML = document.querySelector('.notify-client');

    let emailFromInput = inputFieldFromHTML.value;

    inputFieldFromHTML.value =  "";
    console.log(emailFromInput)

    xhr = new XMLHttpRequest();
    
    xhr.open("POST", `../includes/subscribe.handler.php`, true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    let parameter = 'value=' + emailFromInput;
    
    xhr.onload  = function() {
        
        
        if(this.status == 200) {
            
            let dataBack = this.responseText;
            console.log(dataBack);

            if(dataBack == 'true') {
                // HERE IS WHEN HOME FORM IS RED INVALID

                setTimeout(restoreSubscribeFormHomePage, 2000);

               let inputField =  document.querySelector('.notify-client');
                    inputField.className = 'notify-client error';
                    inputField.placeholder = 'Insert a correct email';


                    let submitButton = document.querySelector('.button-submit');

                    submitButton.innerHTML = 'Add me';
                    submitButton.className = 'button-submit';
           
            } else {
                // HERE IS WHEN HOME FORM IS GREEN VALID

                setTimeout(restoreSubscribeFormHomePage, 2000);


                let inputField =  document.querySelector('.notify-client');
                inputField.className = 'notify-client success';
                inputField.placeholder = 'Enter email to subscribe';

                let submitButton = document.querySelector('.button-submit');

                    submitButton.innerHTML = '<i class="fa-solid fa-check"></i>';
                    submitButton.className = 'button-submit success';
            }
            
        } else {
            
            console.log("REQUEST FAILED");
        }
    }
    
    xhr.send(parameter);
}

function restoreSubscribeFormHomePage() {

    // let element = document.querySelector('.notify-client');
    //     element.className = 'notify-client';

   let tl3 = gsap.timeline({duration: 1})


   tl3.to('.notify-client', {
    duration: 1,
    className: 'notify-client'
   }).to('.button-submit', {
    duration: 1,
    className: 'button-submit'
   }, "-=1")
}