<?php

return [
    'default' => [
        [
            'group' => true,
            'name'  => 'Tổng quan',
            'route' => 'admin.dashboard.index',
        ],
        [
            'name'  => '',
            'group' => true,
            'child' => [
                [
                    'name'  => '1. Bài viết',
                    'icon'  => '<i data-feather="home"></i>',
                    'child' => [
                        [
                            'name'    => '1.1 DS bài viết',
                            'route'   => 'admin.posts.index',
                            'perm'    => ['xem_danh_sach_bai_viet'],
                            'pattern' => ['posts/create', 'posts/*/*'],
                            'child'   => [
                                [
                                    'name'    => '1.2 Thêm mới bài viết',
                                    'route'   => 'admin.posts.create',
                                    'display' => false
                                ],
                                [
                                    'name'    => '1.3 Sửa bài viết',
                                    'route'   => 'admin.posts.edit',
                                    'display' => false
                                ]
                            ]
                        ]
                    ]
                ],
            ],
        ],
        [
            'name'  => '',
            'group' => true,
            'child' => [
                [
                    'name'  => '4. Poster',
                    'icon'  => '<i data-feather="image"></i>',
                    'child' => [

                    ],
                ],

            ]
        ],
        [
            'name'  => '',
            'group' => true,
            'child' => [
                [
                    'name'  => '10. Quản lý',
                    'icon'  => '<i data-feather="settings"></i>',
                    'child' => [
                        [
                            'name'  => '10.1 Người dùng',
                            'child' => [
                                [
                                    'name'    => '10.1.1 Người dùng',
                                    'route'   => 'admin.users.index',
                                    'perm'    => 'xem_danh_sach_nguoi_dung',
                                    'pattern' => [
                                        'users/*',
                                        'users/*/*',
                                        'users/*/*/*',
                                    ],
                                    'child'   => [
                                        [
                                            'name'    => '10.1.1 Thêm người dùng',
                                            'route'   => 'admin.users.create',
                                            'display' => false
                                        ],
                                        [
                                            'name'    => '10.1.1 Sửa người dùng',
                                            'route'   => 'admin.users.edit',
                                            'display' => false
                                        ],
                                    ]
                                ],
                                [
                                    'name'    => '10.1.2 Vai trò',
                                    'route'   => 'admin.roles.index',
                                    'perm'    => 'xem_danh_sach_vai_tro',
                                    'pattern' => [
                                        'roles/*',
                                        'roles/*/*',
                                        'roles/*/*/*',
                                    ],
                                    'child'   => [
                                        [
                                            'name'    => '10.1.2 Thêm vai trò',
                                            'route'   => 'admin.roles.create',
                                            'display' => false
                                        ],
                                        [
                                            'name'    => '10.1.2 Sửa vai trò',
                                            'route'   => 'admin.roles.edit',
                                            'display' => false
                                        ],
                                    ]
                                ],
                                [
                                    'name'    => '10.1.3 Quyền',
                                    'route'   => 'admin.permissions.index',
                                    'perm'    => 'xem_danh_sach_quyen',
                                    'pattern' => [
                                        'permissions/*',
                                        'permissions/*/*',
                                        'permissions/*/*/*'
                                    ],
                                    'child'   => [
                                        [
                                            'name'    => '10.1.3 Sửa quyền',
                                            'route'   => 'admin.permissions.edit',
                                            'display' => false
                                        ],
                                    ]
                                ],
                            ]
                        ],
                        [
                            'name'  => '10.2 Sản phẩm',
                            'child' => [
                                [
                                    'name'    => '10.2.1 DS SP',
                                    'route'   => 'admin.products.index',
                                    'perm'    => 'xem_danh_sach_vai_tro',
                                    'pattern' => [
                                        'products/*',
                                        'products/*/*',
                                        'products/*/*/*'
                                    ],
                                    'child'   => [
                                        [
                                            'name'    => '10.2.1 Thêm Sản Phẩm',
                                            'route'   => 'admin.products.create',
                                            'display' => false
                                        ],
                                        [
                                            'name'    => '10.2.1 Sửa Sản Phẩm',
                                            'route'   => 'admin.products.edit',
                                            'display' => false
                                        ],
                                    ]
                                ],
                                [
                                    'name'    => '10.2.3 Nhóm SP',
                                    'route'   => 'admin.product-groups.index',
                                    'perm'    => 'xem_danh_sach_vai_tro',
                                    'pattern' => [
                                        'product-groups/*',
                                        'product-groups/*/*',
                                        'product-groups/*/*/*'
                                    ],
                                    'child'   => [
                                        [
                                            'name'    => '10.2.3 Thêm mới mhóm sản phẩm',
                                            'route'   => 'admin.product-groups.create',
                                            'display' => false
                                        ],
                                        [
                                            'name'    => '10.2.3 Sửa mhóm sản phẩm',
                                            'route'   => 'admin.product-groups.edit',
                                            'display' => false
                                        ],
                                    ]
                                ],
                            ]
                        ],
                    ],
                ],

            ]
        ],
    ]
];
