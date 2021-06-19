<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend.layouts.header_links')
    @yield('page_links')
    <title>@yield('title')</title>

</head>
<body class="page-body  page-fade" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    @include('backend.layouts.left_nav')

    <div class="main-content">

        @include('backend.layouts.top_nav')

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="uk-panel-header" style="float: left; margin-left: 3%">
                            <h3>@yield('page_header')</h3>
                        </div>
                        <div class="panel-title" style="float: right; margin-right: 3%">
                            @yield('page_breadcrumb')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('page_content')
        <!-- Footer -->
        @include('backend.layouts.footer')
	</div>
</div>
    @yield('page_scripts')
    @include('backend.layouts.footer_script')
</body>
</html>
