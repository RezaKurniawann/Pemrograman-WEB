<?php
$menu = [
    [
        "nama" => "Beranda"
    ],
    [
        "nama" => "Berita",
        "subMenu" => [
        [
            "nama" => "Wisata",
            "subMenu" => [
                [
                    "nama" => "Pantai"
                ],
                [
                    "nama" => "Gunung"
                ]
            ]
        ],
        [
            "nama" => "Kuliner"
        ],
        [
            "nama" => "Hiburan"
        ]
    ]
    ],
    [
        "nama" => "Tentang"
    ],
    [
        "nama" => "Kontak"
    ],
];

function tampilMenuBertingkat (array $menu) {
    echo "<ul>";
    foreach ($menu as $key => $item) {
        echo "<li>{$item['nama']}</li>";
    }
    echo "</ul>";
}

tampilMenuBertingkat($menu);

// Modifikasi

// function tampilkanMenuBertingkat(array $menu) {
//     echo "<ul>";
//     foreach ($menu as $item) {
//         echo "<li>{$item['nama']}</li>";
//         if (isset($item['subMenu']) && is_array($item['subMenu'])) {
//             tampilkanMenuBertingkat($item['subMenu']); // Call itself recursively for submenus
//         }
//     }
//     echo "</ul>";
// }
// tampilkanMenuBertingkat($menu);

?>