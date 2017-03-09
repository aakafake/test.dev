
<?php $this->beginJs(); ?>
<script>
//Confirm payment
$("body").on("click", "a.confirm_payment_link", function(e) {
    e.preventDefault();
    var obj = $(this);

    var pay_id = obj.attr("data-pay");
    console.log(pay_id);
    var user_id = obj.closest("tr").attr("data-key");
    console.log(user_id);
    xfr = $.ajax({
            url: "<?= Url::to(['auxx/confirm-test-payment']) ?>",
            type: "post",
            dataType: "json",
            data: "pay_id="+pay_id+"&user_id=" +user_id,
            error: function(jqXHR, textStatus, errorThrown) {
        alert(textStatus);
    },
            success: function(response) {
        if (response == "ok") {
            console.log("ok")
                } else {
            console.log("error");
            alert(response);
        }
    }
        });
        console.log(xfr);
    });
</script>
<?php $this->endJs(); ?>