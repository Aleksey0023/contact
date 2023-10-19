<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление контакта</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>

<form id="contact-form" action="{{route('contact.store')}}" method="POST" class="col-md-3 mx-auto mt-3">
    @csrf
    <div class="form-group mb-3">
        <label for="name" class="form-label">Имя:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group mb-3">
        <label for="phone" class="form-label">Телефон:</label>
        <input type="text" name="phone" id="phone" class="form-control" required>
    </div>
    <div class="form-group mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <button id="submit-button" type="submit" class="btn btn-primary mb-3">Отправить</button>

    <div id="error-messages" class="alert alert-danger" style="display: none"></div>
</form>

<div id="modal-form" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Уведомление</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Данные успешно отправлены</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#contact-form").submit(function (event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                type: "POST",
                url: "{{ route('contact.store') }}",
                data: formData,
                success: function () {
                    $("#modal-form").modal('show');
                    $("#contact-form")[0].reset();
                    $("#error-messages").hide().empty();
                },
                error: function (response) {
                    if (response.status === 422) { // Ошибка валидации
                        var errors = response.responseJSON.errors;
                        var errorMessages = '';

                        for (var field in errors) {
                            errorMessages += errors[field].join('<br>') + '<br>';
                        }

                        $("#error-messages").html(errorMessages).show();
                    } else {
                        // Другие ошибки
                        $("#error-messages").html('Произошла ошибка при отправке данных').show();
                    }
                }
            });
        });
    });
</script>

</body>
</html>
