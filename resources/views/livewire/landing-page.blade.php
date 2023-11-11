<div>
    <div class="inv_container">
        <div class="head_container" id="head_container">
            <div class="c_pic">
                <a wire:click="home" class="cursor-pointer">
                    <img
                        src="{{ asset('assets/imgs/dv.png') }}"
                        alt="dabsu-logo"
                    />
                </a>
            </div>
            <header>
                <h1>DHVSU CCS HELP DESK</h1>
            </header>
            <h2>College of Computing Studies</h2>
        </div>
    </div>
    @livewire('body-nav') @livewire('login-overlay')
</div>
