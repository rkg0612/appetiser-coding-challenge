<!doctype html>
<html lang="en">
    <head>
        <title>Coding Challenge</title>
        <link rel="shortcut icon" href="{{asset('media/favicons/favicon.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('media/favicons/favicon-192x192.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('media/favicons/apple-touch-icon-180x180.png')}}">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{asset('css/dashmix.css')}}">
    </head>
    <body>
        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-fixed page-header-dark page-footer-fixed main-content-narrow">
            <nav id="sidebar" aria-label="Main Navigation">
                <div class="bg-header-dark">
                    <div class="content-header bg-white-10">
                        <a class="link-fx font-w600 font-size-lg text-white" href="{{ route('home') }}">
                            <span class="smini-visible">
                                <span class="text-white-75">Coding</span><span class="text-white"> Challenge</span>
                            </span>
                            <span class="smini-hidden">
                                <span class="text-white-75">Coding</span><span class="text-white"> Challenge</span>
                            </span>
                        </a>
                        <div>
                            <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                                <i class="fa fa-times-circle"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li class="nav-main-heading">Navigation</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('home') }}">
                                <i class="nav-main-link-icon fa fa-home"></i>
                                <span class="nav-main-link-name">Home</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <header id="page-header">
                <div class="content-header">
                    <div>
                        <button type="button" class="btn btn-dual mr-1" data-toggle="layout" data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>
                    <div>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-user d-sm-none"></i>
                            <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                                <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                                    User Options
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <main id="main-container">
                <div class="content" id="app">
                    <event-component></event-component>
                </div>
            </main>
        </div>
        <script src="{{asset('js/dashmix.core.min.js')}}"></script>
        <script src="{{asset('js/dashmix.app.min.js')}}"></script>
        <script src="{{asset('js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
        <script>
            function dashmixAjxNotify(type, message)
            {
                switch (type)
                {
                    case 'success':
                        Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-check mr-1', message: message});
                    break;
                    case 'info':
                        Dashmix.helpers('notify', {type: 'info', icon: 'fa fa-info-circle mr-1', message: message});
                    break;
                    case 'error':
                        Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: message});
                    break;
                    case 'warning':
                        Dashmix.helpers('notify', {type: 'warning', icon: 'fa fa-exclamation mr-1', message: message});
                    break;
                }
            }
        </script>
        <script src="{{ asset('js/blockUI.js') }}"></script>
        <script src="{{ asset('js/other.js') }}"></script>
        <script src="{{ mix('/js/app.js') }}" defer></script>
    </body>
</html>