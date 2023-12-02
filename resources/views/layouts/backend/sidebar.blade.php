<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Aside Toolbarl-->
    <div class="aside-toolbar flex-column-auto" id="kt_aside_toolbar">
        <!--begin::Aside user-->
        <!--begin::User-->
        <div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
            <!--begin::Symbol-->
            @if (auth('admin')->check())

            <div class="symbol symbol-50px">
                <img src="{{ auth('admin')->user()->img ? asset('Attachments/admins/'.auth('admin')->user()->img) : asset('Attachments/admins/1.png') }}" alt="Admin" />
            </div>

            @elseif (auth('user')->check())

            <div class="symbol symbol-50px">
                <img src="{{ auth('user')->user()->img ? asset('Attachments/admins/'.auth('user')->user()->img) : asset('Attachments/admins/1.png') }}" alt="Admin" />
            </div>

            @endif

            <!--end::Symbol-->
            <!--begin::Wrapper-->
            <div class="aside-user-info flex-row-fluid flex-wrap ms-5">
                <!--begin::Section-->
                <div class="d-flex">
                    @include('layouts.backend.user-menu')
                </div>
                <!--end::Section-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::User-->

        <!--end::Aside user-->
    </div>


    <!--end::Aside Toolbarl-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">

               @if (auth('admin')->check())

                    {{-- Dashboard  --}}
                    <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                        <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                        <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                        <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ trans('side-bar.dashboard') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link active" href="{{ route('dashboard') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.dashboard') }}</span>
                                </a>
                            </div>

                        </div>
                    </div>

                    {{-- br --}}
                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-2">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">sections</span>
                        </div>
                    </div>

                    {{-- users --}}
                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black" />
                                        <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ trans('side-bar.users') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('users.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.users') }}</span>
                                </a>

                                <a class="menu-link" href="{{ route('users.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.add user') }}</span>
                                </a>
                            </div>

                        </div>
                    </div>

                    {{-- companies --}}
                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                <i class="fas fa-city"></i>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ trans('side-bar.companies') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('companies.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.companies') }}</span>
                                </a>

                                <a class="menu-link" href="{{ route('companies.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.add company') }}</span>
                                </a>
                            </div>

                        </div>
                    </div>

                    {{-- banners --}}
                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                <i class="fas fa-image"></i>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ trans('side-bar.banners') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('banners.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title"> {{ trans('side-bar.banners') }}</span>
                                </a>

                                <a class="menu-link" href="{{ route('banners.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.add banner') }}</span>
                                </a>
                            </div>

                        </div>
                    </div>

                    {{-- categories --}}
                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z" fill="black" />
                                        <path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z" fill="black" />
                                        <path opacity="0.3" d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ trans('side-bar.categories') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('categories.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.categories') }}</span>
                                </a>

                                <a class="menu-link" href="{{ route('categories.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.add category') }}</span>
                                </a>

                                <a class="menu-link" href="{{ route('category-banners.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.add category banner') }}</span>
                                </a>
                            </div>

                        </div>
                    </div>

                    {{-- cities --}}
                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                <i class="fas fa-city"></i>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ trans('side-bar.city') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('cities.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.city') }}</span>
                                </a>


                            </div>

                        </div>
                    </div>

                    {{-- sub-categories --}}
                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-cart-plus	"></i>
                            </span>
                            <span class="menu-title">{{ trans('side-bar.sub category') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('sub-categories.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.sub category') }}</span>
                                </a>

                                <a class="menu-link" href="{{ route('sub-categories.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.add sub category') }}</span>
                                </a>
                            </div>

                        </div>
                    </div>

                    {{-- complaints --}}
                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                <i class="fas fa-comment-alt"></i>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ trans('side-bar.complaints') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('complaints') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.complaints') }}</span>
                                </a>


                            </div>

                        </div>
                    </div>

                    {{-- reservations --}}
                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                <i class="fas fa-briefcase"></i>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ trans('side-bar.reservations') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('reservations') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.reservations') }}</span>
                                </a>


                            </div>

                        </div>
                    </div>

                    {{-- contact-us --}}
                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                <i class="fas fa-phone"></i>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ trans('side-bar.contact-us') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('contact-us') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.contact-us') }}</span>
                                </a>


                            </div>

                        </div>
                    </div>


                    {{-- recomended --}}
                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                <i class="far fa-calendar"></i>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ trans('side-bar.we are recomndeds') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('recomended.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.we are recomndeds') }}</span>
                                </a>


                            </div>

                        </div>
                    </div>


                    {{-- news --}}
                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                <i class="fas fa-envelope"></i>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ trans('defult.add news') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('news.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('defult.news') }}</span>
                                </a>

                                <a class="menu-link" href="{{ route('news.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('defult.add news') }}</span>
                                </a>
                            </div>

                        </div>
                    </div>

                    {{-- Setting --}}
                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                <i class="fas fa-wrench"></i>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ trans('defult.setting') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('about-app' , 1) }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.about') }}</span>
                                </a>

                                <a class="menu-link" href="{{ route('terms', 1) }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.terms and condations') }}</span>
                                </a>

                                <a class="menu-link" href="{{ route('api-route', 1) }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('defult.Store links') }}</span>
                                </a>


                            </div>

                        </div>
                    </div>

               @elseif (auth('user')->check())


                    {{-- Dashboard  --}}
                    <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                        <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                        <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                        <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ trans('side-bar.dashboard') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link active" href="{{ route('user-dashboard') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.dashboard') }}</span>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-2">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">sections</span>
                        </div>
                    </div>

                    {{-- company Banners --}}

                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                <i class="fas fa-image"></i>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ trans('side-bar.company banners') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('company-banners.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.company banners') }}</span>
                                </a>

                                <a class="menu-link" href="{{ route('company-banners.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.add banner company') }}</span>
                                </a>
                            </div>

                        </div>
                    </div>

                    {{-- Branches --}}
                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                <i class="fas fa-city"></i>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ trans('side-bar.branches') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('branches.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.branches') }}</span>
                                </a>

                                <a class="menu-link" href="{{ route('branches.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.add branch') }}</span>
                                </a>
                            </div>

                        </div>
                    </div>
                     {{-- Services --}}

                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M21 9V11C21 11.6 20.6 12 20 12H14V8H20C20.6 8 21 8.4 21 9ZM10 8H4C3.4 8 3 8.4 3 9V11C3 11.6 3.4 12 4 12H10V8Z" fill="black" />
                                        <path d="M15 2C13.3 2 12 3.3 12 5V8H15C16.7 8 18 6.7 18 5C18 3.3 16.7 2 15 2Z" fill="black" />
                                        <path opacity="0.3" d="M9 2C10.7 2 12 3.3 12 5V8H9C7.3 8 6 6.7 6 5C6 3.3 7.3 2 9 2ZM4 12V21C4 21.6 4.4 22 5 22H10V12H4ZM20 12V21C20 21.6 19.6 22 19 22H14V12H20Z" fill="black" />
                                    </svg>
                                </span>
                            </span>
                            <span class="menu-title">{{ trans('side-bar.services') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('services.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.services') }}</span>
                                </a>

                                <a class="menu-link" href="{{ route('services.create') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add Services</span>
                                </a>
                            </div>

                        </div>
                    </div>


                    {{-- Company --}}

                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="fas fa-city"></i>
                            </span>
                            <span class="menu-title">{{ trans('side-bar.company details') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('company-details') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.company details') }}</span>
                                </a>


                            </div>

                        </div>
                    </div>


                    {{-- Reservations --}}
                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                <i class="fas fa-briefcase"></i>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ trans('side-bar.reservations') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('reservations-company') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.reservations') }}</span>
                                </a>


                            </div>

                        </div>
                    </div>

                    {{-- Complaints --}}

                    <div data-kt-menu-trigger="click" class="menu-item  menu-accordion">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                <i class="fas fa-comment-alt"></i>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ trans('side-bar.complaints') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('complaints-company') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ trans('side-bar.complaints') }}</span>
                                </a>


                            </div>

                        </div>
                    </div>



               @endif




            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->

    <!--end::Footer-->
</div>
