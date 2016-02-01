<?php
//uncomment the below if you copy this snippet to RFM config.php
// //initialize MODx stuff here - grab user's config file
// require_once dirname(dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))))."/config.core.php";
// require_once MODX_CORE_PATH.'model/modx/modx.class.php';
// $modx = new modX();
// $modx->initialize('web'); //or mgr or any content you like
// $modx->getService('error','error.modError', '', '');
// //only other modification to this file is below: two include lines 
// //////////////////////////////////////////////////////////////////////////

function listArray($list){
    $list = preg_replace('/\s+/', '', $list);
    // $list = preg_replace("/[^a-z0-9,-_]+/i", ' ', $list);
    $list = preg_replace("/[^a-zA-Z0-9,.]+/", " ", html_entity_decode($list));
    $list = explode(',', $list);
    return $list;
}

//get default properties of responsivefilemanagerConnector snippet
// $sP = $modx->getObject('modSnippet',array('name'=>'responsivefilemanagerConnector'))->getProperties(); //use this one if you copy this snippet to config.php
// $sP = $scriptProperties;

// $rfmUserGroups = $modx->getOption('rfmUserGroups', $sP);
// $noAccessMessage = $modx->getOption('noAccessMessage', $sP, array());
// $activatePersonalFolders = $modx->getOption('activatePersonalFolders', $sP, array());
// $copyConfig = $modx->getOption('copyConfig', $sP, array());
// $myPersonalFolderName = '';
// $USE_ACCESS_KEYS_modx = $modx->getOption('USE_ACCESS_KEYS_modx', $sP);
// $access_keys_modx = $modx->getOption('access_keys_modx', $sP);
// $absoluteURLtoUploadFolder_modx = $modx->getOption('absoluteURLtoUploadFolder_modx', $sP);
// $absolutePATHtoUploadFolder_modx = $modx->getOption('absolutePATHtoUploadFolder_modx', $sP);
// $relativePathToUploadFolder_modx = $modx->getOption('relativePathToUploadFolder_modx', $sP);
// $relativePathToUploadFolderThumbs_modx = $modx->getOption('relativePathToUploadFolderThumbs_modx', $sP);
// $MaxSizeUpload_modx = $modx->getOption('MaxSizeUpload_modx', $sP);
// $default_language_modx = $modx->getOption('default_language_modx', $sP);
// $icon_theme_modx = $modx->getOption('icon_theme_modx', $sP);
// $folder_message_modx = $modx->getOption('folder_message_modx', $sP);
// $show_folder_size_modx = $modx->getOption('show_folder_size_modx', $sP);
// $show_sorting_bar_modx = $modx->getOption('show_sorting_bar_modx', $sP);
// $transliteration_modx = $modx->getOption('transliteration_modx', $sP);
// $convert_spaces_modx = $modx->getOption('convert_spaces_modx', $sP);
// $replace_with_modx = $modx->getOption('replace_with_modx', $sP);
// $lazy_loading_file_number_threshold_modx = $modx->getOption('lazy_loading_file_number_threshold_modx', $sP);
// $image_max_width_modx = $modx->getOption('image_max_width_modx', $sP);
// $image_max_height_modx = $modx->getOption('image_max_height_modx', $sP);
// $image_max_mode_modx = $modx->getOption('image_max_mode_modx', $sP);
// $image_resizing_modx = $modx->getOption('image_resizing_modx', $sP);
// $image_resizing_width_modx = $modx->getOption('image_resizing_width_modx', $sP);
// $image_resizing_height_modx = $modx->getOption('image_resizing_height_modx', $sP);
// $image_resizing_mode_modx = $modx->getOption('image_resizing_mode_modx', $sP);
// $image_resizing_override_modx = $modx->getOption('image_resizing_override_modx', $sP);
// $default_view_modx = $modx->getOption('default_view_modx', $sP);
// $ellipsis_title_after_first_row_modx = $modx->getOption('ellipsis_title_after_first_row_modx', $sP);
// $delete_files_modx = $modx->getOption('delete_files_modx', $sP);
// $create_folders_modx = $modx->getOption('create_folders_modx', $sP);
// $delete_folders_modx = $modx->getOption('delete_folders_modx', $sP);
// $upload_files_modx = $modx->getOption('upload_files_modx', $sP);
// $rename_files_modx = $modx->getOption('rename_files_modx', $sP);
// $rename_folders_modx = $modx->getOption('rename_folders_modx', $sP);
// $duplicate_files_modx = $modx->getOption('duplicate_files_modx', $sP);
// $copy_cut_files_modx = $modx->getOption('copy_cut_files_modx', $sP);
// $copy_cut_dirs_modx = $modx->getOption('copy_cut_dirs_modx', $sP);
// $chmod_files_modx = $modx->getOption('chmod_files_modx', $sP);
// $chmod_dirs_modx = $modx->getOption('chmod_dirs_modx', $sP);
// $preview_text_files_modx = $modx->getOption('preview_text_files_modx', $sP);
// $edit_text_files_modx = $modx->getOption('edit_text_files_modx', $sP);
// $create_text_files_modx = $modx->getOption('create_text_files_modx', $sP);
// $previewable_text_file_exts_modx = $modx->getOption('previewable_text_file_exts_modx', $sP);
// $previewable_text_file_exts_no_prettify_modx = $modx->getOption('previewable_text_file_exts_no_prettify_modx', $sP);
// $editable_text_file_exts_modx = $modx->getOption('editable_text_file_exts_modx', $sP);
// $googledoc_enabled_modx = $modx->getOption('googledoc_enabled_modx', $sP);
// $googledoc_file_exts_modx = $modx->getOption('googledoc_file_exts_modx', $sP);
// $viewerjs_enabled_modx = $modx->getOption('viewerjs_enabled_modx', $sP);
// $viewerjs_file_exts_modx = $modx->getOption('viewerjs_file_exts_modx', $sP);
// $copy_cut_max_size_modx = $modx->getOption('copy_cut_max_size_modx', $sP);
// $copy_cut_max_count_modx = $modx->getOption('copy_cut_max_count_modx', $sP);
// $ext_img_modx = $modx->getOption('ext_img_modx', $sP);
// $ext_file_modx = $modx->getOption('ext_file_modx', $sP);
// $ext_video_modx = $modx->getOption('ext_video_modx', $sP);
// $ext_music_modx = $modx->getOption('ext_music_modx', $sP);
// $ext_misc_modx = $modx->getOption('ext_misc_modx', $sP);
// $aviary_active_modx = $modx->getOption('aviary_active_modx', $sP);
// $aviary_apiKey_modx = $modx->getOption('aviary_apiKey_modx', $sP);
// $aviary_language_modx = $modx->getOption('aviary_language_modx', $sP);
// $aviary_theme_modx = $modx->getOption('aviary_theme_modx', $sP);
// $aviary_tools_modx = $modx->getOption('aviary_tools_modx', $sP);
// $file_number_limit_js_modx = $modx->getOption('file_number_limit_js_modx', $sP);
// $hidden_folders_modx = $modx->getOption('hidden_folders_modx', $sP);
// $hidden_files_modx = $modx->getOption('hidden_files_modx', $sP);
// $java_upload_modx = $modx->getOption('java_upload_modx', $sP);
// $JAVAMaxSizeUpload_modx = $modx->getOption('JAVAMaxSizeUpload_modx', $sP);
// $fixed_image_creation_modx = $modx->getOption('fixed_image_creation_modx', $sP);
// $fixed_path_from_filemanager_modx = $modx->getOption('fixed_path_from_filemanager_modx', $sP);
// $fixed_image_creation_name_to_prepend_modx = $modx->getOption('fixed_image_creation_name_to_prepend_modx', $sP);
// $fixed_image_creation_to_append_modx = $modx->getOption('fixed_image_creation_to_append_modx', $sP);
// $fixed_image_creation_width_modx = $modx->getOption('fixed_image_creation_width_modx', $sP);
// $fixed_image_creation_height_modx = $modx->getOption('fixed_image_creation_height_modx', $sP);
// $fixed_image_creation_option_modx = $modx->getOption('fixed_image_creation_option_modx', $sP);
// $relative_image_creation_modx = $modx->getOption('relative_image_creation_modx', $sP);
// $relative_path_from_current_pos_modx = $modx->getOption('relative_path_from_current_pos_modx', $sP);
// $relative_image_creation_name_to_prepend_modx = $modx->getOption('relative_image_creation_name_to_prepend_modx', $sP);
// $relative_image_creation_name_to_append_modx = $modx->getOption('relative_image_creation_name_to_append_modx', $sP);
// $relative_image_creation_width_modx = $modx->getOption('relative_image_creation_width_modx', $sP);
// $relative_image_creation_height_modx = $modx->getOption('relative_image_creation_height_modx', $sP);
// $relative_image_creation_option_modx = $modx->getOption('relative_image_creation_option_modx', $sP);
// $remember_text_filter_modx = $modx->getOption('remember_text_filter_modx', $sP);

if ($modx->user->isMember(listArray($rfmUserGroups))) {
} 
else {
  die($noAccessMessage);
}

if ($activatePersonalFolders == 1) {
 $myPersonalFolderName = $modx->runSnippet('autoCreateFoldersTWrfm', array('path'=>$absolutePATHtoUploadFolder_modx, 'copyConfig' =>$copyConfig));
 $absoluteURLtoUploadFolder_modx.= $myPersonalFolderName.'/';
 $relativePathToUploadFolder_modx.= $myPersonalFolderName.'/';
}

// session_start();  //already started by MODx  
mb_internal_encoding('UTF-8');
date_default_timezone_set('Europe/Rome');


/*
|--------------------------------------------------------------------------
| Optional security
|--------------------------------------------------------------------------
|
| if set to true only those will access RF whose url contains the access key(akey) like:
| <input type="button" href="../filemanager/dialog.php?field_id=imgField&lang=en_EN&akey=myPrivateKey" value="Files">
| in tinymce a new parameter added: filemanager_access_key:"myPrivateKey"
| example tinymce config:
|
| tiny init ...
| external_filemanager_path:"../filemanager/",
| filemanager_title:"Filemanager" ,
| filemanager_access_key:"myPrivateKey" ,
| ...
|
*/
define('USE_ACCESS_KEYS', $USE_ACCESS_KEYS_modx); // TRUE or FALSE

/*
|--------------------------------------------------------------------------
| DON'T COPY THIS VARIABLES IN FOLDERS config.php FILES
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Path configuration
|--------------------------------------------------------------------------
| In this configuration the folder tree is
| root
|    |- source <- upload folder
|    |- thumbs <- thumbnail folder [must have write permission (755)]
|    |- filemanager
|    |- js
|    |   |- tinymce
|    |   |   |- plugins
|    |   |   |   |- responsivefilemanager
|    |   |   |   |   |- plugin.min.js
*/



$config = array(

 /*
 |--------------------------------------------------------------------------
 | DON'T TOUCH (base url (only domain) of site).
 |--------------------------------------------------------------------------
 |
 | without final /
 |
 */

 'base_url' => ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && ! in_array(strtolower($_SERVER['HTTPS']), array( 'off', 'no' ))) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'],

 /*
 |--------------------------------------------------------------------------
 | path from base_url to base of upload folder
 |--------------------------------------------------------------------------
 |
 | with start and final /
 |
 */
 'upload_dir' => $absoluteURLtoUploadFolder_modx,

 /*
 |--------------------------------------------------------------------------
 | relative path from filemanager folder to upload folder
 |--------------------------------------------------------------------------
 |
 | with final /
 |
 */
 'current_path' => $relativePathToUploadFolder_modx,

 /*
 |--------------------------------------------------------------------------
 | relative path from filemanager folder to thumbs folder
 |--------------------------------------------------------------------------
 |
 | with final /
 | DO NOT put inside upload folder
 |
 */
 'thumbs_base_path' => $relativePathToUploadFolderThumbs_modx,

 /*
 |--------------------------------------------------------------------------
 | Access keys
 |--------------------------------------------------------------------------
 |
 | add access keys eg: array('myPrivateKey', 'someoneElseKey');
 | keys should only containt (a-z A-Z 0-9 \ . _ -) characters
 | if you are integrating lets say to a cms for admins, i recommend making keys randomized something like this:
 | $username = 'Admin';
 | $salt = 'dsflFWR9u2xQa' (a hard coded string)
 | $akey = md5($username.$salt);
 | DO NOT use 'key' as access key!
 | Keys are CASE SENSITIVE!
 |
 */

 'access_keys' => listArray($access_keys_modx),

 //--------------------------------------------------------------------------------------------------------
 // YOU CAN COPY AND CHANGE THESE VARIABLES INTO FOLDERS config.php FILES TO CUSTOMIZE EACH FOLDER OPTIONS
 //--------------------------------------------------------------------------------------------------------

 /*
 |--------------------------------------------------------------------------
 | Maximum upload size
 |--------------------------------------------------------------------------
 |
 | in Megabytes
 |
 */
 'MaxSizeUpload' => $MaxSizeUpload_modx,


 /*
 |--------------------------------------------------------------------------
 | default language file name
 |--------------------------------------------------------------------------
 */
 'default_language' => $default_language_modx,

 /*
 |--------------------------------------------------------------------------
 | Icon theme
 |--------------------------------------------------------------------------
 |
 | Default available: ico and ico_dark
 | Can be set to custom icon inside filemanager/img
 |
 */
 'icon_theme' => $icon_theme_modx,

 'folder_message' => $folder_message_modx,


 //Show or not show folder size in list view feature in filemanager (is possible, if there is a large folder, to greatly increase the calculations)
 'show_folder_size'                        => $show_folder_size_modx,
 //Show or not show sorting feature in filemanager
 'show_sorting_bar'                        => $show_sorting_bar_modx,
 //active or deactive the transliteration (mean convert all strange characters in A..Za..z0..9 characters)
 'transliteration'                         => $transliteration_modx,
 //convert all spaces on files name and folders name with $replace_with variable
 'convert_spaces'                          => $convert_spaces_modx,
 //convert all spaces on files name and folders name this value
 'replace_with'                            => $replace_with_modx,

 // -1: There is no lazy loading at all, 0: Always lazy-load images, 0+: The minimum number of the files in a directory
 // when lazy loading should be turned on.
 'lazy_loading_file_number_threshold'      => $lazy_loading_file_number_threshold_modx,


 //*******************************************
 //Images limit and resizing configuration
 //*******************************************

 // set maximum pixel width and/or maximum pixel height for all images
 // If you set a maximum width or height, oversized images are converted to those limits. Images smaller than the limit(s) are unaffected
 // if you don't need a limit set both to 0
 'image_max_width'                         => $image_max_width_modx,
 'image_max_height'                        => $image_max_height_modx,
 'image_max_mode'                          => $image_max_mode_modx,
 /*
 #  $option:  0 / exact = defined size;
 #            1 / portrait = keep aspect set height;
 #            2 / landscape = keep aspect set width;
 #            3 / auto = auto;
 #            4 / crop= resize and crop;
  */

 //Automatic resizing //
 // If you set $image_resizing to TRUE the script converts all uploaded images exactly to image_resizing_width x image_resizing_height dimension
 // If you set width or height to 0 the script automatically calculates the other dimension
 // Is possible that if you upload very big images the script not work to overcome this increase the php configuration of memory and time limit
 'image_resizing'                          => $image_resizing_modx,
 'image_resizing_width'                    => $image_resizing_width_modx,
 'image_resizing_height'                   => $image_resizing_height_modx,
 'image_resizing_mode'                     => $image_resizing_mode_modx, // same as $image_max_mode
 'image_resizing_override'                 => $image_resizing_override_modx,
 // If set to TRUE then you can specify bigger images than $image_max_width & height otherwise if image_resizing is
 // bigger than $image_max_width or height then it will be converted to those values

 //******************
 // Default layout setting
 //
 // 0 => boxes
 // 1 => detailed list (1 column)
 // 2 => columns list (multiple columns depending on the width of the page)
 // YOU CAN ALSO PASS THIS PARAMETERS USING SESSION VAR => $_SESSION['RF']["VIEW"]=
 //
 //******************
 'default_view'                            => $default_view_modx,

 //set if the filename is truncated when overflow first row
 'ellipsis_title_after_first_row'          => $ellipsis_title_after_first_row_modx,

 //*************************
 //Permissions configuration
 //******************
 'delete_files'                            => $delete_files_modx,
 'create_folders'                          => $create_folders_modx,
 'delete_folders'                          => $delete_folders_modx,
 'upload_files'                            => $upload_files_modx,
 'rename_files'                            => $rename_files_modx,
 'rename_folders'                          => $rename_folders_modx,
 'duplicate_files'                         => $duplicate_files_modx,
 'copy_cut_files'                          => $copy_cut_files_modx, // for copy/cut files
 'copy_cut_dirs'                           => $copy_cut_dirs_modx, // for copy/cut directories
 'chmod_files'                             => $chmod_files_modx, // change file permissions
 'chmod_dirs'                              => $chmod_dirs_modx, // change folder permissions
 'preview_text_files'                      => $preview_text_files_modx, // eg.: txt, log etc.
 'edit_text_files'                         => $edit_text_files_modx, // eg.: txt, log etc.
 'create_text_files'                       => $create_text_files_modx, // only create files with exts. defined in $editable_text_file_exts

 // you can preview these type of files if $preview_text_files is true
 'previewable_text_file_exts'              => listArray($previewable_text_file_exts_modx),
 'previewable_text_file_exts_no_prettify'  => listArray($previewable_text_file_exts_no_prettify_modx),

 // you can edit these type of files if $edit_text_files is true (only text based files)
 // you can create these type of files if $create_text_files is true (only text based files)
 // if you want you can add html,css etc.
 // but for security reasons it's NOT RECOMMENDED!
 'editable_text_file_exts'                 => listArray($editable_text_file_exts_modx),

 // Preview with Google Documents
 'googledoc_enabled'                       => $googledoc_enabled_modx,
 'googledoc_file_exts'                     => listArray($googledoc_file_exts_modx),

 // Preview with Viewer.js
 'viewerjs_enabled'                        => $viewerjs_enabled_modx,
 'viewerjs_file_exts'                      => listArray($viewerjs_file_exts_modx),

 // defines size limit for paste in MB / operation
 // set 'FALSE' for no limit
 'copy_cut_max_size'                       => $copy_cut_max_size_modx,
 // defines file count limit for paste / operation
 // set 'FALSE' for no limit
 'copy_cut_max_count'                      => $copy_cut_max_count_modx,
 //IF any of these limits reached, operation won't start and generate warning

 //**********************
 //Allowed extensions (lowercase insert)
 //**********************
 'ext_img'                                 => listArray($ext_img_modx), //Images
 'ext_file'                                => listArray($ext_file_modx), //Files
 'ext_video'                               => listArray($ext_video_modx), //Video
 'ext_music'                               => listArray($ext_music_modx), //Audio
 'ext_misc'                                => listArray($ext_misc_modx), //Archives

 /******************
  * AVIARY config
  *******************/
 'aviary_active'                           => $aviary_active_modx,
 'aviary_apiKey'                           => $aviary_apiKey_modx,
 'aviary_language'                         => $aviary_language_modx,
 'aviary_theme'                            => $aviary_theme_modx,
 'aviary_tools'                            => $aviary_tools_modx,
 // Add or modify the Aviary options below as needed - they will be json encoded when added to the configuration so arrays can be utilized as needed

 //The filter and sorter are managed through both javascript and php scripts because if you have a lot of
 //file in a folder the javascript script can't sort all or filter all, so the filemanager switch to php script.
 //The plugin automatic swich javascript to php when the current folder exceeds the below limit of files number
 'file_number_limit_js'                    => $file_number_limit_js_modx,

 //**********************
 // Hidden files and folders
 //**********************
 // set the names of any folders you want hidden (eg "hidden_folder1", "hidden_folder2" ) Remember all folders with these names will be hidden (you can set any exceptions in config.php files on folders)
 'hidden_folders'                          => listArray($hidden_folders_modx),
 // set the names of any files you want hidden. Remember these names will be hidden in all folders (eg "this_document.pdf", "that_image.jpg" )
 'hidden_files'                            => listArray($hidden_files_modx),

 /*******************
  * JAVA upload
  *******************/
 'java_upload'                             => $java_upload_modx,
 'JAVAMaxSizeUpload'                       => $JAVAMaxSizeUpload_modx, //Gb


 //************************************
 //Thumbnail for external use creation
 //************************************


 // New image resized creation with fixed path from filemanager folder after uploading (thumbnails in fixed mode)
 // If you want create images resized out of upload folder for use with external script you can choose this method,
 // You can create also more than one image at a time just simply add a value in the array
 // Remember than the image creation respect the folder hierarchy so if you are inside source/test/test1/ the new image will create at
 // path_from_filemanager/test/test1/
 // PS if there isn't write permission in your destination folder you must set it
 //
 'fixed_image_creation'                    => $fixed_image_creation_modx, //activate or not the creation of one or more image resized with fixed path from filemanager folder
 'fixed_path_from_filemanager'             => listArray($fixed_path_from_filemanager_modx), //fixed path of the image folder from the current position on upload folder
 'fixed_image_creation_name_to_prepend'    => listArray($fixed_image_creation_name_to_prepend_modx), //name to prepend on filename
 'fixed_image_creation_to_append'          => listArray($fixed_image_creation_to_append_modx), //name to appendon filename
 'fixed_image_creation_width'              => listArray($fixed_image_creation_width_modx), //width of image (you can leave empty if you set height)
 'fixed_image_creation_height'             => listArray($fixed_image_creation_height_modx), //height of image (you can leave empty if you set width)
 /*
 #             $option:     0 / exact = defined size;
 #                          1 / portrait = keep aspect set height;
 #                          2 / landscape = keep aspect set width;
 #                          3 / auto = auto;
 #                          4 / crop= resize and crop;
  */
 'fixed_image_creation_option'             => listArray($fixed_image_creation_option_modx), //set the type of the crop


 // New image resized creation with relative path inside to upload folder after uploading (thumbnails in relative mode)
 // With Responsive filemanager you can create automatically resized image inside the upload folder, also more than one at a time
 // just simply add a value in the array
 // The image creation path is always relative so if i'm inside source/test/test1 and I upload an image, the path start from here
 //
 'relative_image_creation'                 => $relative_image_creation_modx, //activate or not the creation of one or more image resized with relative path from upload folder
 'relative_path_from_current_pos'          => listArray($relative_path_from_current_pos_modx), //relative path of the image folder from the current position on upload folder
 'relative_image_creation_name_to_prepend' => listArray($relative_image_creation_name_to_prepend_modx), //name to prepend on filename
 'relative_image_creation_name_to_append'  => listArray($relative_image_creation_name_to_append_modx), //name to append on filename
 'relative_image_creation_width'           => listArray($relative_image_creation_width_modx), //width of image (you can leave empty if you set height)
 'relative_image_creation_height'          => listArray($relative_image_creation_height_modx), //height of image (you can leave empty if you set width)
 /*
 #             $option:     0 / exact = defined size;
 #                          1 / portrait = keep aspect set height;
 #                          2 / landscape = keep aspect set width;
 #                          3 / auto = auto;
 #                          4 / crop= resize and crop;
  */
 'relative_image_creation_option'          => listArray($relative_image_creation_option_modx), //set the type of the crop


 // Remember text filter after close filemanager for future session
 'remember_text_filter'                    => $remember_text_filter_modx,

);

return array_merge(
 $config,
 array(
  'MaxSizeUpload' => ((int)(ini_get('post_max_size')) < $config['MaxSizeUpload'])
   ? (int)(ini_get('post_max_size')) : $config['MaxSizeUpload'],
  'ext'=> array_merge(
   $config['ext_img'],
   $config['ext_file'],
   $config['ext_misc'],
   $config['ext_video'],
   $config['ext_music']
  ),
  // For a list of options see: https://developers.aviary.com/docs/web/setup-guide#constructor-config
  'aviary_defaults_config' => array(
   'apiKey'     => $config['aviary_apiKey'],
   'language'   => $config['aviary_language'],
   'theme'      => $config['aviary_theme'],
   'tools'      => $config['aviary_tools']
  ),
 )
);