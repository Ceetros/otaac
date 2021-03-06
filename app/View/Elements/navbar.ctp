<?php $pages = $this->requestAction('/content/library'); // Array com as paginas do library ?>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand visible-xs" href="<?php echo url; ?>">
				<?php echo nameServer; ?>
			</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li <?php if($this->params['controller'] == 'posts' && $this->params['action'] == 'index') { ?> class="active" <?php } ?>>
					<a href="<?php echo url; ?>">Home</a>
				</li>
				<li <?php if($this->params['controller'] == 'community' || $this->params['controller'] == 'guilds') { ?> class="active" <?php } ?> class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Community <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li <?php if($this->params['controller'] == 'community' && $this->params['action'] == 'characters') { ?> class="active" <?php } ?>>
							<a href="<?php echo url; ?>community/characters">Characters</a>
						</li>
						<li <?php if($this->params['controller'] == 'community' && $this->params['action'] == 'highscores') { ?> class="active" <?php } ?>>
							<a href="<?php echo url; ?>community/highscores">Highscores</a>
						</li>
						<!-- <li <?php if($this->params['controller'] == 'community' && $this->params['action'] == 'houses') { ?> class="active" <?php } ?>>
							<a href="<?php echo url; ?>community/houses">Houses</a>
						</li> -->
						<li class="divider"></li>
						<li <?php if($this->params['controller'] == 'guilds') { ?> class="active" <?php } ?>>
							<a href="<?php echo url; ?>guilds">Guilds</a>
						</li>
						<!-- <li <?php if($this->params['controller'] == 'community' && $this->params['action'] == 'guild_war') { ?> class="active" <?php } ?>>
							<a href="<?php echo url; ?>community/guild_war">Guild War</a>
						</li>
						<li class="divider"></li>
						<li <?php if($this->params['controller'] == 'community' && $this->params['action'] == 'live_casts') { ?> class="active" <?php } ?>>
							<a href="<?php echo url; ?>community/live_casts">Live Casts</a>
						</li> -->
					</ul>
				</li>
				<li <?php if($this->params['controller'] == 'pages') { ?> class="active" <?php } ?> class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Library <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php foreach($pages['pages'] as $page) { // Percorre as paginas para montar o menu dinmicamente ?>
						<li <?php if($this->params['controller'] == 'pages' && $this->params['pass'][0] == $page) { ?> class="active" <?php } ?>>
							<a href="<?php echo url; ?>library/<?php echo $page; ?>"><?php echo ucfirst($page); ?></a>
						</li>
						<?php } ?>
					</ul>
				</li>
				<!-- <li><a href="#">Shop</a></li> -->
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if($this->Session->check('Account')) { // Se sessão iniciada: ?>
				<li <?php echo ($this->params['controller'] == 'accounts' || $this->params['controller'] == 'players') ? ('class="active dropdown"') : ('class="dropdown"') ?>>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->Session->read('Account.name'); ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li <?php if($this->params['controller'] == 'accounts' && $this->params['action'] == 'manager') { ?> class="active" <?php } ?>>
							<a href="<?php echo url; ?>accounts/manager">Manager account</a>
						</li>
						<li <?php if($this->params['controller'] == 'players' && $this->params['action'] == 'create') { ?> class="active" <?php } ?>>
							<a href="<?php echo url; ?>players/create">Create your character</a>
						</li>
						<li class="divider"></li>
						<li <?php if($this->params['controller'] == 'accounts' && $this->params['action'] == 'change') { ?> class="active" <?php } ?>>
							<a href="<?php echo url; ?>accounts/change/<?php echo $this->Session->read('Account.id'); ?>">Change account</a>
						</li>
						<?php if(tfs === '1.0') {
							$type = 'type';
						} else if(tfs === '0.3.6') {
							$type = 'group_id';
						}
						if($this->Session->read('Account.'.$type) >= 6) { // Se for um cargo administrativo: ?>
						<li class="divider"></li>
						<li><a href="<?php echo url; ?>admin">Admin Panel</a></li>
						<?php } ?>
						<li class="divider"></li>
						<li><a href="<?php echo url; ?>accounts/logout">Log out</a></li>
					</ul>
				</li>
				<?php } else { // Se não: ?>
				<li <?php if($this->params['controller'] == 'accounts' && $this->params['action'] == 'create') { ?> class="active" <?php } ?>>
					<a href="<?php echo url; ?>accounts/create">Register</a>
				</li>
				<li <?php if($this->params['controller'] == 'accounts' && $this->params['action'] == 'login') { ?> class="active" <?php } ?>>
					<a href="<?php echo url; ?>accounts/login">Log in</a>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
