    <script src="<?php echo base_url('assets/js/plugins/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/plugins/owl.carousel.min.js') ?>"></script>
    <script>
	$(function(){

        function showAllHeaderMenu(){
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>categories/showAllCategoriesForMenu',
				async: false,
				dataType: 'json',
				success: function(data){
                    var newDataParents = [];
                    var newDataChildren = [];
                    for(i=0; i<data.length; i++) {
                        if(data[i].parent_id == 0) {
                            newDataParents.push(data[i]);
                        } else {
                            newDataChildren.push(data[i]);
                        }
                    }
                    var htmlDesctopMenu = '';
					var htmlMobMenu = '';
					var i;
					for(i=0; i<newDataParents.length; i++) {
						var count = 0;
						for(j=0; j<newDataChildren.length; j++) {                       
                            if (newDataParents[i].id == newDataChildren[j].parent_id) {
                                count++;
                            }
                        };
						if (count == 0) {
							htmlDesctopMenu +='<li class="navigation__item"><a class="navigation__link" href="'+newDataParents[i].url+'">'+newDataParents[i].name+'</a></li>';
							htmlMobMenu +='<li class="menu-categories__item"><a class="menu-categories__link" href="'+newDataParents[i].url+'">'+newDataParents[i].name+'</a></li>';
						} else {
							htmlDesctopMenu += '<li class="navigation__item"><a class="navigation__link navigation__link--sub" href="'+newDataParents[i].url+'">'+newDataParents[i].name+'</a><ul class="navigation__sublist">';
							htmlMobMenu +='<li class="menu-categories__item"><a class="menu-categories__link" href="'+newDataParents[i].url+'">'+newDataParents[i].name+'</a><button class="menu-categories__open-sublist">Раскрыть подкатегории</button><ul class="menu-categories__sublist">'
							for(j=0; j<newDataChildren.length; j++) {                       
							    if (newDataParents[i].id == newDataChildren[j].parent_id) {
							        htmlDesctopMenu += '<li class="navigation__subitem"><a class="navigation__sublink" href="'+newDataChildren[j].url+'">'+newDataChildren[j].name+'</a></li>'
									htmlMobMenu+='<li class="menu-categories__subitem"><a class="menu-categories__sublink" href="'+newDataChildren[j].url+'">'+newDataChildren[j].name+'</a></li>'
								}
							};
							htmlDesctopMenu += '</ul></li>';
							htmlMobMenu+='</ul></li>';
						}
                    }
					$('#navigation__list').html(htmlDesctopMenu);
					$('#menu-categories__list').html(htmlMobMenu);
				},
				error: function(){
					alert('Не удалось получить данные из базы данных');
				}
			});
		};

        function showAllFooterMenu(){
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>categories/showAllParentCategories',
				async: false,
				dataType: 'json',
				success: function(data){
                    var html = '';
					var i;
					for(i=0; i<data.length; i++){
					
						html +='<li class="footer__category-item">'+
					                '<a class="footer__category-link" href="'+data[i].url+'">'+data[i].name+'</a>'+
                                '</li>'
					}
					$('#footer__category-list').html(html);
				},
				error: function(){
					alert('Не удалось получить данные из базы данных');
				}
			});
		};

		function showCategoriesSlider(){
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>categories/showAllCategories',
				async: false,
				dataType: 'json',
				success: function(data){
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
						if(data[i].show_in_main_slider == 1) {
							html +=	'<div class="catalog__item">'+
										'<div class="catalog__image"></div>'+
										'<div class="catalog__content">'+
											'<h2 class="catalog__content-title">'+data[i].name+'</h2>'+
											'<p class="catalog__content-text">'+data[i].description+'</p>'+
											'<a class="btn" href="'+data[i].url+'">Перейти в каталог</a>'+
										'</div>'+
									'</div>'
						}
					}
					$('#catalog__carousel').html(html);
				},
				error: function(){
					alert('Не удалось получить данные из базы данных');
				}
			});
		};

		function showAllProducts(){
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>products/showAllProducts',
				async: false,
				dataType: 'json',
				success: function(data){
					var html = '';
					var i;
                    var className;
                    var textInfo;
					for(i=0; i<data.length; i++){
                        if(+data[i].count > 0){
                            className="yes";
                            textInfo="в наличии";
                        } else {
                            className="no";
                            textInfo="нет в наличии"
                        };
						html +='<div class="products__card">'+
                                    '<div class="products__card-image-wrapper">'+
                                    '<img class="products__card-image" src="upload/'+data[i].image+'" alt="'+data[i].name+'"></div>'+
                                    '<div class="products__card-top">'+
                                        '<div class="products__card-stars products__card-stars--'+Math.round(+data[i].rating)+'">Средняя оценка товара: '+data[i].rating+'</div>'+
                                        '<div class="products__card-stock products__card-stock--'+className+'">'+textInfo+'</div>'+
                                    '</div>'+
                                    '<div class="products__card-text">'+data[i].description+'</div>'+
                                    '<div class="products__card-price">'+data[i].price+' byn</div>'+
                                    '<div class="products__card-bottom">'+
                                        '<a class="btn btn--small products__card-btn" href="/">Купить</a>'+
                                        '<div class="products__actions">'+
                                            '<button class="products__action products__action--show-prices">Показать график цен!</button>'+
                                            '<button class="products__action products__action--add-favourite">Добавить в избранное</button>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>';
					}
					$('#products__carousel').html(html);
				},
				error: function(){
					alert('Не удалось получить данные из базы данных');
				}
			});
		};

        showAllHeaderMenu();
		showCategoriesSlider()
		showAllProducts();
		showAllFooterMenu();
	});
    </script>
	<script src="<?php echo base_url('assets/js/app.min.js') ?>"></script>
</body>
</html>