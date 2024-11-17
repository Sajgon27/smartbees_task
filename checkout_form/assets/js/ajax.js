document.addEventListener("DOMContentLoaded", function() {

    // Submiting order via AJAX
    const checkoutForm = document.getElementById("checkoutForm");
    const orderNumberElement = document.querySelector('.order-number');
    checkoutForm.addEventListener("submit", function(e) {
        e.preventDefault(); 
        if (!checkoutForm) {
            console.error("Form not found!");
        }
        console.log('ee');
        // Data from the form
        const formData = new FormData(checkoutForm);
    
        fetch("index.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.json(); 
        })
        .then(data => {
            // Removes error border from previous error
            const previousError = document.querySelector('.error-border');
            if(previousError) {
                previousError.classList.remove('error-border');
            }            
            if(data.status == 'success') {

                // Shows order confirmation modal
                orderNumberElement.innerHTML = data.order.order_number;
                document.querySelector('.modal-overlay').classList.add('show');
                document.querySelector('.order-notice-modal').classList.add('show');
            } else {
                document.querySelector("[name='" + Object.keys(data)[0] + "']").classList.add('error-border');
                document.querySelector('#form-error-msg').innerHTML = Object.values(data)[0];
            }
           
        })
        .catch(error => {
            console.error("Errore:", error);
        });
    });

    // Adding coupon functionality
    document.getElementById("add-coupon-btn").addEventListener("click", function(e) {
        e.preventDefault();
        const code = document.querySelector("input[name='coupon-code']").value;

        // Simulate a form submission for the inner "form"
        fetch("index.php", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
              },
            body:  JSON.stringify({
				code: code
			})
        })
        .then(response => {
            if (!response.ok) throw new Error("Network error");
            return response.json(); 
        })
        .then(data => {
            // Here I handle price changes
            // I know some parts of this code should be validated on the backend, pozdrawiam :)
            const totalPrice = document.getElementById('total-price');
            const totalPriceInput = document.getElementById('total-price-input');
            const codeContainer = document.querySelector('.code-discount-container');
            const codeDiscountDisplay = document.querySelector('#code-discount');
            console.log(data);
            if (codeContainer.classList.contains('hidden') && data.success ) {
                totalPrice.innerHTML = (parseFloat(totalPrice.innerHTML) - parseFloat(data.coupon.discount_amount)) + " zł";
                totalPriceInput.value = parseFloat(totalPrice.innerHTML).toFixed(2);
                codeContainer.classList.remove('hidden');
            }
            
            if (data.success) {
                codeDiscountDisplay.innerHTML = parseFloat(data.coupon.discount_amount) + " zł";
            }
         
            const msg = document.getElementById('coupon-msg');
            msg.innerHTML = data.message;
        
            if(data.success) {
                msg.classList.add('success-msg');
            } else {
                msg.classList.add('error-msg');
            }  
        })
        .catch(error => console.error("Error submitting inner form:", error));
    });
});
