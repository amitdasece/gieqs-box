const browserSync = require("browser-sync");



<?php require '../../includes/config.inc.php';?>


<head>

    <?php

//error_reporting(E_ALL);


      //define user access level

      $openaccess = 1;
      /* $requiredUserLevel = 5; */


      require BASE_URI . '/head.php';

      $general = new general;

      $navigator = new navigator;

      $formv1 = new formGenerator;

      ?>

    <!--Page title-->
    <title>GIEQs Online Endoscopy Trainer - Scores - Cacum Visualisation calculator</title>

    <link rel="stylesheet" href="<?php echo BASE_URL;?>/assets/libs/animate.css/animate.min.css">


    <style>
    .gieqsGold {

        color: rgb(238, 194, 120);


    }

    .card-placeholder {

        width: 344px;

    }

    .break {
        flex-basis: 100%;
        height: 0;
    }

    .flex-even {
        flex: 1;
    }

    .flex-nav {
        flex: 0 0 18%;
    }



    .gieqsGoldBackground {

        background-color: rgb(238, 194, 120);


    }

    .tagButton {

        cursor: pointer;

    }





    iframe {
        box-sizing: border-box;
        height: 25.25vw;
        left: 50%;
        min-height: 100%;
        min-width: 100%;
        transform: translate(-50%, -50%);
        position: absolute;
        top: 50%;
        width: 100.77777778vh;
    }

    .cursor-pointer {

        cursor: pointer;

    }

    @media (max-width: 768px) {

        .flex-even {
            flex-basis: 100%;
        }
    }

    @media (max-width: 768px) {

        .card-header {
            height: 250px;
        }

        .card-placeholder {

            width: 204px;

        }


    }

    @media (min-width: 1200px) {
        #chapterSelectorDiv {



            top: -3vh;


        }

        #playerContainer {

            margin-top: -20px;

        }

        #collapseExample {

            position: absolute;
            max-width: 50vh;
            z-index: 25;
        }



    }
    </style>


</head>

<body>
    <header class="header header-transparent" id="header-main">

        <!-- Topbar -->

        <?php require BASE_URI . '/pages/learning/includes/topbar.php';?>

        <!-- Main navbar -->

        <?php require BASE_URI . '/pages/learning/includes/nav.php';?>




    </header>

    <?php
		if (isset($_GET["id"]) && is_numeric($_GET["id"])){
			$id = $_GET["id"];
		
		}else{
		
			$id = null;
		
		}
				    
                        
                        
		
        ?>

    <!-- load all video data -->

    <div id="id" style="display:none;"><?php if ($id){echo $id;}?></div>

    <!--- specifiy the tag Categories required for display  CHANGEME-->

    <?php
        $requiredTagCategories = ['66', '105'];

        ?>

    <div id="requiredTagCategories" style="display:none;"><?php echo json_encode($requiredTagCategories);?></div>



    <!--CONSTRUCT TAG DISPLAY-->

    <!--GET TAG CATEGORY NAME 
                    
                    <?php

                    //define the page for referral info

                    //$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
                    $url =  "{$_SERVER['REQUEST_URI']}";

                    $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );

                    ?>
-->

    <div id="escaped_url" style="display:none;"><?php echo $escaped_url;?></div>

    <!--
                    
                TODO see other videos with similar tags, see videos with this tag, tag jump the video,
                list of chapters with associated tags [toggle view by category, chapter]
                
                -->



    <div class="main-content bg-gradient-dark">

        <!--Header CHANGEME-->



        <div class="container">

            <div class="row">

                    <p class="h1 mt-10">Completeness of Caecal Intubation Score</p>
                    <p class="h6">MOBILE BROWSERS not supported</p>

            </div>
            <div class="row">

                    <div class="col-10">
                    <!-- Image Map Generated by http://www.image-map.net/ -->
                    <img src="<?php echo BASE_URL;?>/assets/img/learning/research/image_map_cecum.png"
                        class="map" usemap="#image-map" style="max-height:60vh;">

                    <map name="image-map">
                        <area class="cecum-area" target="" alt="OQ1" title="OQ1" href="javascript:OQ1=1;updateScore();"
                            coords="556,623,558,471,494,532,425,318,246,318,260,414,294,478,306,502,338,535,364,559,405,582,439,601,485,616,521,621"
                            shape="poly">
                        <area class="cecum-area" target="" alt="OQ2" title="OQ2" href="javascript:OQ2=1;updateScore();"
                            coords="427,316,245,315,260,219,307,135,323,115,355,82,398,54,453,25,495,15,529,14,559,12,556,206,384,172,400,232,414,278"
                            shape="poly">
                        <area class="cecum-area" target="" alt="OQ3" title="OQ3" href="javascript:OQ3=1;updateScore();"
                            coords="557,206,560,12,616,18,660,29,717,56,786,108,823,158,861,237,868,317,706,318,775,249"
                            shape="poly">
                        <area class="cecum-area" target="" alt="OQ4" title="OQ4" href="javascript:OQ4=1;updateScore();"
                            coords="557,623,558,469,706,320,867,319,866,373,841,448,807,501,763,546,741,569,686,596,643,613,586,623"
                            shape="poly">
                        <area class="cecum-area" target="" alt="TF3" title="TF3" href="javascript: TF3=1;updateScore();" coords="594,367,640,404" shape="rect">
                        <area class="cecum-area" target="" alt="TF1" title="TF1" href="javascript:TF2=1;updateScore();" coords="440,344,487,378" shape="rect">
                        <area class="cecum-area" target="" alt="TF2" title="TF2" href="javascript:TF1=1;updateScore();" coords="587,246,535,206" shape="rect">
                        <area class="cecum-area" target="" alt="AO" title="AO" href="javascript:AO=1;updateScore();" coords="526,290,589,347" shape="rect">
                    </map>

                </div>
                <div class="col-2">

                    <p class="h2 score">Score is <span id="scoreResult"></span></p>
                    <p class="text-white segments mt-3">Visualised segments were <br/> <span id="segments"></span></p>
                    <p class="text-white mt-3">This data is automatically copied to the clipboard</p>
                    <button class="btn btn-sm btn-dark mt-3" onclick="location.reload();">Reset</button>


                </div>
            </div>
            <div class="row">
            <small>OQ = outer quadrant, TF = tri-radiate fold, AO = appendiceal orifice, ICV = ileo-caecal valve</small>
            </div>
        </div>
    </div>
    <!-- Omnisearch -->






    <!-- Modal -->


    <?php require BASE_URI . '/footer.php';?>

    <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
    <!-- <script src="assets/js/purpose.core.js"></script> -->
    <!-- Page JS -->
    <!-- Google maps -->

    <!-- Purpose JS -->
    <script src="<?php echo BASE_URL . "/assets/js/purpose.js";?>"></script>
    <!-- <script src=<?php echo BASE_URL . "/assets/js/generaljs.js";?>></script> -->

    <script src="<?php echo BASE_URL. "/node_modules/image-map-resizer/js/imageMapResizer.min.js";?>"></script>
    <script src="<?php echo BASE_URL. "/node_modules/maphilight/jquery.maphilight.min.js";?>"></script>

    <script>
    
    
    var OQ1 = 0;
    var OQ2 = 0;
    var OQ3 = 0;
    var OQ4 = 0;
    var TF1 = 0;
    var TF2 = 0;
    var TF3 = 0;
    var AO = 0;

    var OQ1visualised = false;
    var OQ2visualised = false;
    var OQ3visualised = false;
    var OQ4visualised = false;
    var TF1visualised = false;
    var TF2visualised = false;
    var TF3visualised = false;
    var AOvisualised = false;


    //var totalScore = 0;

    function copyToClipboard(text) {
    if (window.clipboardData && window.clipboardData.setData) {
        // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
        return window.clipboardData.setData("Text", text);

    }
    else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
        var textarea = document.createElement("textarea");
        textarea.textContent = text;
        textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in Microsoft Edge.
        document.body.appendChild(textarea);
        textarea.select();
        try {
            return document.execCommand("copy");  // Security exception may be thrown by some browsers.
        }
        catch (ex) {
            console.warn("Copy to clipboard failed.", ex);
            return false;
        }
        finally {
            document.body.removeChild(textarea);
        }
    }
}

    function updateScore() {


        var totalScore = OQ1 + OQ2 + OQ3 + OQ4 + TF1 + TF2 + TF3 + AO;
        $('#scoreResult').text(totalScore);

        var visualisedSegments = OQ1visualised ? 'OQ1, ' : '';
        visualisedSegments += OQ2visualised ? 'OQ2, ' : '';
        visualisedSegments += OQ3visualised ? 'OQ3, ' : '';
        visualisedSegments += OQ4visualised ? 'OQ4, ' : '';
        visualisedSegments += TF1visualised ? 'TF1, ' : '';
        visualisedSegments += TF2visualised ? 'TF2, ' : '';
        visualisedSegments += TF3visualised ? 'TF3, ' : '';
        visualisedSegments += AOvisualised ? 'AO, ' : '';

        //create an object

        var scoreObject = {

            "OQ1" : OQ1visualised ? 'Yes' : 'No',
            "OQ2" : OQ2visualised ? 'Yes' : 'No',
            "OQ3" : OQ3visualised ? 'Yes' : 'No',
            "OQ4" : OQ4visualised ? 'Yes' : 'No',
            "TF1" : TF1visualised ? 'Yes' : 'No',
            "TF2" : TF2visualised ? 'Yes' : 'No',
            "TF3" : TF3visualised ? 'Yes' : 'No',
            "AO" : AOvisualised ? 'Yes' : 'No',
            "Score" : totalScore,




        }
        
        console.log(JSON.stringify(scoreObject));

        copyToClipboard(JSON.stringify(scoreObject));

        window.opener.postMessage(JSON.stringify(scoreObject), '*');



/*         OQ3visualised ? 'OQ3' : '' + OQ4visualised ? 'OQ4' : '' + TF1visualised ? 'TF1' : '' + TF2visualised ? 'TF2' : '' + TF3visualised ? 'TF3' : '' + AOvisualised ? 'AO' : '';
 */        $('#segments').text(visualisedSegments);


    }






    var videoPassed = $("#id").text();
    </script>

    <script src=<?php echo BASE_URL . "/pages/learning/includes/social.js"?>></script>

    <script>
    //the number that are actually loaded
    var loaded = 1;

    //the number the user wants
    var loadedRequired = 1;

    var firstTime = 1;
    var activeStatus = 1;

    var requiredTagCategoriesText = $("#requiredTagCategories").text();

    var requiredTagCategories = JSON.parse(requiredTagCategoriesText);


    function refreshNavAndTags() {

        var screenTop = $(document).scrollTop();

        //console.log(top);

        var tags = [];

        $('.tag').each(function() {

            if ($(this).is(":checked")) {
                tags.push($(this).attr('data'));
            }


        })



        //push how many loaded, use loaded variable

        console.dir(tags);

        /*var key = $(this).attr('data');

				const dataToSend = {

					key: key,

				}*/
        var dataToSend = {

            tags: tags,
            requiredTagCategories: requiredTagCategories,
            active: activeStatus,

        }

        //const jsonString2 = JSON.stringify(dataToSend);

        const jsonString = JSON.stringify(dataToSend);
        ////console.log(jsonString);
        //console.log(siteRoot + "/pages/learning/scripts/getNavv2.php");

        var request2 = $.ajax({
            beforeSend: function() {

                $('#videoCards').html(
                    "<div class=\"d-flex align-items-center\"><strong>Loading...</strong><div class=\"spinner-border ml-auto\" role=\"status\" aria-hidden=\"true\"></div></div>"
                    );
                //for each tags array push the badges to the tags shown area
                var html = '';
                $.each(tags, function(k, v) {

                    //HERE WE HAVE THE TAGID

                    var tagid = v;

                    //get the name and category

                    var tagName = $('body').find('#navigationZone').find('#tag' + v).siblings()
                        .text();

                    var tagCategory = $('body').find('#navigationZone').find('#tag' + v).parent()
                        .parent().parent().parent().find('span').text();

                    html +=
                        '<span class="badge bg-gieqsGold text-dark mx-2 my-2 tagButton" data="' +
                        v + '">' + tagCategory + ' / ' + tagName +
                        ' <i style="float:right;" class="fas fa-times removeTag cursor-pointer ml-1" data="' +
                        v + '"></i></span>';

                });
                $('body').find('#navigationZone').find('#shown-tags').html(html);

            },
            url: siteRoot + "/pages/learning/scripts/getNavv2.php",
            type: "POST",
            contentType: "application/json",
            data: jsonString,
        });



        request2.done(function(data) {
            // alert( "success" );
            if (data != '[]') {
                var toKeep = $.parseJSON(data.trim());
                //alert(data.trim());
                console.dir(toKeep);


                $('.tag').each(function() {

                    var tagid = $(this).attr('data');

                    if (toKeep.indexOf(tagid) > -1) {

                        $(this).attr('disabled', false);

                    } else {

                        $(this).attr('disabled', true);
                    }

                })


            }
            //$(document).find('.Thursday').hide();
        })

        request2.then(function(data) {
            var tags = [];

            $('.tag').each(function() {

                if ($(this).is(":checked")) {
                    tags.push($(this).attr('data'));
                }


            })

            //TODO ADD ABILITY TO PASS A PARAMETER HERE INDICATING NUMBER LOADED
            //THEN MODIFY LAYOUT AND NUMBER LOADED

            console.dir(tags);

            var dataToSend = {

                tags: tags,
                loaded: loaded,
                loadedRequired: loadedRequired,
                requiredTagCategories: requiredTagCategories,
                referringUrl: $('#escaped_url').text(),
                active: activeStatus,


            }

            const jsonString2 = JSON.stringify(dataToSend);




            const jsonString = JSON.stringify(tags);

            console.dir(jsonString2);


            var request3 = $.ajax({
                beforeSend: function() {


                },
                url: siteRoot + "/pages/learning/scripts/getVideos.php",
                type: "POST",
                contentType: "application/json",
                data: jsonString2,
            });
            request3.done(function(data) {
                // alert( "success" );
                if (data) {
                    //var toKeep = $.parseJSON(data.trim());
                    //alert(data.trim());
                    //console.dir(toKeep);

                    $('#videoCards').html(data);
                    $('body').find('#itemCount').each(function() {

                        var count = $('body').find('.individualVideo').length;
                        $(this).text(count);


                    })


                    if (firstTime == 1) {
                        $('body').on('click', '#loadMore', function() {

                            loadedRequired = loadedRequired + 1;


                            refreshNavAndTags();

                        })
                    }



                    if (firstTime > 1 && loadedRequired > 1) {

                        var loadedRequiredMultiple = ((loadedRequired - 1) * 10) - 3;

                        //console.log(loadedRequiredMultiple);

                        //scroll to current level


                        $("body,html").animate({
                                scrollTop: $('body').find('.individualVideo:eq(' +
                                    loadedRequiredMultiple + ')').offset().top
                            },
                            2 //speed
                        );
                    }


                    firstTime = firstTime + 1;
                    //$('body').find('.individualVideo:eq('+loadedRequiredMultiple +')').scrollTop(300);





                }
                //$(document).find('.Thursday').hide();
            })


        })


    }

    $(document).ready(function() {



        $('map').imageMapResize();

        $('.map').maphilight({
            fillColor: 'f1cd8e',
            strokeColor:"eec278",
            strokeWidth:3,
        });

        $('.cecum-area').click(function(e){

            //alert('clicked an area');
            e.preventDefault();
            var data = $(this).mouseout().data('maphilight') || {};
            data.alwaysOn = !data.alwaysOn;
            $(this).data('maphilight', data).trigger('alwaysOn.maphilight');

            if ($(this).attr('title') == 'AO'){

                if (AO == 0){

                    AO = 1;
                    AOvisualised = 1;
                    updateScore();
            
                }else if (AO == 1){


                    AO = 0;
                    AOvisualised = 0;
                    updateScore();

                }

            }else if ($(this).attr('title') == 'OQ1'){

                if (OQ1 == 0){
                    OQ1 = 1;
                    OQ1visualised = 1;
                    updateScore();
                }else if (OQ1 == 1){


                    OQ1 = 0;
                    OQ1visualised = 0;
                    updateScore();

                }
            
            }else if ($(this).attr('title') == 'OQ2'){

                if (OQ2 == 0){
                    OQ2 = 1;
                    OQ2visualised = 1;
                    updateScore();
                }else if (OQ2 == 1){


                    OQ2 = 0;
                    OQ2visualised = 0;
                    updateScore();

                }
            }else if ($(this).attr('title') == 'OQ3'){

                if (OQ3 == 0){
                    OQ3 = 1;
                    OQ3visualised = 1;
                    updateScore();
                }else if (OQ3 == 1){


                    OQ3 = 0;
                    OQ3visualised = 0;
                    updateScore();

                }
            }else if ($(this).attr('title') == 'OQ4'){

                if (OQ4 == 0){
                    OQ4 = 1;
                    OQ4visualised = 1;
                    updateScore();
                }else if (OQ4 == 1){


                    OQ4 = 0;
                    OQ4visualised = 0;
                    updateScore();

                }
            }else if ($(this).attr('title') == 'TF1'){

                if (TF1 == 0){
                    TF1 = 1;
                    TF1visualised = 1;
                    updateScore();
                }else if (TF1 == 1){


                    TF1 = 0;
                    TF1visualised = 0;
                    updateScore();

                }
            }else if ($(this).attr('title') == 'TF2'){

                if (TF2 == 0){
                    TF2 = 1;
                    TF2visualised = 1;
                    updateScore();
                }else if (TF2 == 1){


                    TF2 = 0;
                    TF2visualised = 0;
                    updateScore();

                }
            }else if ($(this).attr('title') == 'TF3'){

                if (TF3 == 0){
                    TF3 = 1;
                    TF3visualised = 1;
                    updateScore();
                }else if (TF3 == 1){


                    TF3 = 0;
                    TF3visualised = 0;
                    updateScore();

                }
            }
            
        })



      
        //refreshNavAndTags();

        $('#refreshNavigation').click(function() {


            firstTime = 1;
            //the number that are actually loaded
            loaded = 1;

            //the number the user wants
            loadedRequired = 1;

            $('.tag').each(function() {

                if ($(this).is(":checked")) {

                    $(this).prop('checked', false);
                }


            })

            refreshNavAndTags();

        })

        //on load check if any are checked, if so load the videos

        //if none are checked load 10 most recent videos for these categories

        $('.tag').click(function() {

            refreshNavAndTags();

        })

        $('body').on('click', '.removeTag', function() {

            var tagToRemove = $(this).attr('data');
            //remove the check from the tag removed

            $('.tag').each(function() {

                if ($(this).attr("data") == tagToRemove) {

                    $(this).prop('checked', false);

                }


            })


            refreshNavAndTags();

        })
        //active behaviour

        $('body').on('change', '#active', function() {

            var active = $(this).children("option:selected").val();
            //remove the check from the tag removed

            activeStatus = active;

            refreshNavAndTags();

        })










    })
    </script>
</body>

</html>