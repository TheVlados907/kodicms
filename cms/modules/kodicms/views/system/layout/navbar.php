<div id="main-navbar" class="navbar" role="navigation">
	<div class="navbar-inner">
		<div class="navbar-header">
			<?php echo HTML::anchor(ADMIN_DIR_NAME, HTML::image( ADMIN_RESOURCES . 'images/logo-color.png'), array(
				'class' => 'navbar-brand'
			)); ?>
		</div>

		<div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
			<div>
				<div class="right clearfix">
					<ul class="nav navbar-nav pull-right right-navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown">
								<?php echo UI::icon('user'); ?>
								<span><?php echo AuthUser::getUserName(); ?></span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<?php echo HTML::anchor(Route::get('backend')->uri(array('controller' => 'users', 'action' => 'profile')), __('Profile')); ?>
								</li>
								<li>
									<?php echo HTML::anchor(Route::get('backend')->uri(array('controller' => 'users', 'action' => 'edit', 'id' => AuthUser::getId())), __('Settings'), array('data-icon' => 'cog')); ?>
								</li>
								<li class="divider"></li>
								<li>
									<?php echo HTML::anchor(Route::get('user')->uri(array('action' => 'logout')), __('Logout'), array('data-icon' => 'power-off')); ?>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

