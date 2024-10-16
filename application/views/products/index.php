<div class="container">
	<h3>Список товаров</h3>
	<div class="alert alert-success" style="display: none;">
		
	</div>
	<button id="btnAdd" class="btn btn-success">Добавить новый товар</button>
	<table class="table table-bordered table-responsive" style="margin-top: 20px;">
		<thead>
			<tr>
				<td>ID</td>
				<td>Название</td>
				<td>Изображение</td>
				<td>Описание</td>
				<td>Количество</td>
				<td>Категория</td>
				<td>Цена</td>
				<td>Рейтинг</td>
				<td>Действия</td>
			</tr>
		</thead>
		<tbody id="showdata">
			
		</tbody>
	</table>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Добавить новый товар</h4>
      </div>
      <div class="modal-body">
        	<form id="myForm" action="" method="post" class="form-horizontal">
        		<input type="hidden" name="txtId" value="0">
        		<div class="form-group">
        			<label for="name" class="label-control col-md-4">Название товара</label>
        			<div class="col-md-8">
        				<input type="text" name="txtProductName" class="form-control">
        			</div>
        		</div>
				<div class="form-group">
        			<label for="url" class="label-control col-md-4">Изображение</label>
        			<div class="col-md-8">
        				<input type="text" name="txtProductImage" class="form-control">
        			</div>
        		</div>
        		<div class="form-group">
        			<label for="description" class="label-control col-md-4">Краткое описание</label>
        			<div class="col-md-8">
        				<textarea class="form-control" name="txtProductDescription"></textarea>
        			</div>
        		</div>
				<div class="form-group">
        			<label for="url" class="label-control col-md-4">Количество</label>
        			<div class="col-md-8">
        				<input type="number" min="0" max="100" name="txtProductCount" class="form-control">
        			</div>
        		</div>
				<div class="form-group">
        			<label for="categoryParent" class="label-control col-md-4">Категория</label>
        			<div class="col-md-8">
						<select id="categoryParent" name="categoryParent" class="form-control"></select>
        			</div>
        		</div>
				<div class="form-group">
        			<label for="url" class="label-control col-md-4">Цена</label>
        			<div class="col-md-8">
        				<input type="number" min="0" max="100000" name="txtProductPrice" class="form-control">
        			</div>
        		</div>
				<div class="form-group">
        			<label for="url" class="label-control col-md-4">Рейтинг</label>
        			<div class="col-md-8">
        				<input type="number" min="1" max="5" step="0.1" name="txtProductRating" class="form-control">
        			</div>
        		</div>
        	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <button type="button" id="btnSave" class="btn btn-primary">Сохранить изменения</button>
      </div>
    </div>
  </div>
</div>

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Подтверждение удаления</h4>
      </div>
      <div class="modal-body">
        	Вы хотите удалить эту товар?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Удалить</button>
      </div>
    </div>
  </div>
</div>

<script>
	$(function(){
		showAllProducts();
		showAllParentCategories();

		//Добавление товара
		$('#btnAdd').click(function(){
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Добавить новый товар');
			$('#myForm')[0].reset();
			$('#myForm').attr('action', '<?php echo base_url() ?>products/addProducts');
		});


		$('#btnSave').click(function(){
			var url = $('#myForm').attr('action');
			var data = $('#myForm').serialize();
			var categoryName = $('input[name=txtCategoryName]');
			var categoryUrl = $('input[name=txtCategoryUrl]');
			var result = '';
			if(categoryName.val()==''){
				categoryName.parent().parent().addClass('has-error');
			}else{
				categoryName.parent().parent().removeClass('has-error');
				result +='1';
			}
			if(categoryUrl.val()==''){
				categoryUrl.parent().parent().addClass('has-error');
			}else{
				categoryUrl.parent().parent().removeClass('has-error');
				result +='2';
			}

			if(result=='12'){
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: url,
					data: data,
					async: false,
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#myModal').modal('hide');
							$('#myForm')[0].reset();
							if(response.type=='add'){
								var type = 'добавлен'
							}else if(response.type=='update'){
								var type ="обновлен"
							}
							$('.alert-success').html('Товар '+type+' успешно').fadeIn().delay(4000).fadeOut('slow');
							showAllProducts();
							showAllParentCategories();
						}else{
							alert('Error');
						}
					},
					error: function(){
						alert('Не удалось добавить данные');
					}
				});
			}
		});

		//Редактирование
		$('#showdata').on('click', '.item-edit', function(){
			var id = $(this).attr('data');
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Редактировать товар');
			$('#myForm').attr('action', '<?php echo base_url() ?>products/updateProducts');
			$.ajax({
				type: 'ajax',
				method: 'get',
				url: '<?php echo base_url() ?>products/editProducts',
				data: {id: id},
				async: false,
				dataType: 'json',
				success: function(data){
					$('input[name=txtId]').val(data.id);
					$('input[name=txtProductName]').val(data.name);
					$('input[name=txtProductImage]').val(data.image);
					$('textarea[name=txtProductDescription]').val(data.description);
					$('input[name=txtProductCount]').val(data.count);
					$('#categoryParent option[value="'+data.category+'"]').prop('selected', true);
					$('input[name=txtProductPrice]').val(data.price);
					$('input[name=txtProductRating]').val(data.rating);
				},
				error: function(){
					alert('Не удалось изменить данные');
				}
			});
		});

		//Удаление 
		$('#showdata').on('click', '.item-delete', function(){
			var id = $(this).attr('data');
			$('#deleteModal').modal('show');
			$('#btnDelete').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'get',
					async: false,
					url: '<?php echo base_url() ?>products/deleteProducts',
					data:{id:id},
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#deleteModal').modal('hide');
							$('.alert-success').html('Продукт успешно удален').fadeIn().delay(4000).fadeOut('slow');
							showAllProducts();
							showAllParentCategories();
						}else{
							alert('Error');
						}
					},
					error: function(){
						alert('Ошибка удаления');
					}
				});
			});
		});

		function showAllParentCategories(){
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>categories/showAllParentCategories',
				async: false,
				dataType: 'json',
				success: function(data){
					var htmlParent = '<option value="0">Нет категории</option>';
					var i;
					for(i=0; i<data.length; i++){
					
						htmlParent +='<option value="'+data[i].id+'">'+data[i].name+'</option>';
					}
					$('#categoryParent').html(htmlParent);
				},
				error: function(){
					alert('Не удалось получить данные из базы данных');
				}
			});
		}

		function showAllProducts(){
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>products/showAllProducts',
				async: false,
				dataType: 'json',
				success: function(data){
					console.log(data);
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
					
						html +='<tr>'+
									'<td>'+data[i].id+'</td>'+
									'<td>'+data[i].name+'</td>'+
									'<td>'+data[i].image+'</td>'+
									'<td>'+data[i].description+'</td>'+
									'<td>'+data[i].count+'</td>'+
									'<td>'+data[i].category+'</td>'+
									'<td>'+data[i].price+'</td>'+
									'<td>'+data[i].rating+'</td>'+
									'<td>'+
										'<a style="margin-bottom:5px;" href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'">Редактировать</a>'+
										'<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'">Удалить</a>'+
									'</td>'+
							    '</tr>';
					}
					$('#showdata').html(html);
				},
				error: function(){
					alert('Не удалось получить данные из базы данных');
				}
			});
		}
	});
</script>