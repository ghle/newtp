<?php
use think\Route;


/****************************后台首页****************************/


/********************栏目管理*************************************/
 
// 所有栏目
Route::get('category','Category/lists_category');

// 删除栏目
Route::delete('delcate/:cid','Category/del_category');

// 增加栏目
Route::post('cateadd','Category/add_category');

// 修改栏目
Route::put('cateupd', 'Category/update_category');

/***********************文章管理*******************************/
// 获取文章
Route::get('list','Index/lists_art');

// 增加文章
Route::post('add','Index/add_art');

// 删除文章
Route::delete('delete','Index/delete_art');

// 修改文章
Route::put('update', 'Index/update_art');

/***************************在线报名/注册******************************/
Route::post('Register','Register/register');