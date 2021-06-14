<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Navigation</li>
                <li>
                    <a href="{{ route('admin.main.index') }}" class="@yield('active-main')">
                        <i class="metismenu-icon pe-7s-graph2"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.news.index') }}" class="@yield('active-news')">
                        <i class="metismenu-icon pe-7s-paper-plane"></i>
                        News
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.logs.index') }}" class="@yield('active-logs')">
                        <i class="metismenu-icon pe-7s-note2"></i>
                        Logs
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.settings.index') }}" class="@yield('active-settings')">
                        <i class="metismenu-icon pe-7s-settings"></i>
                        Settings
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div> 