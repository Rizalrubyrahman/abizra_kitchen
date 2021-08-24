<nav class="navbar navbar-expand-lg shadow" style="background-color: white;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/logo/logo-01.png') }}"
                alt="Abizra Kitchen" width="230" height="55"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" style="padding-left: 10px; padding-right: 10px;">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari di Abizra Kitchen"
                        aria-label="Cari di Abizra Kitchen" style="width: 330px;">
                    <button class="btn" type="submit" id="basic-addon2"
                        style="background-color: white;border-color:#ced4da;"> <i class="fas fa-search"></i></button>
                </div>
            </form>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Produk</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">FAQ</a>
                </li>
                <li class="nav-item">
                    <div style="width: 28px;"></div>
                </li>
                @if (auth()->check())
                <li>
                    <div style="width: 20px;"></div>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button type="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton1">
                            <span>{{ auth()->user()->email }}</span>
                            @if (auth()->user()->photo == NULL)
                                <img src="{{ asset('images/default.png') }}"
                                style="width: 40px;height:40px; margin-left:10px; border-radius:50%;" alt="User">
                            @else
                                @php
                                    $image = auth()->user()->photo;
                                @endphp
                                <img src="{{ asset('images/user/'.$image) }}"
                                style="width: 40px;height:40px; margin-left:10px; border-radius:50%;" alt="User">
                            @endif
                            <i class="fas fa-sort-down" id="icon" style="margin-left: 5px;"></i>
                        </button>


                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1"
                            style="margin-top: 30px; padding-right: 20px;">
                            <table>
                                <tr>
                                    <td width="80%">&nbsp;</td>
                                    <td>
                                        <div id="kotak"></div>
                                    </td>
                                    <td width="20px">&nbsp;</td>
                                </tr>
                            </table>
                            <li>
                                <table>
                                    <tr>
                                        <td valign="bottom" width="90%">
                                            <span class="dropdown-item header-dropdown">EMAIL</span>
                                        </td>
                                        <td align="right">
                                            <a class="dropdown-item" href="{{ url('profil') }}"><i class="fas fa-cog"></i></a>
                                        </td>
                                        <td width="1%">
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top">
                                            <span class="dropdown-item title-dropdown">
                                                {{ auth()->user()->email }}
                                            </span>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </li>
                            <li>
                                <tr>
                                    <td valign="bottom" width="80%">
                                        <span class="dropdown-item header-dropdown">NAMA AKUN</span>
                                    </td>
                                    <td align="right">

                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top">
                                        <span class="dropdown-item title-dropdown">
                                            {{ auth()->user()->name }}
                                        </span>
                                    </td>
                                    <td></td>
                                </tr>
                            </li>
                            <li>
                                &nbsp;
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('lacak-pesanan') }}">Lacak Pesanan</a>
                            </li>
                            <li>
                                &nbsp;
                            </li>
                            <li>
                                &nbsp;
                                <a class="dropdown-item text-center" id="logout" style="margin-left:20px; width:91%; letter-spacing: 0.1rem;" href="{{ url('logout') }}">Keluar</a>

                            </li>
                        </ul>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <div style="width: 150px;"></div>
                </li>
                <li class="nav-item">
                    <button class="btn btn-primary btn-sm"
                        style="background-color:white;border-color:#6bf07c; color:black;" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Masuk</button>
                    <a href="{{ url('register') }}" class="btn btn-sm btn-primary mr-3"
                        style="background-color:#6bf07c;border-color:#6bf07c;">Daftar</a>
                </li>
                @endif

            </ul>

        </div>
    </div>
</nav>
{{-- modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 370px; margin:auto; margin-top:100px; border:white;">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-end" style="border-bottom: none;">

                <button type="button" class="btn" style="background-color: white; border-color:white;"
                    data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between">
                    <span style="font-family: poppins_semi_bold;font-size:20px;">Masuk</span>

                    <a href="{{ url('daftar') }}" class="mt-1"
                        style="text-decoration: none;color:#54bd62;font-family:poppins;">Daftar</a>
                </div>

                <form action="{{ url('login') }}" class="needs-validation" novalidate method="post">
                    @csrf
                    <div class="form-group" style="margin-top: 50px;">
                        @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                        @endif
                        @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        <label>Username Atau Email</label>
                        <input type="text" name="username" required class="form-control">
                        <div class="invalid-feedback">
                            Username atau Email tidak boleh kosong
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label>Password</label>

                        <input type="password" autocomplete="off" name="password" class="form-control" required
                            id="password">
                        <div class="invalid-feedback">
                            Password tidak boleh kosong
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" onclick="showPassword(this)"
                                id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Tampilkan Password
                            </label>
                        </div>

                    </div>
                    <div class="form-group" style="margin-top: 50px;">
                        <button class="btn btn-success" type="submit"
                            style="width: 100%;">Masuk</button>
                    </div>
                </form>
            </div>

            <div class="modal-footer" style="border-top: none;">

            </div>
        </div>
    </div>
</div>
