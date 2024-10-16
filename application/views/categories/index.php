<div class="container">
	<h3>Список категорий</h3>
	<div class="alert alert-success" style="display: none;">
		
	</div>
	<button id="btnAdd" class="btn btn-success">Добавить новую категорию</button>
	<table class="table table-bordered table-responsive" style="margin-top: 20px;">
		<thead>
			<tr>
				<td>ID</td>
				<td>Название</td>
				<td>Url</td>
				<td>Описание</td>
				<td>Слайдер</td>
				<td>Родительская категория</td>
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
        <h4 class="modal-title">Добавить новую категорию</h4>
      </div>
      <div class="modal-body">
        	<form id="myForm" action="" method="post" class="form-horizontal">
        		<input type="hidden" name="txtId" value="0">
        		<div class="form-group">
        			<label for="name" class="label-control col-md-4">Название категории</label>
        			<div class="col-md-8">
        				<input type="text" name="txtCategoryName" class="form-control">
        			</div>
        		</div>
				<div class="form-group">
        			<label for="url" class="label-control col-md-4">Url категории</label>
        			<div class="col-md-8">
        				<input type="text" name="txtCategoryUrl" class="form-control">
        			</div>
        		</div>
        		<div class="form-group">
        			<label for="description" class="label-control col-md-4">Краткое описание</label>
        			<div class="col-md-8">
        				<textarea class="form-control" name="txtCategoryDescription"></textarea>
        			</div>
        		</div>
				<div class="form-group">
        			<label for="categorySlider" class="label-control col-md-4">Показывать в главном слайдере</label>
        			<div class="col-md-8">
						<select id="categorySlider" name="categorySlider" class="form-control">
							<option value="0" selected>Нет</option>
							<option value="1">Да</option>
						</select>
        			</div>
        		</div>
				<div class="form-group">
        			<label for="categoryParent" class="label-control col-md-4">Родительская категория</label>
        			<div class="col-md-8">
						<select id="categoryParent" name="categoryParent" class="form-control"></select>
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
        	Вы хотите удалить эту категорию?
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
		showAllCategories();
		showAllParentCategories();

		//Добавление категории
		$('#btnAdd').click(function(){
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Добавить новую категорию');
			$('#myForm')[0].reset();
			$('#myForm').attr('action', '<?php echo base_url() ?>categories/addCategories');
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
								var type = 'добавлена'
							}else if(response.type=='update'){
								var type ="обновлена"
							}
							$('.alert-success').html('Категория '+type+' успешно').fadeIn().delay(4000).fadeOut('slow');
							showAllCategories();
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
			$('#myModal').find('.modal-title').text('Редактировать категорию');
			$('#myForm').attr('action', '<?php echo base_url() ?>categories/updateCategories');
			$.ajax({
				type: 'ajax',
				method: 'get',
				url: '<?php echo base_url() ?>categories/editCategories',
				data: {id: id},
				async: false,
				dataType: 'json',
				success: function(data){
					$('input[name=txtCategoryName]').val(data.name);
					$('input[name=txtCategoryUrl]').val(data.url);
					$('textarea[name=txtCategoryDescription]').val(data.description);
					$('#categorySlider ')
					$('#categorySlider option[value="'+data.show_in_main_slider+'"]').prop('selected', true);
					$('#categoryParent option[value="'+data.parent_id+'"]').prop('selected', true);
					$('input[name=txtId]').val(data.id);
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
					url: '<?php echo base_url() ?>categories/deleteCategories',
					data:{id:id},
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#deleteModal').modal('hide');
							$('.alert-success').html('Категория успешно удалена').fadeIn().delay(4000).fadeOut('slow');
							showAllCategories();
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
					var htmlParent = '<option value="0">Нет родительской категории</option>';
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

		function showAllCategories(){
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>categories/showAllCategories',
				async: false,
				dataType: 'json',
				success: function(data){
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
					
						html +='<tr>'+
									'<td>'+data[i].id+'</td>'+
									'<td>'+data[i].name+'</td>'+
									'<td>'+data[i].url+'</td>'+
									'<td>'+data[i].description+'</td>'+
									'<td>'+data[i].show_in_main_slider+'</td>'+
									'<td>'+data[i].parent_id+'</td>'+
									'<td>'+
										'<a style="margin-right:5px;" href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'">Редактировать</a>'+
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