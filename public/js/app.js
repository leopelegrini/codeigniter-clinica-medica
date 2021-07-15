$(function(){

    new Currency();

    $('.js-input-cpf').mask('000.000.000-00', {
		placeholder: "___.___.___-__"
	});

    $('.js-input-crm').mask('00000/AAA', {
		placeholder: "_____/__"
	});

});