<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{  asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{  asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{  asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<script src="{{  asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{  asset('assets/js/widgets.bundle.js')}}"></script>
<script src="{{  asset('assets/js/custom/widgets.js')}}"></script>
<script src="{{  asset('assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{  asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>

@jquery
@toastr_js
@toastr_render
@yield('script')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>

   $(document).ready( function () {
       $('#datatable').DataTable();
       
        $("a[href='" + window.location.href + "']").addClass('active');
        $("a[href='" + window.location.href + "']").parents(':eq(1)').addClass('show');
        $("a[href='" + window.location.href + "']").parents(':eq(2)').addClass('hover show');

   });
   

   const checkbox = document.getElementById('kt_user_menu_dark_mode_toggle')
    var locale = document.getElementsByTagName("html")[0].getAttribute("lang");

    checkbox.addEventListener('change', (event) => {

        if (event.currentTarget.checked) {
            localStorage.setItem("dark-mode", "set");
            if(locale == 'en')
                addLinkStyleElement('/assets/css/style.dark.bundle.ltr.css');
            else
                addLinkStyleElement('/assets/css/style.dark.bundle.rtl.css');

        } else {
            localStorage.removeItem("dark-mode");
            if(locale == 'en')
                addLinkStyleElement('/assets/css/style.bundle.css');
            else
                addLinkStyleElement('/assets/css/style.bundle.rtl.css');
      }

    });

    function isDark() {
      return localStorage.getItem("dark-mode");
    }
    function addLinkStyleElement(href){
        var link = document.createElement('link');
        link.type   = 'text/css';
        link.rel    = 'stylesheet';
        link.href   = href;
        document.head.appendChild(link);
    }

    if(isDark()){
        checkbox.checked  = true;
        if(locale == 'en')
            addLinkStyleElement('/assets/css/style.dark.bundle.ltr.css');
        else
            addLinkStyleElement('/assets/css/style.dark.bundle.rtl.css');
    }


 </script>
<!--end::Page Custom Javascript-->

