<?php

	namespace backend\assets;
	use yii\web\AssetBundle;
	class AdminLtePluginAsset extends AssetBundle
	{
		public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
		public $css = [
			'chart.js/Chart.min.css',
//			'css/bootstrap.min.css',
//			'//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css',
//			'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
//			'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
//			'css/all.min.css',
//			'css/tempusdominus-bootstrap-4.min.css',
//			'css/icheck-bootstrap.min.css',
//			'css/jqvmap.min.css',
//			'css/OverlayScrollbars.min.css',
//			'css/daterangepicker.css',
//			'css/summernote-bs4.min.css',
			// more plugin CSS here
		];
		public $js = [
			'chart.js/Chart.bundle.min.js',
//			'js/bootstrap.bundle.min.js',
//			'js/jquery.min.js',
//			'js/jquery-ui.min.js',
//			'js/Chart.min.css',
//			'js/tempusdominus-bootstrap-4.min.js',
//			'js/daterangepicker.js',
//			'js/summernote-bs4.min.js',
//			'js/OverlayScrollbars.min.js',
			// more plugin Js here
		];
		public $depends = [
			'dmstr\adminlte\web\AdminLteAsset',
		];
	}