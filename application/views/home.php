<header>
	<div class="pre-header header-top">
		<div class="pre-header__container container">
			<ul class="pre-header__list">
				<li class="pre-header__item">
					<a class="pre-header__link" href="#">О компании</a>
				</li>
				<li class="pre-header__item">
					<a class="pre-header__link" href="#">Вопрос-ответ</a>
				</li>	
				</li>
					<a class="pre-header__link" href="#">Новости</a>
				</li>
			</ul>
			<div class="pre-header__profile">
				<a class="pre-header__profile-link" href="#">Войти</a>
				<a class="pre-header__profile-link pre-header__profile-link--registration" href="#">Регистрация</a>
			</div>
		</div>
	</div>
	<div class="header">
		<div class="header__container container">
			<div class="header__mob-menu-btns">
				<button class="header__mob-menu-btn header__mob-menu-btn--category">Открыть категории</button>
				<button class="header__mob-menu-btn header__mob-menu-btn--menu">Открыть меню</button>
			</div>
			<div class="header__logo logo logo--dark">
				<img class="logo__icon" src="<?php echo base_url('assets/img/svg/logo.svg')?>" alt="Логотип">
				<span class="logo__text">RUDZPARK</span>
			</div>
			<form class="header__search search" action="/">
				<input class="search__input" type="text" placeholder="Поиск по каталогу" name="search">
				<button class="search__btn" type="submit">Поиск по каталогу</button>
			</form>
			<div class="header__links">
				<a class="header__link header__link--favourite" href="#">Избранное</a>
				<a class="header__link  header__link--prices" href="#">Графики цен</a>
			</div>
			<div class="header__basket">
				<a class="header__basket-link" href="#">$&nbsp;<span class="header__basket-price">0.00</span></a>
			</div>
		</div>
		<div class="navigation">
			<div class="navigation__container container">
				<nav class="navigation__nav">
					<ul id="navigation__list" class="navigation__list"></ul>
				</nav>
			</div>
		</div>
	</div>
	<nav class="menu-categories">
		<button class="menu-categories__close">Закрыть меню</button>
		<ul id="menu-categories__list" class="menu-categories__list"></ul>
	</nav>
	<div class="menu-mob">
		<button class="menu-mob__close">Закрыть меню</button>
		<ul class="menu-mob__list">
			<li class="menu-mob__item">
				<a class="menu-mob__link menu-mob__link--login" href="#">Войти</a>
			</li>
			<li class="menu-mob__item">
				<a class="menu-mob__link menu-mob__link--registration" href="#">Регистрация</a>
			</li>
			<li class="menu-mob__item">
				<a class="menu-mob__link menu-mob__link--basket" href="#">Корзина</a>
			</li>
			<li class="menu-mob__item">
				<a class="menu-mob__link menu-mob__link--favourite" href="#">Избранные товары</a>
			</li>
			<li class="menu-mob__item">
				<a class="menu-mob__link menu-mob__link--prices" href="#">Графики цен</a>
			</li>
			<li class="menu-mob__item">
				<a class="menu-mob__link menu-mob__link--about" href="#">О компании</a>
			</li>
			<li class="menu-mob__item">
				<a class="menu-mob__link menu-mob__link--faq" href="#">Вопрос-ответ</a>
			</li>
			<li class="menu-mob__item">
				<a class="menu-mob__link menu-mob__link--news" href="#">Новости</a>
			</li>
		</ul>
	</div>
</header>

<main class="main">

	<section class="offer">
		<div class="offer__container container">
			<div class="offer__wrapper">
				<div class="offer__image"></div>
				<div class="offer__content">
					<h2 class="offer__title">Добро пожаловать на&nbsp;наш сайт!</h2>
					<p class="offer__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin elementum neque id pharetra. Etiam ultricies neque et diam dignissim placerat.</p>
					<a class="btn" href="#">Перейти в каталог</a>
				</div>
			</div>
		</div>
	</section>

	<section class="features">
		<div class="features__container container">
			<ul class="features__list">
				<li class="features__item">
					<h3 class="features__title">Лучшие в своем деле</h3>
					<p class="features__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin elementum neque id pharetra.</p>
				</li>
				<li class="features__item">
					<h3 class="features__title">Гарантия качества</h3>
					<p class="features__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin elementum neque id pharetra.</p>
				</li>
				<li class="features__item">
					<h3 class="features__title">Быстрая доставка</h3>
					<p class="features__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin elementum neque id pharetra.</p>
				</li>
				<li class="features__item">
					<h3 class="features__title">Поддержка 24/7</h3>
					<p class="features__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sollicitudin elementum neque id pharetra.</p>
				</li>
			</ul>
		</div>
	</section>

	<section class="catalog">
		<div class="catalog__container container">
			<div class="catalog__carousel-wrapper">
				<div id="catalog__carousel" class="owl-carousel catalog__carousel">
					<!-- <div class="catalog__item">
						<div class="catalog__image"></div>
						<div class="catalog__content">
							<h2 class="catalog__content-title">Ноутбуки</h2>
							<p class="catalog__content-text">краткое описание категории</p>
							<a class="btn" href="#">Перейти в каталог</a>
						</div>
					</div>
					<div class="catalog__item">
						<div class="catalog__image"></div>
						<div class="catalog__content">
							<h2 class="catalog__content-title">Планшеты</h2>
							<p class="catalog__content-text">краткое описание категории</p>
							<a class="btn" href="#">Перейти в каталог</a>
						</div>
					</div>
					<div class="catalog__item">
						<div class="catalog__image"></div>
						<div class="catalog__content">
							<h2 class="catalog__content-title">Смартфоны</h2>
							<p class="catalog__content-text">краткое описание категории</p>
							<a class="btn" href="#">Перейти в каталог</a>
						</div>
					</div>
					<div class="catalog__item">
						<div class="catalog__image"></div>
						<div class="catalog__content">
							<h2 class="catalog__content-title">Наушники</h2>
							<p class="catalog__content-text">краткое описание категории</p>
							<a class="btn" href="#">Перейти в каталог</a>
						</div>
					</div>
					<div class="catalog__item">
						<div class="catalog__image"></div>
						<div class="catalog__content">
							<h2 class="catalog__content-title">Телевизоры</h2>
							<p class="catalog__content-text">краткое описание категории</p>
							<a class="btn" href="#">Перейти в каталог</a>
						</div>
					</div>
					<div class="catalog__item">
						<div class="catalog__image"></div>
						<div class="catalog__content">
							<h2 class="catalog__content-title">Аксессуары</h2>
							<p class="catalog__content-text">краткое описание категории</p>
							<a class="btn" href="#">Перейти в каталог</a>
						</div>
					</div> -->
				</div>
			</div>				
		</div>
	</section>

	<section class="products">
		<div class="products__container container">
			<div class="products__top">
				<h2 class="products__title">Популярные товары</h2>
				<a class="products__link" href="#">Перейти в каталог</a>
			</div>
			<div class="products__carousel-wrapper">
				<div id="products__carousel" class="owl-carousel products__carousel"></div>
			</div>
		</div>
	</section>

	<section class="subscription">
		<div class="subscription--container container">
			<form class="subscription__form" action="/">
				<label class="subscription__label">
					<span class="subscription__label-text">Подписаться на рассылку новостей</span>
					<input class="subscription__input" type="email" placeholder="Ваш e-mail" name="email" required>
				</label>		
				<button class="subscription__btn btn btn--small" type="submit">Отправить</button>
			</form>
		</div>
	</section>

</main>

<footer class="footer">
	<div class="footer__container container">
		<div class="footer__top">
			<div class="footer__logo logo">
				<img class="logo__icon" src="<?php echo base_url('assets/img/svg/logo.svg')?>" alt="Логотип">
				<span class="logo__text">RUDZPARK</span>
			</div>
			<ul id="footer__category-list"class="footer__category-list"></ul>
		</div>
		<div class="footer__bottom">
			<ul class="footer__link-list">
				<li class="footer__link-item">
					<a class="footer__link" href="#">Политика конфиденциальности</a>
				</li>
				<li class="footer__link-item">
					<a class="footer__link" href="#">О&nbsp;компании</a>
				</li>
				<li class="footer__link-item">
					<a class="footer__link" href="#">Новости</a>
				</li>
				<li class="footer__link-item">
					<a class="footer__link" href="#">Контакты</a>
				</li>
			</ul>
			<small class="footer__copy">Copyright © 2001-2024 RudzPark. All rights reserved</small>
		</div>
	</div>

</footer>