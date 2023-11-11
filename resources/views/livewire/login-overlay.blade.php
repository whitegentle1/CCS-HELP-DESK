<!-- Register popup -->
<div
    class="popup_body"
    x-data="{ show : false}"
    x-show="show"
    x-on:open-modal.window="show = true"
    x-on:close-modal.window="show = false"
    x-on:keydown.escape.window="show = false"
>
    <div class="container" id="container">
        @livewire('register')
        <!-- Login container popup -->
        @livewire('login')
        <!-- Overlay Container -->
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="title">Hello</h1>
                    <h2 class="title">Code-Hearted Foxes!</h2>
                    <p>if you have an account, log in here.</p>
                    <button class="ghost" id="login">
                        Login
                        <i class="lni lni-arrow-left login"></i>
                    </button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="title">Hello</h1>
                    <h2 class="title">Code-Hearted Foxes!</h2>
                    <p>if you don't have an account yet, register here.</p>
                    <button class="ghost" id="register">
                        Register
                        <i class="lni lni-arrow-right register"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const registerButton = document.getElementById("register");
    const loginButton = document.getElementById("login");
    const container = document.getElementById("container");

    registerButton.addEventListener("click", () => {
        container.classList.add("right-panel-active");
    });

    loginButton.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
    });
</script>
