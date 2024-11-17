//Toggling visibility of parts of the checkout
var mobileView = window.matchMedia("(max-width: 768px)")
function toggleSection(sectionId) {
  if (mobileView.matches) {
    const section = document.getElementById(sectionId);
    section.classList.toggle('collapsed');
  }
  }

// Fucntion to toggle sections visibility
function toggleSectionVisibility(btn, section, event) {
  btn.addEventListener(event, (e) => {
    section.classList.toggle('hidden');
  });
}

// Toggling coupon form visibility
const showCouponCodeBtn = document.getElementById('show-coupon-code');
const couponCodeForm = document.getElementById('coupon-code-form');
toggleSectionVisibility(showCouponCodeBtn, couponCodeForm,'click');


// Toggling different shippinh adress fields visibility
const differentAddressBtn = document.querySelector('.different-address-label');
const shippingSection = document.querySelector('.shipping-details');
toggleSectionVisibility(differentAddressBtn,shippingSection,'change');

// Toggling creating account fields visibility
const createAccountBtn = document.querySelector('.create-account-label');
const createAccountSection = document.querySelector('.create-account-container');
toggleSectionVisibility(createAccountBtn,createAccountSection,'change');


// Toggling login modal visibility
const modalOverlay = document.querySelector('.modal-overlay');
const loginModal = document.querySelector('.login-modal');
document.querySelector('#login-btn').addEventListener('click', function () {
    modalOverlay.classList.add('show');
   loginModal.classList.add('show');
  });
  
  document.querySelector('.close-modal-btn').addEventListener('click', function () {
    modalOverlay.classList.remove('show');
   loginModal.classList.remove('show');
  });
  
  // Close the modal if clicking outside of it
  modalOverlay.addEventListener('click', function (e) {
    if (e.target === modalOverlay) {
      if(loginModal.classList.contains('show')) {
        modalOverlay.classList.remove('show');
        loginModal.classList.remove('show');
      }

    }
  });
  

// Toggling password fields visibility 
  const eyeBtns = document.querySelectorAll(".password-visibility, .password-visibility-repeat");
  eyeBtns.forEach(button => {
    button.addEventListener("click", function (e) {
        const eyeImg = e.target;
        const btn = eyeImg.previousElementSibling;
        if (btn.type === "password") {
          btn.type = "text";
          eyeImg.src = "assets/graphics/eye-show.svg";
        } else {
          btn.type = "password";
          eyeImg.src = "assets/graphics/eye-off.svg";
        }
    } );
  });


 

// Below code handles changing total price of the order, deliveries and payment methods, 
// I know some parts of this code should be validated on the backend, pozdrawiam :)
const deliveryBtns = document.querySelectorAll('input[name="delivery"]');
const paymentBtns = document.querySelectorAll('input[name="payment_method"]');
const deliveryPrice = document.getElementById('delivery-price');
const totalPrice = document.getElementById('total-price');
const totalPriceInput = document.getElementById('total-price-input');
const codeContainer = document.querySelector('.code-discount-container');

deliveryBtns.forEach(radio => {
  radio.addEventListener('change', function () {
    if (deliveryBtns[0].checked) {
      deliveryPrice.innerHTML = '10.99 zł';
    }
    if (deliveryBtns[1].checked) {
      deliveryPrice.innerHTML = '18.00 zł';
    }
    if (deliveryBtns[2].checked) {
      deliveryPrice.innerHTML = '22.00 zł';
      paymentBtns[0].parentElement.classList.add('hidden');
      paymentBtns[2].parentElement.classList.add('hidden');
      paymentBtns[1].checked = true;
    } else {
      paymentBtns[0].parentElement.classList.remove('hidden');
      paymentBtns[2].parentElement.classList.remove('hidden');
    }
    let price = parseFloat(deliveryPrice.innerHTML) + 115.00;
    if (!codeContainer.classList.contains('hidden')) {
      price -=20;
    }
    totalPrice.innerHTML = parseFloat(price).toFixed(2) + ' zł';
    totalPriceInput.value = parseFloat(price).toFixed(2);
  });
});


