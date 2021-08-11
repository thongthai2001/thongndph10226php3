<?php
    return [
        'user' => [
            'gender' => [
                'male' => 1,
                'female' => 2,
            ],
            'role' => [
                'user' => 1,
                'admin' => 2,
            ],
            'invoice' => [
                'status' => [
                    'cho_duyet' => 1,
                    'dang_xu_ly' => 2,
                    'dang_giao' => 3,
                    'da_giao_hang' => 4,
                    'da_huy' => 5,
                    'chuyen_hoan' => 6
                ],
            ]
        ],
        'size' => [
            'M' => 1,
            'L' => 2,
            'XML' => 3,

        ],
        'color' => [
            'Red' => 1,
            'White' => 2,
            'black' => 3,

        ],
        'product_order_by' => [
            1 => 'Sắp xếp tên theo thứ tự tăng dần',
            2 => 'Sắp xếp theo tên giảm dần',
            3 => 'Sắp xép theo giá tăng dần',
            4 => 'Sắp xép theo giá giảm dần',
            5 => 'Sắp xép theo số lượng tăng dần',
            6 => 'Sắp xép theo số lượng giảm dần',
        ],
        'page_size' => [
            20,
            40,
            80,
            100
        ],
        'default_page_size' => 20
    ];
?>