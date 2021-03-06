jQuery(document).ready(function($) {
    "use strict";

    var error_msg = "<p>Возникла ошибка! Пожалуйста попробуйте отправить заявку еще раз.</p>";
    	
    	jQuery(document).on("click", ".ajax-form-submit", function(event) {
        
            var $form = jQuery(this).parents("form");
            var data = $form.serialize();
            var $result = $form.find(".result");

            $.ajax({
                url: "/ajaxmailer/ajaxmailer.php",
                type: "POST",
                data: data
            }).done(function(html) {
                $result.html(html);
            }).fail(function() {
                $result.html(error_msg);
            })
        return false;
        });
});