<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#33b5e5">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">




    <link rel="stylesheet" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/dist/mdb5/standard/core.min.css">


    <link rel='stylesheet' id='roboto-subset.css-css' href='https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/mdb5/fonts/roboto-subset.css?ver=3.9.0-update.5' type='text/css' media='all' />


    <meta charset="utf-8">
    <title>Bootstrap Login Form - free examples, templates &amp; tutorial</title>

    <meta name="description" content="Responsive login form built with Bootstrap 5. Collection of examples for signup forms, full page login templates, login modals &amp; many other sign in designs.">
    <meta name="image" content="https://mdbcdn.b-cdn.net/docs/standard/extended/login/assets/featured.jpg">

    <meta itemprop="name" content="Bootstrap Login Form - free examples, templates &amp; tutorial">
    <meta itemprop="description" content="Responsive login form built with Bootstrap 5. Collection of examples for signup forms, full page login templates, login modals &amp; many other sign in designs.">
    <meta itemprop="image" content="https://mdbcdn.b-cdn.net/docs/standard/extended/login/assets/featured.jpg">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Bootstrap Login Form - free examples, templates &amp; tutorial">
    <meta property="twitter:description" content="Responsive login form built with Bootstrap 5. Collection of examples for signup forms, full page login templates, login modals &amp; many other sign in designs.">
    <meta property="twitter:site" content="@MDBootstrap">
    <meta property="twitter:creator" content="@MDBootstrap">
    <meta property="twitter:image:src" content="https://mdbcdn.b-cdn.net/docs/standard/extended/login/assets/featured.jpg">
    <meta property="twitter:player" content="https://www.youtube.com/watch?v=rQryOSyfXmI">

    <meta property="og:title" content="Bootstrap Login Form - free examples, templates &amp; tutorial">
    <meta property="og:description" content="Responsive login form built with Bootstrap 5. Collection of examples for signup forms, full page login templates, login modals &amp; many other sign in designs.">
    <meta property="og:image" content="https://mdbcdn.b-cdn.net/docs/standard/extended/login/assets/featured.jpg">
    <meta property="og:url" content="https://mdbootstrap.com/docs/standard/extended/login/">
    <meta property="og:site_name" content="MDB - Material Design for Bootstrap">
    <meta property="og:locale" content="en_US">
    <meta property="og:video" content="https://www.youtube.com/watch?v=rQryOSyfXmI">
    <meta property="fb:admins" content="443467622524287">
    <meta property="og:type" content="website">

    <link rel="shortcut icon" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/favicon.ico" />

    <link rel="canonical" href="https://mdbootstrap.com/docs/standard/extended/login/" />
    <script>
        window.dataLayer = window.dataLayer || [];
    </script>


    <script data-cfasync="false">
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '//www.googletagmanager.com/gtm.' + 'js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-W7MBMN');
    </script>



    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "MDBootstrap",
                "item": "https://mdbootstrap.com/",
                "image": "https://mdbcdn.b-cdn.net/img/Marketing/mdb-press-pack/mdb-main.webp"
            }, {
                "@type": "ListItem",
                "position": 2,
                "name": "Standard",
                "item": "https://mdbootstrap.com/docs/standard/",
                "image": "https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/content/en/_mdb5/standard/about/assets/mdb5-about.webp"
            }, {
                "@type": "ListItem",
                "position": 3,
                "name": "Login form",
                "item": "https://mdbootstrap.com/docs/standard/extended/login/",
                "image": "https://mdbcdn.b-cdn.net/docs/standard/extended/login/assets/featured.jpg"
            }]
        }
    </script>

    <style>
        #navbarNotification::after {
            content: none !important;
        }


        #main-navbar .badge {
            position: absolute;
            font-size: .6rem;
            margin-top: -.1rem;
            margin-left: -.5rem;
            padding: .2em .45em;
        }


        #main-navbar .nav-link {
            font-size: 1rem !important;
            font-weight: 400;
        }
    </style>
    <style>
        [data-mdb-theme="dark"] .docs-pills .btn-copy-code,
        .docs-tab-content .export-to-snippet {
            color: #E5E7EB !important;
        }

        .docs-pills {
            border-radius: 0.5rem;
        }

        .docs-pills pre[class*="language-"] {
            border-bottom-right-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }

        .docs-pills .btn-copy-code,
        .docs-tab-content .export-to-snippet {
            position: absolute;
            top: 16px;
            right: 16px;
            box-shadow: none !important;
            color: #616161 !important;
            background-color: transparent !important;
            padding: 6px 15px !important;
        }
    </style>
    <style>
        @media (max-width: 576px) {

            [id^=dpl-],
            [class^=dpl-],
            .mobile-hidden {
                display: none !important;
            }
        }
    </style>



    <style>
        .mdb-skin-custom {
            transition-duration: .5s;
            transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, -webkit-text-decoration-color;
            transition-timing-function: cubic-bezier(.4, 0, .2, 1);
        }
    </style>

    <style>
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9068607355646785" crossorigin="anonymous"></script>
    <script>
        const pagesExcludedFromDarkTheme = [
            "docs/angular",
            "docs/b4/angular",
            "docs/react",
            "docs/b4/react",
            "docs/vue",
            "docs/b4/vue",
            "/docs/standard/pro/demo/",
            "/learn",
            "/docs/standard/pro/enterprise",
            "/cart",
            "/docs/standard/tools/",
            "/user",
            "/blog",
            "/services",
            "/bootstrap-6",
            "/bootstrap-6-release-date/",
            "/general/mdb-edu/"
        ]
        const isPageExcludedFromDarkTheme = () => {
            const currentPage = window.location.pathname
            return pagesExcludedFromDarkTheme.some(page => currentPage.indexOf(page) !== -1);
        }
        const isPageShouldUseDarkTheme = !isPageExcludedFromDarkTheme();
        const isDarkThemeSetInLocalStorageOrPreferColorScheme =
            localStorage.theme === "dark" ||
            (!("theme" in localStorage) &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)

        try {
            if (isPageShouldUseDarkTheme && isDarkThemeSetInLocalStorageOrPreferColorScheme) {
                document.documentElement.dataset.mdbTheme = "dark";
                document
                    .querySelector('meta[name="theme-color"]')
                    .setAttribute("content", "#0B1120");
            } else {
                delete document.documentElement.dataset.mdbTheme;
            }
        } catch (_) {}
    </script>
    <style>
        /* Gaya untuk input saat autofill */
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 30px white inset;
            /* Ganti 'white' dengan warna latar belakang yang diinginkan */
            box-shadow: 0 0 0 30px white inset;
            /* Ganti 'white' dengan warna latar belakang yang diinginkan */
            -webkit-text-fill-color: black;
            /* Ganti 'black' dengan warna teks yang diinginkan */
        }

        /* Gaya untuk input saat autofill di Firefox */
        input:-moz-autofill {
            box-shadow: 0 0 0 30px white inset;
            /* Ganti 'white' dengan warna latar belakang yang diinginkan */
            -moz-text-fill-color: black;
            /* Ganti 'black' dengan warna teks yang diinginkan */
        }
    </style>

</head>

<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1" style="color: white;">We are The Lotus Team</h4>
                                </div>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <p style="color: white;">Please login to your account</p>

                                    <!-- Email Address -->
                                    <div>
                                        <x-input-label class="mb-1" style="color: white;" for="email" :value="__('Email')" />
                                        <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm form-control" style="color: black;" placeholder="Email address" id="email" type="email" name="email" required="required" autofocus="autofocus" autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- Password -->
                                    <div class="mt-4">
                                        <x-input-label style="color: white;" class="mb-1" for="password" :value="__('Password')" />
                                        <x-text-input type="password" class="form-control" id="password" name="password" required autocomplete="current-password" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <!-- Remember Me -->
                                    <x-primary-button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mt-3">
                                        {{ __('Log in') }}
                                    </x-primary-button>
                                    <div class="block mt-4">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                            <span style="color: white;" class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <p>Don't have account?<a href="{{ url('/register') }}"> Register</a></p>
                                        <a class="btn btn-danger" href="{{ url('/') }}">Cancel</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">We are more than just a company</h4>
                                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var inputs = document.querySelectorAll('input');
        inputs.forEach(function(input) {
            input.addEventListener('animationstart', function() {
                // Atur gaya saat autofill
                input.style.backgroundColor = 'white';
                input.style.color = 'black';
            });
        });
    });
</script>