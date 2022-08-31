
document.getElementById('payment').addEventListener('click', getValueFromSelect);


function getValueFromSelect() {
    
    let selectElement = document.getElementById('payment');
    console.log(selectElement.value);
    
    let checkoutCard = document.getElementById('checkout-form-card');
    if(selectElement.value != 'CARD')  {
        checkoutCard.innerHTML = '';
        return;
    }

        checkoutCard.innerHTML = '';

    
    let divCardWrapper = document.createElement('div');
        divCardWrapper.classList = 'card-wrapper';

    let divCardWrapper2 = document.createElement('div');
        divCardWrapper2.classList = 'card-wrapper-2';

        checkoutCard.appendChild(divCardWrapper);
        checkoutCard.appendChild(divCardWrapper2);


    let cardNumberInput = document.createElement('input');
        cardNumberInput.classList = 'card-input';
        cardNumberInput.name = 'cardNumberInput';
        cardNumberInput.placeholder = 'CARD NUMBER';

    let cardExpireDate = document.createElement('input');
    cardExpireDate.classList = 'card-input';
    cardExpireDate.name = 'cardExpireDate';
    cardExpireDate.type = 'date';
    cardExpireDate.value="2022-08-1";
    cardExpireDate.min="2022-12-1";
    cardExpireDate.max="2022-08-1";
    cardExpireDate.placeholder = 'EXPIRE DATE';

    let cardCVV = document.createElement('input');
    cardCVV.classList = 'card-input';
    cardCVV.name = 'cardCVV';
    cardCVV.type = 'password';
    cardCVV.maxLength = '3';
    cardCVV.placeholder = 'CVV';

    
    let cardName = document.createElement('input');
    cardName.classList = 'card-input';
    cardName.name = 'cardName';
    cardName.placeholder = 'OWNER NAME';


    divCardWrapper.appendChild(cardExpireDate);
    divCardWrapper.appendChild(cardCVV);
    divCardWrapper2.appendChild(cardName);
    divCardWrapper2.appendChild(cardNumberInput);
}