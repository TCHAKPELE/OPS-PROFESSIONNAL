<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


/*  Get routes   */

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/liste', 'show_formations@show')->name('liste');
Route::get('/update', 'show_formations@show_mine')->name('update');
Route::get('/renseigner', 'find_formation@write')->name('renseigner');
Route::get('/liste2','show_project@job')->name('liste2');
Route::get('/enregister_projet', 'register_project@project_save')->name('enregister_projet');
Route::get('/valider_inscription','inscription_formation@valider')->name('valider_inscription');
Route::get('/update_form2','inscription_formation@choix_update')->name('update_form2');
Route::get('/fin_projet', 'end_appel@Notification')->name('fin_projet');
Route::get('/choix', 'redirectchoix@redirect')->name('choix');
Route::get('/enregister_projet2', 'register_project@project_save2')->name('enregister_projet2');
Route::get('/Confirm_OPS','valid_OPS@concour_ops')->name('Confirm_OPS');
Route::get('Choix_zone','lieu_validation@valider')->name('Choix_zone');
Route::get('/A_login','login_admin@control')->name('A_login');
Route::get('/admin','HomeController@index2')->name('admin');
Route::get('/pratique','test_show@test')->name('pratique');
Route::get('/logout', 'Login_administrator@logout')->name('logout');
Route::get('/Profil','show_profil@informations')->name('Profil');


/*  POST routes   */

Route::post('/save2','save_project@add_projet2')->name('save2');
Route::post('/pass_exam','concours_OPS_register@Choice')->name('pass_exam');
Route::post('/new_zone','ajout_zone@ajout')->name('new_zone');
Route::post('/save','save_project@add_projet')->name('save');
Route::post('/confirm','confirmation_projet@end')->name('confirm');
Route::post('/A_control','login_admin@control2')->name('A_control');
Route::post('/login_A','Login_administrator@login')->name('login_A');
Route::post('/Register_test','Enregistrer_test@save')->name('Register_test');
Route::post('/change_photo','show_profil@change')->name('change_photo');
Route::post('/update_form','inscription_formation@update')->name('update_form');




/* Admin routes*/


Route::get('/ajout','admin\redirect_ajout_formation@redirect')->name('ajout');
Route::post('/save_formation','admin\ajout_formation@fin_ajout')->name('save_formation');
Route::get('/ajout_exam','admin\redirect_ajout_formation@redirect_exam')->name('ajout_exam');
Route::post('/save_exam','admin\ajout_formation@fin_ajout2')->name('save_exam');
Route::get('/affichage_offre','admin\liste_offre@list')->name('affichage_offre');
Route::get('/see_project','admin\liste_offre@add')->name('see_project');
Route::get('/Cancel_project','admin\liste_offre@cancel')->name('Cancel_project');
Route::get('/affichage_candidat','admin\liste_candidats@vue')->name('affichage_candidat');
Route::get('/update_note','admin\liste_candidats@vue_note')->name('update_note');
Route::post('/modify_note','admin\liste_candidats@modify_note')->name('modify_note');
Route::get('/modify_note1','admin\liste_candidats@modify_note1')->name('modify_note1');
Route::get('/insert','admin\liste_candidats@enter')->name('insert');
Route::post('/save_note','admin\liste_candidats@save')->name('save_note');
Route::get('/Appel_doffre_cloturé','admin\liste_offre@list_cloture')->name('Appel_doffre_cloturé');
Route::get('/Impression_OPS','admin\liste_offre@print')->name('Impression_OPS');
Route::get('/Impression_OPS2','admin\liste_offre@print2')->name('Impression_OPS2');
Route::post('/send_liste','admin\liste_offre@send')->name('send_liste');
Route::post('/send_liste2','admin\liste_offre@send2')->name('send_liste2');
Route::get('/Liste_concours','admin\liste_candidats@present')->name('Liste_concours');
