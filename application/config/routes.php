<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] 								= "halaman_depan";
$route['404_override'] 										= '';
$route['auth']												= 'halaman_depan/auth';
$route['petunjuk'] 											=  'halaman_depan/petunjuk';
$route['tentang'] 											= 'halaman_depan/tentang';
$route['view_produk_books'] 								= 'halaman_depan/view_produk_books';
$route['view_produk_books_form'] 							= 'halaman_depan/view_produk_books_form';
$route['view_produk_books_form/(:num)']						= 'halaman_depan/view_produk_books_form/$1';

$route['view_produk_electronics'] 							= 'halaman_depan/view_produk_electronics';
$route['view_produk_movie'] 								= 'halaman_depan/view_produk_movie';
$route['view_produk_automotive']	 						= 'halaman_depan/view_produk_automotive';
$route['view_produk_musical'] 								= 'halaman_depan/view_produk_musical';


$route['view_electronics'] 									= 'halaman_depan/view_electronics';
$route['view_movie'] 										= 'halaman_depan/view_movie';
$route['view_automotive'] 									= 'halaman_depan/view_automotive';
$route['view_musical'] 										= 'halaman_depan/view_musical';
$route['index'] 											= 'halaman_depan/index';



$route['administrasi/dashboard']							= 'administrasi';
$route['administrasi/logout']								= 'administrasi/logout';

$route['administrasi/data_product']							= 'administrasi/data_product_view';
$route['administrasi/data_product/add'] 					= 'administrasi/data_product_add';
$route['administrasi/data_product/save'] 					= 'administrasi/data_product_save';
$route['administrasi/data_product/edit/(:num)'] 			= 'administrasi/data_product_edit/$1';
$route['administrasi/data_product/del/(:num)']				= 'administrasi/data_product_del/$1';

$route['administrasi/data_category']						= 'administrasi/data_category_view';
$route['administrasi/data_category/add'] 					= 'administrasi/data_category_add';
$route['administrasi/data_category/save'] 					= 'administrasi/data_category_save';
$route['administrasi/data_category/edit/(:num)'] 			= 'administrasi/data_category_edit/$1';
$route['administrasi/data_category/del/(:num)'] 			= 'administrasi/data_category_del/$1';

$route['administrasi/data_pengunjung']						= 'administrasi/data_pengunjung_view';
$route['administrasi/data_produk_rating']					= 'administrasi/data_produk_rating_view';
$route['administrasi/data_produk_rating_books']				= 'administrasi/data_produk_rating_view';

$route['administrasi/generate_awal_rekomendasi']			= 'administrasi/generate_awal_rekomendasi';
$route['administrasi/generate_rata_rekomendasi']			= 'administrasi/generate_rata_rekomendasi';
$route['administrasi/generate_centroid_rekomendasi']		= 'administrasi/generate_centroid_rekomendasi';
$route['administrasi/iterasi_kmeans_lanjut_rekomendasi']	= 'administrasi/iterasi_kmeans_lanjut_rekomendasi';
$route['administrasi/iterasi_kmeans_hasil_rekomendasi']		= 'administrasi/iterasi_kmeans_hasil_rekomendasi';

$route['administrasi/item_rating_view']		= 'administrasi/item_rating_view';
$route['administrasi/group_rating_view']		= 'administrasi/group_rating_view';
$route['administrasi/similarity_item_rating']		= 'administrasi/similarity_item_rating';
$route['administrasi/similarity_group_rating']		= 'administrasi/similarity_group_rating';


$route['pimpinan/dashboard']								= 'pimpinan';
$route['pimpinan/logout']									= 'pimpinan/logout';

$route['pimpinan/cetak_obat']	= 'pimpinan/cetak_obat';
$route['pimpinan/cetak_obat/view']	= 'pimpinan/cetak_obat_view';
$route['pimpinan/cetak_puskesmas']	= 'pimpinan/cetak_puskesmas';
$route['pimpinan/cetak_puskesmas/view']	= 'pimpinan/cetak_puskesmas_view';
$route['pimpinan/cetak_penyakit']	= 'pimpinan/cetak_penyakit';
$route['pimpinan/cetak_penyakit/view']	= 'pimpinan/cetak_penyakit_view';
$route['pimpinan/cetak_penyakit_tahun']	= 'pimpinan/cetak_penyakit_tahun';
$route['pimpinan/cetak_penyakit_tahun/view/(:num)']	= 'pimpinan/cetak_penyakit_tahun/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */