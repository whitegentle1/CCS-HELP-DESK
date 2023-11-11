<div class="form-container login-container">
    <a x-on:click="show = false" class="close cursor-pointer"
        ><i class="lni lni-close"></i
    ></a>
    <form
        action="process/login.php"
        method="post"
        onsubmit="return loginUser(this);"
    >
        <h1>Login Here.</h1>
        <div
            id="error-messages"
            style="display: none"
            class="error-messages"
        ></div>
        <input
            type="email"
            placeholder="Email"
            name="email"
            id="email"
            required
        />
        <input
            type="password"
            placeholder="Password"
            name="password"
            id="password"
            required
        />
        <div class="content">
            <div class="checkbox">
                <input
                    type="checkbox"
                    name="checkbox"
                    id="rememberMeCheckbox"
                />
                <label for="rememberMeCheckbox">Remember me</label>
            </div>
            <div class="pass-link">
                <a href="#" id="forgot-pass1">Forgot password?</a>
            </div>
        </div>
        <button name="login" type="submit" id="loginForm">Login</button>
    </form>
</div>
