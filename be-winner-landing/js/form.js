$(document).ready(function(){

	function inputmask()
	{
		// backspace не работает в фоксе :(
		//$("input[name='email']").keyfilter(/[a-z0-9_\.\-@]/i);
		//$("input[name='phone']").keyfilter(/[\d\+\(\)\-]/);
	}

	function inputfile()
	{
		window.customizeFileInputs();
		return;

		/*if ($("input[type='file']").length) {
			$("input[type='file']").each(function () {
				var $this = $(this);
				$this.wrap("<div class='input-file-wrapper'></div>");
				$this.wrapper = $this.parents(".input-file-wrapper");
				$this.wrapper.append("<div class='load'>Загрузить...</div>");
				$this.wrapper.append("<div class='pseudo-text'></div>");

				$this.change(function()
				{
					$this.parents('.form-row').removeClass('error');
				})

			});
		}*/
	}

	function inputRemoveError()
	{
		// сбрасываем ошибку при вводе текста
		$('input, textarea').keyup(function()
		{
			$(this).removeClass('error');
		})

		// сбрасываем ошибку при выборе файла
		// см main.js
	}

	var options = {
		success: function(data){
			$('#megalabs-form-container').html(data);
			inputfile();
			inputmask();
			inputRemoveError();
		}
	};

	var $form = $('.megalabs-form');

	$('#megalabs-form-container').on('click', '.megalabs-submit-button', function(event)
	{
		event.preventDefault();
		$form.submit(); // далее событие перехватывается валидатором и тормозится
	});

	inputmask();

	$('input[name=yourname]')
		.attr("data-required", "true");

	$('input[type=email]')
		.attr("data-validate", "email");

	$('input[type=tel]')
		.attr("placeholder", " +7 (926) 112-12-23")
		.mask('+7 (999) 999-99-99', { placeholder: ' ' })
		.attr("data-validate", "phone")
		

	if ($(document).width() > 640)
	{
		if ($('input[type=file]').attr("data-required")=="true") {
			//console.log('file required');
			$('input[type=file]').attr("data-required", "true");
			$('#is_file_required').val("true");
		} else {
			//console.log('file is not required, data-required=false');
			//$('input[type=file]').attr("data-required", "false");
			$('#is_file_required').val("false");
		}
	}
	else
		console.log('file is not required');

	$('input[name=accept]')
		.attr("data-required", "true");

	$('input, textarea').focus(function()
	{
		$(this).removeClass('error');
	})


	$form
		//.css("background", "green") // для отладки
		.validate({
			onKeyup: false,
			onBlur: true,

			sendForm: false,

			valid: function()
			{
				$form.ajaxSubmit(options);

				var $submitButton = $('.megalabs-submit-button');
				var submitButtonText = $('body').hasClass('en') ? "Sending..." : "Отправляется...";
				$submitButton
					.width($submitButton.width()) // фиксируем ширину в атрибуте style
					.val(submitButtonText)
					.css("opacity","0.6");
			},

			eachInvalidField: function()
			{
				switch(this.attr("type"))
				{
					case 'file':     this.parents('.form-row').addClass('error'); break;
					case 'checkbox': this.parent().find('.pseudo-checkbox').addClass('error'); break;
					default:         this.addClass('error');
				}
			},

			eachValidField: function()
			{
				switch(this.attr("type"))
				{
					case 'file':     this.parents('.form-row').removeClass('error'); break;
					case 'checkbox': this.parent().find('.pseudo-checkbox').removeClass('error'); break;
					default:         this.removeClass('error');
				}
			}
		});

	$.validateExtend(
	{
    	email:
    	{
        	required : true,
        	pattern : /^[a-z0-9\._\-\+]+@[a-z0-9\.\-]+\.[a-z0-9]+$/i,
        },

        phone:
    	{
        	required : true,
        	pattern : /^\+?[0-9\-\(\)\s]+$/,
        }
    });
})

function checkFileType(val)
{
	var v = val.value;
	var v = v.search(/^.*\.(?:doc|docx|pdf)\s*$/ig);
	if (v != 0) {
		alert($('body').hasClass('en') ? "Wrong file type" : "Неверный тип файла");
		val.value = '';
	}
}