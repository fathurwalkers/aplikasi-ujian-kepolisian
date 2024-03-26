<div>
    <nav class="navbar navbar-dark bg-primary shadow mb-5 fixed-top" style="height:85px;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets') }}/logo-trc.jpeg" width="45" height="45"
                    class="d-inline-block align-top" alt="" />
                <h6 style=" font: size 15px; display: inline;">TRC BAUBAU</h6>
            </a>
            <span class="navbar-text" style="margin-left: auto; font-size: 12px;">
                Hai, {{ $users->login_nama }} &nbsp;
            </span>
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-item" href="#">
                        {{-- <img class="rounded-circle shadow" style="width: 2rem; margin-left: 5px;" src="{{ asset('login-assets') }}/images/gifar.jpg" alt=""> --}}
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
