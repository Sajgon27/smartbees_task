<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szymon Mudrak Checkout Form</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

<!--  IGNORE IGNORE IGNORE IGNORE IGNORE IGNORE  -->
<div style="width:100%; text-align:center;">
 <h1 style="font-size:2.2rem;">SZYMON MUDRAK</h1>
 <h2>Zadanie rekrutacyjne</h2>
</div>
<!--  IGNORE IGNORE IGNORE IGNORE IGNORE IGNORE  -->

    <form id="checkoutForm" name="checkoutForm" action="index.php" method="POST" class="checkout-form columns">

        <!-- Section 1 -->
        <div class="columns__column columns__column--1-3">
            <div class="section" id="section1">
                <div class="section-header" onclick="toggleSection('section1')">
                    <img src="assets/graphics/user-icon.svg" alt="User icon" width="20" height="20">
                    <h2>1. Twoje Dane</h2>
                </div>
                <div class="section-content">
                    <button type="button" id="login-btn" class="button button--outlined">Logowanie</button>
                    <label class="create-account-label"><input type="checkbox"> Stwórz nowe konto</label>
                    <input type="email" name="email" placeholder="Adres email">
                    <div class="create-account-container hidden">
                        <div class="password-field-container">
                            <input type="password" name="password" placeholder="Hasło">
                            <img class="password-visibility" src="assets/graphics/eye-off.svg">
                        </div>

                        <div class="password-field-container">
                            <input type="password" name="confirm-password" placeholder="Potwierdź hasło">
                            <img class="password-visibility-repeat" src="assets/graphics/eye-off.svg">
                        </div>
                    </div>

                    <input type="text" name="name" placeholder="Imię">
                    <input type="text" name="surname" placeholder="Nazwisko">
                    <input type="text" name="billing_country" placeholder="Państwo">
                    <input type="text" name="billing_address" placeholder="Adres">
                    <input type="text" name="billing_postal_code" placeholder="Kod pocztowy">
                    <input type="text" name="billing_city" placeholder="Miasto">
                    <input type="text" name="phone_number" placeholder="Telefon">
                    <label class="checkbox-label different-address-label"><input type="checkbox"> Dostawa pod inny adres</label>
                    <div class="shipping-details hidden">
                        <input type="text" name="shipping_country" placeholder="Polska">
                        <input type="text" name="shipping_address" placeholder="Adres">
                        <input type="text" name="shipping_postal_code" placeholder="Kod pocztowy">
                        <input type="text" name="shipping_city" placeholder="Miasto">
                    </div>
                </div>
            </div>
        </div>

        <div class="columns__column columns__column--1-3">
            <!-- Section 2  -->
            <div class="section" id="section2">
                <div class="section-header" onclick="toggleSection('section2')">
                    <img src="assets/graphics/delivery-icon.svg" alt="Delievery icon" width="20" height="20">
                    <h2>2. Metoda Dostawy</h2>
                </div>
                <div class="section-content">
                    <label class="radio">
                        <input type="radio" name="delivery" value="1" checked>
                        <span class="radio-custom"></span>
                        <img class="checkout-img" src="assets/graphics/inpost-logo.png" alt="Inpost logo">
                        Paczkomaty 24/7 (10,99 zł)
                    </label>
                    <label class="radio">
                        <input type="radio" name="delivery" value="2">
                        <span class="radio-custom"></span>
                        <img class="checkout-img" src="assets/graphics/dpd-logo.png" alt="Dpd logo">
                        Kurier DPD (18,00 zł)
                    </label>
                    <label class="radio">
                        <input type="radio" name="delivery" value="3">
                        <span class="radio-custom"></span>
                        <img class="checkout-img" src="assets/graphics/dpd-logo.png" alt="Dpd logo">
                        Kurier DPD pobranie (22,00 zł)
                    </label>
                </div>
            </div>



            <!-- Section 3  -->
            <div class="section" id="section3">
                <div class="section-header" onclick="toggleSection('section3')">
                    <img src="assets/graphics/credit-card-icon.svg" alt="Credit card icon" width="20" height="20">
                    <h2>3. Metoda Płatności</h2>
                </div>
                <div class="section-content">
                    <label class="radio">
                        <input type="radio" name="payment_method" value="PayU" checked>
                        <span class="radio-custom"></span>
                        <img class="checkout-img" src="assets/graphics/payu-logo.png" alt="Payu logo" height="30">
                        PayU
                    </label>
                    <label class="radio">
                        <input type="radio" name="payment_method" value="Płatność przy odbiorze">
                        <span class="radio-custom"></span>
                        <img class="checkout-img" src="assets/graphics/wallet-icon.svg" alt="Wallet icon" height="30">
                        Płatność przy odbiorze
                    </label>
                    <label class="radio">
                        <input type="radio" name="payment_method" value="Przelew bankowy - zwykły">
                        <span class="radio-custom"></span>
                        <img class="checkout-img" src="assets/graphics/bank-transfer-icon.svg" alt="Bank transfer icon" height="30">
                        Przelew bankowy - zwykły
                    </label>
                    <button type="button" id="show-coupon-code" class="button button--outlined button--grey">Dodaj kod rabatowy</button>
                    <div id="coupon-code-form" class="columns columns--gap-15 columns--mt-15 hidden">
                        <input class="columns__column columns__column--2-3" name="coupon-code" type="text" placeholder="Wpisz kod rabatowy" />
                        <button type="button" id="add-coupon-btn" class="columns__column columns__column--1-3 button button--primary ">Dodaj kod</button>
                        <span id="coupon-msg" class="msg"></span>
                    </div>

                </div>
            </div>
        </div>
        </div>

        <div class="columns__column columns__column--1-3">
            <!-- Section 4  -->
            <div class="section" id="section4">
                <div class="section-header" onclick="toggleSection('section4')">
                    <img src="assets/graphics/checkout-icon.svg" alt="Checkout icon" width="20" height="20">
                    <h2>4. Podsumowanie</h2>
                </div>
                <div class="section-content">
                    <div class="columns">
                        <div class="columns__column columns__column--2-8">
                            <img class="product-thumbnail" src="assets/graphics/pilka.jpeg" alt="Piłka do piłki nożnej Jabulani">
                        </div>
                        <div class="columns__column columns__column--4-8 columns__column--space-between">
                            <p class="product-title"><strong>Piłka Jabulani</strong></p>
                            <p class="product-title">Ilość: 1</p>
                        </div>
                        <div class="columns__column columns__column--2-8 columns__column--align-end">
                            <strong>115.00 zł</strong>
                        </div>
                    </div>
                    <hr class="hr--dotted">
                    <div>

                        <div class="price price--part">
                            <span>Suma częściowa</span>
                            <span>115.00 zł</span>
                        </div>

                        <div class="price price--part">
                            <span>Wysyłka</span>
                            <span id="delivery-price">10.99 zł</span>
                        </div>

                        <div class="price price--part code-discount-container hidden">
                            <span>Kod rabatowy</span>
                            <span id="code-discount"></span>
                        </div>

                        <div class="price price--total">
                            <span>Łącznie</span>
                            <span id="total-price">125.99 zł</span>
                            <input type="hidden" id="total-price-input" name="total_amount" value="125.99">
                        </div>

                    </div>
                    <hr class="hr--dotted">

                    <textarea name="client_note" rows="5" placeholder="Komentarz"></textarea>
                    <label><input name="newsletter" type="checkbox"> Zapisz się, aby otrzymywać newsletter</label>
                    <label><input type="checkbox" name="terms-conditions" value="1"> Zapoznałem/am się z Regulaminem zakupów</label>

                    <button type="submit" name="submit" class="button button--primary button--large">Potwierdź Zakup</button>
                    <p id="form-error-msg" class="error-msg"></p>
                </div>
            </div>
        </div>

    </form>


    <div class="modal-overlay"></div>

    <div class="modal login-modal">
        <button class="close-modal-btn">&times;</button>
        <h2>Zaloguj się</h2>
        <form class="login-form">
            <label for="username">Nazwa użytkownika</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Hasło</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="button button--primary button--large">Zaloguj się</button>
        </form>
    </div>

    <div class="modal order-notice-modal">
        <h2 class="text-center">Twoje zamówienie nr #<span class="order-number"></span> powiodło się</h2>
        <a href="/" class="button button--primary button--large text-center">Odśwież stronę</a>
    </div>

    <!--  IGNORE IGNORE IGNORE IGNORE IGNORE IGNORE  -->
<div style="width:100%; text-align:center;">
 <h1 style="font-size:30px;">READE ME</h1>
 <p style="width:50%; margin:auto;">Dzień dobry, z racji chwilowej niekomfortowej sytuacji i dużej ilości rzeczy prywatnych na głowie przez ostatni tydzień nie miałem za dużo czasu na przyjemności i pisanie kodu
    , lecz i tak chciałem podjąć się zadania, gdyż bardzo zależy mi na otrzymaniu pracy. Wprowadziłem większość funkcjonalności opisanych przez Państwa w opisie zadania.
    Jestem świadomy, że wiele rzeczy w tym mini projekcie mogłoby być zrobione lepiej, lecz chciałem się zmieścić w terminie i przesłać zadanie dzisiaj.
    Mam już obecnie większą swobodę działania i więcej czasu na pisanie i naukę, więc jeśli chcieliby Państwo jeszcze się upewnić co do moich umiejętności to z miłą chęcią rozszerzę i dopracuję to zadanie w tym tygodniu.
    <br>
    <br>
    Aktywny kod rabatowy: aktywny-kod
    <br>
    <br>
    Link do bazy danych: w Readme na Githubie
    <br>
    <br>
    Login: hosting2verweb_checkout
    <br>
    <br>
    Hasło: h4Ph-Ocx8y-+xVYj
    <br>
    <br>

 </p>
</div>
<!--  IGNORE IGNORE IGNORE IGNORE IGNORE IGNORE  -->

    <script type="text/javascript" src="assets/js/main.js"></script>
    <script type="text/javascript" src="assets/js/ajax.js"></script>
</body>

</html>