<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2018 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('resticted aceess');

$k2field = dirname(dirname( __DIR__ )) . '/fields/k2categories.php';

if(!file_exists($k2field)) {
	$k2cats = array(''=>'K2 Isn\'t installed');
} else {
	require_once $k2field;
}

SpAddonsConfig::addonConfig(
	array( 
		'type'=>'content',
		'addon_name'=>'sp_articles_headline',
		'category'=>'General',
		'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_HEADLINE'),
		'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_HEADLINE_DESC'),
		'attr'=>array(
			'general' => array(
				'admin_label'=>array(
						'type'=>'text', 
						'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL'),
						'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ADMIN_LABEL_DESC'),
						'std'=> ''
					),
				
				'title'=>array(
					'type'=>'text', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_DESC'),
					'std'=>'',
					),

				'heading_selector'=>array(
					'type'=>'select', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_HEADINGS'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_DESC'),
					'values'=>array(
						'h1'=>JText::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H1'),
						'h2'=>JText::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H2'),
						'h3'=>JText::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H3'),
						'h4'=>JText::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H4'),
						'h5'=>JText::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H5'),
						'h6'=>JText::_('COM_SPPAGEBUILDER_ADDON_HEADINGS_H6'),
						),
					'std'=>'h3',
				),

				'title_fontsize'=>array(
					'type'=>'number', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_SIZE'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_SIZE_DESC'),
					'std'=>''
					),

				'title_fontweight'=>array(
					'type'=>'text', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_WEIGHT'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_FONT_WEIGHT_DESC'),
					'std'=>''
					),

				'title_text_color'=>array(
					'type'=>'color',
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_TEXT_COLOR'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_TEXT_COLOR_DESC'),
					),	

				'title_margin_top'=>array(
					'type'=>'number',
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_MARGIN_TOP'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_MARGIN_TOP_DESC'),
					'placeholder'=>'10',
					),

				'title_margin_bottom'=>array(
					'type'=>'number',
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_MARGIN_BOTTOM'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_TITLE_MARGIN_BOTTOM_DESC'),
					'placeholder'=>'10',
					),

				'resource'=>array(
					'type'=>'select', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_RESOURCE'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_RESOURCE_DESC'),
					'values'=>array(
						'article'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_RESOURCE_ARTICLE'),
						'k2'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLE_RESOURCE_K2'),
						),
					'std'=>'article',
				),

				'catid'=>array(
					'type'=>'category',
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_CATID'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_CATID_DESC'),
					'depends'=>array('resource'=>'article'),
					'std'=>''
					),

				'k2catid'=>array(
					'type'=>'select', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_K2_CATID'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_K2_CATID_DESC'),
					'values'=>$k2cats,
					'depends'=>array('resource'=>'k2')
				),

				'ordering'=>array(
					'type'=>'select', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_DESC'),
					'values'=>array(
						'latest'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_LATEST'),
						'hits'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_POPULAR'),
						'featured'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_ORDERING_FEATURED'),
						),
					'std'=>'latest',
				),

				'limit'=>array(
					'type'=>'number', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_LIMIT'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_LIMIT_DESC'),
					'std'=>'3'
					),
				
				'columns'=>array(
					'type'=>'number', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_COLUMNS'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_COLUMNS_DESC'),
					'std'=>'3',
					),

				'hide_thumbnail'=>array(
					'type'=>'select', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_HIDE_THUMBNAIL'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_HIDE_THUMBNAIL_DESC'),
					'values'=>array(
						1=>JText::_('COM_SPPAGEBUILDER_YES'),
						0=>JText::_('COM_SPPAGEBUILDER_NO'),
						),
					'std'=>0,
					),

				'show_category'=>array(
					'type'=>'select', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_CATEGORY'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_CATEGORY_DESC'),
					'values'=>array(
						1=>JText::_('COM_SPPAGEBUILDER_YES'),
						0=>JText::_('COM_SPPAGEBUILDER_NO'),
						),
					'std'=>1,
					),

				'show_date'=>array(
					'type'=>'select', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_DATE'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_DATE_DESC'),
					'values'=>array(
						1=>JText::_('COM_SPPAGEBUILDER_YES'),
						0=>JText::_('COM_SPPAGEBUILDER_NO'),
						),
					'std'=>1,
					),

				'show_readmore'=>array(
					'type'=>'select', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_READMORE'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_SHOW_READMORE_DESC'),
					'values'=>array(
						1=>JText::_('COM_SPPAGEBUILDER_YES'),
						0=>JText::_('COM_SPPAGEBUILDER_NO'),
						),
					'std'=>1,
					),

				'readmore_text'=>array(
					'type'=>'text', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_READMORE_TEXT'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_READMORE_TEXT_DESC'),
					'std'=>'Read More',
					'depends'=>array('show_readmore'=>'1')
					),
				
				'separator_content'=>array(
					'type'=>'separator', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_HEADLINE_DIVIDER'),
					),
				
				'autoplay'=>array(
					'type'=>'select', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_HEADLINE_AUTOPLAY'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_HEADLINE_AUTOPLAY_DESC'),
					'values'=>array(
						1=>JText::_('JYES'),
						0=>JText::_('JNO'),
						),
					'std'=>1,
					),
				'arrows'=>array(
					'type'=>'select', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_HEADLINE_SHOW_ARROWS'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_ARTICLES_HEADLINE_SHOW_ARROWS_DESC'),
					'values'=>array(
						1=>JText::_('JYES'),
						0=>JText::_('JNO'),
						),
					'std'=>1,
					),

				'class'=>array(
					'type'=>'text', 
					'title'=>JText::_('COM_SPPAGEBUILDER_ADDON_CLASS'),
					'desc'=>JText::_('COM_SPPAGEBUILDER_ADDON_CLASS_DESC'),
					'std'=> ''
					),
				)
			)
		)
	);