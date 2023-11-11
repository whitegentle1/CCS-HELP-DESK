<div class="page-container landing-page" id="pageContainer">
    <div class="left_container">
        <div class="ccs_pic">
            <img src="{{ asset('assets/imgs/ccs.png') }}" alt="CCS-logo" />
        </div>
    </div>
    <div class="right_container">
        <div class="welcome">
            <h1>
                Welcome to the CCS HELP DESK,<br />
                CODE-HEARTED FOXES!
            </h1>
        </div>
        <button x-data x-on:click="$dispatch('open-modal')" class="get-started">
            <h2>Get Started</h2>
        </button>
    </div>
</div>
