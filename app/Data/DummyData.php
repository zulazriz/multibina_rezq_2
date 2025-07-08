<?php

namespace App\Data;

/**
 * Class ini berfungsi sebagai sumber data sementara (dummy data) untuk aplikasi.
 * Apabila sistem dihubungkan ke pangkalan data, method di dalam class ini
 * boleh diubah suai untuk mengambil data sebenar tanpa mengubah fail route.
 */
class DummyData
{
    /**
     * Mengembalikan senarai data dummy untuk projek-projek perabot.
     *
     * @return array
     */
    public static function getProjects(): array
    {
        return [
            [
                'title' => 'Kabinet Dapur Moden',
                'category' => 'Dapur',
                'image' => 'https://images.unsplash.com/photo-1556912173-3bb406ef7e77?q=80&w=2070&auto=format&fit=crop',
                'description' => 'Kabinet dapur dengan rekaan minimalis dan fungsi maksima, menggunakan bahan kalis air dan tahan lasak.',
                'category' => 'Web Development',
                'technologies' => ['React', 'Node.js', 'MongoDB']
            ],
            [
                'title' => 'Panel TV Ruang Tamu',
                'category' => 'Ruang Tamu',
                'image' => 'https://images.unsplash.com/photo-1618220179428-22790b461013?q=80&w=2127&auto=format&fit=crop',
                'description' => 'Panel TV yang direka khas untuk menyembunyikan kabel dan menyediakan ruang simpanan tambahan.',
                'category' => 'Mobile App',
                'technologies' => ['React Native', 'Firebase', 'TypeScript']
            ],
            [
                'title' => 'Almari Pakaian Walk-in',
                'category' => 'Bilik Tidur',
                'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto=format&fit=crop',
                'description' => 'Almari pakaian jenis walk-in dengan susun atur pintar untuk semua keperluan fesyen anda.',
                'category' => 'Web Design',
                'technologies' => ['Next.js', 'Framer Motion', 'Tailwind']
            ],
        ];
    }

    /**
     * Mengembalikan senarai data dummy untuk slideshow di hero section.
     *
     * @return array
     */
    public static function getSlides(): array
    {
        return [
            [
                'title' => 'Bina Ruang Impian Anda',
                'image' => 'https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg?auto=compress&cs=tinysrgb&w=800',
            ],
            [
                'title' => 'Ketukangan & Kualiti Terjamin',
                'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto=format&fit=crop',
            ],
            [
                'title' => 'Rekaan Moden & Elegan',
                'image' => 'https://images.unsplash.com/photo-1556912173-3bb406ef7e77?q=80&w=2070&auto=format&fit=crop',
            ],
            [
                'title' => 'Rekaan Moden & Elegan',
                'image' => 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?q=80&w=2000&auto=format&fit=crop',
            ],
            [
                'title' => 'Rekaan Moden & Elegan',
                'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto=format&fit=crop',
            ],
            [
                'title' => 'Rekaan Moden & Elegan',
                'image' => 'https://images.unsplash.com/photo-1618220179428-22790b461013?q=80&w=2127&auto=format&fit=crop',
            ],
            [
                'title' => 'Rekaan Moden & Elegan',
                'image' => 'https://images.unsplash.com/photo-1556912173-3bb406ef7e77?q=80&w=2070&auto=format&fit=crop',
            ],
        ];
    }

    /**
     * Mengembalikan senarai data dummy untuk gallery di gallery section.
     *
     * @return array
     */
    public static function getGallery(): array
    {
        return [
            [
                'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto=format&fit=crop'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1556912173-3bb406ef7e77?q=80&w=2070&auto=format&fit=crop'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?q=80&w=2000&auto=format&fit=crop'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1618220179428-22790b461013?q=80&w=2127&auto=format&fit=crop'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?q=80&w=2000&auto=format&fit=crop'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1618220179428-22790b461013?q=80&w=2127&auto=format&fit=crop'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2070&auto=format&fit=crop'
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1556912173-3bb406ef7e77?q=80&w=2070&auto=format&fit=crop'
            ],
        ];
    }
}
