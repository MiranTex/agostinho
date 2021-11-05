<?php

/**
 * @package Medico
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2018 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */
//no direct accees
defined('_JEXEC') or die('resticted aceess');

class SppagebuilderAddonSlideshow_full extends SppagebuilderAddons {

    public function render() {
        $autoplay = (isset($this->addon->settings->autoplay) && $this->addon->settings->autoplay) ? $this->addon->settings->autoplay : '';
        $controllers = (isset($this->addon->settings->controllers) && $this->addon->settings->controllers) ? $this->addon->settings->controllers : '';
        $arrows = (isset($this->addon->settings->arrows) && $this->addon->settings->arrows) ? $this->addon->settings->arrows : '';
        $class = (isset($this->addon->settings->class) && $this->addon->settings->class) ? $this->addon->settings->class : '';


        //Check Auto Play
        $slide_autoplay = ($autoplay) ? 'data-sppb-slide-ride="true"' : '';
        $slide_controllers = ($controllers) ? 'data-sppb-slidefull-controllers="true"' : '';
        
        //output
        $output = '<div class="sppb-addon sppb-slider-wrapper sppb-slider-fullwidth-wrapper ' . $class . '">';
        $output .= '<div class="sppb-slider-item-wrapper">';
        $output .= '<div id="slide-fullwidth" class="owl-carousel" ' . $slide_controllers . ' ' . $slide_autoplay . ' >';

        foreach ($this->addon->settings->sp_slideshow_full_item as $key => $slide_item) {

            // if have bg
            $bg_image = ($slide_item->bg) ? 'style="background-image: url(' . JURI::base() . $slide_item->bg . '); background-repeat: no-repeat;
            background-size: cover; background-position: center center;"' : '';

            // *** animation *** //
            // Subtitle animation
            $subtitle_animation = '';
            if (isset($slide_item->subtitle_animation) && $slide_item->subtitle_animation) {
                $slide_item->subtitle_animation .= ' sppb-wow ' . $slide_item->subtitle_animation;
            }

            $subtitle_data_attr = '';
            if (isset($slide_item->subtitle_animationduration) && $slide_item->subtitle_animationduration)
                $subtitle_data_attr .= ' data-sppb-wow-duration="' . $slide_item->subtitle_animationduration . 'ms"';
            if (isset($slide_item->subtitle_animationdelay) && $slide_item->subtitle_animationdelay)
                $subtitle_data_attr .= ' data-sppb-wow-delay="' . $slide_item->subtitle_animationdelay . 'ms"';

            // Title animation
            $title_animation = '';
            if (isset($slide_item->title_animation) && $slide_item->title_animation) {
                $slide_item->title_animation .= ' sppb-wow ' . $slide_item->title_animation;
            }

            $title_data_attr = '';
            if (isset($slide_item->title_animationduration) && $slide_item->title_animationduration)
                $title_data_attr .= ' data-sppb-wow-duration="' . $slide_item->title_animationduration . 'ms"';
            if (isset($slide_item->title_animationdelay) && $slide_item->title_animationdelay)
                $title_data_attr .= ' data-sppb-wow-delay="' . $slide_item->title_animationdelay . 'ms"';

            // image animation
            $image_animation = '';
            if (isset($slide_item->image_animation) && $slide_item->image_animation) {
                $image_animation .= ' sppb-wow ' . $slide_item->image_animation;
            }

            $image_data_attr = '';
            if (isset($slide_item->image_animationduration) && $slide_item->image_animationduration)
                $image_data_attr .= ' data-sppb-wow-duration="' . $slide_item->image_animationduration . 'ms"';
            if (isset($slide_item->cotent_animationdelay) && $slide_item->cotent_animationdelay)
                $image_data_attr .= ' data-sppb-wow-delay="' . $slide_item->cotent_animationdelay . 'ms"';

            // content animation
            if (isset($slide_item->content_animation) && $slide_item->content_animation) {
                $slide_item->content_animation .= ' sppb-wow ' . $slide_item->content_animation;
            }

            $content_data_attr = '';
            if (isset($slide_item->content_animationduration) && $slide_item->content_animationduration)
                $content_data_attr .= ' data-sppb-wow-duration="' . $slide_item->content_animationduration . 'ms"';
            if (isset($slide_item->content_animationdelay) && $slide_item->content_animationdelay)
                $content_data_attr .= ' data-sppb-wow-delay="' . $slide_item->content_animationdelay . 'ms"';

            // Button animation
            if (isset($slide_item->button_animation) && $slide_item->button_animation) {
                $slide_item->button_animation .= ' sppb-wow ' . $slide_item->button_animation;
            }

            $button_data_attr = '';
            if (isset($slide_item->button_animationduration) && $slide_item->button_animationduration)
                $button_data_attr .= ' data-sppb-wow-duration="' . $slide_item->button_animationduration . 'ms"';
            if (isset($slide_item->button_animationdelay) && $slide_item->button_animationdelay)
                $button_data_attr .= ' data-sppb-wow-delay="' . $slide_item->button_animationdelay . 'ms"';



            // Before button icon
            $button_before_icon = (isset($slide_item->button_before_icon) && $slide_item->button_before_icon) ? '<i class="fa ' . $slide_item->button_before_icon . '"></i>' : '';

            $output .= '<div class="sppb-slideshow-fullwidth-item item">';
            $output .= '<div class="sppb-slide-item-bg sppb-slideshow-fullwidth-item-bg" ' . $bg_image . '>';
            $output .= '<div class="container">';
            $output .= '<div class="sppb-slideshow-fullwidth-item-text">';
            
            $output .= '<div class="sppb-row">';
            $output .= '<div class="sppb-col-sm-5">';
            $output .= '<div class="img-wrap">';
            $output .= '<img alt="" class="slide-girl ' . $image_animation . '" src="' . JURI::root() . $slide_item->image . '" ' . $image_data_attr . '>';
            $output .= '</div>';
            $output .= '</div>'; //sppb-col-sm-5
            $output .= '<div class="sppb-col-sm-7">';
            $output .= '<div class="sppb-slideshow-fullwidth-item-text-wrap">';
            if (($slide_item->title) || ($slide_item->content) || ($slide_item->sub_title)) {
                $subtitle_animation = (isset($slide_item->subtitle_animation)) ? $slide_item->subtitle_animation : '';
                $title_animation = (isset($slide_item->title_animation)) ? $slide_item->title_animation : '';
                $button_target = (isset($slide_item->target)) ? $slide_item->target : '';
                $content_animation = (isset($slide_item->content_animation)) ? $slide_item->content_animation : '';
                $button_animation = (isset($slide_item->button_animation)) ? $slide_item->button_animation : '';
                $button_text = (isset($slide_item->button_text)) ? $slide_item->button_text : '';

                if ($slide_item->title) {
                    $output .= '<h1 class="sppb-fullwidth-title ' . $title_animation . '" ' . $title_data_attr . '>' . $slide_item->title . ' </h1>';
                }

                if($slide_item->sub_title){
                    $output .= '<h2 class="sppb-slideshow-sub-title ' . $subtitle_animation . '" ' . $subtitle_data_attr . '>' . $slide_item->sub_title . '</h2>';
                }
                
                if ($slide_item->content) {
                    $output .= '<p class="details ' . $content_animation . '" ' . $content_data_attr . '>' . $slide_item->content . '</p>';
                }

                if (($button_text && $slide_item->button_url)) {
                    $output .= '<div class="sppb-fw-slider-button-wrapper ' . $button_animation . '" ' . $button_data_attr . '> ';
                    if ($slide_item->button_text && $slide_item->button_url) {
                        $output .= '<a target="' . $button_target . '" href="' . $slide_item->button_url . '" class="sppb-btn sppb-btn-primary"><span>' . $button_text . '</span>' . $button_before_icon .  '</a>';
                    }
                    $output .= '</div>';
                }
            }
            $output .= '</div>'; // END:: /.sppb-slideshow-fullwidth-item-text-wrap
            $output .= '</div>'; //sppb-col-sm-7
            $output .= '</div>';//sppb-row
            $output .= '</div>'; // END:: /.sppb-slideshow-fullwidth-item-text
            $output .= '</div>'; // END:: /.container
            $output .= '</div>'; // END:: /.sppb-slideshow-fullwidth-item-bg
            $output .= '</div>'; // END:: /.sppb-slideshow-fullwidth-item
        }

        $output .= '</div>'; //END:: /.sppb-slider-items
        // has next/previous arrows
        if ($arrows) {
            $output .= '<div class="customNavigation">';
            $output .= '<a class="sppbSlidePrev"><i class="fa fa-angle-left"></i></a>';
            $output .= '<a class="sppbSlideNext"><i class="fa fa-angle-right"></i></a>';
            $output .= '</div>'; // END:: /.customNavigation
        }
        $output .= '</div>'; // END:: /.sppb-slider-item-wrapper



        $output .= '</div>'; // /.sppb-slider-wrapper
        // has dot controls
        if ($controllers) {
            $output .= '<div class="owl-dots">';
            $output .= '<div class="owl-dot active"><span></span></div>';
            $output .= '<div class="owl-dot"><span></span></div>';
            $output .= '<div class="owl-dot"><span></span></div>';
            $output .= '</div>';
        }

        return $output;
    }

    public function scripts() {
        $app = JFactory::getApplication();
        $base_path = JURI::base() . '/templates/' . $app->getTemplate() . '/js/';
        return array($base_path . 'owl.carousel.min.js', $base_path . 'addon.slider.js');
    }

    public function js() {
        $addon_id = '#sppb-addon-' . $this->addon->id;
        return '
            jQuery(document).ready(function($){"use strict";

            var $slideFullwidth = $("' . $addon_id . ' #slide-fullwidth");
            $("#slide-fullwidth + .customNavigation").wrap("<div class=\'container controller-wrapper\' />");
            var $autoplay   = $slideFullwidth.attr("data-sppb-slide-ride");
            if ($autoplay == "true") { var $autoplay = true; } else { var $autoplay = false};

            var $controllers   = $slideFullwidth.attr("data-sppb-slidefull-controllers");
            if ($controllers == "true") { var $controllers = true; } else { var $controllers = false};

            $slideFullwidth.owlCarousel({
                margin: 0,
                loop: true,
                video:true,
                autoplay: $autoplay,
                animateIn: "fadeIn",
                animateOut: "fadeOut",
                autoplayHoverPause: true,
                autoplaySpeed: 1500,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                },
                dots: $controllers,
            });

            $(".sppbSlidePrev").click(function(){
                $slideFullwidth.trigger("prev.owl.carousel", [400]);
            });

            $(".sppbSlideNext").click(function(){
                $slideFullwidth.trigger("next.owl.carousel",[400]);
            });
        });
        ';
    }

    public function stylesheets() {
        $app = JFactory::getApplication();
        $base_path = JURI::base() . '/templates/' . $app->getTemplate() . '/css/';
        return array($base_path . 'owl.carousel.css');
    }

    public static function getTemplate() {
        $output = '
            <style type="text/css">
                <# _.each (data.sp_slideshow_full_item, function(slide_item, item_key) { #>
                    #sppb-addon-{{ data.id }} .item-{{ data.id }}-{{ item_key }} .sppb-slideshow-fullwidth-item-bg{
                        background-image: url({{ pagebuilder_base + slide_item.bg }});
                        background-repeat: no-repeat;
                        background-size: cover;
                        background-position: center center;
                    }
                <# }); #>
            </style>
            <#
                var autoplay = (typeof data.autoplay !=="undefined") ? data.autoplay : 0;
                var controllers = (typeof data.controllers !=="undefined") ? data.controllers : 0;
                var arrows = (typeof data.arrows !=="undefined") ? data.arrows : 0;
                var contentClass = (!_.isEmpty(data.class)) ? data.class : "";

                var slide_autoplay = (autoplay>0) ? \'data-sppb-slide-ride="true"\' : \'data-sppb-slide-ride="false"\';
                var slide_controllers = (controllers > 0) ? \'data-sppb-slidefull-controllers="true"\' : \'data-sppb-slidefull-controllers="false"\';
            #>

                <div class="sppb-addon sppb-slider-wrapper sppb-slider-fullwidth-wrapper owl-theme {{contentClass}}">
                <div class="sppb-slider-item-wrapper">
                <div id="slide-fullwidth" class="owl-carousel" {{slide_controllers}} {{slide_autoplay}} >

                <#_.each (data.sp_slideshow_full_item, function(slide_item, item_key) {

                    var title_animation = "";
                    if (!_.isEmpty(slide_item.title_animation)) {
                        title_animation += \' sppb-wow \' + slide_item.title_animation;
                    }

                    var title_data_attr = "";
                    if (!_.isEmpty(slide_item.title_animationduration)){
                        title_data_attr += \' data-sppb-wow-duration="\' + slide_item.title_animationduration + \'ms"\';
                    }
                    if (!_.isEmpty(slide_item.title_animationdelay)){
                        title_data_attr += \' data-sppb-wow-delay="\' + slide_item.title_animationdelay + \'ms"\';
                    }

                    var subtitle_animation = "";
                    if (!_.isEmpty(slide_item.subtitle_animation)) {
                        subtitle_animation += \' sppb-wow \' + slide_item.subtitle_animation;
                    }

                    var subtitle_data_attr = "";
                    if (!_.isEmpty(slide_item.subtitle_animationduration)){
                        subtitle_data_attr += \' data-sppb-wow-duration="\' + slide_item.subtitle_animationduration + \'ms"\';
                    }
                    if (!_.isEmpty(slide_item.subtitle_animationdelay)){
                        subtitle_data_attr += \' data-sppb-wow-delay="\' + slide_item.subtitle_animationdelay + \'ms"\';
                    }

                    var image_animation = "";
                    if (!_.isEmpty(slide_item.image_animation)) {
                        image_animation += \' sppb-wow \' + slide_item.image_animation;
                    }

                    var image_data_attr = "";
                    if (!_.isEmpty(slide_item.image_animationduration)){
                        image_data_attr += \' data-sppb-wow-duration="\' + slide_item.image_animationduration + \'ms"\';
                    }

                    var content_animation ="";
                    if (!_.isEmpty(slide_item.content_animation)) {
                        content_animation += \' sppb-wow \' + slide_item.content_animation;
                    }

                    var content_data_attr = "";
                    if (!_.isEmpty(slide_item.content_animationduration)){
                        content_data_attr += \' data-sppb-wow-duration="\' + slide_item.content_animationduration + \'ms"\';
                    }

                    if (!_.isEmpty(slide_item.content_animationdelay)){
                        content_data_attr += \' data-sppb-wow-delay="\' + slide_item.content_animationdelay + \'ms"\';
                    }

                    var button_animation ="";
                    if (!_.isEmpty(slide_item.button_animation)) {
                        button_animation += \' sppb-wow \' + slide_item.button_animation;
                    }

                    var button_data_attr = "";
                    if (!_.isEmpty(slide_item.button_animationduration)){
                        button_data_attr += \' data-sppb-wow-duration="\' + slide_item.button_animationduration + \'ms"\';
                    }
                    if (!_.isEmpty(slide_item.button_animationdelay)){
                        button_data_attr += \' data-sppb-wow-delay="\' + slide_item.button_animationdelay + \'ms"\';
                    }

                    var button_before_icon = (!_.isEmpty(slide_item.button_before_icon)) ? \'<i class="fa \' + slide_item.button_before_icon + \'"></i>\' : "";
                    #>
                    
                    <div class="sppb-slideshow-fullwidth-item item-{{ data.id }}-{{ item_key }}">
                    <div class="sppb-slide-item-bg sppb-slideshow-fullwidth-item-bg" {{data.bg_image}}>
                    <div class="container">
                    <div class="sppb-slideshow-fullwidth-item-text">

                    <div class="sppb-row">
                    <div class="sppb-col-sm-5">
                    <div class="img-wrap">
                    <# if (!_.isEmpty(slide_item.image)){ #>
                        <img alt="" class="slide-girl {{image_animation}}" src="' . JURI::root() . '/{{slide_item.image}}" {{image_data_attr}}>
                    <# } #>
                    </div>
                    </div>
                    <div class="sppb-col-sm-7">
                    <div class="sppb-slideshow-fullwidth-item-text-wrap">
                    <# if ((slide_item.title) || (slide_item.sub_title) || (slide_item.content)) {
                       
                        if (slide_item.title) { #>
                            <h1 class="sppb-fullwidth-title {{title_animation}}" {{{title_data_attr}}}>{{{slide_item.title}}}</h1>
                        <# }
                        if (slide_item.sub_title) { #>
                            <h2 class="sppb-slideshow-sub-title {{subtitle_animation}}" {{{subtitle_data_attr}}}>{{{slide_item.sub_title}}}</h2>
                        <# }
                        if (slide_item.content) {
                        #>
                            <p class="details {{content_animation}}" {{{content_data_attr}}}>{{{slide_item.content}}}</p>
                        <# }

                        if ((slide_item.button_text && slide_item.button_url)) {
                        #>
                            <div class="sppb-fw-slider-button-wrapper {{button_animation}}" {{{button_data_attr}}}>
                            <# if (slide_item.button_text && slide_item.button_url) { #>
                                <a target="{{slide_item.target}}" href="{{slide_item.button_url}}" class="sppb-btn sppb-btn-primary"><span>{{slide_item.button_text}}</span> {{{button_before_icon}}}</a>
                            <# } #>

                            </div>
                        <# } #>
                    <# } #>

                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                <# }) #>
                </div>

                <# if (arrows > 0) { #>
                    <div class="customNavigation">
                    <a class="sppbSlidePrev"><i class="fa fa-angle-left"></i></a>
                    <a class="sppbSlideNext"><i class="fa fa-angle-right"></i></a>
                    </div>
                <# } #>
                </div>
                </div>

                <# if (slide_controllers) { #>
                    <div class="owl-dots">
                    <div class="owl-dot active"><span></span></div>
                    <div class="owl-dot"><span></span></div>
                    <div class="owl-dot"><span></span></div>
                    </div>
                <# } #>
                ';
        return $output;
    }

}
