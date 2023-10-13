$(document).ready(function () {
    $(".btn-delete-user").click((e) => {
        const id = e.currentTarget.id;
        const name = $(`[name=user-name-${id}]`).val();
        const email = $(`[name=user-email-${id}]`).val();
        $("#detail-user").html(`${name} (${email})`);
        $("#form-delete-user").attr("action", (_, value) => `${value}/${id}`);
    });
});
