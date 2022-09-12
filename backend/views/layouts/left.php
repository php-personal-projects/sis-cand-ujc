<aside class="main-sidebar">

    <section class="sidebar">



		<?= dmstr\widgets\Menu::widget(
			[
				'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
				'items' => [
					['label' => 'Menu', 'options' => ['class' => 'header']],
					['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/site/index']],
					['label' => 'Candidatos', 'icon' => 'file-code-o', 'url' => ['/sala/index']],
					['label' => 'Candidaturas', 'icon' => 'file-code-o', 'url' => ['/agendamento/index']],
					['label' => 'Cursos', 'icon' => 'far fa-list-alt', 'url' => ['/curso/index']],
					['label' => 'Disciplinas', 'icon' => 'file-code-o', 'url' => ['/empresa/index']],
					['label' => 'Escolas', 'icon' => 'file-code-o', 'url' => ['/empresa/index']],
					['label' => 'Exames', 'icon' => 'file-code-o', 'url' => ['/empresa/index']],
					['label' => 'Resultados', 'icon' => 'file-code-o', 'url' => ['/empresa/index']],

					['label' => 'Usuarios', 'icon' => 'file-code-o', 'url' => ['/gii']],

					['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
					[
						'label' => 'Definicoes',
						'icon' => 'settings',
						'url' => '#',
						'items' => [
							['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
							['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
							['label' => 'Instrucoes', 'icon' => 'dashboard', 'url' => ['/frontend/instrucoes/index'],],
							[
								'label' => 'Level One',
								'icon' => 'circle-o',
								'url' => '#',
								'items' => [
									['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
									[
										'label' => 'Level Two',
										'icon' => 'circle-o',
										'url' => '#',
										'items' => [
											['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
											['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
										],
									],
								],
							],
						],
					],
				],
			]
		) ?>

    </section>

</aside>
