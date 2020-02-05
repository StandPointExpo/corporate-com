@if (session('success'))
    <script>
        $.growl({
            title: "Успех",
            message: "{{ session('success') == 200 ? 'Вы успешно выполнили действие' : session('success') }}"
        });
    </script>
@endif
