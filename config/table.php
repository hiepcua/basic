<?php

return [
    'default_paginate' => 20,
    'option_paginate'  => [20, 30, 50, 100, 200, 500],
    'pages'            => [
        'product-list'                => [
            'headers'       => [
                'stt'             => 'STT',
                'name'            => 'Tên SP',
                'code'            => 'Mã SP',
                'company_name'    => 'Công Ty',
                'wholesale_price' => 'Giá buôn',
                'price'           => 'Giá khuyến nghị',
                'status'          => 'Trạng thái',
                'features'        => 'Chức năng',
            ],
            'customColumns' => [
                'name',
                'status',
                'features',
            ],
            'sortColumn'    => [
                'name',
                'price',
                'wholesale_price',
            ],
            'centerColumn'  => [
                'stt',
                'code',
                'company_name',
                'price',
                'wholesale_price',
                'status',
                'features',
            ]
        ],
        'product-group-list'          => [
            'headers'       => [
                'stt'               => 'STT',
                'name'              => 'Tên',
                'product_type_name' => 'Loại Hàng',
                'parent'            => 'Cấp cha',
                'note'              => 'Mô tả',
                'status'            => 'Trạng thái',
                'features'          => 'Chức năng',
            ],
            'customColumns' => [
                'name',
                'note',
                'status',
                'features',
            ],
            'sortColumn'    => [
                'name',
                'parent',
            ],
            'centerColumn'  => [
                'stt',
                'status',
                'features',
            ]
        ],
    ],
];
