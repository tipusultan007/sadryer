<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    | Here you can change the default title of your admin panel.
    |
    */

    'title' => 'M/S S.A Rice Agency',
    'title_prefix' => '',
    'title_postfix' => '',
    'bottom_title' => 'M/S S.A Rice Agency',
    'current_version' => 'v1.0',


    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    */

    'logo' => 'SA Rice',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can set up an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'assets/sarice.svg',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 230,
            'height' => 60,
        ],
    ],

    /*
     *
     * Default path is 'resources/views/vendor/tablar' as null. Set your custom path here If you need.
     */

    'views_path' => null,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look at the layout section here:
    |
    */

    'layout' => 'combo',
    //boxed, combo, condensed, fluid, fluid-vertical, horizontal, navbar-overlap, navbar-sticky, rtl, vertical, vertical-right, vertical-transparent

    'layout_light_sidebar' => false,
    'layout_light_topbar' => false,
    'layout_enable_top_header' => false,

    /*
    |--------------------------------------------------------------------------
    | Sticky Navbar for Top Nav
    |--------------------------------------------------------------------------
    |
    | Here you can enable/disable the sticky functionality of Top Navigation Bar.
    |
    | For detailed instructions, you can look at the Top Navigation Bar classes here:
    |
    */

    'sticky_top_nav_bar' => false,

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions, you can look at the admin panel classes here:
    |
    */

    'classes_body' => '',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions, you can look at the urls section here:
    |
    */

    'use_route_url' => true,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password.request',
    'password_email_url' => 'password.email',
    'profile_url' => false,
    'setting_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Display Alert
    |--------------------------------------------------------------------------
    |
    | Display Alert Visibility.
    |
    */
    'display_alert' => false,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    |
    */

    'menu' => [
        // Navbar items:
        [
            'text' => 'ড্যাশবোর্ড',
            'icon' => 'ti ti-home',
            'url' => '/'
        ],
        [
            'text' => 'পণ্য',
            'route' => 'products.index',
            'icon' => 'ti ti-building-store',
        ],
        [
            'text' => 'ক্রয়',
            'icon' => 'ti ti-direction-sign',
            'submenu' => [
                [
                    'text' => 'ক্রয়',
                    'route' => 'purchases.index',
                    'icon' => 'ti ti-building-store',
                ],
                [
                    'text' => 'ক্রয় ফেরত',
                    'route' => 'purchase_returns.index',
                    'icon' => 'ti ti-building-store',
                ],
                [
                    'text' => 'সরবরাহকারী',
                    'route' => 'suppliers.index',
                    'icon' => 'ti ti-users',
                ],
                [
                    'text' => 'সরবরাহকারী\'র লেনদেন',
                    'route' => 'transactions.supplier',
                    'icon' => 'ti ti-cash-banknote',
                ],
            ]
        ],
        [
            'text' => 'ড্রায়ার',
            'icon' => 'ti ti-direction-sign',
            'submenu' => [
                [
                    'text' => 'ড্রায়ার এন্ট্রি',
                    'route' => 'dryers.index',
                    'icon' => 'ti ti-building-store',
                ],
                [
                    'text' => 'ড্রায়ার হতে স্টক',
                    'route' => 'dryer-to-stocks.index',
                    'icon' => 'ti ti-building-store',
                ],
            ]
        ],

        [
            'text' => 'বিক্রয়',
            'icon' => 'ti ti-direction-sign',
            'submenu' => [
                [
                    'text' => 'বিক্রয়',
                    'route' => 'sales.index',
                    'icon' => 'ti ti-shopping-cart',
                ],
                [
                    'text' => 'বিক্রয়কৃত পণ্য',
                    'route' => 'sale_details.index',
                    'icon' => 'ti ti-shopping-cart',
                ],
                [
                    'text' => 'বিক্রয় ফেরত',
                    'route' => 'sale_returns.index',
                    'icon' => 'ti ti-shopping-cart',
                ],
                [
                    'text' => 'ক্রেতা',
                    'route' => 'customers.index',
                    'icon' => 'ti ti-users',
                ],
                [
                    'text' => 'ক্রেতা\'র লেনদেন',
                    'route' => 'transactions.customer',
                    'icon' => 'ti ti-cash-banknote',
                ],
            ]
        ],

        [
            'text' => 'ঋণ',
            'icon' => 'ti ti-direction-sign',
            'submenu' => [
                [
                    'text' => 'ব্যাক্তিগত ঋণ',
                    'route' => 'loans.index',
                    'icon' => 'ti ti-coin-taka',
                ],
                [
                    'text' => 'ব্যাক্তিগত ঋণ পেমেন্ট',
                    'route' => 'loan_repayments.index',
                    'icon' => 'ti ti-category',
                ],
                [
                    'text' => 'ব্যাংক ঋণ',
                    'route' => 'bank_loans.index',
                    'icon' => 'ti ti-currency-taka',
                ],
                [
                    'text' => 'ব্যাংক ঋণ পেমেন্ট',
                    'route' => 'bank_loan_repayments.index',
                    'icon' => 'ti ti-currency-taka',
                ],
            ]
        ],
        [
            'text' => 'মূলধন',
            'icon' => 'ti ti-coin-taka',
            'submenu' => [
                [
                    'text' => 'মূলধন',
                    'route' => 'capitals.index',
                    'icon' => 'ti ti-coin-taka',
                ],
                [
                    'text' => 'উত্তোলন',
                    'route' => 'capital_withdraws.index',
                    'icon' => 'ti ti-category',
                ],
            ]
        ],
        [
            'text' => 'বিনিয়োগ',
            'icon' => 'ti ti-coin-taka',
            'submenu' => [
                [
                    'text' => 'বিনিয়োগ',
                    'route' => 'investments.index',
                    'icon' => 'ti ti-coin-taka',
                ],
                [
                    'text' => 'পেমেন্ট',
                    'route' => 'investment_repayments.index',
                    'icon' => 'ti ti-category',
                ],
                [
                    'text' => 'সম্পদ',
                    'route' => 'asset.index',
                    'icon' => 'ti ti-box',
                ],
                [
                    'text' => 'সম্পদ বিক্রয়',
                    'route' => 'asset_sells.index',
                    'icon' => 'ti ti-box',
                ],
            ]
        ],
        [
            'text' => 'স্টাফ',
            'icon' => 'ti ti-users',
            'submenu' => [
                [
                    'text' => 'ব্যবহারকারীসমূহ',
                    'route' => 'users.index',
                    'icon' => 'ti ti-users',
                ],
                [
                    'text' => 'কর্মী তালিকা',
                    'route' => 'employees.index',
                    'icon' => 'ti ti-users',
                ],
                [
                    'text' => 'বেতন',
                    'route' => 'salaries.index',
                    'icon' => 'ti ti-currency-taka',
                ],
            ]
        ],

        [
            'text' => 'অ্যাকাউন্টস',
            'icon' => 'ti ti-currency-taka',
            'submenu' => [
                [
                    'text' => 'অ্যাকাউন্ট তালিকা',
                    'route' => 'accounts.index',
                    'icon' => 'ti ti-currency-taka',
                ],
                [
                    'text' => 'ব্যালেন্স ট্রান্সফার',
                    'route' => 'balance_transfers.index',
                    'icon' => 'ti ti-currency-taka',
                ],
            ]
        ],

        [
            'text' => 'আয়/ব্যয় সমুহ',
            'icon' => 'ti ti-coin-taka',
            'submenu' => [
                [
                    'text' => 'আয়',
                    'route' => 'incomes.index',
                    'icon' => 'ti ti-coin-taka',
                ],
                [
                    'text' => 'আয় ক্যাটেগরি',
                    'route' => 'income_categories.index',
                    'icon' => 'ti ti-category',
                ],
                [
                    'text' => 'ব্যয়',
                    'route' => 'expenses.index',
                    'icon' => 'ti ti-coin-taka',
                ],
                [
                    'text' => 'ব্যয় ক্যাটেগরি',
                    'route' => 'expense_categories.index',
                    'icon' => 'ti ti-category',
                ],
                [
                    'text' => 'তহরি',
                    'url' => 'tohoris',
                    'icon' => 'ti ti-category',
                ]
            ]
        ],

        [
            'text' => 'সকল লেনদেন',
            'route' => 'transactions.index',
            'icon' => 'ti ti-cash-banknote',
        ],
        [
            'text' => 'রিপোর্ট',
            'icon' => 'ti ti-direction-sign',
            'submenu' => [
                [
                    'text' => 'দৈনিক রিপোর্ট',
                    'route' => 'report.daily',
                    'icon' => 'ti ti-report',
                ],
                [
                    'text' => 'ক্রয় রিপোর্ট',
                    'route' => 'report.purchases',
                    'icon' => 'ti ti-report',
                ],
                [
                    'text' => 'বিক্রয় রিপোর্ট',
                    'route' => 'report.sales',
                    'icon' => 'ti ti-report',
                ],
                [
                    'text' => 'স্টক রিপোর্ট',
                    'route' => 'report.stock',
                    'icon' => 'ti ti-report',
                ],
                [
                    'text' => 'সরবরাহকারী ব্যালেন্স রিপোর্ট',
                    'route' => 'report.supplier.balance',
                    'icon' => 'ti ti-report',
                ],
                [
                    'text' => 'ক্রেতা ব্যালেন্স রিপোর্ট',
                    'route' => 'report.customer.balance',
                    'icon' => 'ti ti-report',
                ],
                [
                    'text' => 'ক্রয়-বিক্রয় রিপোর্ট',
                    'route' => 'report.purchase.sales',
                    'icon' => 'ti ti-report',
                ],
                [
                    'text' => 'ব্যালেন্স শীট',
                    'route' => 'report.balance.sheet',
                    'icon' => 'ti ti-report',
                ]
            ]
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    |
    */

    'filters' => [
        TakiElias\Tablar\Menu\Filters\GateFilter::class,
        TakiElias\Tablar\Menu\Filters\HrefFilter::class,
        TakiElias\Tablar\Menu\Filters\SearchFilter::class,
        TakiElias\Tablar\Menu\Filters\ActiveFilter::class,
        TakiElias\Tablar\Menu\Filters\ClassesFilter::class,
        TakiElias\Tablar\Menu\Filters\LangFilter::class,
        TakiElias\Tablar\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Vite
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Vite support.
    |
    | For detailed instructions you can look the Vite here:
    | https://laravel-vite.dev
    |
    */

    'vite' => true,
];
