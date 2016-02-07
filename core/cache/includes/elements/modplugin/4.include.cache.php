<?php
/*TinymceWrapper transforms textareas (introtext, description, content, RichTVs, File/Image TVs, Quick Update/Create, MIGX TVs.

plugin fires at
OnRichTextEditorRegister
OnDocFormPrerender 

FOR ALL ROUND ENJOYMENT THROUGH OUT THE MANANGER
(quick update/create resources, link for many custom file browsers in top nav, MIGX CMPS)
OnManagerPageInit

DON'T WORRY, YOUR SITE WILL NOT BE SLOW ON ACCOUNT OF THIS PLUGIN

-------------------Roadmap:
-Create more beautiful themes;
-Look for more ways to be awesome;
---------------------------

Use freely, recode freely, report freely, enjoy freely
Dedicated to those who have cried
---------------------------

http://www.leofec.com/modx-revolution/
-donshakespeare in the MODx forum
*/
$modx->getService('error','error.modError', '', '');
$modxEventName = $modx->event->name;
//let us tell System Settings that we have a new RTEditor
if ($modxEventName == 'OnRichTextEditorRegister') {
  $modx->event->output('TinymceWrapper');
  return;
}

//let us get MODx browser callback ready to fire
if ($modxEventName == 'OnRichTextBrowserInit' && $autoFileBrowser == 'modxNativeBrowser') {
 $modx->controller->addJavascript(MODX_ASSETS_URL.'components/tinymcewrapper/browserConnectors/browser.js');
  $modx->event->output('twBrowserCallback');
  return;
}

//whether the user has RTE enabled in System Settings
$useEditor = $modx->getOption('use_editor');
//is our awesome wrapper the set one?
$whichEditor = $modx->getOption('which_editor');
//whether the user has RTE set to default for all resources in System Settings
$richtext_default = $modx->getOption('richtext_default');

$sp = $scriptProperties;
//let's grab a few things from our plugin's defualt properties property set
$activate = $modx->getOption('activateTinyMCE', $sp);
$jQuerySrc = $modx->getOption('jQuery', $sp);
$tinySrc = $modx->getOption('tinySrc', $sp);
$newResources = $modx->getOption('newResources', $sp);
$introtext = $modx->getOption('Introtext', $sp);
$intro = '';
$description = $modx->getOption('Description', $sp);
$desc = '';
$content = $modx->getOption('Content', $sp);
$con = '';
$tvs = $modx->getOption('TVs', $sp);
$tvAddict = $modx->getOption('tvAddict', $sp);
$tvSuperAddict = $modx->getOption('tvSuperAddict', $sp);
$autoFileBrowser = $modx->getOption('autoFileBrowser', $sp);
$browserTopNAVsubtext = $modx->getOption('browserTopNAVsubtext', $sp);
$fileImageTVs = $modx->getOption('fileImageTVs', $sp);
$browserTVs = '';
$disable = $modx->getOption('disableEnableCheckbox', $sp);
//if a suffix is entered, all the chunks in use must have the same suffix. (e.g. TinymceWrapperIntrotext-suff, TinymceWrapperDescription-suff,TinymceWrapperContent-suff,TinymceWrapperTvs-suff)
$suffix = $modx->getOption('chunkSuffix', $sp);
$fileManagerTopNavLink = $modx->getOption('fileManagerTopNavLink', $sp);

//grab file browser options
$modxNativeBrowserRTEurl = $modx->getOption('modxNativeBrowserRTEurl', $sp);
$modxNativeBrowserRTEtitle = $modx->getOption('modxNativeBrowserRTEtitle', $sp);
$modxNativeBrowserTopNAVtitle = $modx->getOption('modxNativeBrowserTopNAVtitle', $sp);

$elFinderBrowserRTEurl = $modx->getOption('elFinderBrowserRTEurl', $sp);
$elFinderBrowserRTEtitle = $modx->getOption('elFinderBrowserRTEtitle', $sp);
$elFinderBrowserTopNAVurl = $modx->getOption('elFinderBrowserTopNAVurl', $sp);
$elFinderBrowserTopNAVtitle = $modx->getOption('elFinderBrowserTopNAVtitle', $sp);
$elFinderBrowserSHORTtitle = $modx->getOption('elFinderBrowserSHORTtitle', $sp);

$responsivefilemanagerBrowserRTEurl = $modx->getOption('responsivefilemanagerBrowserRTEurl', $sp);
$responsivefilemanagerBrowserRTEtitle = $modx->getOption('responsivefilemanagerBrowserRTEtitle', $sp);
$responsivefilemanagerBrowserTopNAVurl = $modx->getOption('responsivefilemanagerBrowserTopNAVurl', $sp);
$responsivefilemanagerBrowserTopNAVtitle = $modx->getOption('responsivefilemanagerBrowserTopNAVtitle', $sp);
$responsivefilemanagerBrowserSHORTtitle = $modx->getOption('responsivefilemanagerBrowserSHORTtitle', $sp);

$roxyFilemanBrowserRTEtitle = $modx->getOption('roxyFilemanBrowserRTEtitle', $sp);
$roxyFilemanBrowserRTEurl = $modx->getOption('roxyFilemanBrowserRTEurl', $sp);
$roxyFilemanBrowserTopNAVurl = $modx->getOption('roxyFilemanBrowserTopNAVurl', $sp);
$roxyFilemanBrowserTopNAVtitle = $modx->getOption('roxyFilemanBrowserTopNAVtitle', $sp);
$roxyFilemanBrowserSHORTtitle = $modx->getOption('roxyFilemanBrowserSHORTtitle', $sp);

//this eliminates clutter and confusion: reusuable config is the way of the past and the future - code here will be put in placeholder [[+commonTinyMCECode]]
//apply comma here, not in the chunk calling it
if ($modxEventName == 'OnManagerPageInit' || $modxEventName == 'OnDocFormPrerender') {
  $commonCode = $modx->getChunk('TinymceWrapperCommonCode' . $suffix);
  // $commonCode = $commonCode ? $commonCode.',' : '';
  $commonCode = $commonCode ? $commonCode : '';
}

//when TinyMCE is temporarily disabled, any new edit is updated before saving
$autoSaveTextAreas = '
  function autoSaveTextAreas(selectorId){
    setTimeout(function(){
      $("#"+selectorId).on("change", function() {
        tinyMCE.get(selectorId).setContent($("#"+selectorId).val())
        // console.log(selectorId+" has been updated");//debug stuff
      })
    },500)
   }
';

//let's setup some functions and file select callbacks for our supported file browsers
switch ($autoFileBrowser) {
  case 'modxNativeBrowser':
    $browserRTEurl = $modxNativeBrowserRTEurl;
    $browserRTEtitle = $modxNativeBrowserRTEtitle;
    $browserTopNAVtitle = $modxNativeBrowserTopNAVtitle;
    break;
  case 'elFinderBrowser':
    $browserRTEurl = '"'.$elFinderBrowserRTEurl.'"';
    $browserRTEtitle = $elFinderBrowserRTEtitle;
    $browserTopNAVurl = '\''.$elFinderBrowserTopNAVurl.'\'';
    $browserTopNAVtitle = $elFinderBrowserTopNAVtitle;
    $browserShortTitle = $elFinderBrowserSHORTtitle;
    break;
  case 'responsivefilemanagerBrowser':
    $browserRTEtitle = $responsivefilemanagerBrowserRTEtitle;
    $browserRTEurl = $responsivefilemanagerBrowserRTEurl;
    $browserTopNAVurl = $responsivefilemanagerBrowserTopNAVurl;
    $browserTopNAVtitle = $responsivefilemanagerBrowserTopNAVtitle;
    $browserShortTitle = $responsivefilemanagerBrowserSHORTtitle;
    break;
  case 'roxyFilemanBrowser':
    $browserRTEtitle = $roxyFilemanBrowserRTEtitle;
    $browserRTEurl = $roxyFilemanBrowserRTEurl;
    $browserTopNAVurl = $roxyFilemanBrowserTopNAVurl;
    $browserTopNAVtitle = $roxyFilemanBrowserTopNAVtitle;
    $browserShortTitle = $roxyFilemanBrowserSHORTtitle;
    break;
}


if ($autoFileBrowser == 'responsivefilemanagerBrowser') {
  $browserFunctions='
    autoFileBrowser = "";
    function responsive_filemanager_callback(field_id){
      thisFieldVal = $("#"+field_id).val();
      thisFieldNum = field_id.split("er");
      $("input#tv"+thisFieldNum[1]).val(thisFieldVal);
      $("#tv-image-preview-"+thisFieldNum[1]+" img").attr("title","preview by native MODx Image Browser");
      $("#"+field_id).parents(".modx-tv").find(".twImagePreview").hide().attr("src",thisFieldVal).insertBefore("#tv-image-preview-"+thisFieldNum[1]).fadeIn("slow");
      tinyMCE.activeEditor.windowManager.close();
    }
  ';
}
elseif ($autoFileBrowser == 'roxyFilemanBrowser') {
  $browserFunctions='
    autoFileBrowser = '.$autoFileBrowser.';
      function '.$autoFileBrowser.'(field_name, url, type, win) {
        roxyFileman = '.$browserRTEurl.';
        if (roxyFileman.indexOf("?") < 0) {
          roxyFileman += "?type=" + type;
        }
        else {
          roxyFileman += "&type=" + type;
        }
        roxyFileman += "&input=" + field_name + "&value=" + win.document.getElementById(field_name).value;
        if(tinyMCE.activeEditor.settings.language){
          roxyFileman += "&langCode=" + tinyMCE.activeEditor.settings.language;
        }
        tinyMCE.activeEditor.windowManager.open({
          title: "'.$browserRTEtitle.'",
          url: roxyFileman,
          plugins: "media",
          width : $(window).width()/1.2,
          height : $(window).height()/1.2
        }, {
          oninsert: function(url) {
            win.document.getElementById(field_name).value = url;
          }
        });
      return false;
      }
  ';
}
else{
  $browserFunctions ='
    autoFileBrowser = '.$autoFileBrowser.';
    function '.$autoFileBrowser.'(field_name, url, type, win) {
      tinyMCE.activeEditor.windowManager.open({
        title: "'.$browserRTEtitle.'",
        url: '.$browserRTEurl.',
        width : $(window).width()/1.2,
        height : $(window).height()/1.2
      }, {
        oninsert: function(url) {
          win.document.getElementById(field_name).value = url;
        }
      });
    return false;
    }
  ';
}



//lock the below to this event, to prevent spill over
if ($modxEventName == 'OnDocFormPrerender') {
  //let's expose the RFM rootfolder url for TinyMCE's external filemanager plugins for the chunks to access

  $enableDisableTiny = '';
  //is the enable/disable TinyMCE option selected? If so, let's create all the buttons at once; this will be split later on. This is good for TVs that have default content, and user wishes to revert. Disable TinyMCE, then revert.
  //there are two $("#ta") below; don't ask me why the Articles' Container/Child are has own thing going own here
  if ($disable == 1) {
  //prepend is better than append - you'll see!!!
    $disableTitle = 'Disable TinyMCE';
    $enableDisableTiny = '
    $("#modx-resource-introtext").parent().parent().prepend("<input data-tiny=\'modx-resource-introtext\' checked=\'checked\' title=\''.$disableTitle.'\' type=\'checkbox\' class=\'tinyTVcheck\' />&nbsp;&nbsp;&nbsp;");@
    $("#modx-resource-description").parent().parent().prepend("<input data-tiny=\'modx-resource-description\' checked=\'checked\' title=\''.$disableTitle.'\' type=\'checkbox\' class=\'tinyTVcheck\' />&nbsp;&nbsp;&nbsp;");@
    $("#ta").parents("#modx-resource-content").find(".x-panel-header-text").prepend("<input data-tiny=\'ta\' checked=\'checked\' title=\''.$disableTitle.'\' type=\'checkbox\' class=\'tinyTVcheck\' />&nbsp;&nbsp;&nbsp;");
    if($("#articles-box-publishing-information").length){
      $("#ta").parents(".contentblocks_replacement").find("label[for=ta]").prepend("<input data-tiny=\'ta\' checked=\'checked\' title=\''.$disableTitle.'\' type=\'checkbox\' class=\'tinyTVcheck\' />&nbsp;&nbsp;&nbsp;");
    }
    if($("#modx-resource-tabs__articles-tab-template").length){
      $("#modx-resource-header").append("<p id=\'tinyArtAlert\' style=\'width:70%;margin:0 auto;background-color:#32AB9A;padding:10px;border-radius:10px;color:white;text-align:center;\'><b>TinyMCE Wrapper Raw Code Protection:</b><br>Check this Articles Container > Template [Tab] > Content, before saving.<br>Unchecking the box will not only disable but remove TinyMCE, thus protecting your code</p>");
      $("#ta").parent().parent().find("label[for=ta]").prepend("<input data-tiny=\'ta\' checked=\'checked\' title=\'Remove TinyMCE \' type=\'checkbox\' class=\'tinyTVchecky\' onclick=\'javascript:tinymce.get(\"ta\").remove();$(this).remove();$(\"#tinyArtAlert\").fadeOut().remove();\' />&nbsp;&nbsp;&nbsp;");
    }
  ';
  //let's split the enable/disable checkboxes so that they don't appear randomly or unexpectedly
  $enableDisableTiny = explode("@", $enableDisableTiny);
  //what happens when you click the enable/disable checkbox
  $enableDisableTinyClick = '
    $(".tinyTVcheck").mousedown(function() {
      autoSaveTextAreas($(this).attr("data-tiny"));
      if (this.checked) {
        tinymce.get($(this).attr("data-tiny")).hide();
        $(this).trigger("change").attr("title","Enable TinyMCE");
      }
      else{
        tinymce.get($(this).attr("data-tiny")).show();
        $(this).trigger("change").attr("title","'.$disableTitle.'");
      }
      });';
  }

  //All TVs are here nicely placed independent of strict conditions, just in case we want to activate TVS even when RTE is disabled for a particular resource
  if ($tvs == 1) {
    $tvsChunk = $modx->getChunk('TinymceWrapperTVs' . $suffix, array('commonTinyMCECode'=>$commonCode));
    if ($tvsChunk) {
      //let's remove the checkboxes that enables/disables TinyMCE for the TVs
      //let's allow the TV reset button to work through TinyMCE, either enabled or disabled - textareas are updated .on change + the delay is neccesary since we are pseudo binding to existing click event
      if ($disable == 1) {
        $richTv = '
        if($(".modx-richtext").length){
          function updateReset(updateR){
            setTimeout(function(){
              tinyMCE.get(updateR).setContent($("#"+updateR).val());
              // console.log(updateR+" has been updated");//debug stuff
            },200)
          }
          $.each($(".modx-richtext"), function() {
            updateR = $(this).attr("id");
          $(this).parent().parent().find(".modx-tv-reset").on("click", function(){
            updateReset($(this).attr("data-tiny"));
          });
          $(this).parent().parent().prepend("<input data-tiny=\'"+this.id+"\' checked=\'checked\' title=\'Disable TinyMCE\' type=\'checkbox\' class=\'tinyTVcheck\' />");
          $(this).parent().parent().find(".modx-tv-reset").attr("data-tiny",this.id)
          });
        setTimeout(function(){
          ' . $tvsChunk . '
        },1000);
        }
        ';
      } 
      else {
        $richTv = '
        if($(".modx-richtext").length){
          $.each($(".modx-richtext"), function() {
          $(this).parent().parent().find(".modx-tv-reset").on("click", function(){$(this).change()});
            });
        setTimeout(function(){
          ' . $tvsChunk . '
        },1000);
        }';
      }
    }
  }
  if ($fileImageTVs == 1) {
    /*
    - RFM callback when an item is clicked
    - provide two ways to pop up RFM; the TInyMCE way is neater and more uniform
    - append hidden input#tinyFileImageBrowser to the body so that we have at least one active editor, in case the user has disabled TinyMCE for all other textareas and TVs
    - do some magic: create the respective image and file RFM buttons with appropriate properties when the page is really ready
    - create rudimentary image prev something similar to the native MODx' file browser
    - init hidden #tinyFileImageBrowser
    - Create tinymce #tinyFileImageBrowser on condition; give a definite CSS theme (only when one is not already loaded) to avoid overriding issues. Allow cross-browser amiability by setting to inline:true
    - make rfmTinyPopup popup somewhat responsive
    - add RFM menu button to MODx Media drop down - depends on the option fileImageTvs
    */
    $browserTVs = '
      function imageFileTVpop(field_name, url, type, win) {
        thisUrl = '.$browserRTEurl.';
        if (thisUrl.indexOf("dialog") > 0) {
            thisUrl = thisUrl.replace("popup=1", "popup=0");
          if (thisUrl.indexOf("?") < 0) {
            thisUrl += "?field_id="+field_name;
          }
          else {
            thisUrl += "&field_id="+field_name;
          }
        }
        tinyMCE.activeEditor.windowManager.open({
          title: "'.$browserRTEtitle.'",
          url: thisUrl,
          width : $(window).width()/1.2,
          height : $(window).height()/1.2
        }, {
          oninsert: function(url) {
            $("#"+field_name).val(url);
            thisFieldNum = field_name.split("er");
            $("input#tv"+thisFieldNum[1]).val(url);
            $("#tv-image-preview-"+thisFieldNum[1]+" img").attr("title","preview by '.$browserShortTitle.'");
            $("#"+field_name).parents(".modx-tv").find(".twImagePreview").hide().attr("src",url).insertBefore("#tv-image-preview-"+thisFieldNum[1]).fadeIn("slow");
            tinyMCE.activeEditor.windowManager.close();
          }
        });
      return false;
      }
      Ext.onReady(function(){
       setTimeout(function(){
         $("body").append("<input id=\'tinyFileImageBrowser\' type=\'hidden\' value=\'\' />");
         $("input[id^=tvbrowser]").each(function(){
        fileOrImage = $(this).parents(".modx-tv").find(".x-form-file-trigger").attr("id");
        if($("#"+fileOrImage).length){
        twImageFileOnClick = "imageFileTVpop($(this).attr(\'data-tiny\'))";
        twImageFileBtn = \'&nbsp;'.$browserShortTitle.'&nbsp;(all&nbsp;files)&nbsp;\';
        twImageFileBtnTitle = \'&nbsp;'.$browserShortTitle.'&nbsp;All-File&nbsp;Browser&nbsp;\';
        twImagePreview = "";
          }
          else{
        twImageFileOnClick = "imageFileTVpop($(this).attr(\'data-tiny\'))";
        twImageFileBtn = \'&nbsp;'.$browserShortTitle.'&nbsp;(images)&nbsp;\';
        twImageFileBtnTitle = \'&nbsp;'.$browserShortTitle.'&nbsp;Image-Only&nbsp;Browser&nbsp;\';
        twImagePreview = "<img class=\'twImagePreview\' title=\'preview by '.$browserShortTitle.' Image Browser\' src=\'\' style=\'width:100px;display:none;\' />";
          }
          $(this).parents(".x-form-item")
          .find(".modx-tv-caption")
          .parent()
          .prepend("<input class=\'twImageFileBtnClass x-form-field-wrap x-form-trigger\' data-tiny="+this.id+" type=\'button\' value="+twImageFileBtn+" title="+twImageFileBtnTitle+" onclick="+twImageFileOnClick+">"+twImagePreview);
          if(tinymce.editors.length < 1){
            tinymce.init({
              selector: "#tinyFileImageBrowser",
              skin_url: MODx.config.assets_url+"components/tinymcewrapper/tinymceskins/fairOphelia",
              inline:true,
              forced_root_block : "",
              force_br_newlines : false,
              force_p_newlines : false
            })
          }
        })
        },1000);
      })
    ';
    if($autoFileBrowser =='modxNativeBrowser'){
      $browserTVs = '';
    }
  }
}

//if user selects the option to activate this wrapper, we save him/her the trip of heading to System Settings - is this being too officious or intrusive?
if ($activateTinyMCE == 1) {
  if ($useEditor !== 1 || $whichEditor !== 'TinymceWrapper') {
    $use = $modx->getObject('modSystemSetting', 'use_editor');
    $use->set('value', 1);
    $use->save();
    $which = $modx->getObject('modSystemSetting', 'which_editor');
    $which->set('value', 'TinymceWrapper');
    $which->save();
  }
  //leave all elements alone - attack only resources
if ($modxEventName == 'OnDocFormPrerender') {
    
    //check if user wants to load TinyMCE for New Resources
      $loadTiny = 0; //default
    if(isset($scriptProperties['resource']) && $resource->get('richtext')) { //existing resource with RTE clicked
      $loadTiny = 1;
      }
    if($loadTiny == 0 && $newResources == 1 && $richtext_default == 1 && !isset($scriptProperties['resource'])) {
      $loadTiny = 1;
    }

    if ($loadTiny == 1) {
      //should we load jQuery?
      if ($jQuerySrc) {
        $modx->regClientStartupHTMLBlock("<script src='" . $jQuerySrc . "'></script>");
      }
      //should we load TinyMCE (from CDN or assets folder)?
      if ($tinySrc) {
        $modx->regClientStartupHTMLBlock("<script src='" . $tinySrc . "'></script>");
      }
      //let's init introtext, description and content textareas only if user has specified so in this plugin's properties
      if ($introtext == 1) {
        $introChunk = $modx->getChunk('TinymceWrapperIntrotext' . $suffix, array('commonTinyMCECode'=>$commonCode));
        if ($introChunk) {
          $intro = $enableDisableTiny[0] . $introChunk;
        }
      }
      if ($description == 1) {
        $descChunk = $modx->getChunk('TinymceWrapperDescription' . $suffix, array('commonTinyMCECode'=>$commonCode));
        if ($descChunk) {
          $desc = $enableDisableTiny[1] . $descChunk;
        }
      }
      if ($content == 1) {
        $conChunk = $modx->getChunk('TinymceWrapperContent' . $suffix, array('commonTinyMCECode'=>$commonCode));
        if ($conChunk) {
          $con = $enableDisableTiny[2] . $conChunk;
        }
      }
      //all textareas depend on whether the Resource is Rich Text-enabled. We use so many IFs to protect against error
      //any and all Rich TVs + File and Image TVs will now be initiated
      //Now let's do the real init of all textareas
      //seems Ext.onReady is better than setTimeout, delay of 400
      $modx->regClientStartupHTMLBlock("<script>" . $browserFunctions . $autoSaveTextAreas . $browserTVs . "Ext.onReady(function () {" . $intro . $desc . $con . $richTv . $enableDisableTinyClick . "});</script>");
    }
    //let's see if the person wants TVs activated even when RTE is disabled for the Resource.
    elseif (isset($scriptProperties['resource']) && !$resource->get('richtext')) {
        if ($tvAddict == 1) {
          if ($jQuerySrc) {
            $modx->regClientStartupHTMLBlock("<script src='" . $jQuerySrc . "'></script>");
          }
          if ($tinySrc) {
            $modx->regClientStartupHTMLBlock("<script src='" . $tinySrc . "'></script>");
          }
          $modx->regClientStartupHTMLBlock("<script>" . $browserFunctions . $autoSaveTextAreas . $browserTVs . "Ext.onReady(function () {" . $richTv . $enableDisableTinyClick . "});</script>");
        }
    }
  }
}
else{
  if ($modxEventName == 'OnDocFormPrerender') {
        if ($tvSuperAddict == 1) {
          if ($jQuerySrc) {
            $modx->regClientStartupHTMLBlock("<script src='" . $jQuerySrc . "'></script>");
          }
          if ($tinySrc) {
            $modx->regClientStartupHTMLBlock("<script src='" . $tinySrc . "'></script>");
          }
          $modx->regClientStartupHTMLBlock("<script>" . $browserFunctions . $autoSaveTextAreas . $browserTVs . "Ext.onReady(function () {" . $richTv . $enableDisableTinyClick . "});</script>");
        }
  }
}

if ($modxEventName == 'OnManagerPageInit' || $modxEventName == 'OnDocFormPrerender') {
  $mediaPopUp ='';
  if ($fileManagerTopNavLink == 1 && $autoFileBrowser !== 'modxNativeBrowser') {
    // inject file browser link to Manager Top Nav Media dropdown
    $mediaPopUp = '
      function mediaPopup(url)
        {
          var w = 880;
          var h = 570;
          var l = Math.floor((screen.width-w)/2);
          var t = Math.floor((screen.height-h)/2);
          var win = window.open(url, "", "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
        }

      taskCounter = 0;
      var linkCheck = setInterval(function(){
        //requires no jQuery or TinyMCE - will work even if activateTinyMCE is false
        var fileBrowserBro = document.getElementById("file_browser");
        if(fileBrowserBro){
          taskCounter++;
          fileBrowserBro.insertAdjacentHTML( "afterbegin", "<li><a href=\"javascript:;\" onclick=\"mediaPopup('.$browserTopNAVurl.')\">'.$browserTopNAVtitle.'<span class=\"description\">'.$browserTopNAVsubtext.'</span></a></li>");
        }
        if(taskCounter = 1)
          {clearInterval(linkCheck);
          }
      },1000);
    ';
     $modx->regClientStartupHTMLBlock("<script>" . $mediaPopUp . "</script>");
  }

  //let's catch only the textarea[content] when it is created. You can use livejquery or arrive.js if you like
  //make it non-obstrusive - mouseenter seems better tan mouseout - works when modal pops and cursor is already on the textarea

  $quickUpdateCreate = $modx->getOption('quickUpdateCreate', $sp);
  $quick = '';
  $quickChunk = $modx->getChunk('TinymceWrapperQuickUpdate' . $suffix, array('commonTinyMCECode'=>$commonCode));

  if ($quickChunk) {
    $quick = $quickChunk;
  }
  if ($quickUpdateCreate == 1){
    //do not load these twice when resources are being edited
    if ($modxEventName == 'OnManagerPageInit') {
      if ($jQuerySrc) {
        $modx->regClientStartupHTMLBlock("<script src='" . $jQuerySrc . "'></script>");
      }
      if ($tinySrc) {
        $modx->regClientStartupHTMLBlock("<script src='" . $tinySrc . "'></script>");
      }
    }

    $quickUpdateTinyMCE = '
      $(document).on("mouseenter", ".modx-window", function () {
        tinyContent = $(this).find("textarea[name=content]");
        quickyId = "#"+tinyContent.attr("id");
        dataTiny = tinyContent.attr("id");
        // if ($(this).has("textarea[name=content]").length){//will catch Quick edit files from server
        if ($(this).has("input[name=published]").length && $(this).has("textarea[name=content]").length){
          if ($(this).has(".tinyEn").length){
          }
          else{
          // tinyContent.parent().parent().find("label").prepend("<button class=\'tinyEn x-form-field-wrap x-form-trigger\' onclick=enableTiny(quickyId,dataTiny)>Edit with TinyMCE?</button>&nbsp;&nbsp;&nbsp;");
          $(this).find(".x-toolbar-left-row").prepend("<p onclick=enableTiny(quickyId,dataTiny) class=\'x-btn x-btn-small x-btn-icon-small-left x-btn-noicon\' unselectable=\'on\'><em><button class=\'tinyEn x-btn-text\'>Edit with TinyMCE</button></em></p>");
          $(this).find(".tinyEn").attr("data-tiny",dataTiny);
          // $(this).find("button:contains(\'Close\')").first().attr("data-tiny","close-"+dataTiny);
          // $(this).find("button:contains(\'Save\')").first().attr("data-tiny","save-"+dataTiny);
          }
        }
      // })
      // .on("mouseout", tinymce.activeEditor, function () {
        // if(tinymce.editors.length > 1){}
        // if (tinyMCE.activeEditor !== null){
        //   if(tinyMCE.activeEditor.isHidden() != true){
        //     tinyMCE.activeEditor.save();
        //     javascript:console.log("saved");
        //   }
        // }
      });
      function enableTiny(quickyId,id){
        enableTinyInit(quickyId);
        id = dataTiny;
        $("button[data-tiny=\'"+id+"\']").html("Disable TinyMCE").parent().parent().attr("onclick","disTiny(dataTiny)");
      }
      function disTiny(dataTiny){
        dataTiny = dataTiny;
        tinymce.get(dataTiny).hide();
        $("button[data-tiny=\'"+dataTiny+"\']").html("Enable TinyMCE").parent().parent().attr("onclick","enTiny(dataTiny)");
      }
      function enTiny(dataTiny){
        dataTiny = dataTiny;
        tinymce.get(dataTiny).show();
        $("button[data-tiny=\'"+dataTiny+"\']").html("Disable TinyMCE").parent().parent().attr("onclick","disTiny(dataTiny)");
      }
      function enableTinyInit(quickyId){
        $(quickyId).parents(".modx-window").find(".x-tab-panel-body.x-tab-panel-body-top").css({"overflow":"hidden","overflow-y":"auto"});
        ' .$quick. '
      }
      ';
      $modx->regClientStartupHTMLBlock("<script>" . $browserFunctions . $quickUpdateTinyMCE . "</script>");
  }
}
return;
